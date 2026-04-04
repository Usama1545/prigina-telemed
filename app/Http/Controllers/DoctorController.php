<?php

namespace App\Http\Controllers;

use App\Models\Firestore\Doctor;
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

        if (!is_array($categoryIds)) $categoryIds = [$categoryIds];
        if (!is_array($availability)) $availability = [$availability];

        // Base filters
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
            ->query('doctors', $filters, 20);

        $doctors = collect($result['documents'] ?? []);

        if (!empty($categoryIds) && !empty($availability)) {
            $doctors = $doctors->filter(function ($doc) use ($availability) {
                return !empty(array_intersect($doc['workingDays'] ?? [], $availability));
            })->values();
        }

        $categories = Cache::remember('home.categories', 6000, function () {
            return $this->categories->all()
                ->where('isActive', true)
                ->values();
        });

        return view('doctor.doctor-grid', [
            'doctors' => $doctors,
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $doctor = $this->doctors->find($id);

        return response()->json($doctor);
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