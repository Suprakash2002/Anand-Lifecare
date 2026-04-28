<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - Hospital ERP</title>
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
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
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
        }

        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-scheduled {
            background: #cce5ff;
            color: #004085;
        }

        .status-completed {
            background: #d4edda;
            color: #155724;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .status-no-show {
            background: #e2e3e5;
            color: #383d41;
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
        <li><a href="{{ route('doctors.index') }}">Manage Doctors</a></li>
        <li><a href="{{ route('departments.index') }}">Manage Departments</a></li>
        <li><a href="{{ route('appointments.index') }}" class="active">Manage Appointments</a></li>
    </ul>
</div> -->
  @if(session('success'))
        <div class="success-message" id="successMessage">
            {{ session('success') }}
        </div>
    @endif

<div class="main-content">
    <div class="header">
        <h1>Appointments</h1>
        <a href="{{ route('appointments.create') }}" class="btn-add">+ Add Appointment</a>
    </div>

  

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Doctor</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Available Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->patient_name }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td>{{ $appointment->department->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
                        <td>{{ $appointment->available_time ?? 'N/A' }}</td>
                        <td>
                            @php
                                $status = $appointment->getCurrentStatus();
                                $statusClass = 'status-scheduled';
                                if ($status == 'Completed') $statusClass = 'status-completed';
                                elseif ($status == 'Cancelled') $statusClass = 'status-cancelled';
                                elseif ($status == 'No Show') $statusClass = 'status-no-show';
                            @endphp
                            <span class="status-badge {{ $statusClass }}">{{ $status }}</span>
                        </td>
                        <td>
                            <a href="{{ route('appointments.edit', $appointment->id) }}" style="color: #667eea; text-decoration: none;">Edit</a> |
                            <!-- <a href="{{ route('appointments.actionStatus') }}" style="color: #28a745; text-decoration: none;">Change Status</a> | -->
                            <form method="POST" action="{{ route('appointments.destroy', $appointment->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this appointment?')" style="background: none; border: none; color: #e74c3c; cursor: pointer; text-decoration: none;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-message">No appointments found. <a href="{{ route('appointments.create') }}">Add one now</a></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
// Auto-hide success message after 2 seconds
@if(session('success'))
document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.getElementById('successMessage');
    if (successMessage) {
        setTimeout(function() {
            successMessage.style.transition = 'opacity 0.5s ease';
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 500);
        }, 2000);
    }
});
@endif
</script>

@endsection
</body>
</html>
