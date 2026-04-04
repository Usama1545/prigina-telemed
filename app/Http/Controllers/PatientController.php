<?php

namespace App\Http\Controllers;

use App\Models\Firestore\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    protected Patient $patients;

    public function __construct(Patient $patients)
    {
        $this->patients = $patients;
    }

    public function index()
    {
        return response()->json(
            $this->patients->all()
        );
    }

    public function show($id)
    {
        return response()->json(
            $this->patients->find($id)
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        return response()->json(
            $this->patients->create($data)
        );
    }

    public function update(Request $request, $id)
    {
        return response()->json(
            $this->patients->update($id, $request->all())
        );
    }

    public function destroy($id)
    {
        $this->patients->delete($id);

        return response()->json(['message' => 'Deleted']);
    }
}