<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maintenance</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #ffffff;
      overflow: hidden;
    }

    .container {
      text-align: center;
    }

    h1 {
      font-size: 3rem;
      color: #333;
      margin-bottom: 1rem;
      animation: fadeIn 1.5s ease-in-out;
    }

    p {
      font-size: 1.2rem;
      color: #666;
      margin-bottom: 2rem;
      animation: fadeIn 2s ease-in-out;
    }

    .spinner {
      width: 60px;
      height: 60px;
      margin: 0 auto;
      border: 10px solid #f3f3f3;
      border-top: 10px solid #7f0181;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    .image {
      margin-top: 2rem;
      animation: bounce 2s infinite;
    }

    img {
      width: 500px;
      max-width: 80%;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    @keyframes bounce {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-15px);
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>We'll Be Back Soon!</h1>
    
    <div class="image">
      <img src="{{ asset('assets/images/mnc.jpg') }}" alt="Maintenance Image">
    </div>
    <p>Our website is currently undergoing scheduled maintenance. Please check back later.</p>
    
    <div class="spinner"></div>
  </div>

  <script>
    // Add any interactivity or additional animations here if needed
    console.log("Maintenance page loaded.");
  </script>
</body>
</html>
