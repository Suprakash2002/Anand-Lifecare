<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        // Mock data for testing without database
        $totalDoctors = Doctor::count();
        $totalDepartments = Department::count();
        $departments = Department::all();
        $totalappointments = Appointment::count();
        
        // Mock departments for the form
        
        // $recentAppointments = [
        //     (object)[
        //         'patient_name' => 'John Doe',
        //         'appointment_date' => '24 Apr 2024',
        //         'status' => 'Scheduled',
        //         'doctor' => (object)['name' => 'Dr. Smith'],
        //         'department' => (object)['name' => 'Cardiology']
        //     ],
        //     (object)[
        //         'patient_name' => 'Afia Gupta',
        //         'appointment_date' => '24 Apr 2024',
        //         'status' => 'Ongoing',
        //         'doctor' => (object)['name' => 'Dr. Mehta'],
        //         'department' => (object)['name' => 'Neurology']
        //     ],
        //     (object)[
        //         'patient_name' => 'Michael Roy',
        //         'appointment_date' => '23 Apr 2024',
        //         'status' => 'Completed',
        //         'doctor' => (object)['name' => 'Dr. Sharma'],
        //         'department' => (object)['name' => 'Orthopedics']
        //     ],
        //     (object)[
        //         'patient_name' => 'Pooja Verma',
        //         'appointment_date' => '23 Apr 2024',
        //         'status' => 'Cancelled',
        //         'doctor' => (object)['name' => 'Dr. Kapoor'],
        //         'department' => (object)['name' => 'General']
        //     ],
        //     (object)[
        //         'patient_name' => 'Rajesh Kumar',
        //         'appointment_date' => '27 Apr 2024',
        //         'status' => 'Scheduled',
        //         'doctor' => (object)['name' => 'Dr. Reddy'],
        //         'department' => (object)['name' => 'Cardiology']
        //     ],
        // ];

        return view('admin.dashboard', [
            'totalDoctors' => $totalDoctors,
            'totalDepartments' => $totalDepartments,
            'departments' => $departments,
            'totalappointments' => $totalappointments,
        ]);
    }
}

