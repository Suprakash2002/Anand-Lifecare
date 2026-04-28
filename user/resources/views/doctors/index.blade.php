@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6 sm:py-12 px-4 sm:px-6 lg:px-8">

    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-6 sm:mb-8 text-center">Our Doctors</h1>

    <!-- Specialist Filter -->
    <div class="mb-6 sm:mb-8 flex justify-center">
        <form method="GET" action="{{ route('doctors.index') }}" id="specialistForm" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4 w-full sm:w-auto">
            <label for="specialist" class="text-sm sm:text-base font-semibold text-gray-700 whitespace-nowrap">Filter by Specialty:</label>
            <select id="specialist" name="specialist"
                onchange="document.getElementById('specialistForm').submit()"
                class="border-2 border-gray-300 px-3 sm:px-4 py-2 rounded w-full sm:w-64 text-sm sm:text-base focus:ring-2 focus:ring-blue-400 focus:border-blue-400">

                <option value="">-- All Specialists --</option>

                @if(isset($specialists) && $specialists->count() > 0)
                    @foreach($specialists as $spec)
                        @if($spec && $spec->name)
                            <option value="{{ $spec->id }}"
                                {{ request('specialist') == $spec->id ? 'selected' : '' }}>
                                {{ $spec->name }}
                            </option>
                        @endif
                    @endforeach
                @endif

            </select>
        </form>
    </div>

    <!-- Doctors Table -->
    @if(isset($doctorsBySpecialty) && $doctorsBySpecialty->count() > 0)
        
        @foreach($doctorsBySpecialty as $specialization => $doctorList)
            <!-- Specialization Section -->
            <div class="mb-10">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-4 rounded-t-lg">
                    <h2 class="text-xl sm:text-2xl font-bold flex items-center gap-2">
                        <span class="bg-white text-blue-600 px-3 py-1 rounded-full font-semibold text-sm">{{ $doctorList->count() }}</span>
                        {{ $specialization }} Department
                    </h2>
                </div>

                <!-- Desktop Table View -->
                <div class="hidden md:block bg-white shadow-lg rounded-b-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-50">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Name</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">specialization</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Department</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($doctorList as $doctor)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 sm:px-6 py-4 font-medium text-gray-900 text-sm sm:text-base">{{ $doctor->name }}</td>
                                    <td class="px-4 sm:px-6 py-4 font-medium text-gray-900 text-sm sm:text-base">{{ $doctor->specialization}}</td>
                                    @foreach($specialists as $spec)
                                        @if($spec && $spec->id == $doctor->department_id)
                                            <td class="px-4 sm:px-6 py-4 font-medium text-gray-900 text-sm sm:text-base">{{ $spec->name }}</td>
                                        @endif
                                    @endforeach


                                    <!-- <td class="px-4 sm:px-6 py-4 text-gray-700 text-sm">{{ $doctor->email ?? 'N/A' }}</td>
                                    <td class="px-4 sm:px-6 py-4 text-gray-700 text-sm">{{ $doctor->phone ?? 'N/A' }}</td> -->
                                    <td class="px-4 sm:px-6 py-4">
                                        <div class="flex gap-2 flex-wrap">
                                            <a href="{{ route('doctors.show', $doctor->id) }}" class="inline-flex items-center px-3 py-2 bg-blue-600 text-white text-xs sm:text-sm font-medium rounded hover:bg-blue-700 transition">
                                                View Details
                                            </a>
                                            <button class="appointment-btn inline-flex items-center px-3 py-2 bg-green-600 text-white text-xs sm:text-sm font-medium rounded hover:bg-green-700 transition" data-doctor-id="{{ $doctor->id }}" type="button">
                                                Appointment
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Card View -->
                <div class="md:hidden grid grid-cols-1 gap-3 bg-white shadow-lg rounded-b-lg p-4">
                    @foreach($doctorList as $doctor)
                        <div class="bg-gradient-to-r from-blue-50 to-blue-100 shadow rounded-lg p-4 border-l-4 border-blue-600">
                            <div class="mb-3">
                                <h3 class="text-lg font-bold text-gray-900">{{ $doctor->name }}</h3>
                                @if($doctor->department)
                                    <p class="text-xs text-blue-600 font-semibold mt-1">{{ $doctor->department->name }}</p>
                                @else
                                    <p class="text-xs text-gray-500 font-semibold mt-1">No Department</p>
                                @endif
                            </div>

                            <div class="mb-4 text-sm text-gray-600 space-y-1">
                                <p><span class="font-medium">Email:</span> {{ $doctor->email ?? 'N/A' }}</p>
                                <p><span class="font-medium">Phone:</span> {{ $doctor->phone ?? 'N/A' }}</p>
                            </div>

                            <div class="flex flex-col gap-2">
                                <a href="{{ route('doctors.show', $doctor->id) }}" class="w-full px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition text-center">
                                    View Details
                                </a>
                                <button class="appointment-btn w-full px-4 py-2 bg-green-600 text-white text-sm font-medium rounded hover:bg-green-700 transition" data-doctor-id="{{ $doctor->id }}" type="button">
                                    Book Appointment
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    @else
        <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-8 text-center">
            <p class="text-gray-600 text-lg">No doctors found. Please try another specialty.</p>
        </div>
    @endif

    {{-- Back to Home Button --}}
    <div class="text-center mt-8 sm:mt-12">
        <a href="{{ url('/') }}" class="inline-flex items-center px-6 py-3 bg-cyan-500 text-white font-semibold rounded-lg hover:bg-cyan-600 transition text-sm sm:text-base">
            <span class="mr-2">←</span> Back to Home
        </a>
    </div>

</div>

@include('components.appointment-form')

<script>
    // Handle appointment button clicks
    document.addEventListener('DOMContentLoaded', function() {
        const appointmentButtons = document.querySelectorAll('.appointment-btn');
        appointmentButtons.forEach(button => {
            button.addEventListener('click', function() {
                const doctorId = this.getAttribute('data-doctor-id');
                openAppointmentModal(doctorId);
            });
        });
    });
</script>

@endsection 