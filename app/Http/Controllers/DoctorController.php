<?php

namespace App\Http\Controllers;

use App\Models\Firestore\Doctor;
use App\Models\Firestore\Rating;
use App\Models\Firestore\Category;
use Google\Cloud\Storage\Connection\Rest;
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

    public function index(Request $request)
    {
        $categoryIds = $request->query('category', []);
        $availability = $request->query('availability', []);
        $cursor = $request->query('cursor');

        if ($cursor) {
            $cursor = json_decode($cursor, true);
        }

        if (!is_array($categoryIds)) $categoryIds = [$categoryIds];
        if (!is_array($availability)) $availability = [$availability];

        $filters = [
            [
                'field' => 'isActive',
                'op' => '=',
                'value' => true
            ]
        ];

        if (!empty($categoryIds)) {
            $filters[] = [
                'field' => 'specializations',
                'op' => 'array-contains-any',
                'value' => $categoryIds
            ];
        } elseif (!empty($availability)) {
            $filters[] = [
                'field' => 'workingDays',
                'op' => 'array-contains-any',
                'value' => $availability
            ];
        }
        
        $result = app(\App\Services\FirestoreService::class)
            ->query('doctors', $filters, 12, $cursor);

        $doctors = collect($result['documents']);

        if (!empty($categoryIds) && !empty($availability)) {
            $doctors = $doctors->filter(function ($doc) use ($availability) {
                return !empty(array_intersect($doc['workingDays'] ?? [], $availability));
            })->values();
        }
        
        $categories = Cache::remember('home.doctors.categories', 6000, function () {
            return $this->categories->all()
                ->where('isActive', true)
                ->values();
        });

        return view('doctor.doctor-grid', [
            'doctors' => $doctors,
            'nextCursor' => $result['nextCursor'], // 👈 send to frontend
            'hasMore' => $result['hasMore'] ?? false, // 👈 send to frontend
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $doctor = $this->doctors->find($id);

        if (!$doctor || !$doctor['isActive']) {
            abort(404);
        }

        $firestore = app(\App\Services\FirestoreService::class);

        $baseFilter = [
            [
                'field' => 'doctorId',
                'op' => '=',
                'value' => $id
            ]
        ];

        // 🔥 Cache all stats together (better than multiple keys)
        $stats = Cache::remember("doctor:{$id}:stats", 300, function () use ($firestore, $baseFilter) {

            $totalReviews = $firestore->count('reviews', $baseFilter);

            $recommendedReviews = $firestore->count('reviews', [
                ...$baseFilter,
                [
                    'field' => 'rating',
                    'op' => '>=',
                    'value' => 4.0
                ]
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

        return view('doctor-profile', [
            'doctor' => $doctor,
            'reviews' => $reviews,
            ...$stats
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