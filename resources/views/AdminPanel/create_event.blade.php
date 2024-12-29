<div class="container-fluid py-2">
    <div class="container">
        <div class="row">
            @foreach($Event as $event)
            <div class="col-lg-4 col-md-6 mb-4">

                <div class="card h-100">
                    <i class="fa fa-share"></i>
                    <img src="{{ asset('storage/event_images/' . $event->image_path) }}"
                        class="card-img-top"
                        alt="Event Image"
                        style="padding: 12px; border-radius: 18px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            {{ $event->event_name }} <span class="text-highlight">{{ $event->guest_names }}</span>
                            PROGRAM {{ $event->event_date }}<br>
                            Speaker {{ $event->speaker_name }}<br>
                            Event Type {{ $event->event_type }}
                        </h5>
                        <p class="card-text">{{ $event->description }}</p>
                    </div>
                    <div class="card-footer text-center d-flex justify-content-between">
                        <!-- Edit Button -->
                        <a href="{{ route('admin.eventedit', $event->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.eventdelete', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>


                    </div>
                </div>
            </div>
            @endforeach

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
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">

                    <div class="create-event-card text-center">
                        <a href="{{route('admin.showcreateevent')}}">
                            <div>
                                <div class="plus-icon">+</div>
                                <div class="create-event-text">
                                    CREATE NEW <span class="highlight">EVENT</span>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>