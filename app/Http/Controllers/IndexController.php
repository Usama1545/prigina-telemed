<?php

namespace App\Http\Controllers;

use App\Models\Firestore\Category;
use App\Models\Firestore\Doctor;
use App\Models\Firestore\Faq;
use Illuminate\Support\Facades\Cache;


class IndexController extends Controller
{
    protected $categories;
    protected $doctors;
    protected $faqs;

    public function __construct(
        Category $categories,
        Doctor $doctors,
        Faq $faqs
    ) {
        $this->categories = $categories;
        $this->doctors = $doctors;
        $this->faqs = $faqs;
    }
    public function index()
    {
        $firestore = app(\App\Services\FirestoreService::class);

        $categories = Cache::remember('home.categories', 6000, function () use ($firestore) {
            $result = $firestore->query('categories', [
                [
                    'field' => 'isActive',
                    'op' => '=',
                    'value' => true
                ]
            ]);

            return collect($result['documents'] ?? [])->values();
        });

        $doctors = Cache::remember('home.doctors', 3000, function () use ($firestore) {
            $result = $firestore->query('doctors', [
                [
                    'field' => 'isActive',
                    'op' => '=',
                    'value' => true
                ],
                [
                    'field' => 'isTopDoctor',
                    'op' => '=',
                    'value' => true
                ]
            ], 10);

            return collect($result['documents'] ?? [])->values();
        });

        $faqs = Cache::remember('home.faqs', 1800, function () use ($firestore) {
            $result = $firestore->query('faqs', [], 50);

            return collect($result['documents'] ?? [])->values();
        });

        return view('index', compact('categories', 'doctors', 'faqs'));
    }
}