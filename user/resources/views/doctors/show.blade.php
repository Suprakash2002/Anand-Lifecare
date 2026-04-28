@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6 sm:py-12 px-4 sm:px-6 lg:px-8">
    <a href="{{ route('doctors.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-4 sm:mb-6 text-sm sm:text-base">
        <span class="mr-2">←</span> Back to Doctors
    </a>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-2">{{ $doctor->name }}</h1>
            <p class="text-blue-100 text-base sm:text-lg">{{ $doctor->speciality }}</p>
        </div>

        <div class="px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                <!-- About Section -->
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4 sm:mb-6">About</h2>
                    <div class="space-y-4 sm:space-y-6">
                        <div>
                            <h3 class="text-xs sm:text-sm font-semibold text-gray-600 uppercase">Qualification</h3>
                            <p class="text-base sm:text-lg text-gray-900 mt-1">{{ $doctor->qualification }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs sm:text-sm font-semibold text-gray-600 uppercase">Experience</h3>
                            <p class="text-base sm:text-lg text-gray-900 mt-1">{{ $doctor->experience }} Years</p>
                        </div>
                        <div>
                            <h3 class="text-xs sm:text-sm font-semibold text-gray-600 uppercase">Speciality</h3>
                            <p class="text-base sm:text-lg text-gray-900 mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-700">
                                    {{ $doctor->speciality }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Designation & OPD Section -->
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4 sm:mb-6">Designation & OPD Timing</h2>
                    <div class="space-y-4 sm:space-y-6">
                        <div>
                            <h3 class="text-xs sm:text-sm font-semibold text-gray-600 uppercase">Designation</h3>
                            <p class="text-base sm:text-lg text-gray-900 mt-1 font-medium">{{ $doctor->designation }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs sm:text-sm font-semibold text-gray-600 uppercase">OPD Timing</h3>
                            <p class="text-base sm:text-lg text-gray-900 mt-1">{{ $doctor->opd_timing }}</p>
                        </div>
                        <div class="pt-2 sm:pt-4">
                            <button onclick="openAppointmentModal({{ $doctor->id }}, @js($doctor->name))" class="w-full inline-flex items-center justify-center px-4 sm:px-6 py-2 sm:py-3 bg-green-600 text-white text-sm sm:text-base lg:text-lg font-medium rounded hover:bg-green-700 transition">
                                Request Appointment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Appointment Form Component -->

@include('components.appointment-form')

@endsection
