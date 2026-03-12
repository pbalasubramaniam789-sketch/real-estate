<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | LuxeEstate</title>
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
      font-family: var(--font-body);
      background-color: var(--color-surface);
      color: #333;
      margin: 0;
      padding: 0;
    }
    header { background: var(--color-primary); padding: 2rem 0; text-align: center; }
    header a { color: white; font-family: var(--font-display); font-size: 2rem; text-decoration: none; font-weight: 700; }
    header span { color: var(--color-accent); }
    
    .container { max-width: 1200px; margin: 4rem auto; padding: 0 2rem; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; }
    h1 { font-family: var(--font-display); font-size: 3.5rem; color: var(--color-primary); margin-bottom: 1.5rem; }
    
    .contact-info h2 { font-family: var(--font-display); font-size: 2rem; color: var(--color-primary); margin-bottom: 1rem; }
    .contact-info p { color: #666; margin-bottom: 2rem; }
    .info-item { display: flex; gap: 1rem; margin-bottom: 1.5rem; }
    .info-item svg { color: var(--color-accent); }
    
    .form-card { background: white; padding: 3rem; border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.05); }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label { display: block; font-size: 0.8rem; text-transform: uppercase; margin-bottom: 0.5rem; color: #999; }
    .form-control { width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 8px; font-family: var(--font-body); }
    .btn-submit { width: 100%; padding: 1rem; background: var(--color-accent); color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; transition: 0.3s; }
    .btn-submit:hover { filter: brightness(1.1); transform: translateY(-2px); }

    @media (max-width: 768px) {
      .container { grid-template-columns: 1fr; }
    }
    
    footer { background: var(--color-primary); color: white; padding: 4rem 0; text-align: center; margin-top: 6rem; }
  </style>
</head>
<body>
  <header>
    <a href="index.php">LUXE<span>ESTATE</span></a>
  </header>

  <div class="container">
    <div class="contact-info">
      <h1>Get in Touch</h1>
      <p>Whether you're looking to buy, sell, or invest, our team of luxury property consultants is here to guide you every step of the way.</p>
      
      <div class="info-item">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
        <div>
          <strong>Office Address</strong>
          <p>Level 42, Burj Khalifa District, Downtown Dubai, UAE</p>
        </div>
      </div>

      <div class="info-item">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
        <div>
          <strong>Phone Number</strong>
          <p>+971 4 000 0000</p>
        </div>
      </div>

      <div class="info-item">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
        <div>
          <strong>Email Address</strong>
          <p>concierge@luxeestate.com</p>
        </div>
      </div>
    </div>

    <div class="form-card">
      <form action="/api/contact" method="POST">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="message">Your Message</label>
          <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group" style="display: flex; gap: 0.5rem; align-items: flex-start;">
          <input type="checkbox" id="privacy" name="privacy" required>
          <label for="privacy" style="text-transform: none;">I agree to the privacy policy</label>
        </div>
        <button type="submit" class="btn-submit">Send Message</button>
      </form>
    </div>
  </div>

  <footer>
    <p>Copyright © 2025 LUXEESTATE. All Rights Reserved.</p>
  </footer>
</body>
</html>
