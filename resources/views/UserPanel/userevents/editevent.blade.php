<div class="container-fluid py-2">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h2 class="mb-4"><strong>Create</strong> Event</h2>
                <!-- Update the form action to point to your route, method to POST, and add enctype for file uploads -->
                <form action="{{ route('update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Image Upload -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="uploadImage" class="form-label">Upload Image</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="file" class="form-control" name="image" id="uploadImage">
                                @if($event->image)
                                <img src="{{ asset('storage/event_images/' . $event->image) }}" alt="Event Image" width="100">
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Event Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="eventName" class="form-label">Event Name</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" name="event_name" id="eventName" placeholder="Event Name" value="{{ old('event_name', $event->event_name) }}" required>
                            </div>
                        </div>

                        <!-- Event Date -->
                        <div class="col-md-6">
                            <label for="eventDate" class="form-label">Event Date</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="date" class="form-control" name="event_date" id="eventDate" value="{{ old('event_date', $event->event_date) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Guest Names -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="guestNames" class="form-label">Guest Names</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" name="guest_names" id="guestNames" placeholder="Write Multiple Guest Names" value="{{ old('guest_names', $event->guest_names) }}">
                            </div>
                        </div>

                        <!-- Speaker Name -->
                        <div class="col-md-6">
                            <label for="speakerName" class="form-label">Speaker</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" name="speaker_name" id="speakerName" placeholder="Speaker Name" value="{{ old('speaker_name', $event->speaker_name) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="location" class="form-label">Location</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" name="location" id="location" placeholder="Event Location with Full Address" value="{{ old('location', $event->location) }}" required>
                            </div>
                        </div>

                        <!-- Event Type -->
                        <div class="col-md-6">
                            <label for="eventType" class="form-label">Type of Event</label>
                            <div class="input-group input-group-outline mb-3">
                                <select class="form-select" name="event_type" id="eventType" required>
                                    <option selected disabled>Select Event Type</option>
                                    @foreach ($EventType as $type)
                                    <option value="{{ $type->id }}" {{ $type->id == $event->event_type ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <div class="input-group input-group-outline mb-3">
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Write Description Of Event">{{ old('description', $event->description) }}</textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Event</button>
                </form>

            </div>
        </div>
    </div>
</div>