<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cryque</title>
  <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Basic reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #f1f2f3; /* light gray background */
  font-family: Arial, sans-serif;
}

.container {
  text-align: center;
}

.logo {
  width: 100px; /* Adjust as needed */
  margin-bottom: 20px;
}

h1 {
  font-size: 2rem;
  color: #9bcc6b; /* Light green */
  font-weight: 400;
  letter-spacing: 2px;
  margin-bottom: 10px;
}

h2 {
  font-size: 1.5rem;
  color: #000;
  font-weight: bold;
  margin-bottom: 5px;
}

p {
  font-size: 1rem;
  color: #555;
}

</style>
<body>
  <div class="container">
    <img src="{{asset('assets/img/apple-icon.png')}}" alt="Cryque Logo" class="logo">
    <h1>CRYQUE</h1>
    <h2>Empowering businesses with Marketing & Development</h2>
    <p>Empowering businesses with Marketing & Development</p>
  </div>
  <script>
    // Set a timer to redirect to the registration page after 5 seconds
    setTimeout(function() {
      window.location.href = "{{ route('register') }}"; // This should now work if the route is defined properly
    }, 5000); // 5000 milliseconds = 5 seconds
  </script>
</body>
</html>
