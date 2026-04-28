@extends('admin.layout.app')

@section('content')
<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    margin: 0;
}

.container {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
}

.back-btn {
    display: inline-block;
    margin-bottom: 20px;
    color: #00bcd4;
    text-decoration: none;
    font-weight: bold;
}

.card {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.label {
    font-size: 13px;
    color: #777;
}

.value {
    font-size: 16px;
    font-weight: 600;
    color: #333;
}

.full {
    grid-column: span 2;
}

.message-box {
    background: #f1f3f5;
    padding: 15px;
    border-left: 4px solid #00bcd4;
    border-radius: 5px;
    margin: 20px 0;
}

.status-box {
    background: #eef6ff;
    padding: 10px;
    border-radius: 5px;
    margin-top: 15px;
}

.badge {
    padding: 4px 10px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: bold;
}

.pending { background: #fff3cd; color: #856404; }
.progress { background: #d1ecf1; color: #0c5460; }
.resolved { background: #d4edda; color: #155724; }

.form-group {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

select {
    flex: 1;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    padding: 8px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-update {
    background: #00bcd4;
    color: #fff;
}

.btn-delete {
    background: #dc3545;
    color: #fff;
    float: right;
    margin-top: 20px;
}
</style>

<div class="container">

    <a href="{{ route('patient-problems.index') }}" class="back-btn">← Back to Messages</a>

    @if(session('success'))
        <div style="color:green; margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="grid">

            <div>
                <div class="label">From Name</div>
                <div class="value">{{ $problem->name }}</div>
            </div>

            <div>
                <div class="label">Email</div>
                <div class="value">
                    <a href="mailto:{{ $problem->email }}">{{ $problem->email }}</a>
                </div>
            </div>

            <div>
                <div class="label">Phone</div>
                <div class="value">
                    {{ $problem->phone ?? 'Not provided' }}
                </div>
            </div>

            <div>
                <div class="label">Received Date</div>
                <div class="value">
                    {{ \Carbon\Carbon::parse($problem->created_at)->format('d M Y h:i A') }}
                </div>
            </div>

            <div class="full">
                <div class="label">Subject</div>
                <div class="value">{{ ucfirst(str_replace('_',' ', $problem->subject)) }}</div>
            </div>

        </div>

        <!-- Message -->
        <div class="message-box">
            {{ $problem->message }}
        </div>

        <!-- Update -->
        <form method="POST" action="{{ route('patient-problems.updateStatus', $problem->id) }}">
            @csrf
            <div class="form-group">
                <select name="status">
                    <option value="pending" {{ $problem->status=='pending'?'selected':'' }}>Pending</option>
                    <option value="in_progress" {{ $problem->status=='in_progress'?'selected':'' }}>In Progress</option>
                    <option value="resolved" {{ $problem->status=='resolved'?'selected':'' }}>Resolved</option>
                </select>

                <button class="btn-update">Update</button>
            </div>
        </form>

        <!-- Status -->
        <div class="status-box">
            <strong>Status:</strong>

            @if($problem->status=='pending')
                <span class="badge pending">Pending</span>
            @elseif($problem->status=='in_progress')
                <span class="badge progress">In Progress</span>
            @else
                <span class="badge resolved">Resolved</span>
            @endif
        </div>

    </div>

    <!-- Delete -->
    <form method="POST" action="{{ route('patient-problems.destroy', $problem->id) }}">
        @csrf
        @method('DELETE')
        <button class="btn-delete">Delete Message</button>
    </form>

</div>

@endsection