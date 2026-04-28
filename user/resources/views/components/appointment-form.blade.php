<!-- Appointment Modal -->
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

<div id="appointmentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="bg-teal-500 rounded-lg shadow-xl w-full max-w-2xl max-h-screen overflow-y-auto p-4 sm:p-8">
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-6 sm:mb-8">Please Fill the Form</h2>
        
        @if(session('appointment_success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('appointment_success') }}
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

        <form id="appointmentForm" method="POST" action="{{ route('appointments.store') }}">
            @csrf
            
            <input type="hidden" id="doctorId" name="doctor_id">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-6">
                <div class="form-field">
                    <label for="speciality" class="block text-white font-semibold mb-2 text-sm sm:text-base">Speciality</label>
                    <select id="speciality" name="speciality" required class="w-full border-0 rounded px-4 py-2 sm:py-3 bg-white text-gray-900 focus:ring-2 focus:ring-blue-400 text-sm sm:text-base">
                        <option value="">-- Select Speciality --</option>
                        @foreach($specialists as $spec)
                            <option value="{{ $spec->id }}" {{ request('specialist') == $spec->id ? 'selected' : '' }}>
                                {{ $spec->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-field">
                    <label for="appointmentDoctorSelect" class="block text-white font-semibold mb-2 text-sm sm:text-base">Select Doctor</label>
                    <select id="appointmentDoctorSelect" name="doctor_id" required class="w-full border-0 rounded px-4 py-2 sm:py-3 bg-white text-gray-900 focus:ring-2 focus:ring-blue-400 text-sm sm:text-base">
                        <option value="">-- Select Doctor --</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" data-speciality="{{ $doctor->department_id }}">
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="mb-6 form-field">
                <label for="patientName" class="block text-white font-semibold mb-2 text-sm sm:text-base">Name</label>
                <input type="text" id="patientName" name="patient_name" required class="w-full border-0 rounded px-4 py-2 sm:py-3 bg-white text-gray-900 focus:ring-2 focus:ring-blue-400 text-sm sm:text-base">
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-6">
                <div class="form-field">
                    <label for="patientEmail" class="block text-white font-semibold mb-2 text-sm sm:text-base">Email</label>
                    <input type="email" id="patientEmail" name="patient_email" required class="w-full border-0 rounded px-4 py-2 sm:py-3 bg-white text-gray-900 focus:ring-2 focus:ring-blue-400 text-sm sm:text-base">
                </div>
                
                <div class="form-field">
                    <label for="patientMobile" class="block text-white font-semibold mb-2 text-sm sm:text-base">Mobile No.</label>
                    <input type="tel" id="patientMobile" name="patient_mobile" required pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10 digit mobile number" class="w-full border-0 rounded px-4 py-2 sm:py-3 bg-white text-gray-900 focus:ring-2 focus:ring-blue-400 text-sm sm:text-base">
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-6">
                <div class="form-field">
                    <label for="appointmentDate" class="block text-white font-semibold mb-2 text-sm sm:text-base">Appointment Date</label>
                    <input type="date" id="appointmentDate" name="appointment_date" required class="w-full border-0 rounded px-4 py-2 sm:py-3 bg-white text-gray-900 focus:ring-2 focus:ring-blue-400 text-sm sm:text-base">
                </div>
                
                <div class="form-field">
                    <label for="appointmentTime" class="block text-white font-semibold mb-2 text-sm sm:text-base">OPD Time</label>
                    <select id="appointmentTime" name="appointment_time" required class="w-full border-0 rounded px-4 py-2 sm:py-3 bg-white text-gray-900 focus:ring-2 focus:ring-blue-400 text-sm sm:text-base">
                        <option value="">Select Time Slot</option>
                        <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                        <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                        <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                        <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                        <option value="03:00 PM - 04:00 PM">03:00 PM - 04:00 PM</option>
                        <option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
                    </select>
                </div>
            </div>

            <div id="slotAvailability" class="mb-6 p-4 rounded hidden"></div>

            <div class="mb-6 form-field">
                <label for="message" class="block text-white font-semibold mb-2 text-sm sm:text-base">Message <span class="text-white">*</span></label>
                <textarea id="message" name="message" rows="4" required class="w-full border-0 rounded px-4 py-2 sm:py-3 bg-white text-gray-900 focus:ring-2 focus:ring-blue-400 resize-none text-sm sm:text-base"></textarea>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                <button type="submit" class="flex-1 px-6 sm:px-8 py-2 sm:py-3 bg-blue-900 text-white font-semibold rounded hover:bg-blue-800 transition text-sm sm:text-base">
                    Submit
                </button>
                <button type="button" onclick="closeAppointmentModal()" class="flex-1 px-6 sm:px-8 py-2 sm:py-3 bg-teal-600 text-white font-semibold rounded hover:bg-teal-700 transition text-sm sm:text-base">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>


<script>
function openAppointmentModal(doctorId) {
    document.getElementById('appointmentDoctorSelect').value = doctorId;
    document.getElementById('appointmentModal').classList.remove('hidden');
    setMinimumDate();
}

function openGeneralAppointmentModal() {
    document.getElementById('doctorId').value = '';
    document.getElementById('appointmentDoctorSelect').value = '';
    document.getElementById('appointmentModal').classList.remove('hidden');
    setMinimumDate();
}

function setMinimumDate() {
    const today = new Date();
    const minDate = today.toISOString().split('T')[0];
    document.getElementById('appointmentDate').setAttribute('min', minDate);
}

function checkSlotAvailability() {
    const doctorId = document.getElementById('appointmentDoctorSelect').value;
    const appointmentDate = document.getElementById('appointmentDate').value;
    const appointmentTime = document.getElementById('appointmentTime').value;
    const availabilityDiv = document.getElementById('slotAvailability');
    
    if (!doctorId || !appointmentDate || !appointmentTime) {
        availabilityDiv.classList.add('hidden');
        return;
    }

    // Check availability via AJAX
    fetch('{{ route("appointments.checkAvailability") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            doctor_id: doctorId,
            appointment_date: appointmentDate,
            appointment_time: appointmentTime
        })
    })
    .then(response => response.json())
    .then(data => {
        availabilityDiv.classList.remove('hidden');
        
        if (data.available) {
            availabilityDiv.classList.remove('bg-red-100', 'text-red-700');
            availabilityDiv.classList.add('bg-green-100', 'text-green-700');
            availabilityDiv.innerHTML = '<p class="font-semibold">✓ This slot is available</p>';
        } else {
            availabilityDiv.classList.remove('bg-green-100', 'text-green-700');
            availabilityDiv.classList.add('bg-red-100', 'text-red-700');
            availabilityDiv.innerHTML = '<p class="font-semibold">✗ This slot is booked. Please select another time.</p>';
        }
    })
    .catch(error => {
        console.error('Error checking availability:', error);
    });
}

function closeAppointmentModal() {
    document.getElementById('appointmentModal').classList.add('hidden');
    document.getElementById('appointmentForm').reset();
    document.getElementById('slotAvailability').classList.add('hidden');
}

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
    // Set minimum date
    setMinimumDate();
    
    // Add event listeners for availability check
    document.getElementById('appointmentDate').addEventListener('change', checkSlotAvailability);
    document.getElementById('appointmentTime').addEventListener('change', checkSlotAvailability);
    document.getElementById('appointmentDoctorSelect').addEventListener('change', checkSlotAvailability);
});

