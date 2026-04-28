<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('department')->get();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.doctors.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|string|max:10',
            'department_id' => 'required|exists:departments,id',
            'specialization' => 'required|string|max:255',
            'available_day_from' => 'nullable|string',
            'available_day_to' => 'nullable|string',
            'opd_start_time' => 'nullable|date_format:H:i',
            'opd_end_time' => 'nullable|date_format:H:i',
        ]);

        // Map form fields to database columns
        $validated['available_from'] = $validated['available_day_from'] ?? null;
        $validated['available_to'] = $validated['available_day_to'] ?? null;

        // Remove the form field names
        unset($validated['available_day_from']);
        unset($validated['available_day_to']);

        Doctor::create($validated);
        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully!');
    }

    public function edit(Doctor $doctor)
    {
        $departments = Department::all();
        return view('admin.doctors.edit', compact('doctor', 'departments'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone' => 'required|string|max:20',
            'department_id' => 'required|exists:departments,id',
            'specialization' => 'required|string|max:255',
            'available_day_from' => 'nullable|string',
            'available_day_to' => 'nullable|string',
            'opd_start_time' => 'nullable|date_format:H:i',
            'opd_end_time' => 'nullable|date_format:H:i',
        ]);

        // Map form fields to database columns
        $validated['available_from'] = $validated['available_day_from'] ?? null;
        $validated['available_to'] = $validated['available_day_to'] ?? null;

        // Remove the form field names
        unset($validated['available_day_from']);
        unset($validated['available_day_to']);

        $doctor->update($validated);
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully!');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully!');
    }
}
