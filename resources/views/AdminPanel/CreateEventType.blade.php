<div class="container-fluid py-2">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h2 class="mb-4"><strong>Create</strong> Event</h2>
                <!-- Update the form action to point to your route, method to POST, and add enctype for file uploads -->
                <form action="{{ route('saveEventType') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Event Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Event Name</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Event Name" required>
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