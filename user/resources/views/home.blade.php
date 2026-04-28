@extends('layouts.app')

@section('content')

    {{-- Hero Section --}}
    <section class="relative min-h-screen flex items-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('assets/main2.jpg') }}" alt="Hospital" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/40"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-white">
            <div class="max-w-2xl">
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold mb-6 leading-tight">
                    Your Health,<br>Our Priority
                </h1>

                <p class="text-xl sm:text-2xl text-gray-200 mb-8 font-light">
                    Experience world-class healthcare with compassion, excellence, and cutting-edge medical technology.
                </p>

                <div class="flex flex-wrap gap-4">
                    <button onclick="openGeneralAppointmentModal()" class="bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105 shadow-lg">
                        Book Appointment
                    </button>
                    <a href="{{ route('doctors.index') }}" class="border-2 border-white text-white hover:bg-white hover:text-blue-900 font-bold py-4 px-8 rounded-lg transition duration-300">
                        Find a Doctor
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-4">
                    Why Choose Our Hospital?
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    We combine medical expertise with patient care to deliver exceptional healthcare services
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Service Card 1 --}}
                <div class="group bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-blue-500 rounded-full flex items-center justify-center text-white text-2xl mb-6 group-hover:bg-blue-600 transition">
                        🏥
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">24/7 Emergency</h3>
                    <p class="text-gray-600 leading-relaxed">Round-the-clock emergency services with rapid response teams always ready.</p>
                </div>

                {{-- Service Card 2 --}}
                <div class="group bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-2xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-green-500 rounded-full flex items-center justify-center text-white text-2xl mb-6 group-hover:bg-green-600 transition">
                        👨‍⚕️
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Expert Doctors</h3>
                    <p class="text-gray-600 leading-relaxed">Highly qualified specialists with extensive experience in their medical fields.</p>
                </div>

                {{-- Service Card 3 --}}
                <div class="group bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-2xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-purple-500 rounded-full flex items-center justify-center text-white text-2xl mb-6 group-hover:bg-purple-600 transition">
                        🔬
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Advanced Tech</h3>
                    <p class="text-gray-600 leading-relaxed">State-of-the-art medical equipment and modern diagnostic facilities.</p>
                </div>

                {{-- Service Card 4 --}}
                <div class="group bg-gradient-to-br from-red-50 to-red-100 p-8 rounded-2xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-red-500 rounded-full flex items-center justify-center text-white text-2xl mb-6 group-hover:bg-red-600 transition">
                        ❤️
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Patient Care</h3>
                    <p class="text-gray-600 leading-relaxed">Compassionate healthcare focused on your well-being and recovery.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="py-20 bg-gradient-to-r from-blue-900 via-blue-800 to-blue-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl sm:text-5xl font-extrabold text-white mb-16 text-center">
                What Sets Us Apart
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Feature 1 --}}
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 hover:border-white/40 transition">
                    <div class="text-4xl mb-4">✓</div>
                    <h3 class="text-2xl font-bold text-white mb-3">Best Specialists</h3>
                    <p class="text-blue-100">Trained medical professionals with proven expertise and certifications.</p>
                </div>

                {{-- Feature 2 --}}
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 hover:border-white/40 transition">
                    <div class="text-4xl mb-4">✓</div>
                    <h3 class="text-2xl font-bold text-white mb-3">Affordable Care</h3>
                    <p class="text-blue-100">Quality treatment at competitive rates with transparent pricing.</p>
                </div>

                {{-- Feature 3 --}}
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 hover:border-white/40 transition">
                    <div class="text-4xl mb-4">✓</div>
                    <h3 class="text-2xl font-bold text-white mb-3">Modern Facility</h3>
                    <p class="text-blue-100">Latest medical technology and comfortable patient amenities.</p>
                </div>

                {{-- Feature 4 --}}
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 hover:border-white/40 transition">
                    <div class="text-4xl mb-4">✓</div>
                    <h3 class="text-2xl font-bold text-white mb-3">Quick Response</h3>
                    <p class="text-blue-100">Fast appointment scheduling and minimal waiting times.</p>
                </div>

                {{-- Feature 5 --}}
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 hover:border-white/40 transition">
                    <div class="text-4xl mb-4">✓</div>
                    <h3 class="text-2xl font-bold text-white mb-3">Safety First</h3>
                    <p class="text-blue-100">Strict hygiene protocols and infection control measures.</p>
                </div>

                {{-- Feature 6 --}}
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 hover:border-white/40 transition">
                    <div class="text-4xl mb-4">✓</div>
                    <h3 class="text-2xl font-bold text-white mb-3">Support Team</h3>
                    <p class="text-blue-100">Dedicated staff available to assist you throughout your journey.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Specialities Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-4">
                    Our Specialities
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Comprehensive medical services across multiple specialized departments
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                {{-- Speciality 1 --}}
                <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition duration-300 text-center cursor-pointer border-t-4 border-red-500">
                    <div class="text-5xl mb-4">❤️</div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition">Cardiology</h3>
                    <p class="text-sm text-gray-600 mt-2">Heart Care</p>
                </div>

                {{-- Speciality 2 --}}
                <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition duration-300 text-center cursor-pointer border-t-4 border-blue-500">
                    <div class="text-5xl mb-4">🧠</div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition">Neurology</h3>
                    <p class="text-sm text-gray-600 mt-2">Brain & Spine</p>
                </div>

                {{-- Speciality 3 --}}
                <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition duration-300 text-center cursor-pointer border-t-4 border-yellow-500">
                    <div class="text-5xl mb-4">🦴</div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-yellow-600 transition">Orthopedics</h3>
                    <p class="text-sm text-gray-600 mt-2">Bones & Joints</p>
                </div>

                {{-- Speciality 4 --}}
                <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition duration-300 text-center cursor-pointer border-t-4 border-green-500">
                    <div class="text-5xl mb-4">👶</div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-green-600 transition">Pediatrics</h3>
                    <p class="text-sm text-gray-600 mt-2">Children Care</p>
                </div>

                {{-- Speciality 5 --}}
                <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition duration-300 text-center cursor-pointer border-t-4 border-sky-500">
                    <div class="text-5xl mb-4">👁️</div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-sky-600 transition">Ophthalmology</h3>
                    <p class="text-sm text-gray-600 mt-2">Eye Care</p>
                </div>

                {{-- Speciality 6 --}}
                <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition duration-300 text-center cursor-pointer border-t-4 border-indigo-500">
                    <div class="text-5xl mb-4">🦷</div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">Dentistry</h3>
                    <p class="text-sm text-gray-600 mt-2">Dental Care</p>
                </div>

                {{-- Speciality 7 --}}
                <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition duration-300 text-center cursor-pointer border-t-4 border-pink-500">
                    <div class="text-5xl mb-4">🏥</div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-pink-600 transition">Surgery</h3>
                    <p class="text-sm text-gray-600 mt-2">General Surgery</p>
                </div>

                {{-- Speciality 8 --}}
                <div class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition duration-300 text-center cursor-pointer border-t-4 border-teal-500">
                    <div class="text-5xl mb-4">🧬</div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-teal-600 transition">Diagnostics</h3>
                    <p class="text-sm text-gray-600 mt-2">Testing Services</p>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('specialities') }}" class="inline-block bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-4 px-10 rounded-lg transition duration-300 shadow-lg hover:shadow-xl">
                    View All Specialities →
                </a>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-r from-cyan-500 to-blue-600 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full transform translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/10 rounded-full transform -translate-x-1/2 translate-y-1/2"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl sm:text-5xl font-extrabold text-white mb-6">
                Ready to Get Better?
            </h2>
            <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                Schedule an appointment with our expert doctors today. We're here to help you on your path to wellness.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="openGeneralAppointmentModal()" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-4 px-10 rounded-lg transition duration-300 shadow-lg hover:shadow-xl">
                    Book Now
                </button>
                <a href="{{ route('doctors.index') }}" class="bg-white/20 backdrop-blur-lg text-white hover:bg-white/30 font-bold py-4 px-10 rounded-lg transition duration-300 border border-white/30">
                    Find Doctor
                </a>
            </div>
        </div>
    </section>

@endsection
