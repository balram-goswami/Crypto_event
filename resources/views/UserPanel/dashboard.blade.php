<div class="container-fluid py-2">
    <style>
        .dashboardbox {
            height: 192px;
            background: #00bcd491;
            border-radius: 9px;
            display: flex;
            align-items: center;
            margin-bottom: auto;
        }

        .fontsize {
            font-size: 12px;
        }
    </style>
    @if($userDetails->status === 2)
    <div class="row g-1"> <!-- g-4 will add spacing between columns -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 custom-card">
                                <h5 style="color: #6ED9E7;">Hello {{ $currentUser->name }} </h5>
                                <h4 class="fontsize">Gateway To Host Event For Crypque</h4>
                                <p class="description fontsize">
                                    This program helps you create events for your community after completing certification successfully.
                                </p>
                                <a href="{{ route('allevents') }}">
                                    <button class="btn join-btn">Join Program</button>
                                </a>
                            </div>
                            <div class="col-md-6 dashboardbox">
                                <div class="program-card">
                                    <h5>CRYPQUE EVENT CERTIFICATION PROGRAM 2024</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row g-1"> <!-- g-4 will add spacing between columns -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 custom-card">
                                <h5 style="color: #6ED9E7;">Hello {{ $currentUser->name }} </h5>
                                <h4 class="fontsize">Your Profile Under Review</h4>
                                <p class="description fontsize">
                                The admin will review your profile shortly and activate your account once the process is complete.
                                </p>
                            </div>
                            <div class="col-md-6 dashboardbox">
                                <div class="program-card">
                                    <h5>CRYPQUE EVENT CERTIFICATION PROGRAM 2024</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<div class="container-fluid py-2">
    <div class="row g-1"> <!-- g-4 will add spacing between columns -->
        @if($otherEvents && $otherEvents->isNotEmpty())
        <h3>Other Users Events</h3>
        @endif
        <div class="row g-1">
            @foreach($otherEvents as $data)
            <div class="col-lg-6">
                <div class="card" style="min-height: 223px;">
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-6 custom-card">
                                    <?php
                                    $username = DB::table('users')
                                        ->where('id', $data->user_id)
                                        ->value('name');
                                    $eventname = DB::table('event_types')
                                        ->where('id', $data->event_type)
                                        ->value('name');
                                    ?>

                                    <h4 class="fontsize">{{ $data->event_name }}</h4>
                                    <p class="description fontsize">{{ $data->description }}</p>
                                    <h4 class="fontsize">Event By:- {{ $username }}</h4>
                                    <h4 class="fontsize">Event Type:- {{ $eventname }}</h4>


                                    <a href="{{ route('shareEvent', $data->id) }}">
                                        <button class="btn join-btn">View Event</button>
                                    </a>

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
</div>