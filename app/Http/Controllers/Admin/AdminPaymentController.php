<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AppointmentPaymentService;
use App\Services\FirestoreService;

class AdminPaymentController extends Controller
{
    public function __construct(
        protected FirestoreService $firestore,
        protected AppointmentPaymentService $payments,
    ) {}

    public function releasePayment(string $appointmentId)
    {
        $appointment = $this->firestore->find('appointments', $appointmentId);

        if (! $appointment) {
            abort(404, 'Appointment not found');
        }

        $error = $this->payments->release($appointmentId, $appointment);

        return $error
            ? back()->withErrors(['payment' => $error])
            : back()->with('success', 'Payment released to doctor successfully.');
    }

    public function refundPayment(string $appointmentId)
    {
        $appointment = $this->firestore->find('appointments', $appointmentId);

        if (! $appointment) {
            abort(404, 'Appointment not found');
        }

        $error = $this->payments->refund($appointmentId, $appointment);

        return $error
            ? back()->withErrors(['payment' => $error])
            : back()->with('success', 'Payment refunded to patient successfully.');
    }
}
