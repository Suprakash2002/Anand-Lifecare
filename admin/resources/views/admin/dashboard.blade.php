@extends('admin.layout.app')

@section('content')

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

        /* Sidebar */
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

        .sidebar a:hover {
            background: rgba(255,255,255,0.1);
            border-left-color: #fff;
        }

        .sidebar a.active {
            background: rgba(255,255,255,0.2);
            border-left-color: #fff;
        }

        /* Main Content */
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

        .logout-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-left: 4px solid;
        }

        .stat-card.doctors {
            border-left-color: #3498db;
        }

        .stat-card.departments {
            border-left-color: #2ecc71;
        }

        .stat-card.appointments {
            border-left-color: #f39c12;
        }

        .stat-card.pending {
            border-left-color: #e74c3c;
        }

        .stat-card h3 {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .stat-card .number {
            font-size: 32px;
            font-weight: bold;
            color: #333;
        }

        /* Action Buttons */
        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .action-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
            text-decoration: none;
            text-align: center;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        /* Recent Appointments Table */
        .table-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .table-container h3 {
            padding: 20px;
            color: #333;
            border-bottom: 1px solid #eee;
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

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge.scheduled {
            background: #d4edda;
            color: #155724;
        }

        .badge.completed {
            background: #cce5ff;
            color: #004085;
        }

        .badge.cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #28a745;
        }

        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-overlay.hidden {
            display: none !important;
        }

        .modal-content {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            color: #999;
            border: none;
            background: none;
        }

        .modal-close:hover {
            color: #333;
        }

        .dashboard-content {
            transition: opacity 0.3s ease;
        }

        .dashboard-content.hidden {
            display: none;
        }

    </style>

    <!-- Stats Cards -->
    <div class="stats-container">
        <div class="stat-card doctors">
            <h3>Total Doctors</h3>
            <div class="number">{{ $totalDoctors }}</div>
        </div>
        <div class="stat-card departments">
            <h3>Total Departments</h3>
            <div class="number">{{ $totalDepartments }}</div>
        </div>
        <div class="stat-card appointments">
            <h3>Total Appointments</h3>
            <div class="number">{{ $totalappointments }}</div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
       <a href="{{ route('doctors.create') }}" class="action-btn">+ Add Doctors</a>
        <a href="{{ route('departments.create') }}" class="action-btn">+ Add Departments</a>
        <a href="{{ route('appointments.create') }}" class="action-btn">+ Add Appointments</a>
        
    </div>

@endsection
