<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('home');
});

Route::get('/header', function () {
    return view('header');
});

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/specialities', function () {
    return view('specialities');
})->name('specialities');

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctors/{id}', [DoctorController::class, 'show'])->name('doctors.show');
Route::get('/doctors/speciality/{speciality}', [DoctorController::class, 'speciality'])->name('doctors.speciality');

Route::get('/appointment',[AppointmentController::class,'index']);
Route::post('/appointments/store',[AppointmentController::class,'store'])->name('appointments.store');
Route::post('/appointments/check-availability',[AppointmentController::class,'checkAvailability'])->name('appointments.checkAvailability');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Contact Form Submission
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes for Managing Patient Problems
Route::prefix('admin')->group(function () {
    Route::get('/patient-problems', [ContactController::class, 'index'])->name('patient-problems.index');
    Route::get('/patient-problems/{id}', [ContactController::class, 'show'])->name('patient-problems.show');
    Route::post('/patient-problems/{id}/status', [ContactController::class, 'updateStatus'])->name('patient-problems.updateStatus');
    Route::delete('/patient-problems/{id}', [ContactController::class, 'destroy'])->name('patient-problems.destroy');
});