@extends('admin.layout.app')

@section('content')

<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f6f9;
}

.container {
    max-width: 1100px;
    margin: 40px auto;
    padding: 20px;
}

/* Header */
.header h1 {
    font-size: 28px;
    color: #333;
}
.header p {
    color: #777;
    margin-top: 5px;
}

/* Filters */
.filters {
    margin: 20px 0;
}
.filters a {
    display: inline-block;
    padding: 8px 15px;
    margin-right: 5px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
}
.filter-all { background: #ddd; color: #333; }
.filter-pending { background: #ffc107; color: #fff; }
.filter-progress { background: #007bff; color: #fff; }
.filter-resolved { background: #28a745; color: #fff; }

/* Table */
.table-box {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    overflow: hidden;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #f1f1f1;
}

th, td {
    padding: 12px 15px;
    text-align: left;
}

tr {
    border-top: 1px solid #eee;
}

tr:hover {
    background: #fafafa;
}

/* Status badges */
.badge {
    padding: 4px 10px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: bold;
}
.pending { background: #fff3cd; color: #856404; }
.progress { background: #d1ecf1; color: #0c5460; }
.resolved { background: #d4edda; color: #155724; }

/* Button */
.btn-view {
    padding: 5px 10px;
    background: #00bcd4;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    font-size: 13px;
}
.btn-view:hover {
    background: #0097a7;
}

/* Empty */
.empty {
    text-align: center;
    padding: 20px;
    color: #777;
}

/* Pagination spacing */
.pagination {
    margin-top: 20px;
}
</style>

<div class="container">

    <!-- Header -->
    <div class="header">
        <h1>Patient Messages</h1>
        <p>Manage all patient inquiries</p>
    </div>

    <!-- Filters -->
    <div class="filters">
        <a href="{{ route('patient-problems.index') }}" class="filter-all">All</a>
    </div>

    <!-- Table -->
    <div class="table-box">
        <table>

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($problems as $problem)
                <tr>

                    <td><strong>{{ $problem->name }}</strong></td>
                    <td>{{ $problem->email }}</td>
                    <td>{{ ucfirst(str_replace('_',' ', $problem->subject)) }}</td>

                    <td>
                        @if($problem->status == 'pending')
                            <span class="badge pending">Pending</span>
                        @elseif($problem->status == 'in_progress')
                            <span class="badge progress">In Progress</span>
                        @else
                            <span class="badge resolved">Resolved</span>
                        @endif
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($problem->created_at)->format('d M Y') }}
                    </td>

                    <td style="text-align:center;">
                        <a href="{{ route('patient-problems.show', $problem->id) }}" class="btn-view">
                            View
                        </a>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="empty">No data found</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        {{ $problems->links() }}
    </div>

</div>

@endsection