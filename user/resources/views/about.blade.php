@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <!-- Hero Section -->
    <div class="mb-12">
        <h1 class="text-5xl font-bold mb-4 text-center text-gray-800">About Our Hospital</h1>
        <p class="text-xl text-center text-gray-600 max-w-3xl mx-auto">
            Welcome to <span class="font-semibold">Premier Healthcare Hospital</span>, where exceptional medical expertise meets compassionate patient care.
        </p>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <div class="bg-blue-50 p-8 rounded-lg border-l-4 border-blue-500">
            <h2 class="text-2xl font-bold mb-3 text-blue-700">Our Mission</h2>
            <p class="text-gray-700">To provide world-class healthcare services with a patient-centric approach, combining advanced medical technology with compassionate care to improve the health and well-being of our community.</p>
        </div>

        <div class="bg-green-50 p-8 rounded-lg border-l-4 border-green-500">
            <h2 class="text-2xl font-bold mb-3 text-green-700">Our Vision</h2>
            <p class="text-gray-700">To be the leading healthcare provider in the region, recognized for medical excellence, innovation, and our commitment to delivering outstanding patient outcomes.</p>
        </div>

        <div class="bg-purple-50 p-8 rounded-lg border-l-4 border-purple-500">
            <h2 class="text-2xl font-bold mb-3 text-purple-700">Our Values</h2>
            <p class="text-gray-700">Excellence, Compassion, Integrity, and Innovation guide every decision we make and every patient we serve.</p>
        </div>
    </div>

    <!-- About Section -->
    <div class="bg-white shadow-lg rounded-lg p-12 mb-12">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Why Choose Us?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-3 flex items-center">
                    <span class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3">?</span>
                    24/7 Availability
                </h3>
                <p class="text-gray-600">Our doors are open 24 hours a day, 7 days a week. Whether it's a scheduled appointment, an urgent concern, or an emergency, we are always here for you.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-3 flex items-center">
                    <span class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3">?</span>
                    Expert Specialists
                </h3>
                <p class="text-gray-600">Our team of highly qualified and experienced specialists across cardiology, neurology, orthopedics, pediatrics, internal medicine, surgery, and more bring advanced expertise and personalized care.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-3 flex items-center">
                    <span class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3">?</span>
                    State-of-the-Art Facilities
                </h3>
                <p class="text-gray-600">Equipped with modern diagnostic facilities, operation theaters, intensive care units, and supportive services to ensure comprehensive care under one roof.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-3 flex items-center">
                    <span class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3">?</span>
                    Patient-Centered Care
                </h3>
                <p class="text-gray-600">Your health and well-being are our top priority. We blend medical excellence with warmth, respect, and dignity in everything we do.</p>
            </div>
        </div>
    </div>

    <!-- Summary Box -->
    <div class="bg-gradient-to-r from-blue-600 to-cyan-500 text-white rounded-lg p-12 text-center">
        <h2 class="text-3xl font-bold mb-4">Our Commitment</h2>
        <p class="text-lg mb-6 max-w-3xl mx-auto">At Premier Healthcare Hospital, we believe that exceptional healthcare is a right, not a privilege. We are dedicated to serving our community with compassion, integrity, and excellence. Your health and trust are paramount to us.</p>
        <p class="text-xl font-semibold">Because your health deserves nothing less than the best.</p>
    </div>
</div>
@endsection
