<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor - Hospital ERP</title>
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
            max-width: 500px;
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

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            transition: 0.3s;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }

        .form-group.has-error input,
        .form-group.has-error select {
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
    <h1>Edit Doctor</h1>

    <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group @error('name') has-error @enderror">
            <label for="name">Doctor Name</label>
            <input type="text" id="name" name="name" value="{{ $doctor->name ?? old('name') }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('email') has-error @enderror">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $doctor->email ?? old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('phone') has-error @enderror">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" value="{{ $doctor->phone ?? old('phone') }}" required>
            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('department_id') has-error @enderror">
            <label for="department_id">Department</label>
            <select id="department_id" name="department_id" required>
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ ($doctor->department_id ?? old('department_id')) == $department->id ? 'selected' : '' }}>
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
            <input type="text" id="specialization" name="specialization" value="{{ $doctor->specialization ?? old('specialization') }}" required>
            @error('specialization')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label style="display: block; margin-bottom: 15px; color: #555; font-weight: 600;">Available Day</label>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                <div class="form-group">
                    <select id="available_day_from" name="available_day_from">
                        <option value="">Select</option>
                        @php
                            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                            $dayFrom = $doctor->available_from ?? old('available_day_from');
                        @endphp
                        @foreach($days as $day)
                            <option value="{{ $day }}" {{ $dayFrom == $day ? 'selected' : '' }}>{{ $day }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select id="available_day_to" name="available_day_to">
                        <option value="">Select</option>
                        @php
                            $dayTo = $doctor->available_to ?? old('available_day_to');
                        @endphp
                        @foreach($days as $day)
                            <option value="{{ $day }}" {{ $dayTo == $day ? 'selected' : '' }}>{{ $day }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 15px; color: #555; font-weight: 600;">OPD Time</label>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div class="form-group @error('opd_start_time') has-error @enderror">
                    <label for="opd_start_time" style="margin-bottom: 8px;">Start Time</label>
                    @php
                        $startTime = old('opd_start_time');
                        if (!$startTime && $doctor->opd_start_time) {
                            // Try to convert 12-hour format to 24-hour format
                            $parsedTime = strtotime($doctor->opd_start_time);
                            $startTime = $parsedTime ? date('H:i', $parsedTime) : $doctor->opd_start_time;
                        }
                    @endphp
                    <input type="time" id="opd_start_time" name="opd_start_time" value="{{ $startTime }}">
                    @error('opd_start_time')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group @error('opd_end_time') has-error @enderror">
                    <label for="opd_end_time" style="margin-bottom: 8px;">End Time</label>
                    @php
                        $endTime = old('opd_end_time');
                        if (!$endTime && $doctor->opd_end_time) {
                            // Try to convert 12-hour format to 24-hour format
                            $parsedTime = strtotime($doctor->opd_end_time);
                            $endTime = $parsedTime ? date('H:i', $parsedTime) : $doctor->opd_end_time;
                        }
                    @endphp
                    <input type="time" id="opd_end_time" name="opd_end_time" value="{{ $endTime }}">
                    @error('opd_end_time')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="button-group">
            <button type="submit" class="btn-submit">Update Doctor</button>
            <a href="{{ route('doctors.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        let isValid = true;
        const errors = [];

        // Get form values
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const departmentId = document.getElementById('department_id').value;
        const specialization = document.getElementById('specialization').value.trim();
        const availableFrom = document.getElementById('available_day_from').value;
        const availableTo = document.getElementById('available_day_to').value;
        const opdStartTime = document.getElementById('opd_start_time').value;
        const opdEndTime = document.getElementById('opd_end_time').value;

        // Validate name
        if (!name) {
            errors.push('Doctor name is required');
            isValid = false;
        } else if (name.length < 3) {
            errors.push('Doctor name must be at least 3 characters');
            isValid = false;
        }

        // Validate email
        if (!email) {
            errors.push('Email is required');
            isValid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            errors.push('Please enter a valid email address');
            isValid = false;
        }

        // Validate phone
        if (!phone) {
            errors.push('Phone number is required');
            isValid = false;
        } else if (!/^\d{10}$/.test(phone.replace(/\D/g, ''))) {
            errors.push('Phone number must contain 10 digits');
            isValid = false;
        }

        // Validate department
        if (!departmentId) {
            errors.push('Please select a department');
            isValid = false;
        }

        // Validate specialization
        if (!specialization) {
            errors.push('Specialization is required');
            isValid = false;
        }

        // Validate available days
        if ((availableFrom && !availableTo) || (!availableFrom && availableTo)) {
            errors.push('Please select both "Available From" and "Available To" days, or leave both empty');
            isValid = false;
        }

        // Validate OPD times
        if ((opdStartTime && !opdEndTime) || (!opdStartTime && opdEndTime)) {
            errors.push('Please enter both start and end times, or leave both empty');
            isValid = false;
        }

        if (opdStartTime && opdEndTime) {
            if (opdEndTime <= opdStartTime) {
                errors.push('End time must be after start time');
                isValid = false;
            }
        }

        // Show errors if validation fails
        if (!isValid) {
            e.preventDefault();
            alert('Please fix the following errors:\n\n' + errors.join('\n'));
        }
    });
</script>

</body>
</html>
