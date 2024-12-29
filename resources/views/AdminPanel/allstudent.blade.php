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
                            <th>Status</th>
                            <th>Created At</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if ($user->status == 1)
                            <td>Inactive</td>
                            @else
                            <td>Active</td>
                            @endif
                            @if ($user->status == 1)
                            <td>
                            <form action="{{ route('admin.activeUser', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input name="status" value="2" hidden>
                                    <button type="submit" class="btn btn-success">Active Now</button>
                                </form>
                            </td>
                            @else
                            <td>
                            <form action="{{ route('admin.activeUser', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input name="status" value="1" hidden>
                                    <button type="submit" class="btn btn-success">Inactive</button>
                                </form>
                            </td>
                            @endif
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $users->links() }} <!-- Pagination Links -->
                </div>
            </div>
        </div>
    </div>
</div>