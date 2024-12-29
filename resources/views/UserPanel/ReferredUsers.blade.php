<style>
    /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    /* Styling for table header */
    th {
        background-color: #4CAF50;
        color: white;
    }

    /* Alternate row colors using nth-child */
    tr:nth-child(even) {
        background-color: #f2f2f2;
        /* Light gray for even rows */
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
        /* White for odd rows */
    }
</style>

<div class="container-fluid py-2">
    <div class="card">
        <div class="card-body">
            <div class="container mt-4">
                <h3 class="mb-4">All Users</h3>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Download CSV Button -->
                <div class="mt-4">
                    <a href="{{ route('users.download') }}" class="btn btn-primary">Download Users List</a>
                </div>

                <!-- Pagination -->
                
            </div>
        </div>
    </div>
</div>
