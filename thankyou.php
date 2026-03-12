<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You | LuxeEstate</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --color-primary: #1a1a2e;
      --color-accent: #c9a84c;
      --color-surface: #f5f0e8;
      --font-display: 'Cormorant Garamond', serif;
      --font-body: 'DM Sans', sans-serif;
    }
    body {
      margin: 0;
      padding: 0;
      font-family: var(--font-body);
      background-color: var(--color-surface);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .thank-you-card {
      background: white;
      padding: 4rem;
      border-radius: 24px;
      box-shadow: 0 20px 50px rgba(0,0,0,0.1);
      max-width: 600px;
      width: 90%;
    }
    .checkmark-container {
      width: 100px;
      height: 100px;
      margin: 0 auto 2rem;
      position: relative;
    }
    .circle {
      width: 100px;
      height: 100px;
      border: 5px solid var(--color-accent);
      border-radius: 50%;
      position: absolute;
      animation: circle-draw 0.6s ease-out forwards;
    }
    .tick {
      width: 50px;
      height: 25px;
      border-left: 5px solid var(--color-accent);
      border-bottom: 5px solid var(--color-accent);
      position: absolute;
      top: 30px;
      left: 25px;
      transform: rotate(-45deg);
      opacity: 0;
      animation: tick-draw 0.4s ease-out 0.6s forwards;
    }
    @keyframes circle-draw {
      from { transform: scale(0); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }
    @keyframes tick-draw {
      from { opacity: 0; transform: rotate(-45deg) scale(0.5); }
      to { opacity: 1; transform: rotate(-45deg) scale(1); }
    }
    h1 { font-family: var(--font-display); font-size: 2.5rem; color: var(--color-primary); margin-bottom: 1rem; }
    p { color: #666; margin-bottom: 2rem; line-height: 1.6; }
    .btn {
      display: inline-block;
      padding: 1rem 2rem;
      background: var(--color-accent);
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.3s;
    }
    .btn:hover { filter: brightness(1.1); transform: translateY(-2px); }
    .countdown { font-size: 0.8rem; color: #999; margin-top: 2rem; }
  </style>
</head>
<body>
  <div class="thank-you-card">
    <div class="checkmark-container">
      <div class="circle"></div>
      <div class="tick"></div>
    </div>
    <h1>Thank You!</h1>
    <p>We've received your enquiry. Our property consultant will contact you within 24 hours to discuss your requirements.</p>
    <a href="index.php" class="btn">Back to Homepage</a>
    <div class="countdown">Redirecting in <span id="timer">10</span> seconds...</div>
  </div>

  <script>
    let seconds = 10;
    const timerEl = document.getElementById('timer');
    const interval = setInterval(() => {
      seconds--;
      timerEl.innerText = seconds;
      if (seconds <= 0) {
        clearInterval(interval);
        window.location.href = 'index.php';
      }
    }, 1000);
  </script>
</body>
</html>
