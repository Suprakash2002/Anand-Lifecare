@extends('admin.layout.app')

@section('content')

<div class="table-container" style="max-width: 600px; margin: 0 auto;">
    <h3>Add Department</h3>
    <div style="padding: 20px;">

    <form method="POST" action="{{ route('departments.store') }}">
        @csrf

        <div class="form-group @error('name') has-error @enderror">
            <label for="name">Department Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('description') has-error @enderror">
            <label for="description">Description</label>
            <textarea id="description" name="description" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; font-family: inherit; min-height: 120px;">{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="button-group">
            <button type="submit" class="btn-submit">+ Add Department</button>
            <a href="{{ route('departments.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
    </div>
</div>

@endsection
