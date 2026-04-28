<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department - Hospital ERP</title>
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

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            transition: 0.3s;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }

        .form-group.has-error input,
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
    <h1>Edit Department</h1>

    <form method="POST" action="{{ route('departments.update', $department->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group @error('name') has-error @enderror">
            <label for="name">Department Name</label>
            <input type="text" id="name" name="name" value="{{ $department->name ?? old('name') }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group @error('description') has-error @enderror">
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ $department->description ?? old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="button-group">
            <button type="submit" class="btn-submit">Update Department</button>
            <a href="{{ route('departments.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
