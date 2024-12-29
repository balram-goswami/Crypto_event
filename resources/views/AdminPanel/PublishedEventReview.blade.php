<style>
    .create-event-card {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 150px auto;
    }

    .plus-icon {
        font-size: 40px;
        color: #000;
    }

    .create-event-text {
        font-size: 16px;
        font-weight: bold;
        margin-top: 10px;
    }

    .highlight {
        color: #28c;
    }
</style>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/event_images/' . $eventDetail->image_path) }}"
                        class="card-img-top"
                        alt="Event Image"
                        height="200px"
                        width="100%"
                        style="padding: 12px; border-radius: 18px;">
                    <div class="card-body row">
                        <h5 class="card-title col-lg-6">
                            {{ $eventDetail->event_name }} <br>
                            Guest :- {{ $eventDetail->guest_names }}<br>
                            PROGRAM :- {{ $eventDetail->event_date }}<br>
                            Speaker :- {{ $eventDetail->speaker_name }}<br>
                        </h5>
                        <p class="card-text">{{ $eventDetail->description }}</p>
                    </div>
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
                            <tr>
                                <?php
                                $username = DB::table('users')
                                    ->where('id', $eventDetail->user_id)
                                    ->value('name');
                                ?>
                                <td>{{ $eventDetail->id }}</td>
                                <td>{{ $username }}</td>
                                <td>{{ $eventDetail->event_name }}</td>
                                @if($eventDetail->status === 1)
                                <td style="color: #007BFF;">Pending</td>
                                @elseif($eventDetail->status === 2)
                                <td style="color: #4CAF50;">Approved</td>
                                @else
                                <td style="color: #b02a37;">Rejected</td>
                                @endif
                                <td>
                                    @if($eventDetail->status === 2)
                                    
                                    <form action="{{ route('admin.publishEventDelete', $eventDetail->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @else
                                    
                                    <form action="{{ route('publishEventStatusUpdate', $eventDetail->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="status" value="2">
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                    <form action="{{ route('publishEventStatusUpdate', $eventDetail->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to Reject this event?');">
                                        @csrf
                                        <input name="status" value="3" hidden>
                                        <button type="submit" class="btn btn-warning">Reject</button>
                                    </form>
                                    <form action="{{ route('admin.publishEventDelete', $eventDetail->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>