// Close modal when clicking outside
document.getElementById('appointmentModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAppointmentModal();
    }
});

// VALIDATION LOGIC
const formFields = {
    speciality: document.getElementById('speciality'),
    doctor: document.getElementById('appointmentDoctorSelect'),
    name: document.getElementById('patientName'),
    email: document.getElementById('patientEmail'),
    mobile: document.getElementById('patientMobile'),
    date: document.getElementById('appointmentDate'),
    time: document.getElementById('appointmentTime'),
    message: document.getElementById('message')
};

// Real-time validation
formFields.speciality.addEventListener('change', () => {
    validate(formFields.speciality, formFields.speciality.value !== "", "Please select a speciality");
});

formFields.doctor.addEventListener('change', () => {
    validate(formFields.doctor, formFields.doctor.value !== "", "Please select a doctor");
});

formFields.name.addEventListener('input', () => {
    validate(formFields.name, formFields.name.value.trim() !== "", "Name is required");
});

formFields.email.addEventListener('input', () => {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    validate(formFields.email, emailPattern.test(formFields.email.value), "Enter a valid email");
});

formFields.mobile.addEventListener('input', () => {
    const mobilePattern = /^[0-9]{10}$/;
    const allSameDigits = /^(\d)\1{9}$/;
    
    if (!mobilePattern.test(formFields.mobile.value)) {
        validate(formFields.mobile, false, "Enter 10 digit mobile number");
    } else if (allSameDigits.test(formFields.mobile.value)) {
        validate(formFields.mobile, false, "Invalid mobile number");
    } else {
        validate(formFields.mobile, true, "");
    }
});

