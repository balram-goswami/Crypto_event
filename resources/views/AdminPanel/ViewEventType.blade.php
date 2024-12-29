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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold py-3 mb-0 pull-left">Events Types</h4>
                    <a href="{{route('admin.createEventType')}}"><button type="button" class="btn btn-primary">Add Event Type</button></a>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Error Message -->
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <!-- Event Types Table -->
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($EventType as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->description }}</td>
                            <td>
                                <form action="{{ route('admin.destroyEventType.delete', $data->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                    @csrf
                                    @method('DELETE') <!-- Spoofing the DELETE method -->
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>