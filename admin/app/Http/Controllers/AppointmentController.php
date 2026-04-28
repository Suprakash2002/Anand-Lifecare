<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentAction;
use App\Models\Doctor;
use App\Models\Department;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['doctor', 'department', 'latestAction'])->paginate(10);
        return view('admin.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        $departments = Department::all();
        return view('admin.appointments.create', compact('doctors', 'departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_email' => 'required|email|max:255',
            'patient_mobile' => 'required|string|size:10',
            'doctor_id' => 'required|exists:doctors,id',
            'department_id' => 'required|exists:departments,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Check if the time slot is already booked (only Scheduled appointments block the slot)
        // Completed or Not Came appointments do NOT block the slot
        $bookedAppointment = Appointment::where('doctor_id', $request->doctor_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('available_time', $request->appointment_time)
            ->whereHas('latestAction', function($query) {
                $query->where('status', 'Scheduled');
            })
            ->first();

        if ($bookedAppointment) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['appointment_time' => 'This slot is booked. Please select another time.']);
        }

        // Create appointment
        $appointment = Appointment::create([
            'patient_name' => $validated['patient_name'],
            'patient_email' => $validated['patient_email'],
            'patient_mobile' => $validated['patient_mobile'],
            'doctor_id' => $validated['doctor_id'],
            'department_id' => $validated['department_id'],
            'appointment_date' => $validated['appointment_date'],
            'available_time' => $request->appointment_time,
            'notes' => $validated['notes'],
        ]);

        // Create initial action with Scheduled status
        AppointmentAction::create([
            'appointment_id' => $appointment->id,
            'status' => 'Scheduled',
            'notes' => 'Appointment created'
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment added successfully!');
    }

    public function edit(Appointment $appointment)
    {
        $doctors = Doctor::all();
        $departments = Department::all();
        return view('admin.appointments.edit', compact('appointment', 'doctors', 'departments'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_email' => 'required|email|max:255',
            'patient_mobile' => 'required|string|size:10',
            'doctor_id' => 'required|exists:doctors,id',
            'department_id' => 'required|exists:departments,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Check if time slot is available (only if changing time/date/doctor)
        // Only Scheduled appointments block the slot
        // Completed or Not Came appointments do NOT block the slot
        $bookedAppointment = Appointment::where('doctor_id', $request->doctor_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('available_time', $request->appointment_time)
            ->whereHas('latestAction', function($query) {
                $query->where('status', 'Scheduled');
            })
            ->where('id', '!=', $appointment->id) // Exclude current appointment
            ->first();

        if ($bookedAppointment) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['appointment_time' => 'This slot is booked. Please select another time.']);
        }

        // Update appointment with time slot as-is
        $appointment->update([
            'patient_name' => $validated['patient_name'],
            'patient_email' => $validated['patient_email'],
            'patient_mobile' => $validated['patient_mobile'],
            'doctor_id' => $validated['doctor_id'],
            'department_id' => $validated['department_id'],
            'appointment_date' => $validated['appointment_date'],
            'available_time' => $request->appointment_time,
            'notes' => $validated['notes'],
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully!');
    }

    /**
     * Show action status page for all appointments
     */
    public function actionStatus()
    {
        $appointments = Appointment::with(['doctor', 'department', 'latestAction'])->paginate(15);
        return view('admin.appointments.action-status', compact('appointments'));
    }

    /**
     * Update appointment status via checkboxes
     */
    public function updateStatus(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'status' => 'required|in:Scheduled,Completed,Not Came',
        ]);

        // Create new action record with the new status
        AppointmentAction::create([
            'appointment_id' => $appointment->id,
            'status' => $validated['status'],
            'notes' => 'Status changed by admin'
        ]);

        return redirect()->route('appointments.actionStatus')->with('success', 'Appointment status updated successfully!');
    }
}