formFields.date.addEventListener('change', () => {
    validate(formFields.date, formFields.date.value !== "", "Select appointment date");
});

formFields.time.addEventListener('change', () => {
    validate(formFields.time, formFields.time.value !== "", "Select time slot");
});

formFields.message.addEventListener('input', () => {
    validate(formFields.message, formFields.message.value.trim() !== "", "Message is required");
});

// Validation function
function validate(input, condition, message) {
    clearValidationMsg(input);
    
    const parent = input.closest('.form-field');
    
    if (condition) {
        parent.classList.add('valid');
        parent.classList.remove('invalid');
        
        const tick = document.createElement('span');
        tick.innerHTML = '✔';
        tick.className = 'tick';
        parent.appendChild(tick);
    } else {
        parent.classList.add('invalid');
        parent.classList.remove('valid');
        
        const error = document.createElement('div');
        error.className = 'error-msg';
        error.innerText = message;
        parent.appendChild(error);
    }
}

// Clear validation messages
function clearValidationMsg(input) {
    const parent = input.closest('.form-field');
    const oldError = parent.querySelector('.error-msg');
    const oldTick = parent.querySelector('.tick');
    
    if (oldError) oldError.remove();
    if (oldTick) oldTick.remove();
}

// Form submission validation
document.getElementById('appointmentForm').addEventListener('submit', function(e) {
    let isValid = true;
    
    // Validate all fields
    if (formFields.speciality.value === "") isValid = false;
    if (formFields.doctor.value === "") isValid = false;
    if (formFields.name.value.trim() === "") isValid = false;
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formFields.email.value)) isValid = false;
    
    // Check mobile number
    const mobilePattern = /^[0-9]{10}$/;
    const allSameDigits = /^(\d)\1{9}$/;
    if (!mobilePattern.test(formFields.mobile.value) || allSameDigits.test(formFields.mobile.value)) {
        isValid = false;
    }
    
    if (formFields.date.value === "") isValid = false;
    if (formFields.time.value === "") isValid = false;
    if (formFields.message.value.trim() === "") isValid = false;
    
    if (!isValid) {
        e.preventDefault();
        alert("Please fix all errors before submitting!");
        
        // Trigger validation on all fields to show errors
        validate(formFields.speciality, formFields.speciality.value !== "", "Please select a speciality");
        validate(formFields.doctor, formFields.doctor.value !== "", "Please select a doctor");
        validate(formFields.name, formFields.name.value.trim() !== "", "Name is required");
        validate(formFields.email, /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formFields.email.value), "Enter a valid email");
        
        if (!mobilePattern.test(formFields.mobile.value)) {
            validate(formFields.mobile, false, "Enter 10 digit mobile number");
        } else if (allSameDigits.test(formFields.mobile.value)) {
            validate(formFields.mobile, false, "Invalid mobile number");
        }
        
        validate(formFields.date, formFields.date.value !== "", "Select appointment date");
        validate(formFields.time, formFields.time.value !== "", "Select time slot");
        validate(formFields.message, formFields.message.value.trim() !== "", "Message is required");
    } else {
        console.log('Form is valid, submitting...');
    }
});

// Filter doctors by speciality
document.getElementById('speciality').addEventListener('change', function () {
    let specialityId = this.value;
    let doctorSelect = document.getElementById('appointmentDoctorSelect');

    // Store all doctor options for reuse
    if (!doctorSelect._allOptions) {
        doctorSelect._allOptions = Array.from(doctorSelect.options);
    }

    // Remove all options
    doctorSelect.innerHTML = '';

    // Add default option
    let defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.text = '-- Select Doctor --';
    doctorSelect.appendChild(defaultOption);

    // If no speciality selected, show no doctors
    if (specialityId === '') {
        return;
    }

    // Filter and add relevant options
    doctorSelect._allOptions.forEach(function(option) {
        if (option.value !== '' && option.dataset.speciality === specialityId) {
            doctorSelect.appendChild(option.cloneNode(true));
        }
    });
});

// Auto-open modal only if there are appointment form validation errors
@if($errors->any())
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('appointmentModal').classList.remove('hidden');
});
@endif

// Auto-open and auto-close modal for appointment success message
@if(session('appointment_success'))
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('appointmentModal').classList.remove('hidden');
    // Auto-close success message after 3 seconds
    setTimeout(function() {
        closeAppointmentModal();
    }, 3000);
});
@endif
</script>
