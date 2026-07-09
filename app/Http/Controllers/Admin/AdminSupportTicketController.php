<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirestoreService;
use Illuminate\Http\Request;

class AdminSupportTicketController extends Controller
{
    protected FirestoreService $firestore;

    public function __construct(FirestoreService $firestore)
    {
        $this->firestore = $firestore;
    }

    public function index()
    {
        // paginatedQuery() appends the real Firestore document id as
        // 'documentId', separate from any 'id' field the document itself
        // might contain.
        $result = $this->firestore->paginatedQuery(
            'support_tickets',
            [],
            200, null, 'createdAt', 'DESC'
        );

        $tickets = collect($result['documents'] ?? [])->map(function ($ticket) {
            $ticket['id'] = $ticket['documentId'];

            return $ticket;
        });

        $stats = [
            'total' => $tickets->count(),
            'open' => $tickets->where('status', 'open')->count(),
            'in_progress' => $tickets->where('status', 'in_progress')->count(),
            'resolved' => $tickets->where('status', 'resolved')->count(),
        ];

        return view('admin.support-tickets.index', compact('tickets', 'stats'));
    }

    public function updateStatus(Request $request, string $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:open,in_progress,resolved',
        ]);

        $ticket = $this->firestore->find('support_tickets', $id);

        if (! $ticket) {
            return back()->with('error', 'Ticket not found.');
        }

        $this->firestore->update('support_tickets', $id, [
            'status' => $validated['status'],
            'updatedAt' => now(),
        ]);

        return back()->with('success', 'Ticket status updated.');
    }
}
