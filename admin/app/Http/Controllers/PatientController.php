<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('user')->get();
        return view('admin.patients.index', compact('patients'));
    }

    public function create()
    {
        return view('admin.patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'medical_history' => 'nullable|string',
        ]);

        // Create user first
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        // Create patient record with user_id
        Patient::create([
            'user_id' => $user->id,
            'phone' => $validated['phone'],
            'date_of_birth' => $validated['date_of_birth'],
            'address' => $validated['address'],
            'medical_history' => $validated['medical_history'],
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient added successfully!');
    }

    public function edit(Patient $patient)
    {
        return view('admin.patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $patient->user_id,
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'medical_history' => 'nullable|string',
        ]);

        // Update user
        $patient->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        // Update patient
        $patient->update([
            'phone' => $validated['phone'],
            'date_of_birth' => $validated['date_of_birth'],
            'address' => $validated['address'],
            'medical_history' => $validated['medical_history'],
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully!');
    }

    public function destroy(Patient $patient)
    {
        // Delete user (which will cascade delete patient)
        $patient->user->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully!');
    }
}
