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
    }

    .main-content {
        margin-left: 250px;
        padding: 30px;
        transition: margin-left 0.3s;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        background: #ffffff;
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        flex-wrap: wrap;
        gap: 15px;
    }

    h1 {
        font-size: 26px;
        color: #333;
        margin: 0;
        flex: 1;
        min-width: 200px;
    }

    .btn-add {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        padding: 10px 22px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
        white-space: nowrap;
    }

    .btn-add:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }

    .success-message {
        background: #d4edda;
        color: #155724;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        border-left: 4px solid #28a745;
        animation: fadeOut 5s ease-in-out forwards;
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

    .table-container {
        width: 100%;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        overflow-x: auto;
        margin-left: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 500px;
    }

    table th {
        background: #f8f9fa;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        color: #555;
    }

    table td {
        padding: 15px;
        border-top: 1px solid #eee;
    }

    table tr:hover {
        background: #f9f9f9;
    }

    .action-links {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
    }

    .action-links a {
        text-decoration: none;
        font-weight: 500;
    }

    .edit-link {
        color: #667eea;
    }

    .delete-btn {
        background: none;
        border: none;
        color: #e74c3c;
        cursor: pointer;
        font-weight: 500;
        padding: 0;
    }

    .empty-message {
        text-align: center;
        padding: 30px;
        color: #888;
    }

    /* Tablet Devices (768px to 1024px) */
    @media (max-width: 1024px) {
        .main-content {
            margin-left: 0;
            padding: 20px;
        }

        h1 {
            font-size: 22px;
        }

        .header {
            padding: 15px 20px;
        }

        .table-container {
            width: 100%;
        }

        table th, table td {
            padding: 12px;
            font-size: 14px;
        }

        .btn-add {
            padding: 8px 16px;
            font-size: 14px;
        }
    }

    /* Mobile Devices (max 768px) */
    @media (max-width: 768px) {
        .main-content {
            margin-left: 0;
            padding: 15px;
        }

        h1 {
            font-size: 20px;
            margin-bottom: 15px;
            width: 100%;
        }

        .header {
            flex-direction: column;
            align-items: stretch;
            padding: 15px;
        }

        .btn-add {
            width: 100%;
            text-align: center;
            padding: 12px;
        }

        .table-container {
            overflow-x: auto;
            width: 100%;
            margin: 0;
        }

        table {
            font-size: 12px;
            min-width: 400px;
        }

        table th, table td {
            padding: 10px;
        }

        .action-links {
            flex-direction: column;
            gap: 5px;
        }

        .action-links a,
        .delete-btn {
            display: block;
            padding: 6px 0;
        }

        .action-links a::after {
            content: '';
            display: none;
        }
    }

    /* Small Mobile Devices (max 480px) */
    @media (max-width: 480px) {
        .main-content {
            padding: 10px;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .header {
            padding: 10px;
            margin-bottom: 15px;
        }

        .btn-add {
            padding: 10px;
            font-size: 13px;
        }

        table {
            font-size: 11px;
            min-width: 300px;
        }

        table th, table td {
            padding: 8px;
        }

        .success-message {
            padding: 12px;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .empty-message {
            padding: 20px;
            font-size: 12px;
        }
    }
</style>

<div class="main-content">

    <!-- <div class="header">
        
        <a href="{{ route('departments.create') }}" class="btn-add">
            + Add Department
        </a>
    </div> -->
<h1>Departments</h1>
    @if(session('success'))
        <div class="success-message" id="successMessage">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->description ?? 'N/A' }}</td>
                        <td class="action-links">
                            <a href="{{ route('departments.edit', $department->id) }}" class="edit-link">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('departments.destroy', $department->id) }}"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="delete-btn"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="empty-message">
                            No departments found.
                            <a href="{{ route('departments.create') }}">Add one now</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
