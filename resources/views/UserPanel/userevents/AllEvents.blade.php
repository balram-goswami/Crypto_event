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

    <div class="row g-1"> <!-- g-4 will add spacing between columns -->
        
        <h3 style="color: red;">Hello {{ $currentUser->name }} </h3>
        @if($adminEvents && $adminEvents->isNotEmpty())
        <h3>Events By Admin</h3>
        @endif
        <div class="row g-1">
            @foreach($adminEvents as $data)
            <div class="col-lg-6">
                <div class="card" style="min-height: 223px;">
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-6 custom-card">
                                    <?php
                                    $username = DB::table('admins')
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

                                    @php

                                    $paymentHistoryForEvent = null;

                                    // Ensure $PaymentHistory is not null before querying further
                                    if ($PaymentHistory && $PaymentHistory->isNotEmpty()) {
                                    $paymentHistoryForEvent = $PaymentHistory->where('event_id', $data->id)->first();
                                    }
                                    @endphp
                                    @if($paymentHistoryForEvent && $paymentHistoryForEvent->status == 2)
                                    <a href="{{ route('courespaymentpage', $data->id) }}">
                                        <button class="btn join-btn">View Event</button>
                                    </a>
                                    @elseif($paymentHistoryForEvent === NULL)
                                    <a href="{{ route('courespaymentpage', $data->id) }}">
                                        <button class="btn join-btn">View Event</button>
                                    </a>
                                    @else
                                    <div class="card-footer text-center">
                                        <h3 class="btn btn-primary">We are processing your payment<br> Status Update Shortly</h3>
                                    </div>
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