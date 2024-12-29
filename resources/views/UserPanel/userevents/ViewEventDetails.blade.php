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
                            Date :- {{ $eventDetail->event_date }}<br>
                            Speaker :- {{ $eventDetail->speaker_name }}<br>
                        </h5>
                        <p class="card-text">{{ $eventDetail->description }}</p>
                    </div>
                    <a id="shareEventButton" class="btn btn-primary" href="javascript:void(0)">Share Event</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Leads</h5>
                        <table id="leadsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $lead)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lead->name }}</td>
                                    <td>{{ $lead->email }}</td>
                                    <td>{{ $lead->phone }}</td>
                                    <td>{{ $lead->description }}</td> <!-- Assuming 'phone' is the column name -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button id="downloadBtn" class="btn btn-primary mt-3">Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('downloadBtn').addEventListener('click', function() {
        const table = document.getElementById('leadsTable');
        let csv = [];
        const rows = table.querySelectorAll('tr');

        rows.forEach(row => {
            const cols = row.querySelectorAll('th, td');
            let rowData = [];
            cols.forEach(col => rowData.push(col.textContent.trim()));
            csv.push(rowData.join(','));
        });

        const csvString = csv.join('\n');
        const blob = new Blob([csvString], {
            type: 'text/csv'
        });
        const url = URL.createObjectURL(blob);

        const a = document.createElement('a');
        a.href = url;
        a.download = 'leads.csv';
        a.style.display = 'none';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });
</script>


<script>
    document.getElementById('shareEventButton').addEventListener('click', function() {
        // The URL to be copied
        const eventUrl = "{{ route('shareEvent', $eventDetail->id) }}";

        // Copy to clipboard
        navigator.clipboard.writeText(eventUrl).then(function() {
            alert('Event link copied to clipboard!');
        }).catch(function(error) {
            console.error('Failed to copy the link: ', error);
        });
    });
</script>