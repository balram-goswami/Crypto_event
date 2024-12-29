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
<!-- End Navbar -->
<div class="container-fluid py-2">
    <div class="card">
        <div class="card-body">
            <div class="container mt-4">
                <h3 class="mb-4">Pending Payment Approvals</h3>


                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User name</th>
                                <th>Event name</th>
                                <th>Amount</th>
                                <th>Transaction</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($PaymentPending as $history)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $history->user->name }}</td>
                                <td>{{ $history->UserEvent->event_name }}</td>
                                <td>{{ $history->amount }}</td>
                                <td>{{ $history->transaction_id }}</td>
                                <td>{{ $history->type ? 'Pay now' : 'Pay with crypto' }}</td>
                                <td>{{ \Carbon\Carbon::parse($history->payment_date)->format('d/m/Y') }}</td>
                                <td>Pending</td>
                                <td>
                                    <!-- Accept Button -->
                                    <form action="{{ route('payment-history.accept', $history->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm">Approved</button>
                                    </form>

                                    <!-- Reject Button -->
                                    <form action="{{ route('payment-history.reject', $history->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $PaymentPending->links() }} <!-- Pagination Links -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-2">
    <div class="card">
        <div class="card-body">
            <div class="container mt-4">
                <h3 class="mb-4">Approved Payments</h3>


                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User name</th>
                                <th>Event name</th>
                                <th>Amount</th>
                                <th>Transaction</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($PaymentComplete as $history)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $history->user->name }}</td>
                                <td>{{ $history->UserEvent->event_name }}</td>
                                <td>{{ $history->amount }}</td>
                                <td>{{ $history->transaction_id }}</td>
                                <td>{{ $history->type ? 'Pay now' : 'Pay with crypto' }}</td>
                                <td>{{ \Carbon\Carbon::parse($history->payment_date)->format('d/m/Y') }}</td>
                                <td>Approved</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $PaymentComplete->links() }} <!-- Pagination Links -->
                </div>
            </div>
        </div>
    </div>
</div>