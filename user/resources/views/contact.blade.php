@extends('layouts.app')

@section('content')

<style>
.form-field {
    position: relative;
}

.form-field.valid input,
.form-field.valid select,
.form-field.valid textarea {
    border: 2px solid #28a745 !important;
}

.form-field.invalid input,
.form-field.invalid select,
.form-field.invalid textarea {
    border: 2px solid #e74c3c !important;
}

.error-msg {
    position: absolute;
    left: 0;
    bottom: -20px;
    font-size: 12px;
    color: #fff;
    background: rgba(231, 76, 60, 0.9);
    padding: 2px 8px;
    border-radius: 3px;
    z-index: 10;
}

.tick {
    position: absolute;
    top: 50%;
    right: 12px;
    transform: translateY(-50%);
    color: #28a745;
    font-weight: bold;
    font-size: 18px;
    pointer-events: none;
}

.form-field select + .tick,
.form-field textarea + .tick {
    top: 15px;
    transform: none;
}
</style>

<!-- Page Header -->
<section class="relative bg-gradient-to-r from-blue-900 to-cyan-600 py-16 sm:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Contact Us</h1>
        <p class="text-xl text-blue-100">We're here to help and answer any questions you might have</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Contact Info Cards -->
            <div class="lg:col-span-1">
                <!-- Phone Card -->
                <div class="bg-white rounded-xl p-8 shadow-md mb-6 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-cyan-500 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Phone</h3>
                    <p class="text-gray-600 mb-2">Call us for immediate assistance</p>
                    <a href="tel:+1234567890" class="text-cyan-500 font-semibold hover:text-cyan-600">7407416322</a>
                    <p class="text-sm text-gray-500 mt-3">Available 24/7</p>
                </div>

                <!-- Email Card -->
                <div class="bg-white rounded-xl p-8 shadow-md mb-6 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Email</h3>
                    <p class="text-gray-600 mb-2">Send us your message anytime</p>
                    <a href="mailto:info@hospital.com" class="text-blue-500 font-semibold hover:text-blue-600">dassuprakash38s@gmail.com</a>
                    <p class="text-sm text-gray-500 mt-3">Response within 24 hours</p>
                </div>

                <!-- Location Card -->
                <div class="bg-white rounded-xl p-8 shadow-md hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Location</h3>
                    <p class="text-gray-600">contai, West Bengal,India<br>Anand Lifecare , HC 12345</p>
                    <p class="text-sm text-gray-500 mt-4">Hours: Mon-Sat 9AM-6PM<br>Sunday: Closed</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg p-8 sm:p-10">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Send us a Message</h2>
                    
                    @if(session('success'))
                    <div id="successMessage" class="bg-green-50 border-2 border-green-400 text-green-800 px-6 py-4 rounded-lg mb-4 text-center">
                        <div class="text-lg font-semibold mb-2">✓ Success!</div>
                        <div>{{ session('success') }}</div>
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Name Field -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="form-field">
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    required 
                                    class="w-full px-4 py-3 border border-black rounded-lg focus:ring-2  "
                                    placeholder="Your full name"
                                >
                            </div>

                            <!-- Email Field -->
                            <div class="form-field">
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent outline-none transition"
                                    placeholder="your.email@example.com"
                                >
                            </div>
                        </div>

                        <!-- Phone Field -->
                        <div class="form-field">
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone" 
                                pattern="[0-9]{10}"
                                maxlength="10"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent outline-none transition"
                                placeholder="Enter 10 digit mobile number"
                            >
                        </div>

                        <!-- Subject Field -->
                        <div class="form-field">
                            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Subject *</label>
                            <select 
                                id="subject" 
                                name="subject" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent outline-none transition"
                            >
                                <option value="">Select a subject</option>
                                <option value="appointment">Appointment Request</option>
                                <option value="medical">Medical Inquiry</option>
                                <option value="billing">Billing Question</option>
                                <option value="feedback">Feedback</option>
                                <option value="complaint">Complaint</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Message Field -->
                        <div class="form-field">
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message *</label>
                            <textarea 
                                id="message" 
                                name="message" 
                                rows="6" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent outline-none transition resize-none"
                                placeholder="Please provide details about your inquiry..."
                            ></textarea>
                        </div>

                        <!-- Checkbox -->
                        <div class="flex items-start">
                            <input 
                                type="checkbox" 
                                id="agree" 
                                name="agree" 
                                required 
                                class="mt-1 h-4 w-4 rounded border-gray-300 text-cyan-600 focus:ring-2 focus:ring-cyan-500"
                            >
                            <label for="agree" class="ml-3 text-sm text-gray-600">
                                I agree to the terms and conditions and privacy policy
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button 
                                type="submit" 
                                class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-4 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg transform hover:scale-105"
                            >
                                Send Message
                            </button>
                        </div>

                        <p class="text-sm text-gray-500 text-center">* Required fields</p>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Optional) -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">Find Us On The Map</h2>
        <div class="rounded-xl overflow-hidden shadow-lg h-96">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3353.0527399441244!2d87.73818927473451!3d21.77081986187968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0326f751569059%3A0x3fe743ed76e68e9e!2sTechinnovator%20Solutions%20Pvt%20Ltd!5e1!3m2!1sen!2sin!4v1776680040638!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contactForm');
        if (!contactForm) {
            console.error('Contact form not found');
            return;
        }

        const formFields = contactForm.querySelectorAll('.form-field');

        function validateField(field) {
            const input = field.querySelector('input, select, textarea');
            if (!input) return false;

            const value = input.value.trim();
            let isValid = true;
            let errorMsg = '';

            // Clear previous error messages and ticks
            const existingError = field.querySelector('.error-msg');
            const existingTick = field.querySelector('.tick');
            if (existingError) existingError.remove();
            if (existingTick) existingTick.remove();

            // Validation logic
            if (input.name === 'name') {
                if (!value) {
                    isValid = false;
                    errorMsg = 'Name is required';
                } else if (value.length < 3) {
                    isValid = false;
                    errorMsg = 'Name must be at least 3 characters';
                }
            } else if (input.name === 'email') {
                if (!value) {
                    isValid = false;
                    errorMsg = 'Email is required';
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                    isValid = false;
                    errorMsg = 'Invalid email format';
                }
            } else if (input.name === 'phone') {
                if (value && !/^[0-9]{10}$/.test(value)) {
                    isValid = false;
                    errorMsg = 'Phone must be 10 digits';
                }
            } else if (input.name === 'subject') {
                if (!value) {
                    isValid = false;
                    errorMsg = 'Subject is required';
                }
            } else if (input.name === 'message') {
                if (!value) {
                    isValid = false;
                    errorMsg = 'Message is required';
                } else if (value.length < 10) {
                    isValid = false;
                    errorMsg = 'Message must be at least 10 characters';
                }
            }

            // Update field state
            if (isValid) {
                field.classList.remove('invalid');
                field.classList.add('valid');
                if (input.tagName !== 'SELECT' && input.tagName !== 'TEXTAREA') {
                    input.insertAdjacentHTML('afterend', '<span class="tick">✓</span>');
                }
            } else {
                field.classList.remove('valid');
                field.classList.add('invalid');
                if (errorMsg) {
                    input.insertAdjacentHTML('afterend', `<span class="error-msg">${errorMsg}</span>`);
                }
            }

            return isValid;
        }

        // Real-time validation on input fields
        formFields.forEach(field => {
            const input = field.querySelector('input, select, textarea');
            if (input) {
                input.addEventListener('blur', function() {
                    validateField(field);
                });
                input.addEventListener('change', function() {
                    validateField(field);
                });
                input.addEventListener('input', function() {
                    validateField(field);
                });
            }
        });

        // Form submission
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isAllValid = true;
            formFields.forEach(field => {
                if (!validateField(field)) {
                    isAllValid = false;
                }
            });

            if (isAllValid) {
                // All fields are valid, submit the form
                this.submit();
            }
        });
    });

    // Hide success message after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.transition = 'opacity 0.5s ease-out';
                successMessage.style.opacity = '0';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 500);
            }, 5000);
        }
    });

</script>

@endsection
