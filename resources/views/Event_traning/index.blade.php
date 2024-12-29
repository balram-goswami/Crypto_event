<div class="container-fluid py-2">
    <div class="card">
        <div class="container">
            <div class="video-card text-center">
                <h3 id="videoTitle" class="mb-4">Select a Video</h3>
                <video id="videoPlayer" width="560" height="315" controls onended="onVideoComplete()">
                    <source src="" type="video/mp4">
                </video>
                <div class="navigation-buttons mt-3">
                    <button id="prevButton" class="btn btn-outline-primary" onclick="navigateVideo('prev')">← Previous Video</button>
                    <button id="nextButton" class="btn btn-custom" onclick="navigateVideo('next')">Next Video →</button>
                </div>
                <!-- Certificate Button -->
                <div class="certificate-button mt-4" style="display: none;">
                    <button id="certificateButton" class="btn btn-success" onclick="downloadCertificate()">Download Certificate</button>
                </div>
                <!-- Hidden Canvas for Certificate -->
                <canvas id="certificateCanvas" style="display: none;"></canvas>

                <div class="mt-4 ">
                    <form action="{{ route('mark.complete', $id) }}" method="POST">
                        @csrf
                        <input type="text" name="event_status" value="2" hidden>
                        <button type="submit" class="btn btn-primary">Mark Complete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let currentVideoIndex = 0;
    let videos = @json($EventTraning);
    let certificateVisible = false; // Tracks if the certificate button has been shown
    let userName = @json($userDetails->name); // Pass PHP variable to JavaScript

    function loadVideo(element) {
        const videoLink = element.getAttribute('data-video-link');
        const title = element.getAttribute('data-title');

        const videoPlayer = document.getElementById('videoPlayer');
        videoPlayer.querySelector('source').src = videoLink;
        videoPlayer.load();

        document.getElementById('videoTitle').innerText = title;

        currentVideoIndex = Array.from(document.querySelectorAll('.nav-item')).indexOf(element);
    }

    function playNextVideo() {
        currentVideoIndex = (currentVideoIndex + 1) % videos.length;
        const video = videos[currentVideoIndex];
        updateVideoPlayer(video);
    }

    function navigateVideo(direction) {
        currentVideoIndex =
            direction === 'next' ?
            (currentVideoIndex + 1) % videos.length :
            (currentVideoIndex - 1 + videos.length) % videos.length;

        const video = videos[currentVideoIndex];
        updateVideoPlayer(video);
    }

    function updateVideoPlayer(video) {
        const videoLink = "{{ asset('storage') }}/" + video.video_type;
        const videoPlayer = document.getElementById('videoPlayer');
        videoPlayer.querySelector('source').src = videoLink;
        videoPlayer.load();

        document.getElementById('videoTitle').innerText = video.title;

        // Do not hide the certificate button if it has already been made visible
        if (!certificateVisible) {
            document.querySelector('.certificate-button').style.display = 'none';
        }
    }

    function onVideoComplete() {
        // Show the certificate button when the video ends
        const certificateButton = document.querySelector('.certificate-button');
        certificateButton.style.display = 'block';
        certificateVisible = true; // Mark the certificate button as shown
    }

    function downloadCertificate() {
        // Get user and event details dynamically
        const eventName = videos[currentVideoIndex]?.title || "Event Name";
        const date = new Date().toLocaleDateString();

        // Create the certificate on the canvas
        const canvas = document.getElementById('certificateCanvas');
        const ctx = canvas.getContext('2d');
        canvas.width = 800;
        canvas.height = 600;

        // Background
        ctx.fillStyle = "#f3f4f6";
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Border
        ctx.strokeStyle = "#333";
        ctx.lineWidth = 10;
        ctx.strokeRect(20, 20, canvas.width - 40, canvas.height - 40);

        // Certificate Text
        ctx.font = "30px Arial";
        ctx.textAlign = "center";
        ctx.fillStyle = "#333";
        ctx.fillText("Certificate of Completion", canvas.width / 2, 150);

        ctx.font = "20px Arial";
        ctx.fillText(`Presented to`, canvas.width / 2, 200);
        ctx.font = "40px Arial";
        ctx.fillText(userName, canvas.width / 2, 260); // Dynamic user name

        ctx.font = "20px Arial";
        ctx.fillText(`For successfully completing the event`, canvas.width / 2, 320);

        ctx.font = "30px Arial";
        ctx.fillText(eventName, canvas.width / 2, 370); // Dynamic event name

        ctx.font = "20px Arial";
        ctx.fillText(`Date: ${date}`, canvas.width / 2, 450); // Dynamic date

        // Convert canvas to image and trigger download
        const link = document.createElement('a');
        link.download = `Certificate-${userName}.png`;
        link.href = canvas.toDataURL();
        link.click();
    }

    document.addEventListener('DOMContentLoaded', function() {
        if (videos.length > 0) {
            const firstVideo = videos[0];
            updateVideoPlayer(firstVideo);
        }
    });
</script>