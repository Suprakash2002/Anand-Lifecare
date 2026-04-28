@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
    <!-- Page Header -->
    <div class="text-center mb-12 sm:mb-16">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 mb-4">
            Our Medical Services
        </h1>
        <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
            Comprehensive healthcare services designed to meet all your medical needs with world-class facilities and expert specialists
        </p>
    </div>

    <!-- Core Medical Services Section -->
    <section class="mb-16 sm:mb-20">
        <div class="mb-8 sm:mb-12">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-1 h-10 bg-blue-600 rounded"></div>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">
                    Core Medical Services
                </h2>
            </div>
            <p class="text-gray-600 text-lg ml-4">Comprehensive in-patient and out-patient medical care across all specialties</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- OPD Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-blue-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🏥</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Outpatient Department (OPD)</h3>
                <p class="text-gray-600 mb-4">
                    Walk-in consultations with expert doctors for non-emergency medical conditions. Quick appointments, comprehensive diagnosis, and personalized treatment plans.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-blue-600 font-semibold">📍 Available 24/7</p>
                </div>
            </div>

            <!-- IPD Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-blue-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🛏️</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Inpatient Department (IPD)</h3>
                <p class="text-gray-600 mb-4">
                    Comfortable patient rooms with 24-hour nursing care, vital monitoring, and round-the-clock medical supervision for hospitalized patients requiring extended treatment.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-blue-600 font-semibold">👨‍⚕️ Intensive Care</p>
                </div>
            </div>

            <!-- Emergency/Casualty Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-red-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🚨</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Emergency & Casualty</h3>
                <p class="text-gray-600 mb-4">
                    Rapid response to medical emergencies with fully equipped trauma centers, emergency physicians, and stabilization facilities for acute medical conditions.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-red-600 font-semibold">⏰ Available 24/7</p>
                </div>
            </div>

            <!-- ICU/Critical Care Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-purple-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">⚕️</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">ICU & Critical Care</h3>
                <p class="text-gray-600 mb-4">
                    State-of-the-art intensive care units with advanced life support systems, continuous monitoring, and specialized critical care physicians for severe medical conditions.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-purple-600 font-semibold">🔬 Advanced Monitoring</p>
                </div>
            </div>

            <!-- Surgery Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-green-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🔪</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">General & Advanced Surgery</h3>
                <p class="text-gray-600 mb-4">
                    Modern operation theaters equipped with cutting-edge surgical instruments, experienced surgeons, and anesthesiologists for elective and emergency surgical procedures.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-green-600 font-semibold">✓ Minimally Invasive</p>
                </div>
            </div>

            <!-- Cardiology Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-red-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">❤️</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Cardiology</h3>
                <p class="text-gray-600 mb-4">
                    Comprehensive heart care services including diagnostics, interventional procedures, bypass surgeries, and post-operative care by experienced cardiologists.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-red-600 font-semibold">💓 Heart Specialist</p>
                </div>
            </div>

            <!-- Neurology Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-indigo-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🧠</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Neurology & Neurosurgery</h3>
                <p class="text-gray-600 mb-4">
                    Expert treatment for brain, spinal cord, and nervous system disorders with advanced diagnostic imaging, neurosurgical interventions, and rehabilitation services.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-indigo-600 font-semibold">🔍 Advanced Imaging</p>
                </div>
            </div>

            <!-- Orthopedics Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-amber-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🦴</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Orthopedics</h3>
                <p class="text-gray-600 mb-4">
                    Complete bone, joint, and ligament care including fracture treatment, joint replacement, arthroscopy, and physiotherapy for optimal mobility and function.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-amber-600 font-semibold">🏃 Rehabilitation</p>
                </div>
            </div>

            <!-- Pediatrics Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-pink-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">👶</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Pediatrics</h3>
                <p class="text-gray-600 mb-4">
                    Specialized care for newborns, infants, and children with pediatric specialists, neonatal ICU, immunization programs, and child-friendly facilities.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-pink-600 font-semibold">👨‍⚕️ Child Care</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Diagnostic & Lab Services Section -->
    <section class="mb-16 sm:mb-20">
        <div class="mb-8 sm:mb-12">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-1 h-10 bg-green-600 rounded"></div>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">
                    Diagnostic & Laboratory Services
                </h2>
            </div>
            <p class="text-gray-600 text-lg ml-4">Advanced diagnostic facilities for accurate disease detection and monitoring</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Pathology Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-blue-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🔬</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Pathology Laboratory</h3>
                <p class="text-gray-600 mb-4">
                    Comprehensive blood tests, biochemistry, microbiology, serology, and hematology services with ISO-certified labs and accurate, timely results.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-blue-600 font-semibold">✓ Accredited Lab</p>
                </div>
            </div>

            <!-- Radiology Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-green-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">📷</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Radiology & Imaging</h3>
                <p class="text-gray-600 mb-4">
                    X-ray, CT scans, MRI, ultrasound, mammography, and fluoroscopy services with latest imaging technology and expert radiologists for precise diagnosis.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-green-600 font-semibold">🎯 High Resolution</p>
                </div>
            </div>

            <!-- ECG Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-red-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">📊</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Electrocardiography (ECG)</h3>
                <p class="text-gray-600 mb-4">
                    12-lead ECG, stress test, Holter monitoring, and echocardiography for cardiac assessment and arrhythmia detection with cardiac specialists.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-red-600 font-semibold">❤️ Cardiac Testing</p>
                </div>
            </div>

            <!-- Ultrasound Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-purple-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🔊</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Ultrasound Services</h3>
                <p class="text-gray-600 mb-4">
                    Abdominal, obstetric, gynecological, and doppler ultrasound with color imaging, prenatal screening, and 3D/4D ultrasound facilities.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-purple-600 font-semibold">👶 Obstetric</p>
                </div>
            </div>

            <!-- Endoscopy Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-amber-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🔍</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Endoscopy & Colonoscopy</h3>
                <p class="text-gray-600 mb-4">
                    Upper GI endoscopy, colonoscopy, laparoscopy, and flexible sigmoidoscopy for diagnostic and therapeutic purposes with minimal discomfort.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-amber-600 font-semibold">✓ Minimally Invasive</p>
                </div>
            </div>

            <!-- CT Scan Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-indigo-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🖥️</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">CT Scan (Computed Tomography)</h3>
                <p class="text-gray-600 mb-4">
                    128-slice spiral CT with 3D reconstruction, CT angiography, and CT-guided interventions for detailed cross-sectional imaging of body organs.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-indigo-600 font-semibold">⚡ High Speed Imaging</p>
                </div>
            </div>

            <!-- MRI Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-cyan-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🧲</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">MRI (Magnetic Resonance Imaging)</h3>
                <p class="text-gray-600 mb-4">
                    3.0 Tesla MRI with advanced sequences for brain, spine, cardiac, and musculoskeletal imaging providing excellent soft tissue visualization without radiation.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-cyan-600 font-semibold">🔬 Non-Invasive</p>
                </div>
            </div>

            <!-- Pulmonary Function Test Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-teal-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">💨</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Pulmonary Function Tests</h3>
                <p class="text-gray-600 mb-4">
                    Spirometry, diffusion capacity, lung volume measurement, and bronchial challenges for respiratory disease assessment and monitoring.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-teal-600 font-semibold">🫁 Respiratory Care</p>
                </div>
            </div>

            <!-- Genetic Testing Card -->
            <div class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-pink-500 hover:shadow-xl transition duration-300">
                <div class="text-4xl mb-4">🧬</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Genetic Testing & Counseling</h3>
                <p class="text-gray-600 mb-4">
                    Genetic screening for hereditary conditions, prenatal genetic testing, and professional genetic counseling for informed family health decisions.
                </p>
                <div class="pt-4 border-t-2 border-gray-100">
                    <p class="text-sm text-pink-600 font-semibold">🔬 Advanced Genetics</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-gradient-to-r from-blue-600 to-cyan-500 rounded-2xl p-8 sm:p-12 text-white text-center">
        <h2 class="text-3xl sm:text-4xl font-bold mb-4">Need Any Medical Service?</h2>
        <p class="text-lg mb-8 max-w-2xl mx-auto">
            Book an appointment with our specialists or visit our diagnostic center today. Our trained staff is ready to assist you.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button onclick="openGeneralAppointmentModal()" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">
                Book Appointment
            </button>
            <a href="{{ route('doctors.index') }}" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg transition duration-300">
                Find a Doctor
            </a>
        </div>
    </section>

    <!-- Location & Hours -->
    <section class="mt-16 sm:mt-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="text-5xl mb-4">⏰</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Working Hours</h3>
                <p class="text-gray-600">
                    Emergency Services:<br><span class="font-semibold">24 Hours / 7 Days</span>
                </p>
                <p class="text-gray-600 mt-3">
                    OPD Services:<br><span class="font-semibold">8:00 AM - 8:00 PM</span>
                </p>
            </div>
            <div class="text-center">
                <div class="text-5xl mb-4">📍</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Location</h3>
                <p class="text-gray-600">
                    Premier Healthcare Hospital<br>
                    Healthcare Avenue<br>
                    Medical City
                </p>
            </div>
            <div class="text-center">
                <div class="text-5xl mb-4">📞</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Contact Us</h3>
                <div class="text-gray-600 space-y-2">
                    <p>
                        <span class="font-semibold">Emergency:</span><br>
                        <a href="tel:+918172007130" class="text-blue-600 hover:text-blue-800 hover:underline transition duration-200">+91 8172007130</a>
                    </p>
                    <p>
                        <span class="font-semibold">Appointments:</span><br>
                        <a href="tel:+918172007130" class="text-blue-600 hover:text-blue-800 hover:underline transition duration-200">+91 8172007130</a>
                    </p>
                    <p>
                        <span class="font-semibold">WhatsApp:</span><br>
                        <a href="https://wa.me/918172007130" target="_blank" class="text-green-600 hover:text-green-800 hover:underline transition duration-200">+91 8172007130</a>
                    </p>
                    <p>
                        <span class="font-semibold">Email:</span><br>
                        <a href="mailto:dassuprakash38@gmail.com" class="text-blue-600 hover:text-blue-800 hover:underline transition duration-200">dassuprakash38@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>

@include('components.appointment-form')
@endsection