<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirestoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QualificationExperienceController extends Controller
{
    protected FirestoreService $firestore;

    public function __construct()
    {
        $this->firestore = app(FirestoreService::class);
    }

    public function index()
    {
        $qualifications = $this->firestore->get('qualifications');
        $experienceRanges = $this->firestore->get('experience_ranges');

        return view('admin.qualification-experience', compact('qualifications', 'experienceRanges'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'isActive' => 'nullable|boolean',
            'type' => 'required|in:qualification,experience_range',
        ]);

        $type = 'qualifications';
        if ($data['type'] === 'experience_range') {
            $type = 'experience_ranges';
        }
        $id = Str::random(10);

        $this->firestore->createWithId($type, $id, [
            'name' => $data['name'],
            'isActive' => $data['isActive'] == 1 ? ($data['isActive'] == 1 ? true : false) : false,
            'docId' => $id,
        ]);

        return back()->with('success', 'Qualification/Experience was created successfully.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'isActive' => 'nullable|boolean',
            'type' => 'required|in:qualification,experience_range',
        ]);

        $type = 'qualifications';
        if ($data['type'] === 'experience_range') {
            $type = 'experience_ranges';
        }

        $this->firestore->update($type, $id, [
            'name' => $data['name'],
            'isActive' => $data['isActive'] == 1 ? ($data['isActive'] == 1 ? true : false) : false,
        ]);

        return back()->with('success', 'Qualification/Experience was updated successfully.');
    }

    public function delete(Request $request, $id)
    {
        $data = $request->validate([
            'type' => 'required|in:qualification,experience_range',
        ]);

        $type = 'qualifications';
        if ($data['type'] === 'experience_range') {
            $type = 'experience_ranges';
        }

        $this->firestore->delete($type, $id);

        return back()->with('success', 'Qualification/Experience was deleted successfully.');
    }
}
