<?php

namespace App\Http\Controllers;

use App\Models\User;

class AboutController extends Controller
{
    /**
     * Show the about page with flexible content.
     */
    public function index()
    {
        $hospitalName = config('app.name', 'Our Hospital');

        // Example: show up to 6 doctors on the about page.
        $doctors = User::limit(6)->get();

        return view('about', compact('hospitalName', 'doctors'));
    }
}
