@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    {{-- Header Section --}}
    <div class="bg-gradient-to-r from-cyan-500 to-teal-600 text-white py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl sm:text-5xl font-bold">Our Specialities</h1>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        {{-- Center of Excellence Section --}}
        <div class="mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold text-center text-blue-900 mb-12">Center of Excellence</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Heart Centre --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'heart'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-red-500 group-hover:text-red-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-teal-600 mb-1">Centre of Excellence</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Heart Centre</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'heart'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-red-600 cursor-pointer">• Cardiology Consultation</li>
                                <li class="hover:text-red-600 cursor-pointer">• Cardiac Surgery</li>
                                <li class="hover:text-red-600 cursor-pointer">• Interventional Procedures</li>
                                <li class="hover:text-red-600 cursor-pointer">• Cardiac Rehabilitation</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Neurosciences Centre --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'neuro'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-purple-500 group-hover:text-purple-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-teal-600 mb-1">Centre of Excellence</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Neurosciences Centre</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'neuro'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-purple-600 cursor-pointer">• Neurology Consultation</li>
                                <li class="hover:text-purple-600 cursor-pointer">• Neurosurgery</li>
                                <li class="hover:text-purple-600 cursor-pointer">• Stroke Management</li>
                                <li class="hover:text-purple-600 cursor-pointer">• Brain Tumor Treatment</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Ortho & Joint Replacement Centre --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'ortho'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-orange-500 group-hover:text-orange-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 5.5C13 4.12 14.12 3 15.5 3S18 4.12 18 5.5V9h4V5.5C22 3.57 20.43 2 18.5 2S15 3.57 15 5.5V9h-2V5.5zM5 9c-1.66 0-3 1.34-3 3v8c0 1.66 1.34 3 3 3h14c1.66 0 3-1.34 3-3v-8c0-1.66-1.34-3-3-3H5zm0 5h14v8H5v-8z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-teal-600 mb-1">Centre of Excellence</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Ortho & Joint Replacement Centre</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'ortho'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-orange-600 cursor-pointer">• Orthopedic Consultation</li>
                                <li class="hover:text-orange-600 cursor-pointer">• Joint Replacement Surgery</li>
                                <li class="hover:text-orange-600 cursor-pointer">• Arthroscopy</li>
                                <li class="hover:text-orange-600 cursor-pointer">• Sports Medicine</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Gastrosciences Centre --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'gastro'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-green-500 group-hover:text-green-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11 9H9V2H7v7H5V2H3v7c0 2.55 1.92 4.71 4.39 4.94V22h2.42v-8.06C11.99 13.71 13 11.66 13 9c0-2.21-1.79-4-4-4zm6.56 1.45l1.42-1.41L16 6.59l2.98-2.98 1.41 1.41L17.41 8l2.98 2.98-1.41 1.41L16 9.41l-2.98 2.98-1.41-1.41L14.59 8l-2.98-2.98"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-teal-600 mb-1">Centre of Excellence</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Gastrosciences Centre</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'gastro'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-green-600 cursor-pointer">• Gastroenterology Consultation</li>
                                <li class="hover:text-green-600 cursor-pointer">• Endoscopy Services</li>
                                <li class="hover:text-green-600 cursor-pointer">• GI Surgery</li>
                                <li class="hover:text-green-600 cursor-pointer">• Liver Transplantation</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Department of Urology --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'urology'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-indigo-500 group-hover:text-indigo-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-teal-600 mb-1">Centre of Excellence</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Department of Urology</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'urology'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-indigo-600 cursor-pointer">• Urology Consultation</li>
                                <li class="hover:text-indigo-600 cursor-pointer">• Urological Surgery</li>
                                <li class="hover:text-indigo-600 cursor-pointer">• Kidney Transplant</li>
                                <li class="hover:text-indigo-600 cursor-pointer">• Laser Treatment</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Advance Pulmonology Centre --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'pulmonology'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-blue-500 group-hover:text-blue-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2c5.33 4.55 8 8.48 8 11.8 0 4.98-2.67 9.21-8 9.21s-8-4.23-8-9.21C4 10.48 6.67 6.55 12 2zm0 18c4.42 0 6-3.58 6-6.2 0-2.34-1.95-5.44-6-9.14-4.05 3.7-6 6.79-6 9.14C6 16.42 7.58 20 12 20z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-teal-600 mb-1">Centre of Excellence</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Advance Pulmonology, Critical Care & Sleep Medicine</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'pulmonology'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-blue-600 cursor-pointer">• Pulmonology Consultation</li>
                                <li class="hover:text-blue-600 cursor-pointer">• Critical Care</li>
                                <li class="hover:text-blue-600 cursor-pointer">• Sleep Medicine</li>
                                <li class="hover:text-blue-600 cursor-pointer">• Respiratory Support</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Dialysis and Kidney Centre --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'kidney'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-cyan-500 group-hover:text-cyan-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-teal-600 mb-1">Centre of Excellence</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Dialysis and Kidney Transplant Centre</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'kidney'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-cyan-600 cursor-pointer">• Dialysis Services</li>
                                <li class="hover:text-cyan-600 cursor-pointer">• Kidney Transplant</li>
                                <li class="hover:text-cyan-600 cursor-pointer">• Nephrology Consultation</li>
                                <li class="hover:text-cyan-600 cursor-pointer">• Renal Care Programs</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Cancer Centre --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'cancer'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-red-600 group-hover:text-red-700 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5C7 .67 .67 .67 .67 .67C-.33 .67 .33 .67 .33 .67C-.33 .67 -.99 .67 -99 -99z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-teal-600 mb-1">Centre of Excellence</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Cancer Centre</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'cancer'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-red-600 cursor-pointer">• Oncology Consultation</li>
                                <li class="hover:text-red-600 cursor-pointer">• Chemotherapy</li>
                                <li class="hover:text-red-600 cursor-pointer">• Radiation Therapy</li>
                                <li class="hover:text-red-600 cursor-pointer">• Surgical Oncology</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Other Specialities Section --}}
        <div class="mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold text-center text-blue-900 mb-12">Other Specialities</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Anaesthesiology --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'anaesthesia'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-teal-500 group-hover:text-teal-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-13c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Other Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Anaesthesiology, Critical Care & Pain Clinic</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'anaesthesia'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-teal-600 cursor-pointer">• Anaesthesia Services</li>
                                <li class="hover:text-teal-600 cursor-pointer">• Critical Care Unit</li>
                                <li class="hover:text-teal-600 cursor-pointer">• Pain Management</li>
                                <li class="hover:text-teal-600 cursor-pointer">• Regional Anaesthesia</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Dentistry --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'dentistry'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-yellow-500 group-hover:text-yellow-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Other Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Dentistry and Maxillofacial Surgery</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'dentistry'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-yellow-600 cursor-pointer">• General Dentistry</li>
                                <li class="hover:text-yellow-600 cursor-pointer">• Oral Surgery</li>
                                <li class="hover:text-yellow-600 cursor-pointer">• Implants & Prosthetics</li>
                                <li class="hover:text-yellow-600 cursor-pointer">• Cosmetic Dentistry</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Dietetics --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'dietetics'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-green-500 group-hover:text-green-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.99 5V1h-1v4H8.01V1H7v4H3.99V1h-1v4H1v2h22V5h-2V1h-1v4h-3.01V1h-1v4zm8.23 7c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Other Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Dietetics and Nutrition</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'dietetics'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-green-600 cursor-pointer">• Nutritional Counseling</li>
                                <li class="hover:text-green-600 cursor-pointer">• Diet Planning</li>
                                <li class="hover:text-green-600 cursor-pointer">• Therapeutic Nutrition</li>
                                <li class="hover:text-green-600 cursor-pointer">• Wellness Programs</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Dermatology --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'dermatology'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-pink-500 group-hover:text-pink-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-13c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Other Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Dermatology & Cosmetology</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'dermatology'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-pink-600 cursor-pointer">• Skin Consultation</li>
                                <li class="hover:text-pink-600 cursor-pointer">• Dermatological Procedures</li>
                                <li class="hover:text-pink-600 cursor-pointer">• Cosmetic Services</li>
                                <li class="hover:text-pink-600 cursor-pointer">• Laser Therapy</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Endocrinology --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'endocrinology'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-amber-500 group-hover:text-amber-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Other Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Endocrinology, Diabetology & Metabolic Medicine</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'endocrinology'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-amber-600 cursor-pointer">• Endocrinology Consultation</li>
                                <li class="hover:text-amber-600 cursor-pointer">• Diabetes Management</li>
                                <li class="hover:text-amber-600 cursor-pointer">• Hormone Therapy</li>
                                <li class="hover:text-amber-600 cursor-pointer">• Metabolic Disorders</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- ENT --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'ent'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-lime-500 group-hover:text-lime-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-13c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Other Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">ENT and Head Neck Surgery</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'ent'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-lime-600 cursor-pointer">• Otology</li>
                                <li class="hover:text-lime-600 cursor-pointer">• Rhinology</li>
                                <li class="hover:text-lime-600 cursor-pointer">• Laryngology</li>
                                <li class="hover:text-lime-600 cursor-pointer">• Head & Neck Oncology</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- General Surgery --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'surgery'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-rose-500 group-hover:text-rose-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-13c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Other Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">General and Laparoscopic Surgery (Minimal Access)</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'surgery'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-rose-600 cursor-pointer">• Open Surgery</li>
                                <li class="hover:text-rose-600 cursor-pointer">• Laparoscopic Surgery</li>
                                <li class="hover:text-rose-600 cursor-pointer">• Robotic Surgery</li>
                                <li class="hover:text-rose-600 cursor-pointer">• Hernia Repair</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Oncology --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'oncology'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-violet-500 group-hover:text-violet-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">Other Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Oncology - Haematology (Blood Disorder)</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'oncology'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-violet-600 cursor-pointer">• Oncology Consultation</li>
                                <li class="hover:text-violet-600 cursor-pointer">• Hematology Services</li>
                                <li class="hover:text-violet-600 cursor-pointer">• Chemotherapy</li>
                                <li class="hover:text-violet-600 cursor-pointer">• Cancer Support Programs</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- More Specialities Section --}}
        <div class="mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold text-center text-blue-900 mb-12">More Specialities</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Obstetrics --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'obs'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-fuchsia-500 group-hover:text-fuchsia-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 1c6.338 0 12 4.226 12 10.007C24 17.74 18.339 24 12 24s-12-6.26-12-12.993C0 5.226 5.661 1 12 1m0 2c-5.537 0-10 3.582-10 8.007C2 16.052 6.463 22 12 22s10-5.948 10-10.993C22 6.582 17.537 3 12 3"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">More Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Obstetrics, Gynaecology and IVF</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'obs'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-fuchsia-600 cursor-pointer">• Obstetrics Care</li>
                                <li class="hover:text-fuchsia-600 cursor-pointer">• High Risk Pregnancy</li>
                                <li class="hover:text-fuchsia-600 cursor-pointer">• IVF Treatments</li>
                                <li class="hover:text-fuchsia-600 cursor-pointer">• Gynecological Surgery</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Ophthalmology --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'eye'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-sky-500 group-hover:text-sky-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">More Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Ophthalmology (Eye)</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'eye'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-sky-600 cursor-pointer">• General Ophthalmology</li>
                                <li class="hover:text-sky-600 cursor-pointer">• LASIK Surgery</li>
                                <li class="hover:text-sky-600 cursor-pointer">• Cataract Surgery</li>
                                <li class="hover:text-sky-600 cursor-pointer">• Retinal Disorders</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Paediatrics --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'peds'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-cyan-500 group-hover:text-cyan-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">More Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Paediatrics, Neonatology, Nephrology & Paediatric Surgery</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'peds'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-cyan-600 cursor-pointer">• Pediatric Care</li>
                                <li class="hover:text-cyan-600 cursor-pointer">• Neonatal ICU</li>
                                <li class="hover:text-cyan-600 cursor-pointer">• Pediatric Nephrology</li>
                                <li class="hover:text-cyan-600 cursor-pointer">• Pediatric Surgery</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Physiotherapy --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'physio'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-red-500 group-hover:text-red-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-13c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">More Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Physiotherapy</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'physio'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-red-600 cursor-pointer">• Physical Therapy</li>
                                <li class="hover:text-red-600 cursor-pointer">• Rehabilitation</li>
                                <li class="hover:text-red-600 cursor-pointer">• Sports Therapy</li>
                                <li class="hover:text-red-600 cursor-pointer">• Pain Management</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Plastic Surgery --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'plastic'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-orange-500 group-hover:text-orange-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-2.16-2.66c-.23-.29-.61-.37-.92-.15-.31.22-.38.61-.15.92L10.5 19c.23.29.61.37.92.15l4.25-5.54c.23-.29.14-.68-.15-.92-.29-.23-.68-.14-.92.15z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">More Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Plastic, Cosmetic, Re-Constructive Surgery & Hand Clinic</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'plastic'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-orange-600 cursor-pointer">• Cosmetic Surgery</li>
                                <li class="hover:text-orange-600 cursor-pointer">• Reconstructive Surgery</li>
                                <li class="hover:text-orange-600 cursor-pointer">• Hand Surgery</li>
                                <li class="hover:text-orange-600 cursor-pointer">• Burn Care</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Internal Medicine --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'internal'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-purple-500 group-hover:text-purple-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-13c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">More Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Internal Medicine, Critical Care, Respiratory & Sleep Medicine</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'internal'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-purple-600 cursor-pointer">• Internal Medicine Consultation</li>
                                <li class="hover:text-purple-600 cursor-pointer">• Critical Care</li>
                                <li class="hover:text-purple-600 cursor-pointer">• Respiratory Care</li>
                                <li class="hover:text-purple-600 cursor-pointer">• Sleep Medicine</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Radiology --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'radiology'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-indigo-500 group-hover:text-indigo-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">More Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Radio diagnosis and Imaging</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'radiology'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-indigo-600 cursor-pointer">• X-ray Services</li>
                                <li class="hover:text-indigo-600 cursor-pointer">• CT Scans</li>
                                <li class="hover:text-indigo-600 cursor-pointer">• MRI Imaging</li>
                                <li class="hover:text-indigo-600 cursor-pointer">• Ultrasound Services</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Psychiatry --}}
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 flex items-start space-x-4 group cursor-pointer relative" @mouseenter="openDropdown = 'psychiatry'" @mouseleave="openDropdown = ''">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-slate-500 group-hover:text-slate-600 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6-9C6.48 1 2 4.48 2 9c0 5.25 3.07 9.8 7.5 11.71V23h3v-2.29C18.93 18.8 22 14.25 22 9c0-4.52-4.48-8-10-8zm0 16c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-600 mb-1">More Specialities</h3>
                        <p class="text-sm sm:text-base font-semibold text-gray-900">Psychiatry and Clinical Psychology</p>
                    </div>
                    
                    {{-- Dropdown Menu --}}
                    <div x-show="openDropdown === 'psychiatry'" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 text-sm">Related Services</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="hover:text-slate-600 cursor-pointer">• Psychiatry Consultation</li>
                                <li class="hover:text-slate-600 cursor-pointer">• Psychological Therapy</li>
                                <li class="hover:text-slate-600 cursor-pointer">• Mental Health Counseling</li>
                                <li class="hover:text-slate-600 cursor-pointer">• Psychiatric Medications</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Back Button --}}
        <div class="text-center">
            <a href="{{ url('/') }}" class="inline-flex items-center px-6 py-3 bg-cyan-500 text-white font-semibold rounded-lg hover:bg-cyan-600 transition">
                <span class="mr-2">←</span> Back to Home
            </a>
        </div>
    </div>
</div>

@endsection
