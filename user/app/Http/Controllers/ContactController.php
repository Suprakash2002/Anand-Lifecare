<?php

namespace App\Http\Controllers;

use App\Models\PatientProblem;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a contact message in the database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|digits:10',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'agree' => 'required'
        ]);

        try {
            PatientProblem::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'status' => 'pending'
            ]);

            return redirect()->back()->with('success', 'Thank you! Your message has been received. We will get back to you soon.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while submitting your message. Please try again.');
        }
    }

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
