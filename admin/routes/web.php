<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientProblemController;


Route::get('/adminlogin', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/adminlogin', [AuthController::class, 'login'])->name('login.post');

// Admin Routes - Protected with auth middleware
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('admin.auth');
    
    // Doctor Routes
    Route::resource('doctors', DoctorController::class)->names('doctors')->middleware('admin.auth');
    
    // Department Routes
    Route::resource('departments', DepartmentController::class)->names('departments')->middleware('admin.auth');
    
    // Patient Routes
    Route::resource('patients', PatientController::class)->names('patients')->middleware('admin.auth');
    
    // Appointment Routes
    Route::resource('appointments', AppointmentController::class)->names('appointments')->middleware('admin.auth');
    Route::get('/appointments-status', [AppointmentController::class, 'actionStatus'])->name('appointments.actionStatus')->middleware('admin.auth');
    Route::post('/appointments/{appointment}/update-status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus')->middleware('admin.auth');
    
    // Patient Problems Routes
    Route::get('/patient-problems', [PatientProblemController::class, 'index'])->name('patient-problems.index')->middleware('admin.auth');
    Route::get('/patient-problems/{id}', [PatientProblemController::class, 'show'])->name('patient-problems.show')->middleware('admin.auth');
    Route::post('/patient-problems/{id}/status', [PatientProblemController::class, 'updateStatus'])->name('patient-problems.updateStatus')->middleware('admin.auth');
    Route::delete('/patient-problems/{id}', [PatientProblemController::class, 'destroy'])->name('patient-problems.destroy')->middleware('admin.auth');
});
