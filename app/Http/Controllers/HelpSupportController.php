<?php

namespace App\Http\Controllers;

use App\Services\FirestoreService;
use Illuminate\Http\Request;

class HelpSupportController extends Controller
{
    protected FirestoreService $firestore;

    protected array $defaultContact = [
        'email' => 'support@priginaglobaltelemed.com',
        'phone' => '+1 (555) 123-4567',
        'hours' => 'Mon-Fri: 9AM-6PM, Sat: 10AM-4PM',
        'responseTime' => 'Within 24 hours',
        'emergencyNote' => 'For medical emergencies, call 911 immediately',
    ];

    public function __construct(FirestoreService $firestore)
    {
        $this->firestore = $firestore;
    }

    public function index()
    {
        $role = current_user()['role'] ?? 'patient';

        $contact = $this->firestore->find('help_support', 'contact_info') ?: $this->defaultContact;

        return view('common.help-support', [
            'role' => $role,
            'contact' => array_merge($this->defaultContact, $contact),
        ]);
    }

    public function storeTicket(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $user = current_user();
        $role = $user['role'] ?? 'unknown';

        $this->firestore->create('support_tickets', [
            'name' => $user['name'] ?? '',
            'email' => $user['email'] ?? '',
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'category' => 'General',
            'attachments' => [],
            'status' => 'open',
            'userType' => in_array($role, ['patient', 'doctor'], true) ? $role : 'unknown',
            'userId' => $user['uid'] ?? '',
            'createdAt' => now(),
            'updatedAt' => now(),
        ]);

        return redirect()->back()->with('success', __('app.help_support.ticket_submitted'));
    }

    public function myTickets()
    {
        $user = current_user();
        $role = $user['role'] ?? 'patient';

        $result = $this->firestore->query(
            'support_tickets',
            [['field' => 'userId', 'op' => '=', 'value' => $user['uid'] ?? '']],
            100, null, 'createdAt', 'DESC'
        );

        $tickets = collect($result['documents'] ?? []);

        return view('common.my-tickets', [
            'role' => $role,
            'tickets' => $tickets,
        ]);
    }
}
