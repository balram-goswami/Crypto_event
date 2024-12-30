<div class="container-fluid py-2">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h2 class="mb-4"><strong>Create</strong> Event</h2>
                <!-- Update the form action to point to your route, method to POST, and add enctype for file uploads -->
                <form action="{{ route('admin.create_event') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Image Upload -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="uploadImage" class="form-label">Upload Image</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="file" class="form-control" name="image" id="uploadImage">
                            </div>
                        </div>
                    </div>

                    <!-- Event Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="eventName" class="form-label">Event Name</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" name="event_name" id="eventName" placeholder="Event Name" required>
                            </div>
                        </div>


                        <!-- Event Date -->

                        <div class="col-md-6">
                            <label for="eventDate" class="form-label">Event Date</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="date" class="form-control" name="event_date" id="eventDate" required>
                            </div>
                        </div>
                    </div>

                    <!-- Guest Names -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="guestNames" class="form-label">Guest Names</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" name="guest_names" id="guestNames" placeholder="Write Multiple Guest Names">
                            </div>
                        </div>

                        <!-- Speaker Name -->
                        <div class="col-md-6">
                            <label for="speakerName" class="form-label">Speaker</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" name="speaker_name" id="speakerName" placeholder="Speaker Name">
                            </div>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="location" class="form-label">Location</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" name="location" id="location" placeholder="Event Location with Full Address" required>
                            </div>
                        </div>

                        <!-- Event Type -->
                        <div class="col-md-6">
                            <label for="eventType" class="form-label">Type of Event</label>
                            <div class="input-group input-group-outline mb-3">
                                <select class="form-select" name="event_type" id="eventType" required>
                                    <option selected disabled>Select Event Type</option>
                                    @foreach ($EventType as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="payment_one" class="form-label">Amount In INR*</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" name="payment_one" id="payment_one" placeholder="Enter Amount of event ( in INR )" required>
                            </div>
                        </div>

                        <!-- Event Type -->
                        <div class="col-md-6">
                            <label for="payment_two" class="form-label">Amount In USDT*</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" name="payment_two" id="payment_two" placeholder="Enter Amount of event ( in USDT )" required>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <div class="input-group input-group-outline mb-3">
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Write Description Of Event"></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Create Event</button>
                </form>
            </div>
        </div>
    </div>
</div>