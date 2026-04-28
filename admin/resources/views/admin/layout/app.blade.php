@include('admin.components.sidebar')

<div class="main-content">

    <div class="header">
        <h1>Welcome, Admin</h1>
        <div style="display: flex; gap: 15px; align-items: center;">
            <button id="themeToggle" class="theme-toggle-btn" onclick="toggleTheme()" title="Toggle Theme">
                <span id="themeIcon">🌙</span>
            </button>
            <a href="javascript:void(0);" onclick="showLogoutModal()" class="logout-btn">Logout</a>
        </div>
    </div>

    @yield('content')

    <!-- Logout Modal -->
    <div id="logoutModal" class="logout-modal">
        <div class="logout-modal-content">
            <h2>Logout Confirmation </h2>
            <p>Are you sure to logout?</p>
            <div class="logout-modal-buttons">
                <a href="{{ route('login') }}" class="logout-modal-btn confirm-logout">Logout</a>
                <button class="logout-modal-btn cancel-logout" onclick="closeLogoutModal()">Cancel</button>
            </div>
        </div>
    </div>

</div>

    <style>
        :root {
            --bg-primary: #f5f5f5;
            --bg-secondary: #ffffff;
            --text-primary: #333333;
            --text-secondary: #666666;
            --border-color: #dddddd;
            --table-bg: #f9f9f9;
            --table-hover: #f9f9f9;
            --header-bg: #ffffff;
            --sidebar-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --input-bg: #ffffff;
            --input-border: #dddddd;
        }

        :root[data-theme="dark"] {
            --bg-primary: #1e1e1e;
            --bg-secondary: #2d2d2d;
            --text-primary: #e0e0e0;
            --text-secondary: #b0b0b0;
            --border-color: #444444;
            --table-bg: #3a3a3a;
            --table-hover: #444444;
            --header-bg: #2d2d2d;
            --sidebar-bg: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            --input-bg: #3d3d3d;
            --input-border: #555555;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            display: flex;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Theme Toggle Button */
        .theme-toggle-btn {
            background: var(--bg-secondary);
            border: 2px solid var(--border-color);
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.3s ease;
            color: var(--text-primary);
        }

        .theme-toggle-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: var(--sidebar-bg);
            color: white;
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
            left: 0;
            top: 0;
            transition: background 0.3s ease;
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

        /* Submenu Styles */
        .submenu {
            display: none;
            background: rgba(0,0,0,0.1);
            padding: 0;
        }

        .submenu a {
            padding: 12px 45px;
            font-size: 14px;
            border-left: none;
            display: block;
        }

        .submenu a:hover {
            background: rgba(255,255,255,0.1);
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
            transition: background-color 0.3s ease;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: var(--header-bg);
            color: var(--text-primary);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .header h1 {
            color: var(--text-primary);
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
            background: var(--bg-secondary);
            color: var(--text-primary);
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-left: 4px solid;
            transition: background-color 0.3s ease, color 0.3s ease;
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
            color: var(--text-secondary);
            font-size: 14px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .stat-card .number {
            font-size: 32px;
            font-weight: bold;
            color: var(--text-primary);
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
            background: var(--bg-secondary);
            color: var(--text-primary);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .table-container h3 {
            padding: 20px;
            color: var(--text-primary);
            border-bottom: 1px solid var(--border-color);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: var(--table-bg);
            padding: 15px;
            text-align: left;
            color: var(--text-secondary);
            font-weight: 600;
            border-bottom: 2px solid var(--border-color);
        }

        table td {
            padding: 15px;
            color: var(--text-primary);
            border-bottom: 1px solid var(--border-color);
        }

        table tr:hover {
            background: var(--table-hover);
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
            color: var(--text-primary);
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--input-border);
            background: var(--input-bg);
            color: var(--text-primary);
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
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
            background: var(--table-bg);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }

        .btn-cancel:hover {
            background: var(--input-bg);
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
            background-color: var(--bg-secondary);
            color: var(--text-primary);
            margin: 10% auto;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            position: relative;
        }

        /* Logout Modal Styles */
        .logout-modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            animation: fadeIn 0.3s ease-in-out;
        }

        .logout-modal.show {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logout-modal-content {
            background-color: var(--bg-secondary);
            color: var(--text-primary);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: slideUp 0.4s ease-out;
            max-width: 400px;
        }

        .logout-modal-content h2 {
            color: var(--text-primary);
            margin-bottom: 15px;
            font-size: 24px;
        }

        .logout-modal-content p {
            color: var(--text-secondary);
            margin-bottom: 30px;
            font-size: 16px;
        }

        .logout-modal-buttons {
            display: flex;
            gap: 10px;
        }

        .logout-modal-btn {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s;
            font-weight: 600;
        }

        .confirm-logout {
            background: #e74c3c;
            color: white;
        }

        .confirm-logout:hover {
            background: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.4);
        }

        .cancel-logout {
            background: #95a5a6;
            color: white;
        }

        .cancel-logout:hover {
            background: #7f8c8d;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(149, 165, 166, 0.4);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
    <script>
        // Theme Toggle Functionality
        function initTheme() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
            updateThemeIcon(savedTheme);
        }

        function toggleTheme() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        }

        function updateThemeIcon(theme) {
            const themeIcon = document.getElementById('themeIcon');
            themeIcon.textContent = theme === 'light' ? '🌙' : '☀️';
        }

        // Initialize theme on page load
        document.addEventListener('DOMContentLoaded', function() {
            initTheme();
        });

        // Logout Modal Functions
        function showLogoutModal() {
            const modal = document.getElementById('logoutModal');
            modal.classList.add('show');
        }

        function closeLogoutModal() {
            const modal = document.getElementById('logoutModal');
            modal.classList.remove('show');
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('logoutModal');
            if (event.target === modal) {
                closeLogoutModal();
            }
        }
    </script>