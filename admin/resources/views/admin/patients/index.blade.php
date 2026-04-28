@extends('admin.layout.app')

@section('content')
<style>
    .table-container {
        width: 130%;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        overflow: hidden;
        margin-left: -215px;
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
</style>

<div class="main-content">
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    <div class="header">
        <h1>Patients</h1>
        <a href="{{ route('patients.create') }}" class="btn-add">+ Add Patient</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($patients as $patient)
                    <tr>
                        <td>{{ $patient->user->name }}</td>
                        <td>{{ $patient->user->email }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>{{ $patient->date_of_birth ? $patient->date_of_birth->format('Y-m-d') : 'N/A' }}</td>
                        <td>{{ $patient->address ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('patients.edit', $patient->id) }}" style="color: #667eea;">Edit</a> |
                            <form method="POST" action="{{ route('patients.destroy', $patient->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" style="background: none; border: none; color: #e74c3c; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-message">No patients found. <a href="{{ route('patients.create') }}">Add one now</a></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
