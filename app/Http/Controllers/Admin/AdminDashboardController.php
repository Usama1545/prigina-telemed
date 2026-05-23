<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirestoreService;
use App\Models\Firestore\Doctor;
use App\Models\Firestore\Patient;
use App\Models\Firestore\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminDashboardController extends Controller
{
    protected $firestore;
    protected $doctorModel;
    protected $patientModel;
    protected $appointmentModel;

    public function __construct(
        FirestoreService $firestore,
        Doctor $doctor,
        Patient $patient,
        Appointment $appointment
    ) {
        $this->firestore = $firestore;
        $this->doctorModel = $doctor;
        $this->patientModel = $patient;
        $this->appointmentModel = $appointment;
    }

    /**
     * Get dashboard statistics
     */
    public function getStats()
    {
        return Cache::remember('admin:stats', 300, function () {
            $totalDoctors = $this->firestore->count('doctors');
            $activeDoctors = $this->firestore->count('doctors', [
                ['field' => 'isActive', 'op' => '=', 'value' => true]
            ]);
            $verifiedDoctors = $this->firestore->count('doctors', [
                ['field' => 'isVerified', 'op' => '=', 'value' => true]
            ]);
            $pendingDoctors = $this->firestore->count('doctors', [
                ['field' => 'isVerified', 'op' => '=', 'value' => false]
            ]);

            $totalPatients = $this->firestore->count('patients');
            $verifiedPatients = $this->firestore->count('patients', [
                ['field' => 'isVerified', 'op' => '=', 'value' => true]
            ]);

            $totalAppointments = $this->firestore->count('appointments');
            $completedAppointments = $this->firestore->count('appointments', [
                ['field' => 'status', 'op' => '=', 'value' => 'completed']
            ]);
            $pendingAppointments = $this->firestore->count('appointments', [
                ['field' => 'status', 'op' => '=', 'value' => 'pending']
            ]);

            return [
                'doctors' => [
                    'total' => $totalDoctors,
                    'active' => $activeDoctors,
                    'verified' => $verifiedDoctors,
                    'pending' => $pendingDoctors,
                ],
                'patients' => [
                    'total' => $totalPatients,
                    'verified' => $verifiedPatients,
                ],
                'appointments' => [
                    'total' => $totalAppointments,
                    'completed' => $completedAppointments,
                    'pending' => $pendingAppointments,
                ],
            ];
        });
    }

    /**
     * Get list of doctors for admin
     */
    public function getDoctorsList(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $cursor = $request->input('cursor');
        $status = $request->input('status'); // 'pending', 'active', 'inactive'
        $verified = $request->input('verified'); // 'true', 'false'

        $filters = [];

        if ($status === 'active') {
            $filters[] = ['field' => 'isActive', 'op' => '=', 'value' => true];
        } elseif ($status === 'inactive') {
            $filters[] = ['field' => 'isActive', 'op' => '=', 'value' => false];
        }

        if ($verified === 'true') {
            $filters[] = ['field' => 'isVerified', 'op' => '=', 'value' => true];
        } elseif ($verified === 'false') {
            $filters[] = ['field' => 'isVerified', 'op' => '=', 'value' => false];
        }

        $result = $this->firestore->query('doctors', $filters, $perPage, $cursor ? json_decode($cursor, true) : null);

        return response()->json([
            'success' => true,
            'doctors' => $result['documents'] ?? [],
            'nextCursor' => $result['nextCursor'] ?? null,
            'hasMore' => $result['hasMore'] ?? false,
        ]);
    }

    /**
     * Get list of patients for admin
     */
    public function getPatientsList(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $cursor = $request->input('cursor');
        $verified = $request->input('verified'); // 'true', 'false'

        $filters = [];

        if ($verified === 'true') {
            $filters[] = ['field' => 'isVerified', 'op' => '=', 'value' => true];
        } elseif ($verified === 'false') {
            $filters[] = ['field' => 'isVerified', 'op' => '=', 'value' => false];
        }

        $result = $this->firestore->query('patients', $filters, $perPage, $cursor ? json_decode($cursor, true) : null);

        return response()->json([
            'success' => true,
            'patients' => $result['documents'] ?? [],
            'nextCursor' => $result['nextCursor'] ?? null,
            'hasMore' => $result['hasMore'] ?? false,
        ]);
    }

    /**
     * Get list of appointments for admin
     */
    public function getAppointmentsList(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $cursor = $request->input('cursor');
        $status = $request->input('status'); // 'pending', 'completed', 'cancelled'

        $filters = [];

        if ($status) {
            $filters[] = ['field' => 'status', 'op' => '=', 'value' => $status];
        }

        $result = $this->firestore->query('appointments', $filters, $perPage, $cursor ? json_decode($cursor, true) : null);

        return response()->json([
            'success' => true,
            'appointments' => $result['documents'] ?? [],
            'nextCursor' => $result['nextCursor'] ?? null,
            'hasMore' => $result['hasMore'] ?? false,
        ]);
    }

    /**
     * Approve/Verify doctor
     */
    public function approvDoctor(Request $request, $doctorId)
    {
        try {
            $doctor = $this->firestore->find('doctors', $doctorId);

            if (!$doctor) {
                return response()->json(['error' => 'Doctor not found'], 404);
            }

            $updated = $this->firestore->update('doctors', $doctorId, [
                'isVerified' => true,
                'verifiedAt' => now()->toDateTimeString(),
                'verifiedBy' => session('auth_uid'),
            ]);

            // Clear cache
            Cache::forget('admin:stats');

            return response()->json([
                'success' => true,
                'message' => 'Doctor verified successfully',
                'doctor' => $updated,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Reject/Deactivate doctor
     */
    public function rejectDoctor(Request $request, $doctorId)
    {
        try {
            $doctor = $this->firestore->find('doctors', $doctorId);

            if (!$doctor) {
                return response()->json(['error' => 'Doctor not found'], 404);
            }

            $reason = $request->input('reason', 'Not specified');

            $updated = $this->firestore->update('doctors', $doctorId, [
                'isActive' => false,
                'rejectionReason' => $reason,
                'rejectedAt' => now()->toDateTimeString(),
                'rejectedBy' => session('auth_uid'),
            ]);

            // Clear cache
            Cache::forget('admin:stats');

            return response()->json([
                'success' => true,
                'message' => 'Doctor deactivated successfully',
                'doctor' => $updated,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Get doctor details with full information
     */
    public function getDoctorDetails($doctorId)
    {
        try {
            $doctor = $this->firestore->find('doctors', $doctorId);

            if (!$doctor) {
                return response()->json(['error' => 'Doctor not found'], 404);
            }

            // Get doctor's appointments
            $appointments = $this->firestore->query('appointments', [
                ['field' => 'doctorId', 'op' => '=', 'value' => $doctorId]
            ], 5)['documents'] ?? [];

            // Get doctor's reviews
            $reviews = $this->firestore->query('reviews', [
                ['field' => 'doctorId', 'op' => '=', 'value' => $doctorId]
            ], 5)['documents'] ?? [];

            return response()->json([
                'success' => true,
                'doctor' => $doctor,
                'appointments' => $appointments,
                'reviews' => $reviews,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Get app settings
     */
    public function getSettings()
    {
        try {
            $settings = $this->firestore->first('appsettings');

            return response()->json([
                'success' => true,
                'settings' => $settings,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update app settings
     */
    public function updateSettings(Request $request)
    {
        try {
            $data = $request->validate([
                'slotDuration' => 'integer|min:15|max:120',
                'maxBookingDays' => 'integer|min:1|max:365',
                'consultationFee' => 'numeric|min:0',
                'platformCommission' => 'numeric|min:0|max:100',
            ]);

            $settings = $this->firestore->first('appsettings');

            if (!$settings) {
                // Create new settings
                $created = $this->firestore->createWithId('appsettings', 'settings', array_merge($data, [
                    'createdAt' => now()->toDateTimeString(),
                ]));
            } else {
                // Update existing
                $created = $this->firestore->update('appsettings', 'settings', array_merge($data, [
                    'updatedAt' => now()->toDateTimeString(),
                ]));
            }

            // Clear cache
            Cache::forget('admin:stats');

            return response()->json([
                'success' => true,
                'message' => 'Settings updated successfully',
                'settings' => $created,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
