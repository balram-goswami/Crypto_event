<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ publicPath('/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ publicPath('/assets/img/favicon.png')}}">
    <title>
        Crypque Event User Dashboard
    </title>

</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
    }

    .formbold-main-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px;
    }

    .formbold-form-wrapper {
        margin: 0 auto;
        max-width: 550px;
        width: 100%;
        background: white;
    }

    .formbold-event-wrapper span {
        font-weight: 500;
        font-size: 16px;
        line-height: 24px;
        letter-spacing: 2.5px;
        color: #6a64f1;
        display: inline-block;
        margin-bottom: 12px;
    }

    .formbold-event-wrapper h3 {
        font-weight: 700;
        font-size: 28px;
        line-height: 34px;
        color: #07074d;
        width: 60%;
        margin-bottom: 15px;
    }

    .formbold-event-wrapper h4 {
        font-weight: 600;
        font-size: 20px;
        line-height: 24px;
        color: #07074d;
        width: 60%;
        margin: 25px 0 15px;
    }

    .formbold-event-wrapper p {
        font-size: 16px;
        line-height: 24px;
        color: #536387;
    }

    .formbold-event-details {
        background: #fafafa;
        border: 1px solid #dde3ec;
        border-radius: 5px;
        margin: 25px 0 30px;
    }

    .formbold-event-details h5 {
        color: #07074d;
        font-weight: 600;
        font-size: 18px;
        line-height: 24px;
        padding: 15px 25px;
    }

    .formbold-event-details ul {
        border-top: 1px solid #edeef2;
        padding: 25px;
        margin: 0;
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        row-gap: 14px;
    }

    .formbold-event-details ul li {
        color: #536387;
        font-size: 16px;
        line-height: 24px;
        width: 50%;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .formbold-form-title {
        color: #07074d;
        font-weight: 600;
        font-size: 28px;
        line-height: 35px;
        width: 60%;
        margin-bottom: 30px;
    }

    .formbold-input-flex {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .formbold-input-flex>div {
        width: 50%;
    }

    .formbold-form-input {
        text-align: center;
        width: 100%;
        padding: 13px 22px;
        border-radius: 5px;
        border: 1px solid #dde3ec;
        background: #ffffff;
        font-weight: 500;
        font-size: 16px;
        color: #536387;
        outline: none;
        resize: none;
    }

    .formbold-form-input:focus {
        border-color: #6a64f1;
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .formbold-form-label {
        color: #536387;
        font-size: 14px;
        line-height: 24px;
        display: block;
        margin-bottom: 10px;
    }

    .formbold-policy {
        font-size: 14px;
        line-height: 24px;
        color: #536387;
        width: 70%;
        margin-top: 22px;
    }

    .formbold-policy a {
        color: #6a64f1;
    }

    .formbold-btn {
        text-align: center;
        width: 100%;
        font-size: 16px;
        border-radius: 5px;
        padding: 14px 25px;
        border: none;
        font-weight: 500;
        background-color: #6a64f1;
        color: white;
        cursor: pointer;
        margin-top: 25px;
    }

    .formbold-btn:hover {
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <div class="formbold-event-wrapper">
            <span>Shared Event</span>
            <h3>{{ $eventDetail->event_name }}</h3>
            <defs>
                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_1675_1746" transform="translate(0 -0.524787) scale(0.000379363 0.000864594)" />
                </pattern>
                <img src="{{ asset('storage/event_images/' . $eventDetail->image_path) }}"
                    class="card-img-top"
                    alt="Event Image"
                    height="auto"
                    width="100%"
                    style="padding: 12px; border-radius: 18px;">
                <h4>Event Description</h4>
                <p>{{ $eventDetail->description }}</p>

                <div class="formbold-event-details">
                    <h5>Event Details</h5>

                    <ul>
                        <li>
                            <svg
                                width="18"
                                height="18"
                                viewBox="0 0 18 18"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1675_1725)">
                                    <path
                                        d="M12.75 2.25H15.75C15.9489 2.25 16.1397 2.32902 16.2803 2.46967C16.421 2.61032 16.5 2.80109 16.5 3V15C16.5 15.1989 16.421 15.3897 16.2803 15.5303C16.1397 15.671 15.9489 15.75 15.75 15.75H2.25C2.05109 15.75 1.86032 15.671 1.71967 15.5303C1.57902 15.3897 1.5 15.1989 1.5 15V3C1.5 2.80109 1.57902 2.61032 1.71967 2.46967C1.86032 2.32902 2.05109 2.25 2.25 2.25H5.25V0.75H6.75V2.25H11.25V0.75H12.75V2.25ZM11.25 3.75H6.75V5.25H5.25V3.75H3V6.75H15V3.75H12.75V5.25H11.25V3.75ZM15 8.25H3V14.25H15V8.25Z"
                                        fill="#536387" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1675_1725">
                                        <rect width="18" height="18" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            {{ $eventDetail->event_date }}
                        </li>
                        <li>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                width="24"
                                height="24"
                                fill="currentColor">
                                <path
                                    d="M16 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zM8 11c2.21 0 4-1.79 4-4S10.21 3 8 3 4 4.79 4 7s1.79 4 4 4zm0 2c-1.33 0-2.63.18-3.76.49C3.07 14.08 2 15.34 2 16.81V19h12v-2.19c0-1.47-1.07-2.73-2.24-3.32C10.63 13.18 9.33 13 8 13z">
                                </path>
                            </svg>
                            {{ $eventDetail->speaker_name }}
                        </li>
                        <li>
                            <svg
                                width="18"
                                height="18"
                                viewBox="0 0 18 18"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1675_1730)">
                                    <path
                                        d="M9 17.7959L4.227 13.0229C3.28301 12.0789 2.64014 10.8762 2.3797 9.56683C2.11925 8.25746 2.25293 6.90026 2.76382 5.66687C3.27472 4.43347 4.13988 3.37927 5.24991 2.63757C6.35994 1.89588 7.66498 1.5 9 1.5C10.335 1.5 11.6401 1.89588 12.7501 2.63757C13.8601 3.37927 14.7253 4.43347 15.2362 5.66687C15.7471 6.90026 15.8808 8.25746 15.6203 9.56683C15.3599 10.8762 14.717 12.0789 13.773 13.0229L9 17.7959ZM12.7125 11.9624C13.4467 11.2282 13.9466 10.2927 14.1492 9.27435C14.3517 8.25596 14.2477 7.20039 13.8503 6.24111C13.4529 5.28183 12.78 4.46192 11.9167 3.88507C11.0533 3.30821 10.0383 3.00032 9 3.00032C7.96167 3.00032 6.94666 3.30821 6.08332 3.88507C5.21997 4.46192 4.54706 5.28183 4.14969 6.24111C3.75231 7.20039 3.64831 8.25596 3.85084 9.27435C4.05337 10.2927 4.55333 11.2282 5.2875 11.9624L9 15.6749L12.7125 11.9624ZM9 9.74994C8.60218 9.74994 8.22065 9.5919 7.93934 9.3106C7.65804 9.02929 7.5 8.64776 7.5 8.24994C7.5 7.85212 7.65804 7.47058 7.93934 7.18928C8.22065 6.90798 8.60218 6.74994 9 6.74994C9.39783 6.74994 9.77936 6.90798 10.0607 7.18928C10.342 7.47058 10.5 7.85212 10.5 8.24994C10.5 8.64776 10.342 9.02929 10.0607 9.3106C9.77936 9.5919 9.39783 9.74994 9 9.74994Z"
                                        fill="#536387" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1675_1730">
                                        <rect width="18" height="18" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            {{ $eventDetail->location }}
                        </li>
                        <li>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                width="24"
                                height="24"
                                fill="currentColor">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm8-6h2v8h-2V8zm-2-2h2v2h-2V6z">
                                </path>
                            </svg>
                            {{ $eventDetail->guest_names }}
                        </li>
                    </ul>
                </div>
        </div>

        <form action="{{ route('eventleads') }}" method="POST">
            @csrf
            <h2 class="formbold-form-title">Register now</h2>

            <input name="event_id" value="{{ $eventDetail->id }}" hidden>
            <div>
                <label for="name" class="formbold-form-label"> Yous Name* </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    required
                    class="formbold-form-input" />
            </div>
            <br>
            <div class="formbold-input-flex">
                <div>
                    <label for="email" class="formbold-form-label"> Email* </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                        class="formbold-form-input" />
                </div>
                <div>
                    <label for="phone" class="formbold-form-label"> Phone number* </label>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        required
                        class="formbold-form-input" />
                </div>
            </div>

            <div>
                <label for="description" class="formbold-form-label"> Description </label>
                <input type="text" name="description" id="description" class="formbold-form-input" />
            </div>

            <p class="formbold-policy">
                By filling out this form and clicking submit
            </p>
            <button class="formbold-btn" type="submit">Submit Event Registration</button>
        </form>
    </div>
</div>
@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif