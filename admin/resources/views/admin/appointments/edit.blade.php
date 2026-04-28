<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment - Hospital ERP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
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
            min-height: 80px;
        }

        .error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }

        .form-group.has-error input,
        .form-group.has-error select,
        .form-group.has-error textarea {
            border-color: #e74c3c;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        button, a {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .btn-cancel {
            background: #e0e0e0;
            color: #333;
        }

        .btn-cancel:hover {
            background: #d0d0d0;
        }

    </style>
</head>
<body>

<div class="container">
    <h1>Edit Appointment</h1>

    @if($appointment->isPast())
        <div class="warning-message">
            <strong>Warning:</strong> This appointment has already passed and cannot be edited.
        </div>
    @endif

    <form method="POST" action="{{ route('appointments.update', $appointment->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group @error('patient_name') has-error @enderror">
            <label for="patient_name">Patient Name</label>
            <input type="text" id="patient_name" name="patient_name" value="{{ $appointment->patient_name ?? old('patient_name') }}" required>
            @error('patient_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('patient_email') has-error @enderror">
            <label for="patient_email">Email</label>
            <input type="email" id="patient_email" name="patient_email" value="{{ $appointment->patient_email ?? old('patient_email') }}" required>
            @error('patient_email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('patient_mobile') has-error @enderror">
            <label for="patient_mobile">Mobile No.</label>
            <input type="tel" id="patient_mobile" name="patient_mobile" value="{{ $appointment->patient_mobile ?? old('patient_mobile') }}" required pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10 digit mobile number">
            @error('patient_mobile')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('doctor_id') has-error @enderror">
            <label for="doctor_id">Doctor</label>
            <select id="doctor_id" name="doctor_id" required>
                <option value="">Select Doctor</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ ($appointment->doctor_id ?? old('doctor_id')) == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }} ({{ $doctor->department->name ?? 'N/A' }})
                    </option>
                @endforeach
            </select>
            @error('doctor_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('department_id') has-error @enderror">
            <label for="department_id">Department</label>
            <select id="department_id" name="department_id" required>
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ ($appointment->department_id ?? old('department_id')) == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
            @error('department_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('appointment_date') has-error @enderror">
            <label for="appointment_date">Appointment Date</label>
            <input type="date" id="appointment_date" name="appointment_date" value="{{ $appointment->appointment_date ?? old('appointment_date') }}" required>
            @error('appointment_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('appointment_time') has-error @enderror">
            <label for="appointment_time">OPD Time</label>
            <select id="appointment_time" name="appointment_time" required>
                <option value="">Select Time Slot</option>
                <option value="09:00 AM - 10:00 AM" {{ ($appointment->available_time ?? old('appointment_time')) == '09:00 AM - 10:00 AM' ? 'selected' : '' }}>09:00 AM - 10:00 AM</option>
                <option value="10:00 AM - 11:00 AM" {{ ($appointment->available_time ?? old('appointment_time')) == '10:00 AM - 11:00 AM' ? 'selected' : '' }}>10:00 AM - 11:00 AM</option>
                <option value="11:00 AM - 12:00 PM" {{ ($appointment->available_time ?? old('appointment_time')) == '11:00 AM - 12:00 PM' ? 'selected' : '' }}>11:00 AM - 12:00 PM</option>
                <option value="02:00 PM - 03:00 PM" {{ ($appointment->available_time ?? old('appointment_time')) == '02:00 PM - 03:00 PM' ? 'selected' : '' }}>02:00 PM - 03:00 PM</option>
                <option value="03:00 PM - 04:00 PM" {{ ($appointment->available_time ?? old('appointment_time')) == '03:00 PM - 04:00 PM' ? 'selected' : '' }}>03:00 PM - 04:00 PM</option>
                <option value="04:00 PM - 05:00 PM" {{ ($appointment->available_time ?? old('appointment_time')) == '04:00 PM - 05:00 PM' ? 'selected' : '' }}>04:00 PM - 05:00 PM</option>
            </select>
            @error('appointment_time')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('notes') has-error @enderror">
            <label for="notes">Notes</label>
            <textarea id="notes" name="notes">{{ $appointment->notes ?? old('notes') }}</textarea>
            @error('notes')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="button-group">
            <button type="submit" class="btn-submit">Update Appointment</button>
            <a href="{{ route('appointments.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
