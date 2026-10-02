<?php

namespace App\Http\Controllers\Admin;

use App\Services\DoctorDirectory;
use App\Http\Controllers\Controller;
use App\Services\FirestoreService;
use App\Support\CountriesOfPractice;
use Carbon\Carbon;
use Google\Cloud\Firestore\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminDoctorController extends Controller
{
    protected int $pageSize = 10;

    public function __construct(protected FirestoreService $firestore) {}

    public function index()
    {
        $result = $this->doctorsPage();

        return view('admin.doctor-list', [
            'doctors' => $result['documents'],
            'nextCursor' => $result['nextCursor'],
            'hasMore' => $result['hasMore'],
        ]);
    }

    public function data(Request $request)
    {
        return response()->json(
            $this->doctorsPage(
                $request->query('search', ''),
                (int) $request->query('cursor', 0),
                (string) $request->query('filter', ''),
            )
        );
    }

    public function show(string $doctorId)
    {
        $doctor = $this->firestore->find('doctors', $doctorId);

        if (! $doctor) {
            abort(404, 'Doctor not found');
        }

        $doctor = $this->normalize(array_merge(['id' => $doctorId], $doctor));

        // Fetch top 25 appointments for this doctor. No Firestore orderBy to avoid
        // requiring a composite index — PHP sorts by date after the query.
        $apptResult = $this->firestore->query(
            'appointments',
            [['field' => 'doctorId', 'op' => '=', 'value' => $doctorId]],
            25,
            null,
            null,
            'DESC'
        );
        $appointments = collect($apptResult['documents'] ?? [])
            ->map(fn ($doc) => $this->normalize($doc))
            ->sortByDesc(fn ($a) => $a['date'] ?? $a['appointmentDate'] ?? $a['createdAt'] ?? '')
            ->values()
            ->all();

        return view('admin.doctor-profile', compact('doctor', 'appointments'));
    }

    public function toggleActive(Request $request, string $doctorId)
    {
        $data = $request->validate(['isActive' => 'required|boolean']);

        if (! $this->firestore->find('doctors', $doctorId)) {
            abort(404);
        }

        $this->firestore->update('doctors', $doctorId, [
            'isActive' => (bool) $data['isActive'],
            'updatedAt' => now()->toDateTimeString(),
            'updatedBy' => session('auth_uid'),
        ]);

        Cache::forget('admin:stats');
        DoctorDirectory::forget();

        return response()->json(['success' => true]);
    }

    public function toggleTopDoctor(Request $request, string $doctorId)
    {
        $data = $request->validate(['isTopDoctor' => 'required|boolean']);

        if (! $this->firestore->find('doctors', $doctorId)) {
            abort(404);
        }

        $this->firestore->update('doctors', $doctorId, [
            'isTopDoctor' => (bool) $data['isTopDoctor'],
            'updatedAt' => now()->toDateTimeString(),
            'updatedBy' => session('auth_uid'),
        ]);

        Cache::forget('admin:stats');
        DoctorDirectory::forget();

        return response()->json(['success' => true]);
    }

    public function approve(string $doctorId)
    {
        $doctor = $this->firestore->find('doctors', $doctorId);
        if (! $doctor) {
            abort(404);
        }

        // Approving the doctor also approves their Countries of Practice still
        // under review, so they appear to patients there (rejected ones stay rejected).
        $entries = CountriesOfPractice::of($doctor)
            ?: array_filter([CountriesOfPractice::fromLegacy($doctor)]);
        $countries = $entries
            ? CountriesOfPractice::fields(CountriesOfPractice::approvePending($entries, Carbon::now('UTC'), session('auth_uid')))
            : [];

        $this->firestore->update('doctors', $doctorId, [
            ...$countries,
            'isVerified' => true,
            'isActive' => true,
            'verifiedAt' => now()->toDateTimeString(),
            'verifiedBy' => session('auth_uid'),
        ]);
        DoctorDirectory::forget();

        Cache::forget('admin:stats');

        return response()->json(['success' => true, 'message' => 'Doctor approved successfully.']);
    }

    public function decline(Request $request, string $doctorId)
    {
        if (! $this->firestore->find('doctors', $doctorId)) {
            abort(404);
        }

        $this->firestore->update('doctors', $doctorId, [
            'isVerified' => false,
            'isActive' => false,
            'rejectionReason' => $request->input('reason', 'Not specified'),
            'rejectedAt' => now()->toDateTimeString(),
            'rejectedBy' => session('auth_uid'),
        ]);

        Cache::forget('admin:stats');

        return response()->json(['success' => true, 'message' => 'Doctor declined.']);
    }

    /**
     * Approve or reject one Country of Practice. Only that country is affected:
     * a rejected country is hidden from patients there; the doctor's other
     * countries and existing appointments are unchanged.
     */
    public function reviewCountry(Request $request, string $doctorId, string $entryId)
    {
        $data = $request->validate([
            'decision' => 'required|in:approved,rejected',
            'reason' => 'required_if:decision,rejected|nullable|string|max:500',
        ]);

        $doctor = $this->firestore->find('doctors', $doctorId);
        if (! $doctor) {
            abort(404);
        }

        $entries = CountriesOfPractice::of($doctor)
            ?: array_filter([CountriesOfPractice::fromLegacy($doctor)]);

        try {
            $entries = CountriesOfPractice::review(
                $entries, $entryId, $data['decision'], (string) ($data['reason'] ?? ''),
                Carbon::now('UTC'), session('auth_uid'),
            );
        } catch (\InvalidArgumentException) {
            abort(404);
        }

        $this->firestore->update('doctors', $doctorId, [
            ...CountriesOfPractice::fields($entries),
            'updatedAt' => now()->toDateTimeString(),
        ]);
        DoctorDirectory::forget();

        return response()->json(['success' => true]);
    }

    /**
     * @param  string  $filter  '' (all), 'review' (countries waiting for review)
     *                          or 'expired' (a licence past its expiry date)
     */
    protected function doctorsPage(string $search = '', int $offset = 0, string $filter = ''): array
    {
        $chunkSize = 500;
        $maxFetch = 5000; // safety cap: stops after 5,000 doctors
        $all = collect();
        $cursor = null;
        $fetched = 0;

        while ($fetched < $maxFetch) {
            $result = $this->firestore->getCursorPage('doctors', $chunkSize, $cursor, 'createdAt', 'DESC');
            $chunk = collect($result['documents'])->map(fn ($doc) => $this->normalize($doc));
            $all = $all->merge($chunk);
            $fetched += count($result['documents']);

            if (! $result['hasMore']) {
                break;
            }
            $cursor = $result['nextCursor'];
        }

        // Flags shown in the list (and used by the filters).
        $today = Carbon::now('UTC');
        $all = $all->map(function ($doc) use ($today) {
            $entries = CountriesOfPractice::of($doc);
            $doc['countriesToReview'] = count(array_filter($entries, fn ($e) => $e['status'] === CountriesOfPractice::PENDING));
            $doc['licenceExpired'] = CountriesOfPractice::hasExpired($entries, $today);

            return $doc;
        });
        if ($filter === 'review') {
            $all = $all->filter(fn ($doc) => $doc['countriesToReview'] > 0)->values();
        } elseif ($filter === 'expired') {
            $all = $all->filter(fn ($doc) => $doc['licenceExpired'])->values();
        }

        if ($search !== '') {
            $term = strtolower(trim($search));
            $all = $all->filter(fn ($doc) => str_contains(strtolower($doc['name'] ?? $doc['displayName'] ?? ''), $term)
            )->values();
        }

        $paged = $all->slice($offset, $this->pageSize)->values()->all();
        $hasMore = ($offset + $this->pageSize) < $all->count();

        return [
            'documents' => $paged,
            'nextCursor' => $hasMore ? $offset + $this->pageSize : null,
            'hasMore' => $hasMore,
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
