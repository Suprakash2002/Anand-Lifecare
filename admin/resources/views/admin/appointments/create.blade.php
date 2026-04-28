@extends('admin.layout.app')

@section('content')
<style>
.form-field {
    position: relative;
    margin-bottom: 20px;
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
    color: #e74c3c;
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

.table-container {
    background: grey;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    overflow: hidden;
    max-width: 600px;
    margin: 0 auto;
}

h1 {
    text-align: center;
    color: #333;
    padding: 20px;
    background: #748095;
    margin: 0;
}

.form-content {
    padding: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
    font-weight: 500;
}

input, select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    font-family: inherit;
    transition: 0.3s;
}

input:focus, select:focus, textarea:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

textarea {
    resize: vertical;
    min-height: 120px;
}

.button-group {
    display: flex;
    gap: 10px;
    margin-top: 30px;
}

.btn-submit, .btn-cancel {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    transition: 0.3s;
    color: white;
}

.btn-submit {
    background-color: #28a745;
}

.btn-submit:hover {
    background-color: #218838;
}

.btn-cancel {
    background-color: #6c757d;
}

.btn-cancel:hover {
    background-color: #5a6268;
}
</style>

<div class="table-container">
    <h1>Create Appointment</h1>
    
    <div class="form-content">
        @if(session('success'))
        <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 12px; border-radius: 5px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form id="appointmentForm" method="POST" action="{{ route('appointments.store') }}">
            @csrf

            <div class="form-field">
                <label for="department_id">Department</label>
                <select id="department_id" name="department_id" required>
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-field">
                <label for="doctor_id">Doctor</label>
                <select id="doctor_id" name="doctor_id" required>
                    <option value="">Select Doctor</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" data-department="{{ $doctor->department_id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }} ({{ $doctor->department->name ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-field">
                <label for="patient_name">Patient Name</label>
                <input type="text" id="patient_name" name="patient_name" value="{{ old('patient_name') }}" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div class="form-field">
                    <label for="patient_email">Email</label>
                    <input type="email" id="patient_email" name="patient_email" value="{{ old('patient_email') }}" required>
                </div>

                <div class="form-field">
                    <label for="patient_mobile">Mobile No.</label>
                    <input type="tel" id="patient_mobile" name="patient_mobile" value="{{ old('patient_mobile') }}" required pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10 digit mobile number">
                </div>
            </div>

            <div class="form-field">
                <label for="appointment_date">Appointment Date</label>
                <input type="date" id="appointment_date" name="appointment_date" value="{{ old('appointment_date') }}" required>
            </div>

            <div class="form-field">
                <label for="appointment_time">OPD Time</label>
                <select id="appointment_time" name="appointment_time" required>
                    <option value="">Select Time Slot</option>
                    <option value="09:00 AM - 10:00 AM" {{ old('appointment_time') == '09:00 AM - 10:00 AM' ? 'selected' : '' }}>09:00 AM - 10:00 AM</option>
                    <option value="10:00 AM - 11:00 AM" {{ old('appointment_time') == '10:00 AM - 11:00 AM' ? 'selected' : '' }}>10:00 AM - 11:00 AM</option>
                    <option value="11:00 AM - 12:00 PM" {{ old('appointment_time') == '11:00 AM - 12:00 PM' ? 'selected' : '' }}>11:00 AM - 12:00 PM</option>
                    <option value="02:00 PM - 03:00 PM" {{ old('appointment_time') == '02:00 PM - 03:00 PM' ? 'selected' : '' }}>02:00 PM - 03:00 PM</option>
                    <option value="03:00 PM - 04:00 PM" {{ old('appointment_time') == '03:00 PM - 04:00 PM' ? 'selected' : '' }}>03:00 PM - 04:00 PM</option>
                    <option value="04:00 PM - 05:00 PM" {{ old('appointment_time') == '04:00 PM - 05:00 PM' ? 'selected' : '' }}>04:00 PM - 05:00 PM</option>
                </select>
            </div>

            <div class="form-field">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes">{{ old('notes') }}</textarea>
            </div>

            <div class="button-group">
                <button type="submit" class="btn-submit">Add Appointment</button>
                <a href="{{ route('appointments.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
// GET ELEMENTS
const formFields = {
    department: document.getElementById('department_id'),
    doctor: document.getElementById('doctor_id'),
    patientName: document.getElementById('patient_name'),
    date: document.getElementById('appointment_date'),
    time: document.getElementById('appointment_time'),
    notes: document.getElementById('notes')
};

// Set minimum date to today
const today = new Date().toISOString().split('T')[0];
formFields.date.setAttribute('min', today);

// REAL-TIME VALIDATION
formFields.department.addEventListener('change', () => {
    validate(formFields.department, formFields.department.value !== "", "Please select a department");
    filterDoctorsByDepartment();
});

formFields.doctor.addEventListener('change', () => {
    validate(formFields.doctor, formFields.doctor.value !== "", "Please select a doctor");
});

formFields.patientName.addEventListener('input', () => {
    validate(formFields.patientName, formFields.patientName.value.trim() !== "", "Patient name is required");
});

formFields.date.addEventListener('change', () => {
    validate(formFields.date, formFields.date.value !== "", "Select appointment date");
});

formFields.time.addEventListener('change', () => {
    validate(formFields.time, formFields.time.value !== "", "Select time slot");
});

formFields.notes.addEventListener('input', () => {
    if (formFields.notes.value.trim() !== "") {
        validate(formFields.notes, true, "");
    } else {
        clearValidationMsg(formFields.notes);
    }
});

// FILTER DOCTORS BY DEPARTMENT
function filterDoctorsByDepartment() {
    const departmentId = formFields.department.value;
    const doctorSelect = formFields.doctor;
    
    // Store all doctor options for reuse
    if (!doctorSelect._allOptions) {
        doctorSelect._allOptions = Array.from(doctorSelect.options);
    }
    
    // Clear current options
    doctorSelect.innerHTML = '';
    
    // Add default option
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.text = '-- Select Doctor --';
    doctorSelect.appendChild(defaultOption);
    
    // If no department selected, show no doctors
    if (departmentId === '') {
        return;
    }
    
    // Filter and add doctors from selected department
    doctorSelect._allOptions.forEach(function(option) {
        if (option.value !== '' && option.dataset.department === departmentId) {
            doctorSelect.appendChild(option.cloneNode(true));
        }
    });
    
    // Clear doctor validation when department changes
    clearValidationMsg(formFields.doctor);
}

// VALIDATION FUNCTION
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

// REMOVE OLD ERROR/TICK
function clearValidationMsg(input) {
    const parent = input.closest('.form-field');
    const oldError = parent.querySelector('.error-msg');
    const oldTick = parent.querySelector('.tick');
    
    if (oldError) oldError.remove();
    if (oldTick) oldTick.remove();
}

// FINAL SUBMIT CHECK
document.getElementById('appointmentForm').addEventListener('submit', function(e) {
    let isValid = true;
    
    if (formFields.department.value === "") isValid = false;
    if (formFields.doctor.value === "") isValid = false;
    if (formFields.patientName.value.trim() === "") isValid = false;
    if (formFields.date.value === "") isValid = false;
    if (formFields.time.value === "") isValid = false;
    
    if (!isValid) {
        e.preventDefault();
        alert("Please fix all errors before submitting!");
        
        // Trigger validation on all fields to show errors
        validate(formFields.department, formFields.department.value !== "", "Please select a department");
        validate(formFields.doctor, formFields.doctor.value !== "", "Please select a doctor");
        validate(formFields.patientName, formFields.patientName.value.trim() !== "", "Patient name is required");
        validate(formFields.date, formFields.date.value !== "", "Select appointment date");
        validate(formFields.time, formFields.time.value !== "", "Select time slot");
    }
});
</script>

@endsection
