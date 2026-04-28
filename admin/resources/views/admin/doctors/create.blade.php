@extends('admin.layout.app')

@section('content')
<style>
    .table-container {
        background: grey;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .table-container h3 {
        padding: 20px;
        color: #333;
        border-bottom: 1px solid #eee;
        text-align: center;
        background: #748095;

    }   
    .form-group {
        margin-bottom: 20px;
        position: relative; 
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    .form-group input, .form-group select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        font-family: inherit;
        transition: 0.3s;
    }

    .form-group input:focus, .form-group select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-group .error {
        color: #e74c3c;
        font-size: 12px;
        margin-top: 5px;
    }

    .form-group.has-error input {
        border-color: #e74c3c;
    }

    .phone-valid {
        border-color: #28a745 !important;
        box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1) !important;
    }

    .input-valid {
        border-color: #28a745 !important;
        box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1) !important;
    }

    .input-invalid {
        border-color: #e74c3c !important;
        box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1) !important;
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
        color: white;
        cursor: pointer;
        transition: 0.3s;
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
    h1{
        text-align: center;
        color: #333;
    }
    .valid {
    border: 2px solid #28a745 !important;
}
.invalid {
    border: 2px solid #e74c3c !important;
}
.error-msg {
    position: absolute;
    left: 0;
    bottom: -18px;
    font-size: 12px;
    color: #e74c3c;

}
.tick {
    position: absolute;
    top: 10px;
    right: 10px;
    color: green;
    margin-left: 5px;
    font-weight: bold;
}

</style>
<div class="table-container" style="max-width: 600px; margin: 0 auto;">
    <h1>Add Doctor</h1>
    <div style="padding: 20px;">

    <form method="POST" action="{{ route('doctors.store') }}">
        @csrf

        <div class="form-group @error('name') has-error @enderror">
            <label for="name">Doctor Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" onkeyup="validateName()" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('email') has-error @enderror">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('phone') has-error @enderror">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10 digit phone number" onblur="validatePhone()">
            <div class="error" id="phoneError" style="display: none;">Enter 10 digits phone number</div>
            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
<div>
            <label style="display: block; margin-bottom: 15px; color: #555; font-weight: 600;">Available Day</label>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                <div class="form-group @error('available_day_from') has-error @enderror">
                    <select id="available_day_from" name="available_day_from">
                        <option value="">Select</option>
                        <option value="Monday" {{ old('available_day_from') == 'Monday' ? 'selected' : '' }}>Monday</option>
                        <option value="Tuesday" {{ old('available_day_from') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                        <option value="Wednesday" {{ old('available_day_from') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                        <option value="Thursday" {{ old('available_day_from') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                        <option value="Friday" {{ old('available_day_from') == 'Friday' ? 'selected' : '' }}>Friday</option>
                        <option value="Saturday" {{ old('available_day_from') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                        <option value="Sunday" {{ old('available_day_from') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                    </select>
                </div>
                <div class="form-group @error('available_day_to') has-error @enderror">
                    <select id="available_day_to" name="available_day_to">
                        <option value="">Select</option>
                        <option value="Monday" {{ old('available_day_to') == 'Monday' ? 'selected' : '' }}>Monday</option>
                        <option value="Tuesday" {{ old('available_day_to') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                        <option value="Wednesday" {{ old('available_day_to') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                        <option value="Thursday" {{ old('available_day_to') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                        <option value="Friday" {{ old('available_day_to') == 'Friday' ? 'selected' : '' }}>Friday</option>
                        <option value="Saturday" {{ old('available_day_to') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                        <option value="Sunday" {{ old('available_day_to') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group @error('department_id') has-error @enderror">
            <label for="department_id">Department</label>
            <select id="department_id" name="department_id" required>
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
            @error('department_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('specialization') has-error @enderror">
            <label for="specialization">Specialization</label>
            <input type="text" id="specialization" name="specialization" value="{{ old('specialization') }}" required>
            @error('specialization')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        

        <div class="button-group">
            <button type="submit" class="btn-submit">Add Doctor</button>
            <a href="{{ route('doctors.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
    </div>
</div>

<script>
// GET ELEMENTS
let name = document.getElementById("name");
let email = document.getElementById("email");
let phone = document.getElementById("phone");
let dayFrom = document.getElementById("available_day_from");
let dayTo = document.getElementById("available_day_to");
let dept = document.getElementById("department_id");
let spec = document.getElementById("specialization");

// REAL-TIME VALIDATION
name.addEventListener("input", () => validate(name, name.value.trim() !== "", "Name required"));

email.addEventListener("input", () => {
    let pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    validate(email, pattern.test(email.value), "Email is invalid");
});

phone.addEventListener("input", () => {
    let pattern = /^[0-9]{10}$/;
    let allSameDigits = /^(\d)\1{9}$/;
    
    if (!pattern.test(phone.value)) {
        validate(phone, false, "Phone should contain 10 numbers");
    } else if (allSameDigits.test(phone.value)) {
        validate(phone, false, "Invalid phone number");
    } else {
        validate(phone, true, "");
    }
});

dayFrom.addEventListener("change", () => validate(dayFrom, dayFrom.value !== "", "Select start day"));
dayTo.addEventListener("change", () => validate(dayTo, dayTo.value !== "", "Select end day"));
dept.addEventListener("change", () => validate(dept, dept.value !== "", "Select department"));
spec.addEventListener("input", () => validate(spec, spec.value.trim() !== "", "Required"));

// VALIDATION FUNCTION
function validate(input, condition, message) {
    clearMsg(input);

    if (condition) {
        input.classList.add("valid");
        input.classList.remove("invalid");

        let tick = document.createElement("span");
        tick.innerHTML = "✔";
        tick.className = "tick";
        input.parentElement.appendChild(tick);

    } else {
        input.classList.add("invalid");
        input.classList.remove("valid");

        let error = document.createElement("div");
        error.className = "error-msg";
        error.innerText = message;
        input.parentNode.appendChild(error);
    }
}

// REMOVE OLD ERROR/TICK
function clearMsg(input) {
    let parent = input.parentNode;

    let oldError = parent.querySelector(".error-msg");
    let oldTick = parent.querySelector(".tick");

    if (oldError) oldError.remove();
    if (oldTick) oldTick.remove();
}

// FINAL SUBMIT CHECK
document.querySelector("form").addEventListener("submit", function(e) {

    let valid = true;

    if (name.value.trim() === "") valid = false;
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) valid = false;
    
    // Check phone with same digit validation
    let phonePattern = /^[0-9]{10}$/;
    let allSameDigits = /^(\d)\1{9}$/;
    if (!phonePattern.test(phone.value) || allSameDigits.test(phone.value)) valid = false;
    
    if (dayFrom.value === "") valid = false;
    if (dayTo.value === "") valid = false;
    if (dept.value === "") valid = false;
    if (spec.value.trim() === "") valid = false;

    if (!valid) {
        e.preventDefault();
        alert("Please fix errors before submitting!");
    }
});
</script>

@endsection
