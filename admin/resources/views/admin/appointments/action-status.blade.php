@extends('admin.layout.app')

@section('content')
<style>
    .action-status-container {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-top: 20px;
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
        margin: 0;
    }

    .back-btn {
        background: #6c757d;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .back-btn:hover {
        background: #5a6268;
    }

    .success-message {
        background: #d4edda;
        color: #155724;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        border-left: 4px solid #28a745;
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

    .checkbox-group {
        display: flex;
        gap: 20px;
        align-items: center;
        flex-wrap: wrap;
    }

    .checkbox-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .checkbox-wrapper input[type="radio"] {
        cursor: pointer;
        width: 18px;
        height: 18px;
    }

    .checkbox-wrapper label {
        cursor: pointer;
        margin: 0;
        font-weight: 500;
    }

    .status-label-scheduled {
        color: #004085;
    }

    .status-label-completed {
        color: #155724;
    }

    .status-label-not-came {
        color: #721c24;
    }

    .update-btn {
        background: #28a745;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        font-size: 12px;
    }

    .update-btn:hover {
        background: #218838;
    }

    .current-status {
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

    .status-not-came {
        background: #f8d7da;
        color: #78121c;
    }

    .empty-message {
        text-align: center;
        padding: 40px;
        color: #999;
    }

    .doctor-info {
        font-size: 12px;
        color: #666;
    }

    .form-group {
        margin-bottom: 0;
    }
</style>

<div style="margin-left: 250px; padding: 30px;">
    <div class="header">
        <h1>Action Status - Change Appointment Status</h1>
        <a href="{{ route('appointments.index') }}" class="back-btn">← Back to Appointments</a>
    </div>

    @if(session('success'))
        <div class="success-message" id="successMessage">
            {{ session('success') }}
        </div>
    @endif

    <div class="action-status-container">
        <table>
            <thead>
                <tr>
                    <th style="width: 20%;">Patient Name</th>
                    <th style="width: 15%;">Doctor</th>
                    <th style="width: 15%;">Date</th>
                    <th style="width: 15%;">Current Status</th>
                    <th style="width: 35%;">Change Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                    @php
                        $currentStatus = $appointment->getCurrentStatus();
                        $statusClass = 'status-scheduled';
                        if ($currentStatus == 'Completed') $statusClass = 'status-completed';
                        elseif ($currentStatus == 'Not Came') $statusClass = 'status-not-came';
                    @endphp
                    <tr>
                        <td>
                            <strong>{{ $appointment->patient_name }}</strong>
                            <div class="doctor-info">📧 {{ $appointment->patient_email }}</div>
                            <div class="doctor-info">📱 {{ $appointment->patient_mobile }}</div>
                        </td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                            <div class="doctor-info">{{ $appointment->available_time }}</div>
                        </td>
                        <td>
                            <span class="current-status {{ $statusClass }}">{{ $currentStatus }}</span>
                        </td>
                        <td>
                            <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST" class="form-group">
                                @csrf
                                <div class="checkbox-group">
                                    <div class="checkbox-wrapper">
                                        <input type="radio" id="scheduled_{{ $appointment->id }}" 
                                               name="status" value="Scheduled"
                                               {{ $currentStatus == 'Scheduled' ? 'checked' : '' }}>
                                        <label for="scheduled_{{ $appointment->id }}" class="status-label-scheduled">Scheduled</label>
                                    </div>

                                    <div class="checkbox-wrapper">
                                        <input type="radio" id="completed_{{ $appointment->id }}" 
                                               name="status" value="Completed"
                                               {{ $currentStatus == 'Completed' ? 'checked' : '' }}>
                                        <label for="completed_{{ $appointment->id }}" class="status-label-completed">Completed</label>
                                    </div>

                                    <div class="checkbox-wrapper">
                                        <input type="radio" id="not_came_{{ $appointment->id }}" 
                                               name="status" value="Not Came"
                                               {{ $currentStatus == 'Not Came' ? 'checked' : '' }}>
                                        <label for="not_came_{{ $appointment->id }}" class="status-label-not-came">cancel</label>
                                    </div>

                                    <button type="submit" class="update-btn">Update</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-message">No appointments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div style="margin-top: 30px;">
        {{ $appointments->links() }}
    </div>
</div>

<script>
// Auto-hide success message after 3 seconds
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
        }, 3000);
    }
});
@endif
</script>

@endsection
