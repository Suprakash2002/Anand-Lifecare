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
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    .form-group input, .form-group select, .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        font-family: inherit;
        transition: 0.3s;
    }

    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-group .error {
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
</style>
<div class="table-container" style="max-width: 600px; margin: 0 auto;">
    <h1>Add Patient</h1>
    <div style="padding: 20px;">

    <form method="POST" action="{{ route('patients.store') }}">
        @csrf

        <div class="form-group @error('name') has-error @enderror">
            <label for="name">Patient Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
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
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('date_of_birth') has-error @enderror">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
            @error('date_of_birth')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('address') has-error @enderror">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}">
            @error('address')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('medical_history') has-error @enderror">
            <label for="medical_history">Medical History</label>
            <textarea id="medical_history" name="medical_history" rows="4">{{ old('medical_history') }}</textarea>
            @error('medical_history')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="button-group">
            <button type="submit" class="btn-submit">Add Patient</button>
            <a href="{{ route('patients.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
    </div>
</div>

@endsection
