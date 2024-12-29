<style>
    /* General Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        font-family: Arial, sans-serif;
        background-color: #ffffff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 14px 20px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    /* Header Styling */
    th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: bold;
    }

    /* Row Styling */
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }



    /* Responsive Table */
    @media (max-width: 768px) {
        table {
            font-size: 14px;
        }

        th,
        td {
            padding: 10px;
        }
    }
</style>


<div class="container-fluid py-2">
    <div class="card">
        <div class="card-body">
            <div class="container mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold py-3 mb-0 pull-left">List Of Event By Users</h4>
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
                            <th>User Name</th>
                            <th>Event Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $data)
                        <tr><?php
                                $username = DB::table('users')
                                    ->where('id', $data->user_id)
                                    ->value('name');
                                ?>
                            <td>{{ $data->id }}</td>
                            <td>{{ $username }}</td>
                            <td>{{ $data->event_name }}</td>
                            @if($data->status === 1)
                            <td style="color: #007BFF;">Pending</td>
                            @elseif($data->status === 2)
                            <td style="color: #4CAF50;">Approved</td>
                            @else
                            <td style="color: #b02a37;">Rejected</td>
                            @endif
                            <td>
                                @if($data->status === 2)
                                <a href="{{ route('admin.publishedEventReview', $data->id) }}" class="btn btn-danger">View</a>
                                <form action="{{ route('admin.publishEventDelete', $data->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @else
                                <a href="{{ route('admin.publishedEventReview', $data->id) }}" class="btn btn-danger">View</a>
                                <form action="{{ route('publishEventStatusUpdate', $data->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="2">
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form action="{{ route('publishEventStatusUpdate', $data->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to Reject this event?');">
                                    @csrf
                                    <input name="status" value="3" hidden>
                                    <button type="submit" class="btn btn-warning">Reject</button>
                                </form>
                                <form action="{{ route('admin.publishEventDelete', $data->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @endif

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