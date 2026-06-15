<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentCompleted;
use App\Mail\AppointmentConfirmed;
use App\Mail\AppointmentRejected;
use App\Mail\AppointmentReminder;
use App\Mail\NewAppointmentBooked;
use App\Mail\NewAppointmentNotification;
use App\Services\FirestoreService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AppointmentEmailController extends Controller
{
    public function __construct(private FirestoreService $firestore) {}

    /**
     * Manually trigger a reminder email for a specific appointment.
     * POST /api/appointments/{id}/send-reminder
     */
    public function sendReminder(string $id): JsonResponse
    {
        $appointment = $this->firestore->find('appointments', $id);

        if (! $appointment) {
            return response()->json(['error' => 'Appointment not found.'], 404);
        }

        $status = $appointment['status'] ?? '';
        if (! in_array($status, ['pending', 'confirmed'])) {
            return response()->json([
                'error' => "Cannot send reminder for appointment with status '{$status}'.",
            ], 422);
        }

        $email = $this->patientEmail($appointment);

        if (! $email) {
            return response()->json(['error' => 'Patient email not found.'], 422);
        }

        $appointment['id'] = $appointment['documentId'] ?? $appointment['id'] ?? $id;

        try {
            Mail::to($email)->send(new AppointmentReminder($appointment));

            $this->firestore->update('appointments', $id, [
                'reminderSentAt' => now()->toDateTimeString(),
                'updatedAt' => now()->toDateTimeString(),
            ]);

            return response()->json([
                'success' => true,
                'message' => "Reminder sent to {$email}.",
            ]);
        } catch (\Throwable $e) {
            Log::error('appointment-reminder-api-failed', [
                'appointment' => $id,
                'email' => $email,
                'error' => $e->getMessage(),
            ]);

            return response()->json(['error' => 'Failed to send reminder. Please try again.'], 500);
        }
    }

    /**
     * Send the appropriate status email to the patient based on current appointment status.
     * Optionally also sends a new-appointment notification to the doctor when status is pending.
     * POST /api/appointments/{id}/notify-status
     */
    public function notifyStatus(string $id): JsonResponse
    {
        $appointment = $this->firestore->find('appointments', $id);

        if (! $appointment) {
            return response()->json(['error' => 'Appointment not found.'], 404);
        }

        $status = $appointment['status'] ?? '';

        $mailClass = match ($status) {
            'pending' => NewAppointmentBooked::class,
            'confirmed' => AppointmentConfirmed::class,
            'cancelled' => AppointmentRejected::class,
            'completed', 'completedPaid' => AppointmentCompleted::class,
            default => null,
        };

        if (! $mailClass) {
            return response()->json([
                'error' => "No email template for appointment status '{$status}'.",
            ], 422);
        }

        $patientEmail = $this->patientEmail($appointment);

        if (! $patientEmail) {
            return response()->json(['error' => 'Patient email not found.'], 422);
        }

        $sent = [];
        $errors = [];

        // Send patient email
        try {
            Mail::to($patientEmail)->send(new $mailClass($appointment));
            $sent[] = "patient ({$patientEmail})";
        } catch (\Throwable $e) {
            Log::error('appointment-status-email-failed', [
                'appointment' => $id,
                'status' => $status,
                'email' => $patientEmail,
                'error' => $e->getMessage(),
            ]);
            $errors[] = "patient email failed: {$e->getMessage()}";
        }

        // For new (pending) appointments, also notify the doctor
        if ($status === 'pending') {
            $doctorEmail = $this->doctorEmail($appointment);

            if ($doctorEmail) {
                try {
                    Mail::to($doctorEmail)->send(new NewAppointmentNotification($appointment));
                    $sent[] = "doctor ({$doctorEmail})";
                } catch (\Throwable $e) {
                    Log::error('appointment-doctor-notification-failed', [
                        'appointment' => $id,
                        'email' => $doctorEmail,
                        'error' => $e->getMessage(),
                    ]);
                    $errors[] = "doctor email failed: {$e->getMessage()}";
                }
            }
        }

        if (empty($sent)) {
            return response()->json(['error' => implode('; ', $errors)], 500);
        }

        return response()->json([
            'success' => true,
            'status' => $status,
            'sent_to' => $sent,
            'errors' => $errors,
        ]);
    }

    private function patientEmail(array $appointment): ?string
    {
        $patientId = $appointment['patientId'] ?? null;
        if (! $patientId) {
            return null;
        }

        $patient = $this->firestore->find('patients', $patientId);

        return $patient['email'] ?? null;
    }

    private function doctorEmail(array $appointment): ?string
    {
        $doctorId = $appointment['doctorId'] ?? null;
        if (! $doctorId) {
            return null;
        }

        $doctor = $this->firestore->find('doctors', $doctorId);

        return $doctor['email'] ?? null;
    }
}
