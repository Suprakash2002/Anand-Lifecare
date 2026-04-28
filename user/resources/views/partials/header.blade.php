{{-- Header Navigation Navbar --}}
<nav class="bg-white text-black shadow-md sticky top-0 z-50 mb-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-10 sm:h-20">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3 flex-shrink-0 hover:opacity-80 transition">
                <img src="{{ asset('assets/logo1.jpg') }}" class="h-12 sm:h-16 w-auto">
                <div class="hidden sm:block">
                    <h1 class="text-lg sm:text-xl font-bold text-gray-900">Anand Lifecare</h1>
                    
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-4 lg:space-x-6">
                <a href="{{ url('/') }}" class="text-sm lg:text-base font-medium hover:text-cyan-400 transition">Home</a>
                <a href="{{ route('doctors.index') }}" class="text-sm lg:text-base font-medium hover:text-cyan-400 transition">Find Doctor</a>
                <a href="{{ route('specialities') }}" class="text-sm lg:text-base font-medium hover:text-cyan-400 transition">Specialities</a>
                <a href="{{ route('services') }}" class="text-sm lg:text-base font-medium hover:text-cyan-400 transition">Services</a>
                <a href="{{ route('contact') }}" class="text-sm lg:text-base font-medium hover:text-cyan-400 transition">Contact</a>
                <a href="{{ route('about') }}" class="text-sm lg:text-base font-medium hover:text-cyan-400 transition">About Us</a>

                <button onclick="openGeneralAppointmentModal()" class="bg-cyan-400 text-white px-4 py-2 text-sm lg:text-base font-medium rounded hover:bg-cyan-500 transition">
                    Request Appointment
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden text-black hover:text-cyan-400 transition" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden pb-4 border-t border-gray-200">
            <a href="{{ url('/') }}" class="block py-2 px-4 text-sm hover:bg-gray-100 hover:text-cyan-400 transition">Home</a>
            <a href="{{ route('doctors.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100 hover:text-cyan-400 transition">Find Doctor</a>
            <a href="{{ route('specialities') }}" class="block py-2 px-4 text-sm hover:bg-gray-100 hover:text-cyan-400 transition">Specialities</a>
            <a href="{{ route('services') }}" class="block py-2 px-4 text-sm hover:bg-gray-100 hover:text-cyan-400 transition">Services</a>
            <a href="{{ route('contact') }}" class="block py-2 px-4 text-sm hover:bg-gray-100 hover:text-cyan-400 transition">Contact</a>
            <a href="{{ route('about') }}" class="block py-2 px-4 text-sm hover:bg-gray-100 hover:text-cyan-400 transition">About Us</a>

            <button onclick="openGeneralAppointmentModal()" class="w-full mt-3 bg-cyan-400 text-white px-4 py-2 text-sm font-medium rounded hover:bg-cyan-500 transition">
                Request Appointment
            </button>
        </div>
    </div>
</nav>

<!-- General Appointment Modal -->

@include('components.appointment-form')


