<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FirestoreService;

class PatientController extends Controller
{
    protected $firestore;

    public function __construct(FirestoreService $firestore)
    {
        $this->firestore = $firestore;
    }

    public function profile(Request $request)
    {
        $uid = $request->auth_uid;

        $patient = $this->firestore->find('patients', $uid);

        if (!$patient) {
            return response()->json(['error' => 'Patient not found'], 404);
        }

        return view('patient.dashboard', compact('patient'));
    }

    public function update(Request $request)
    {
        $uid = $request->auth_uid;

        $data = $request->only([
            'name',
            'phone',
            'gender',
            'dob',
        ]);

        $patient = $this->firestore->update('patients', $uid, $data);

        return response()->json([
            'message' => 'Profile updated',
            'data' => $patient
        ]);
    }
}