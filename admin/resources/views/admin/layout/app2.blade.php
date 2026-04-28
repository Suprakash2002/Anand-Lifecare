@include('admin.components.sidebar')

<div class="main-content">

    <div class="header">
        <h1>Welcome, Admin</h1>
        <a href="{{ route('login') }}" class="logout-btn">Logout</a>
    </div>

    @yield('content')

</div>

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
            margin: 0 0 10px 0;
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

        /* Sidebar Select Dropdown */
        .sidebar-select {
            display: block;
            width: calc(100% - 50px);
            margin: 10px 25px;
            padding: 12px 15px;
            background: rgba(255,255,255,0.15);
            color: white;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
            font-family: inherit;
        }

        .sidebar-select:hover {
            background: rgba(255,255,255,0.25);
            border-color: rgba(255,255,255,0.5);
        }

        .sidebar-select:focus {
            outline: none;
            background: rgba(255,255,255,0.3);
            border-color: #fff;
            box-shadow: 0 0 0 2px rgba(255,255,255,0.2);
        }

        .sidebar-select option {
            background: #2c3e50;
            color: white;
            padding: 10px;
        }

        .sidebar-select option:hover {
            background: #667eea;
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
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
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

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
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
        .form-group.has-error select {
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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            position: relative;
        }
    </style>
