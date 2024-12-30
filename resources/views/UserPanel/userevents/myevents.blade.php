<div class="container-fluid py-2">
    <div class="container">
        <div class="row">
            @foreach($Event as $data)
            @if(isset($data))
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/event_images/' . $data->image_path) }}"
                        class="card-img-top"
                        alt="Event Image"
                        style="padding: 12px; border-radius: 18px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $data->event_name }} <br>
                            Guest :- {{ $data->guest_names }}<br>
                            Date :- {{ $data->event_date }}<br>
                            Speaker :- {{ $data->speaker_name }}<br>
                        </h5>
                        <p class="card-text">{{ $data->description }}</p>
                    </div>

                    {{-- Check if the event has a corresponding PaymentHistory with status == 2 --}}
                    @php
                    $paymentHistoryForEvent = $PaymentHistory->where('event_id', $data->id)->first();
                    @endphp

                    @if($paymentHistoryForEvent && $paymentHistoryForEvent->status == 2)
                    <div class="card-footer text-center">
                        <a href="{{ route('eventtraning', $data->id) }}">
                            <button class="btn btn-primary" data-event-id="{{ $data->id }}">Start Learning</button>
                        </a>
                    </div>
                    @else
                    <div class="card-footer text-center">
                        <h3 class="btn btn-primary">We are processing your payment<br> Status Update Shortly</h3>
                    </div>
                    @endif

                </div>
            </div>
            @endif
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
                    @if($createEvent && $createEvent->isNotEmpty())
                    <div class="create-event-card text-center">
                        <a href="{{route('userevent')}}">
                            <div>
                                <div class="plus-icon">+</div>
                                <div class="create-event-text">
                                    CREATE NEW <span class="highlight">EVENT</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @else
                    <div class="create-event-card text-center">
                        <div>
                            <div class="plus-icon">^^</div>
                            <div class="create-event-text">
                                Complete a course or event first before <br>creating a new <span class="highlight">event</span>.
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row g-1"> <!-- g-4 will add spacing between columns -->

        @if($userEvents && $userEvents->isNotEmpty())
        <h3>My Events</h3>
        @endif
        <div class="row g-1">
            @foreach($userEvents as $data)
            <div class="col-lg-6">
                <div class="card" style="min-height: 223px;">
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <i class="fa fa-share"></i>
                                <div class="col-md-6 custom-card">
                                    <h4 class="fontsize">{{ $data->event_name }}</h4>
                                    <p class="description fontsize">{{ $data->description }}</p>
                                    @if($data->status == 2)
                                    <a href="{{ route('viewUserEvent',  $data->id ) }}">
                                        <button class="btn join-btn">View Event</button>
                                    </a>
                                    <a href="{{ route('event.edit', $data->id) }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('event.delete', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    @else
                                    <h4 class="btn join-btn">Event Under Process</h4>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="program-card">
                                        <img src="{{ asset('storage/event_images/' . $data->image_path) }}"
                                            class="card-img-top"
                                            alt="Event Image"
                                            style="padding: 12px; border-radius: 18px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    