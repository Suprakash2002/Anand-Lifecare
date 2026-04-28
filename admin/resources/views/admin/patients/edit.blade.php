<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient - Hospital ERP</title>
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
    <h1>Edit Patient</h1>

    <form method="POST" action="{{ route('patients.update', $patient->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group @error('name') has-error @enderror">
            <label for="name">Patient Name</label>
            <input type="text" id="name" name="name" value="{{ $patient->user->name ?? old('name') }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('email') has-error @enderror">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $patient->user->email ?? old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('phone') has-error @enderror">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" value="{{ $patient->phone ?? old('phone') }}" required>
            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('date_of_birth') has-error @enderror">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $patient->date_of_birth ? $patient->date_of_birth->format('Y-m-d') : old('date_of_birth') }}">
            @error('date_of_birth')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('address') has-error @enderror">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ $patient->address ?? old('address') }}">
            @error('address')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('medical_history') has-error @enderror">
            <label for="medical_history">Medical History</label>
            <textarea id="medical_history" name="medical_history" rows="4">{{ $patient->medical_history ?? old('medical_history') }}</textarea>
            @error('medical_history')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="button-group">
            <button type="submit" class="btn-submit">Update Patient</button>
            <a href="{{ route('patients.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
