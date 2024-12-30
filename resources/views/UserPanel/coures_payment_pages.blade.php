<div class="container-fluid py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/event_images/' . $eventInfo->image_path) }}"
                        class="card-img-top"
                        alt="Event Image"
                        style="padding: 12px; border-radius: 18px;">
                    <div class="card-body ">
                        <h5 class="card-title">
                            {{ $eventInfo->event_name }} <br>
                            <span class="text-highlight">
                            Guest :- {{ $eventInfo->guest_names }}</span><br>
                            Date :- {{ $eventInfo->event_date }}<br>
                            Speaker :- {{ $eventInfo->speaker_name }}<br>
                            Event Type :- {{ $eventtypename->name }}
                        </h5>
                        <p class="card-text">{{ $eventInfo->description }}</p>
                    </div>

                    {{-- Check if the event has a corresponding PaymentHistory with status == 2 --}}
                    @php
                    $paymentHistoryForEvent = $PaymentHistory->where('event_id', $eventInfo->id)->first();
                    @endphp

                    @if($paymentHistoryForEvent && $paymentHistoryForEvent->status == 2)
                    <div class="card-footer text-center">
                        <a href="{{ route('eventtraning', ['id' => $eventInfo->id]) }}">
                            <button class="btn btn-primary" data-event-id="{{ $eventInfo->id }}">Start Learning</button>
                        </a>

                    </div>
                    @else
                    <div class="card-footer text-center">
                        <button class="btn btn-primary pay-now-btn" data-event-id="{{ $eventInfo->id }}">Pay With USDT</button>
                        <button class="btn btn-secondary pay-crypto-btn" data-event-id="{{ $eventInfo->id }}">Pay With Crypto</button>
                    </div>
                    @endif
                </div>
            </div>


            <!-- Pay Now Modal -->
            <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Make a Payment With INR</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('PaymentHistory.store') }}" method="POST">
                                @csrf
                                <input type="hidden" id="eventId" name="event_id">
                                <input type="hidden" id="payment_method" name="payment_method" value="1">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <div class="input-group input-group-outline">
                                        <input type="number" class="form-control" id="amount" name="amount" value="{{ $eventInfo->payment_one }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="transactionId">Transaction ID</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" class="form-control" id="transactionId" name="transaction_id" placeholder="Enter Transaction Id after Payment" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="submitPayment">Submit</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Pay With Crypto Modal -->
            <div class="modal fade" id="cryptoPaymentModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pay With USDT</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('PaymentHistory.store') }}" method="POST">
                                @csrf
                                <!-- Hidden Fields -->
                                <input type="hidden" id="cryptoEventId" name="event_id">
                                <input type="hidden" id="payment_method" name="payment_method" value="2">

                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <div class="input-group input-group-outline">
                                        <input type="number" class="form-control" id="amount" name="amount" value="{{ $eventInfo->payment_two }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="transactionId">Transaction ID</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" class="form-control" id="transactionId" name="transaction_id" placeholder="Enter Transaction Id after Payment" required>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary">Pay With Crypto</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    // Ensure DOM is fully loaded
    document.addEventListener('DOMContentLoaded', () => {
        // Handle Pay Now button clicks
        document.querySelectorAll('.pay-now-btn').forEach(button => {
            button.addEventListener('click', function() {
                const eventId = this.getAttribute('data-event-id');
                document.getElementById('eventId').value = eventId; // Set event ID in hidden input
                document.getElementById('payment_method').value = 1; // Set payment method to '1' for Pay Now
                $('#paymentModal').modal('show'); // Show the modal
            });
        });

        document.querySelectorAll('.pay-crypto-btn').forEach(button => {
            button.addEventListener('click', function() {
                const eventId = this.getAttribute('data-event-id');
                document.getElementById('cryptoEventId').value = eventId; // Set event ID in hidden input
                document.getElementById('payment_method').value = 2; // Ensure method value is set
                $('#cryptoPaymentModal').modal('show'); // Show the modal
            });
        });

    });
</script>