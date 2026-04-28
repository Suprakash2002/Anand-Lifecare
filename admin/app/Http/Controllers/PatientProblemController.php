<?php

namespace App\Http\Controllers;

use App\Models\PatientProblem;
use Illuminate\Http\Request;

class PatientProblemController extends Controller
{
    /**
     * Show all patient problems (Admin)
     */
    public function index()
    {
        $problems = PatientProblem::latest()->paginate(10);
        return view('admin.patient-problems.index', compact('problems'));
    }

    /**
     * Show a specific patient problem
     */
    public function show($id)
    {
        $problem = PatientProblem::findOrFail($id);
        return view('admin.patient-problems.show', compact('problem'));
    }

    /**
     * Update problem status
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,resolved'
        ]);

        $problem = PatientProblem::findOrFail($id);
        $problem->update([
            'status' => $validated['status'],
            'resolved_at' => $validated['status'] === 'resolved' ? now() : null
        ]);

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    /**
     * Delete a patient problem
     */
    public function destroy($id)
    {
        PatientProblem::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Message deleted successfully!');
    }
}
