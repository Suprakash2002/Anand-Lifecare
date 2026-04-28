<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors - Hospital ERP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar h2 {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            font-size: 18px;
        }

        .sidebar ul {
            list-style: none;
            margin-top: 30px;
        }

        .sidebar li {
            margin: 0;
        }

        .sidebar a {
            display: block;
            padding: 15px 25px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
            border-left: 4px solid transparent;
        }

        .sidebar a:hover, .sidebar a.active {
            background: rgba(255,255,255,0.2);
            border-left-color: #fff;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
            width: calc(100% - 250px);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header h1 {
            color: #333;
            font-size: 28px;
        }

        .btn-add {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

         .table-container {
        width: 130%;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    overflow: hidden;
    margin-left:-215px;
    margin-right: ;
    }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #f9f9f9;
            padding: 15px;
            text-align: left;
            color: #666;
            font-weight: 600;
            border-bottom: 2px solid #eee;
        }

        table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        table tr:hover {
            background: #f9f9f9;
        }

        .empty-message {
            text-align: center;
            padding: 40px;
            color: #999;
        }

       .success-message {
    background: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    border-left: 4px solid #28a745;
    animation: fadeOut 2s ease-in-out forwards;
}

@keyframes fadeOut {
    0% {
        opacity: 1;
    }
    85% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}

    </style>
</head>
<body>
@extends('admin.layout.app')

@section('content')
<!-- <div class="sidebar">
    <h2>Hospital ERP</h2>
    <ul>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('doctors.index') }}" class="active">Manage Doctors</a></li>
        <li><a href="{{ route('departments.index') }}">Manage Departments</a></li>
        <li><a href="{{ route('appointments.index') }}">Manage Appointments</a></li>
    </ul>
</div> -->

<div class="main-content">
     @if(session('success'))
        <div class="success-message" id="successMessage">
            {{ session('success') }}
        </div>
    @endif
    <div class="header">
        <h1>Doctors</h1>
        <a href="{{ route('doctors.create') }}" class="btn-add">+ Add Doctor</a>
    </div>

   

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Available Day</th>
                    <th>Specialization</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->department->name }}</td>
                        <td>{{ ($doctor->available_from ?? 'N/A') }} - {{ ($doctor->available_to ?? 'N/A') }}</td>
                        <td>{{ $doctor->specialization }}</td>
                        <td>
                            <a href="{{ route('doctors.edit', $doctor->id) }}" style="color: #667eea;">Edit</a> |
                            <form method="POST" action="{{ route('doctors.destroy', $doctor->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" style="background: none; border: none; color: #e74c3c; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-message">No doctors found. <a href="{{ route('doctors.create') }}">Add one now</a></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
</body>
</html>
