<?php

namespace App\Http\Controllers;

use App\Support\AppointmentTime;
use App\Services\DoctorDirectory;
use App\Models\Firestore\Category;
use App\Models\Firestore\Doctor;
use App\Services\FirestoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DoctorController extends Controller
{
    protected $doctors;

    protected $categories;

    public function __construct(Doctor $doctors, Category $categories)
    {
        $this->doctors = $doctors;
        $this->categories = $categories;
    }

    public function index(Request $request, DoctorDirectory $directory)
    {
        $categoryIds = array_filter((array) $request->query('category', []));
        $availability = array_filter((array) $request->query('availability', []));
        $search = mb_strtolower(trim((string) $request->query('search', '')));
        $offset = max(0, (int) json_decode((string) $request->query('cursor', '0'), true));
        $pageSize = 12;

        // Only doctors approved to practise in the patient's chosen country.
        $country = $directory->selectedCountry($request);

        $doctors = $directory->inCountry($country)
            ->when($categoryIds, fn ($c) => $c->filter(
                fn ($doc) => ! empty(array_intersect($doc['specializations'] ?? [], $categoryIds))
            ))
            ->when($availability, fn ($c) => $c->filter(
                fn ($doc) => ! empty(array_intersect($doc['workingDays'] ?? [], $availability))
            ))
            ->when($search !== '', fn ($c) => $c->filter(
                fn ($doc) => str_contains(mb_strtolower(($doc['name'] ?? '').' '.implode(' ', (array) ($doc['specializations'] ?? []))), $search)
            ))
            ->sortByDesc(fn ($doc) => AppointmentTime::toUtc($doc['createdAt'] ?? null)?->getTimestamp() ?? 0)
            ->values();

        $page = $doctors->slice($offset, $pageSize)->values();
        $hasMore = $offset + $pageSize < $doctors->count();

        $categories = Cache::remember('home.doctors.categories', 6000, function () {
            return $this->categories->all()
                ->where('isActive', true)
                ->values();
        });

        return view('doctor.doctor-grid', [
            'doctors' => $page,
            'nextCursor' => $hasMore ? $offset + $pageSize : null,
            'hasMore' => $hasMore,
            'categories' => $categories,
            'country' => $country,
            'countryOptions' => $directory->countryOptions(),
        ]);
    }

    public function show($id)
    {
        $doctor = $this->doctors->find($id);

        if (! $doctor || ! $doctor['isActive'] || ! $doctor['isVerified']) {
            abort(404);
        }

        $firestore = app(FirestoreService::class);

        $baseFilter = [
            [
                'field' => 'doctorId',
                'op' => '=',
                'value' => $id,
            ],
        ];

        // 🔥 Cache all stats together (better than multiple keys)
        $stats = Cache::remember("doctor:{$id}:stats", 300, function () use ($firestore, $baseFilter) {

            $totalReviews = $firestore->count('reviews', $baseFilter);

            $recommendedReviews = $firestore->count('reviews', [
                ...$baseFilter,
                [
                    'field' => 'rating',
                    'op' => '>=',
                    'value' => 4.0,
                ],
            ]);

            $appointmentCount = $firestore->count('appointments', $baseFilter);

            $recommendationPercentage = $totalReviews > 0
                ? round(($recommendedReviews / $totalReviews) * 100)
                : 0;

            return [
                'totalReviews' => $totalReviews,
                'recommendedReviews' => $recommendedReviews,
                'recommendationPercentage' => $recommendationPercentage,
                'appointmentCount' => $appointmentCount,
            ];
        });

        // 🔥 Cache reviews separately (shorter TTL)
        $reviews = Cache::remember("doctor:{$id}:reviews", 120, function () use ($firestore, $baseFilter) {
            return $firestore->query('reviews', $baseFilter, 5, null)['documents'] ?? [];
        });

        $patient = current_patient();
        $hasAppointment = false;

        if ($patient) {
            $patientAppointments = $firestore->query('appointments', [
                ['field' => 'patientId', 'op' => '=', 'value' => $patient['uid']],
                ['field' => 'doctorId', 'op' => '=', 'value' => $id],
            ], 1);

            $hasAppointment = ! empty($patientAppointments['documents'] ?? []);
        }

        return view('doctor-profile', [
            'doctor' => $doctor,
            'reviews' => $reviews,
            'hasAppointment' => $hasAppointment,
            ...$stats,
        ]);
    }

    public function byCategory($categoryId)
    {
        $doctors = $this->doctors->all()
            ->where('isActive', true)
            ->filter(function ($doctor) use ($categoryId) {
                return in_array($categoryId, $doctor['categories'] ?? []);
            })
            ->values();

        return response()->json($doctors);
    }

    // -------------------------
    // 4. Featured Doctors
    // -------------------------
    public function featured()
    {
        $doctors = $this->doctors->featured();

        return response()->json($doctors);
    }
}
