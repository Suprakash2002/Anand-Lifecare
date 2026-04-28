<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\AppointmentAction;

class AppointmentController extends Controller
{

   public function index()
{
    $specialists = Speciality::all();
    $doctors = Doctor::all();

    return view('appointment-form', compact('specialists','doctors'));
}

    public function checkAvailability(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string',
        ]);

        // Check if time slot is booked by checking appointments with Scheduled status only
        // Completed or Not Came appointments do NOT block the slot
        $isAvailable = !Appointment::where('doctor_id', $request->doctor_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('available_time', $request->appointment_time)
            ->whereHas('latestAction', function($query) {
                $query->where('status', 'Scheduled');
            })
            ->exists();

        return response()->json([
            'available' => $isAvailable,
            'message' => $isAvailable 
                ? 'This slot is available' 
                : 'This slot is booked'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_name' => 'required|string|max:255',
            'patient_email' => 'required|email|max:255',
            'patient_mobile' => 'required|string|size:10',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|string',
            'message' => 'required|string'
        ]);

        // Get doctor to fetch department_id
        $doctor = Doctor::findOrFail($request->doctor_id);

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

        // Create appointment with time slot as-is (e.g., "09:00 AM - 10:00 AM")
        $appointment = Appointment::create([
            'doctor_id' => $request->doctor_id,
            'department_id' => $doctor->department_id,
            'patient_name' => $request->patient_name,
            'patient_email' => $request->patient_email,
            'patient_mobile' => $request->patient_mobile,
            'appointment_date' => $request->appointment_date,
            'available_time' => $request->appointment_time,
            'notes' => $request->message
        ]);

        // Create initial action with Scheduled status
        AppointmentAction::create([
            'appointment_id' => $appointment->id,
            'status' => 'Scheduled',
            'notes' => 'Appointment created by patient'
        ]);

        return redirect()->back()->with('appointment_success', 'Appointment booked successfully!');
    }

}