<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirestoreService;
use Google\Cloud\Firestore\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminNotificationController extends Controller
{
    protected FirestoreService $firestore;

    public function __construct()
    {
        $this->firestore = app(FirestoreService::class);
    }

    public function index()
    {
        return view('admin.notifications');
    }

    public function feed(Request $request)
    {
        $uid = session('auth_uid');
        if (! $uid) {
            return response()->json(['notifications' => [], 'unread' => 0, 'hasMore' => false, 'nextCursor' => null]);
        }

        $cursor = $request->query('cursor') ?: null;
        $limit = min((int) $request->query('limit', 20), 50);

        try {
            $result = $this->firestore->paginatedQuery(
                'notifications',
                [['field' => 'userId', 'op' => '==', 'value' => $uid]],
                $limit,
                $cursor,
                'createdAt',
                'DESC'
            );
        } catch (\Throwable $e) {
            Log::error('Notification feed error: '.$e->getMessage());

            return response()->json(['notifications' => [], 'unread' => 0, 'hasMore' => false, 'nextCursor' => null]);
        }

        $notifications = collect($result['documents'])
            ->map(fn ($n) => $this->normalize($n))
            ->values()
            ->all();

        // Only count unread on the first page (no cursor). Use strict !== true so that
        // notifications with read:null or missing read field don't inflate the count.
        $unread = ! $cursor
            ? collect($notifications)->filter(fn ($n) => ($n['isRead'] ?? false) !== true)->count()
            : null;

        return response()->json([
            'notifications' => $notifications,
            'unread' => $unread,
            'nextCursor' => $result['nextCursor'],
            'hasMore' => $result['hasMore'],
        ]);
    }

    public function markRead(string $id)
    {
        try {
            $this->firestore->update('notifications', $id, ['read' => true]);

            return response()->json(['success' => true]);
        } catch (\Throwable $e) {
            Log::error('Notification markRead failed: '.$e->getMessage());

            return response()->json(['success' => false], 500);
        }
    }

    public function markAllRead()
    {
        $uid = session('auth_uid');
        if (! $uid) {
            return response()->json(['success' => false], 401);
        }

        try {
            // Fetch up to 100 recent notifications and mark unread ones read.
            // We avoid a read == false filter to skip needing a composite index.
            $result = $this->firestore->paginatedQuery(
                'notifications',
                [['field' => 'userId', 'op' => '==', 'value' => $uid]],
                100,
                null,
                'createdAt',
                'DESC'
            );

            foreach ($result['documents'] as $n) {
                if (($n['read'] ?? false) !== true) {
                    $this->firestore->update('notifications', $n['documentId'], ['read' => true]);
                }
            }

            return response()->json(['success' => true]);
        } catch (\Throwable $e) {
            Log::error('Notification markAllRead failed: '.$e->getMessage());

            return response()->json(['success' => false], 500);
        }
    }

    protected function normalize(array $doc): array
    {
        foreach ($doc as $key => $value) {
            if ($value instanceof Timestamp) {
                $doc[$key] = $value->get()->format('Y-m-d H:i:s');
            }
        }
        // paginatedQuery returns documentId; normalise to id
        if (! isset($doc['id']) && isset($doc['documentId'])) {
            $doc['id'] = $doc['documentId'];
        }

        return $doc;
    }
}
