<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Speciality;

class DoctorController extends Controller
{

    /**
     * Display all doctors
     */
   public function index(Request $request)
    {
        // Get all departments with doctors
        $specialists = Doctor::with('department')
                             ->get()
                             ->pluck('department')
                             ->filter()
                             ->unique('id')
                             ->values();

        // Fetch doctors grouped by department
        if ($request->specialist) {
            $doctors = Doctor::where('department_id', $request->specialist)
                            ->with('department')
                            ->orderBy('name')
                            ->get();
            $doctorsBySpecialty = collect();
            foreach ($doctors as $doctor) {
                $deptName = $doctor->department->name ?? 'General';
                if (!$doctorsBySpecialty->has($deptName)) {
                    $doctorsBySpecialty[$deptName] = collect();
                }
                $doctorsBySpecialty[$deptName]->push($doctor);
            }
        } else {
            // Group all doctors by department
            $allDoctors = Doctor::with('department')
                               ->orderBy('name')
                               ->get();
            $doctorsBySpecialty = $allDoctors->groupBy(function ($doctor) {
                return $doctor->department->name ?? 'General';
            });
        }

        return view('doctors.index', compact('specialists', 'doctorsBySpecialty'));
    }

    /**
     * Doctors by speciality
     */
    public function speciality($speciality)
    {
        $doctors = Doctor::where('specialization',$speciality)->get();

        $specialists = Doctor::select('specialization')
                        ->distinct()
                        ->get();

        return view('doctors.index', compact('doctors','specialists','speciality'));
    }

    /**
     * Single doctor page
     */
   public function show($id)
{
    $doctor = Doctor::findOrFail($id);
    $specialities = Speciality::all();
    $doctors = Doctor::all();   // ADD THIS

    return view('doctors.show', compact('doctor','specialities','doctors'));
}


}