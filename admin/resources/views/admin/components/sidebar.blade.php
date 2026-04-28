<!-- Sidebar Component -->
<div class="sidebar">
    <h2>Hospital ERP</h2>
    <ul>
        <li><a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a></li>
        <li><a href="javascript:void(0);" onclick="toggleDoctors()" class="active">Manage Doctors</a>
            <div class="submenu" id="doctorMenu">
                <a href="{{ route('doctors.create') }}">➕ Add Doctor</a>
                <a href="{{ route('doctors.index') }}">👁️ Show Doctors</a>
            </div>
        </li>
        <li><a href="javascript:void(0);" onclick="toggleDepartments()" class="active">Manage Departments</a>
            <div class="submenu" id="deptMenu">
                <a href="{{ route('departments.create') }}">➕ Add Department</a>
                <a href="{{ route('departments.index') }}">👁️ Show Departments</a>
            </div>
        </li>
        <li><a href="javascript:void(0);" onclick="togglePatients()" class="active">Manage Patients</a>
            <div class="submenu" id="patientMenu">
                <a href="{{ route('patients.create') }}">➕ Add Patient</a>
                <a href="{{ route('patients.index') }}">👁️ Show Patients</a>
                <a href="{{ route('patient-problems.index') }}">📋 Patient Problems</a>
            </div>
        </li>
       <li><a href="javascript:void(0);" onclick="toggleAppointments()" class="active">Appointments</a>
            <div class="submenu" id="appmenu">
                <a href="{{ route('appointments.create') }}">➕ Add Appointment</a>
                <a href="{{ route('appointments.index') }}">👁️ Show Appointments</a>
                <a href="{{ route('appointments.actionStatus') }}">📊 Action Status</a>
            </div>
        </li>
    </ul>
</div>

<script>
    function toggleDoctors() {
        var menu = document.getElementById('doctorMenu');
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    }
    function toggleDepartments() {
        var menu = document.getElementById('deptMenu');
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    }
    function togglePatients() {
        var menu = document.getElementById('patientMenu');
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    }
     function toggleAppointments() {
        var menu = document.getElementById('appmenu');
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    }
</script>
