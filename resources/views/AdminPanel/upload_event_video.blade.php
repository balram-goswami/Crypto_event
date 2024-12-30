<style>
        .form-select {
            border: 1px solid #ced4da; /* Default Bootstrap border color */
            border-radius: 4px; /* Rounded edges for better appearance */
            padding: 0.375rem 0.75rem; /* Adjust padding for a consistent look */
            background-color: #fff; /* Ensure the background is white */
        }
    
        .form-select:focus {
            border-color: #80bdff; /* Change border color on focus */
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Add focus shadow */
        }
    </style>
    
    <div class="container-fluid py-2">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h2 class="mb-4"><strong>Upload</strong> Event Video</h2>
                    <!-- Update the form action to point to your route, method to POST, and add enctype for file uploads -->
                    <form action="{{ route('uploadVideo') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <!-- Image Upload -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="uploadImage" class="form-label">Upload Video</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="file" class="form-control" name="image" id="uploadImage">
                                </div>
                            </div>
                        </div>
    
                        <!-- Event Name -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="eventName" class="form-label">Event Title</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" class="form-control" name="event_name" id="eventName" placeholder="Event Name" required>
                                </div>
                            </div>
                        
    
                        <!-- Event Date -->
                      
                        <div class="col-md-6">
                            <label for="eventType" class="form-label">Type of Event</label>
                            <div class="input-group mb-3"> <!-- Removed input-group-outline -->
                                <select class="form-select" name="event_type" id="eventType" required>
                                    <option selected disabled>Select Event Type</option>
                                    @foreach ($event as $type)
                                        <option value="{{ $type->id }}">{{ $type->event_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        </div>
    
                      
                       
    
                      
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Upload Video </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    