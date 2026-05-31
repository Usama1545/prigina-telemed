<?php

namespace App\Http\Controllers;

use App\Services\FirestoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function __construct(private FirestoreService $firestore) {}

    public function show(string $appointmentId)
    {
        $appointment = $this->firestore->find('appointments', $appointmentId);

        if (! $appointment) {
            abort(404, 'Appointment not found.');
        }

        // Already reviewed — show a thank-you instead of the form
        if (! empty($appointment['reviewSubmitted'])) {
            return view('review', ['appointment' => $appointment, 'alreadyReviewed' => true]);
        }

        return view('review', ['appointment' => $appointment, 'alreadyReviewed' => false]);
    }

    public function store(Request $request, string $appointmentId)
    {
        $appointment = $this->firestore->find('appointments', $appointmentId);

        if (! $appointment) {
            abort(404, 'Appointment not found.');
        }

        if (! empty($appointment['reviewSubmitted'])) {
            return redirect('/'.$appointmentId.'/review')
                ->with('error', 'You have already submitted a review for this appointment.');
        }

        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $doctorId = $appointment['doctorId'] ?? null;
        $patientId = $appointment['patientId'] ?? null;
        $now = now()->toDateTimeString();

        // Save the review
        $this->firestore->create('reviews', [
            'appointmentId' => $appointmentId,
            'doctorId' => $doctorId,
            'patientId' => $patientId,
            'patientName' => $appointment['patientName'] ?? '',
            'doctorName' => $appointment['doctorName'] ?? '',
            'rating' => (int) $data['rating'],
            'comment' => $data['comment'] ?? '',
            'createdAt' => $now,
            'updatedAt' => $now,
        ]);

        // Mark appointment so the form can't be resubmitted
        $this->firestore->update('appointments', $appointmentId, [
            'reviewSubmitted' => true,
            'updatedAt' => $now,
        ]);

        // Recalculate doctor rating in the background
        if ($doctorId) {
            $this->updateDoctorRating($doctorId);
        }

        return redirect('/'.$appointmentId.'/review')
            ->with('success', 'Thank you! Your review has been submitted.');
    }

    private function updateDoctorRating(string $doctorId): void
    {
        try {
            $result = $this->firestore->paginatedQuery(
                collection: 'reviews',
                filters: [['field' => 'doctorId', 'op' => '=', 'value' => $doctorId]],
                limit: 1000,
                orderByField: 'createdAt',
                orderByDirection: 'DESC'
            );

            $reviews = $result['documents'] ?? [];

            if (empty($reviews)) {
                return;
            }

            $totalReviews = count($reviews);
            $averageRating = round(
                collect($reviews)->avg(fn ($r) => (float) ($r['rating'] ?? 0)),
                2
            );

            $this->firestore->update('doctors', $doctorId, [
                'averageRating' => $averageRating,
                'totalReviews' => $totalReviews,
                'updatedAt' => now()->toDateTimeString(),
            ]);
        } catch (\Throwable $e) {
            Log::error('update-doctor-rating-failed', [
                'doctorId' => $doctorId,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
