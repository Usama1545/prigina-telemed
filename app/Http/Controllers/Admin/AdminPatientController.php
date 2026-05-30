<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirestoreService;
use Google\Cloud\Firestore\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminPatientController extends Controller
{
    protected int $pageSize = 10;

    public function __construct(protected FirestoreService $firestore) {}

    public function index()
    {
        $result = $this->patientsPage();

        return view('admin.patient-list', [
            'patients'   => $result['documents'],
            'nextCursor' => $result['nextCursor'],
            'hasMore'    => $result['hasMore'],
        ]);
    }

    public function data(Request $request)
    {
        return response()->json(
            $this->patientsPage(
                $request->query('search', ''),
                (int) $request->query('cursor', 0)
            )
        );
    }

    public function toggleActive(Request $request, string $patientId)
    {
        $data = $request->validate(['isActive' => 'required|boolean']);

        if (! $this->firestore->find('patients', $patientId)) {
            abort(404);
        }

        $this->firestore->update('patients', $patientId, [
            'isActive'  => (bool) $data['isActive'],
            'updatedAt' => now()->toDateTimeString(),
            'updatedBy' => session('auth_uid'),
        ]);

        Cache::forget('admin:stats');

        return response()->json(['success' => true]);
    }

    protected function patientsPage(string $search = '', int $offset = 0): array
    {
        $chunkSize = 500;
        $maxFetch  = 5000;
        $all       = collect();
        $cursor    = null;
        $fetched   = 0;

        while ($fetched < $maxFetch) {
            $result   = $this->firestore->getCursorPage('patients', $chunkSize, $cursor, 'createdAt', 'DESC');
            $chunk    = collect($result['documents'])->map(fn ($doc) => $this->normalize($doc));
            $all      = $all->merge($chunk);
            $fetched += count($result['documents']);

            if (! $result['hasMore']) {
                break;
            }
            $cursor = $result['nextCursor'];
        }

        if ($search !== '') {
            $term = strtolower(trim($search));
            $all  = $all->filter(fn ($doc) =>
                str_contains(strtolower($doc['name'] ?? $doc['displayName'] ?? ''), $term)
            )->values();
        }

        $paged   = $all->slice($offset, $this->pageSize)->values()->all();
        $hasMore = ($offset + $this->pageSize) < $all->count();

        return [
            'documents'  => $paged,
            'nextCursor' => $hasMore ? $offset + $this->pageSize : null,
            'hasMore'    => $hasMore,
        ];
    }

    protected function normalize(array $doc): array
    {
        foreach ($doc as $key => $value) {
            if ($value instanceof Timestamp) {
                $doc[$key] = $value->get()->format('Y-m-d H:i:s');
            }
        }

        return $doc;
    }
}
