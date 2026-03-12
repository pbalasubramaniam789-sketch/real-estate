<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $interest = filter_input(INPUT_POST, 'interest', FILTER_SANITIZE_SPECIAL_CHARS);
    $budget = filter_input(INPUT_POST, 'budget', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
    $privacy = isset($_POST['privacy']);

    $errors = [];
    if (empty($name)) $errors[] = "Name is required";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required";
    if (empty($phone)) $errors[] = "Phone is required";
    if (!$privacy) $errors[] = "You must agree to the privacy policy";

    if (empty($errors)) {
        // In a real environment, send email
        // mail("admin@luxeestate.com", "New Enquiry from $name", $message);
        header("Location: thankyou.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LuxeEstate | Premium Luxury Real Estate 2025</title>
  <meta name="description" content="Discover the most exclusive luxury properties and investment opportunities with LuxeEstate.">
  
  <!-- SEO & Open Graph -->
  <meta property="og:title" content="LuxeEstate | Premium Luxury Real Estate">
  <meta property="og:description" content="Refined editorial luxury properties for the modern investor.">
  <meta property="og:type" content="website">
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --color-primary:     #1a1a2e;   /* Deep navy charcoal */
      --color-secondary:   #16213e;   /* Darker navy */
      --color-accent:      #c9a84c;   /* Luxury gold */
      --color-accent-light:#e8d5a3;   /* Pale gold */
      --color-surface:     #f5f0e8;   /* Warm off-white */
      --color-surface-alt: #ede8df;   /* Slightly deeper cream */
      --color-sage:        #8a9e8a;   /* Muted sage green */
      --color-text:        #2c2c2c;   /* Near-black body text */
      --color-text-muted:  #6b6b6b;   /* Muted grey */
      --color-white:       #ffffff;
      --color-error:       #c0392b;
      --color-success:     #27ae60;

      --font-display: 'Cormorant Garamond', Georgia, serif;
      --font-body:    'DM Sans', system-ui, sans-serif;

      --fs-xs:   clamp(0.75rem,  1.5vw, 0.875rem);
      --fs-sm:   clamp(0.875rem, 2vw,   1rem);
      --fs-base: clamp(1rem,     2.5vw, 1.125rem);
      --fs-lg:   clamp(1.125rem, 3vw,   1.5rem);
      --fs-xl:   clamp(1.5rem,   4vw,   2.25rem);
      --fs-2xl:  clamp(2rem,     5vw,   3.5rem);
      --fs-hero: clamp(2.5rem,   7vw,   5.5rem);

      --space-xs:  0.25rem;
      --space-sm:  0.5rem;
      --space-md:  1rem;
      --space-lg:  2rem;
      --space-xl:  4rem;
      --space-2xl: 8rem;

      --radius-sm: 4px;
      --radius-md: 8px;
      --radius-lg: 16px;
      --radius-xl: 24px;
      --radius-pill: 9999px;

      --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
      --shadow-md: 0 4px 16px rgba(0,0,0,0.12);
      --shadow-lg: 0 16px 48px rgba(0,0,0,0.18);
      --shadow-xl: 0 32px 80px rgba(0,0,0,0.24);

      --transition-fast:   150ms ease;
      --transition-base:   300ms ease;
      --transition-slow:   600ms cubic-bezier(0.25, 0.46, 0.45, 0.94);

      --container-max: 1280px;
      --container-pad: clamp(1rem, 5vw, 3rem);

      --header-height: 80px;
      --glass-bg: rgba(255,255,255,0.08);
      --glass-border: rgba(255,255,255,0.15);
      --glass-blur: blur(12px);
    }

    /* Reset & Base */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
      font-family: var(--font-body);
      font-size: var(--fs-base);
      color: var(--color-text);
      background-color: var(--color-surface);
      line-height: 1.6;
      overflow-x: hidden;
    }
    h1, h2, h3, h4 { font-family: var(--font-display); font-weight: 500; line-height: 1.1; color: var(--color-primary); }
    a { text-decoration: none; color: inherit; transition: var(--transition-fast); }
    ul { list-style: none; }
    img { max-width: 100%; height: auto; display: block; }
    button, .btn { cursor: pointer; border: none; outline: none; font-family: var(--font-body); transition: var(--transition-base); }

    .container { max-width: var(--container-max); margin: 0 auto; padding: 0 var(--container-pad); }
    .section-padding { padding: var(--space-xl) 0; }
    .text-center { text-align: center; }
    .mb-md { margin-bottom: var(--space-md); }
    .mb-lg { margin-bottom: var(--space-lg); }
    .mb-xl { margin-bottom: var(--space-xl); }

    /* Buttons */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 0.8rem 2rem;
      border-radius: var(--radius-sm);
      font-weight: 500;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      font-size: 0.875rem;
    }
    .btn-primary {
      background: linear-gradient(135deg, var(--color-accent), #b3943d);
      color: var(--color-white);
      box-shadow: var(--shadow-md);
    }
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
      filter: brightness(1.1);
    }
    .btn-outline {
      border: 1px solid var(--color-accent);
      color: var(--color-accent);
      background: transparent;
    }
    .btn-outline:hover {
      background: var(--color-accent);
      color: var(--color-white);
    }

    /* Header */
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: var(--header-height);
      z-index: 1000;
      transition: var(--transition-base);
      display: flex;
      align-items: center;
    }
    header.scrolled {
      background: rgba(26, 26, 46, 0.95);
      backdrop-filter: var(--glass-blur);
      height: 70px;
      border-bottom: 1px solid var(--glass-border);
    }
    header .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }
    .logo {
      font-family: var(--font-display);
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--color-white);
    }
    .logo span { color: var(--color-accent); }
    
    nav ul { display: flex; gap: var(--space-lg); }
    nav a { 
      color: var(--color-white); 
      font-size: 0.9rem; 
      text-transform: uppercase; 
      letter-spacing: 0.1em;
      position: relative;
    }
    nav a::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--color-accent);
      transition: var(--transition-base);
    }
    nav a.active::after, nav a:hover::after { width: 100%; }

    .mobile-toggle { display: none; color: var(--color-white); font-size: 1.5rem; }

    /* Hero */
    .hero {
      height: 100vh;
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--color-white);
      text-align: center;
    }
    .hero-content { max-width: 800px; opacity: 0; transform: translateY(30px); animation: fadeInUp 1s forwards 0.5s; }
    .hero h1 { font-size: var(--fs-hero); color: var(--color-white); margin-bottom: var(--space-md); }
    .hero p { font-size: var(--fs-lg); margin-bottom: var(--space-lg); font-weight: 300; }
    .hero-btns { display: flex; gap: var(--space-md); justify-content: center; }

    @keyframes fadeInUp {
      to { opacity: 1; transform: translateY(0); }
    }

    /* Search Bar */
    .search-bar {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: var(--glass-blur);
      padding: var(--space-md);
      border-radius: var(--radius-pill);
      border: 1px solid var(--glass-border);
      display: flex;
      gap: var(--space-md);
      margin-top: var(--space-xl);
      flex-wrap: wrap;
      justify-content: center;
    }
    .search-bar select, .search-bar input {
      background: transparent;
      border: none;
      color: var(--color-white);
      padding: 0.5rem 1rem;
      font-family: var(--font-body);
      border-right: 1px solid var(--glass-border);
    }
    .search-bar select option { color: var(--color-text); }
    .search-bar button {
      background: var(--color-accent);
      color: var(--color-white);
      padding: 0.5rem 2rem;
      border-radius: var(--radius-pill);
    }

    /* Featured Projects */
    .projects-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: var(--space-lg);
    }
    .project-card {
      background: var(--color-white);
      border-radius: var(--radius-md);
      overflow: hidden;
      box-shadow: var(--shadow-md);
      transition: var(--transition-base);
      position: relative;
    }
    .project-card:hover { transform: translateY(-10px); box-shadow: var(--shadow-xl); }
    .project-image { position: relative; overflow: hidden; height: 250px; }
    .project-image img { width: 100%; height: 100%; object-fit: cover; transition: var(--transition-slow); }
    .project-card:hover .project-image img { transform: scale(1.1); }
    .status-tag {
      position: absolute;
      top: 1rem;
      right: 1rem;
      background: var(--color-accent);
      color: var(--color-white);
      padding: 0.3rem 0.8rem;
      font-size: 0.7rem;
      text-transform: uppercase;
      border-radius: var(--radius-sm);
      z-index: 1;
    }
    .project-info { padding: var(--space-lg); }
    .project-location { color: var(--color-text-muted); font-size: 0.8rem; display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; }
    .project-price { color: var(--color-accent); font-weight: 700; font-size: 1.2rem; margin-bottom: 1rem; }
    .project-features { display: flex; justify-content: space-between; border-top: 1px solid #eee; padding-top: 1rem; font-size: 0.8rem; color: var(--color-text-muted); }

    /* Stats Section */
    .stats { background: var(--color-primary); color: var(--color-white); }
    .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-xl); text-align: center; }
    .stat-item h3 { font-size: 3rem; color: var(--color-accent); margin-bottom: 0.5rem; }
    .stat-item p { text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.8rem; opacity: 0.8; }

    /* Consultation Form */
    .consultation { background: var(--color-surface-alt); }
    .consultation-split { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-xl); align-items: center; }
    .consultation-image { border-radius: var(--radius-lg); overflow: hidden; height: 100%; min-height: 500px; }
    .consultation-image img { width: 100%; height: 100%; object-fit: cover; }
    .form-container { background: var(--color-white); padding: var(--space-xl); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); }
    .form-group { margin-bottom: var(--space-md); }
    .form-group label { display: block; font-size: 0.8rem; text-transform: uppercase; margin-bottom: 0.3rem; color: var(--color-text-muted); }
    .form-control {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid #ddd;
      border-radius: var(--radius-sm);
      font-family: var(--font-body);
    }
    .form-control:focus { border-color: var(--color-accent); outline: none; }
    .checkbox-group { display: flex; align-items: flex-start; gap: 0.5rem; font-size: 0.8rem; margin-top: 1rem; }
    .checkbox-group input { margin-top: 0.2rem; }

    /* Testimonials */
    .testimonials { background: var(--color-surface); }
    .testimonial-slider { display: flex; overflow-x: auto; scroll-snap-type: x mandatory; gap: var(--space-lg); padding-bottom: var(--space-lg); scrollbar-width: none; }
    .testimonial-slider::-webkit-scrollbar { display: none; }
    .testimonial-card {
      min-width: 350px;
      background: var(--color-white);
      padding: var(--space-xl);
      border-radius: var(--radius-lg);
      scroll-snap-align: start;
      box-shadow: var(--shadow-md);
    }
    .stars { color: var(--color-accent); margin-bottom: 1rem; }
    .testimonial-text { font-style: italic; margin-bottom: 1.5rem; position: relative; }
    .testimonial-text::before { content: '"'; font-family: var(--font-display); font-size: 4rem; position: absolute; top: -2rem; left: -1rem; opacity: 0.1; }
    .client-info { display: flex; align-items: center; gap: 1rem; }
    .client-name { font-weight: 700; color: var(--color-primary); }
    .client-property { font-size: 0.8rem; color: var(--color-text-muted); }

    /* Blog */
    .blog-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--space-lg); }
    .blog-card { background: var(--color-white); border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-sm); }
    .blog-image { height: 200px; overflow: hidden; }
    .blog-image img { width: 100%; height: 100%; object-fit: cover; }
    .blog-content { padding: var(--space-lg); }
    .blog-meta { font-size: 0.7rem; text-transform: uppercase; color: var(--color-accent); margin-bottom: 0.5rem; display: block; }
    .blog-card h3 { font-size: 1.4rem; margin-bottom: 1rem; }
    .blog-footer { display: flex; justify-content: space-between; font-size: 0.7rem; color: var(--color-text-muted); border-top: 1px solid #eee; padding-top: 1rem; }

    /* Footer */
    footer { background: var(--color-primary); color: var(--color-white); padding-top: var(--space-xl); }
    .footer-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-xl); margin-bottom: var(--space-xl); }
    .footer-col h4 { color: var(--color-white); font-size: 1.2rem; margin-bottom: var(--space-lg); position: relative; padding-bottom: 0.5rem; }
    .footer-col h4::after { content: ''; position: absolute; bottom: 0; left: 0; width: 30px; height: 2px; background: var(--color-accent); }
    .footer-col p { font-size: 0.9rem; opacity: 0.7; margin-bottom: 1.5rem; }
    .footer-links li { margin-bottom: 0.8rem; }
    .footer-links a { font-size: 0.9rem; opacity: 0.7; }
    .footer-links a:hover { opacity: 1; color: var(--color-accent); padding-left: 5px; }
    .social-links { display: flex; gap: 1rem; }
    .social-links a { width: 35px; height: 35px; border: 1px solid rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; }
    .social-links a:hover { background: var(--color-accent); border-color: var(--color-accent); }
    .social-links svg { width: 18px; height: 18px; fill: currentColor; }

    .newsletter { display: flex; gap: 0.5rem; margin-top: 1rem; }
    .newsletter input { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); padding: 0.5rem; color: white; border-radius: var(--radius-sm); flex: 1; }
    .newsletter button { background: var(--color-accent); color: white; padding: 0.5rem 1rem; border-radius: var(--radius-sm); }

    .footer-bottom { border-top: 1px solid rgba(255,255,255,0.1); padding: var(--space-lg) 0; text-align: center; font-size: 0.8rem; opacity: 0.5; }

    /* WhatsApp Floating */
    .whatsapp-float {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      background: #25d366;
      color: white;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: var(--shadow-lg);
      z-index: 999;
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
      70% { transform: scale(1.1); box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
      100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .consultation-split { grid-template-columns: 1fr; }
      .consultation-image { display: none; }
      .hero h1 { font-size: 3.5rem; }
    }
    @media (max-width: 768px) {
      nav { display: none; }
      .mobile-toggle { display: block; }
      .hero h1 { font-size: 2.8rem; }
      .hero-btns { flex-direction: column; align-items: center; }
      .search-bar { border-radius: var(--radius-lg); }
      .search-bar select, .search-bar input { border-right: none; border-bottom: 1px solid var(--glass-border); width: 100%; }
    }

    /* Reveal Animation */
    .reveal { opacity: 0; transform: translateY(30px); transition: 1s all ease; }
    .reveal.active { opacity: 1; transform: translateY(0); }
  </style>
</head>
<body>

  <!-- Skip Link -->
  <a href="#main-content" style="position: absolute; left: -9999px; top: auto; width: 1px; height: 1px; overflow: hidden;">Skip to content</a>

  <!-- Header -->
  <header id="header">
    <div class="container">
      <a href="index.php" class="logo">LUXE<span>ESTATE</span></a>
      <nav aria-label="Main navigation">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="contact.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="blog.php">Blog</a></li>
        </ul>
      </nav>
      <button class="mobile-toggle" aria-label="Toggle menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </button>
    </div>
  </header>

  <main id="main-content">
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-content">
        <h1>Find Your Perfect Home</h1>
        <p>Experience the pinnacle of luxury living with our curated collection of world-class properties.</p>
        <div class="hero-btns">
          <a href="#projects" class="btn btn-primary">Explore Properties</a>
          <a href="#consultation" class="btn btn-outline">Book a Consultation</a>
        </div>
        
        <div class="search-bar">
          <select aria-label="Location">
            <option>Location</option>
            <option>Dubai Marina</option>
            <option>Palm Jumeirah</option>
            <option>Downtown Dubai</option>
          </select>
          <select aria-label="Property Type">
            <option>Property Type</option>
            <option>Villa</option>
            <option>Penthouse</option>
            <option>Apartment</option>
          </select>
          <select aria-label="Budget">
            <option>Budget</option>
            <option>$1M - $5M</option>
            <option>$5M - $10M</option>
            <option>$10M+</option>
          </select>
          <button type="button">Search</button>
        </div>
      </div>
    </section>

    <!-- Featured Projects -->
    <section id="projects" class="section-padding">
      <div class="container">
        <div class="text-center mb-xl reveal">
          <h2>Our Signature Projects</h2>
          <p class="color-text-muted">Handpicked luxury developments for discerning investors.</p>
        </div>
        
        <div class="projects-grid">
          <!-- Card 1 -->
          <div class="project-card reveal">
            <div class="project-image">
              <span class="status-tag">Ready</span>
              <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=800&q=80" alt="Azure Bay Villa" loading="lazy" referrerPolicy="no-referrer">
            </div>
            <div class="project-info">
              <div class="project-location">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                Palm Jumeirah, Dubai
              </div>
              <h3>Azure Bay Villa</h3>
              <div class="project-price">$12,500,000</div>
              <div class="project-features">
                <span>6 Beds</span>
                <span>8 Baths</span>
                <span>12,000 SqFt</span>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="project-card reveal">
            <div class="project-image">
              <span class="status-tag">Off-Plan</span>
              <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=80" alt="The Zenith Penthouse" loading="lazy" referrerPolicy="no-referrer">
            </div>
            <div class="project-info">
              <div class="project-location">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                Downtown Dubai
              </div>
              <h3>The Zenith Penthouse</h3>
              <div class="project-price">$8,200,000</div>
              <div class="project-features">
                <span>4 Beds</span>
                <span>5 Baths</span>
                <span>6,500 SqFt</span>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="project-card reveal">
            <div class="project-image">
              <span class="status-tag">Sold Out</span>
              <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=800&q=80" alt="Emerald Garden Estate" loading="lazy" referrerPolicy="no-referrer">
            </div>
            <div class="project-info">
              <div class="project-location">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                Emirates Hills
              </div>
              <h3>Emerald Garden Estate</h3>
              <div class="project-price">$22,000,000</div>
              <div class="project-features">
                <span>8 Beds</span>
                <span>10 Baths</span>
                <span>18,000 SqFt</span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="text-center mt-lg" style="margin-top: 3rem;">
          <a href="blog.php" class="btn btn-outline">View All Projects</a>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="stats section-padding">
      <div class="container">
        <div class="stats-grid">
          <div class="stat-item">
            <h3 class="counter" data-target="500">0</h3>
            <p>Properties Listed</p>
          </div>
          <div class="stat-item">
            <h3 class="counter" data-target="1200">0</h3>
            <p>Happy Clients</p>
          </div>
          <div class="stat-item">
            <h3 class="counter" data-target="15">0</h3>
            <p>Years Experience</p>
          </div>
          <div class="stat-item">
            <h3 class="counter" data-target="20">0</h3>
            <p>Locations Covered</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Consultation Form -->
    <section id="consultation" class="consultation section-padding">
      <div class="container">
        <div class="consultation-split">
          <div class="consultation-image reveal">
            <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=800&q=80" alt="Luxury Interior" loading="lazy" referrerPolicy="no-referrer">
          </div>
          <div class="form-container reveal">
            <h2>Book a Free Consultation</h2>
            <p class="mb-lg">Our experts are ready to help you find your dream investment.</p>
            
            <form action="/api/contact" method="POST">
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="John Doe">
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="john@example.com">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="form-control" required placeholder="+971 50 000 0000">
              </div>
              <div class="form-group">
                <label for="interest">Property Interest</label>
                <select id="interest" name="interest" class="form-control">
                  <option value="buy">Buy</option>
                  <option value="rent">Rent</option>
                  <option value="invest">Invest</option>
                  <option value="off-plan">Off-Plan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="budget">Budget Range</label>
                <select id="budget" name="budget" class="form-control">
                  <option value="1-5m">$1M - $5M</option>
                  <option value="5-10m">$5M - $10M</option>
                  <option value="10m+">$10M+</option>
                </select>
              </div>
              <div class="form-group">
                <label for="message">Message / Requirements</label>
                <textarea id="message" name="message" class="form-control" rows="4" placeholder="Tell us about your requirements..."></textarea>
              </div>
              <div class="checkbox-group">
                <input type="checkbox" id="privacy" name="privacy" required>
                <label for="privacy">I agree to the <a href="privacy-policy.php" style="color: var(--color-accent);">Privacy Policy</a></label>
              </div>
              <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1.5rem;">Submit Enquiry</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials section-padding">
      <div class="container">
        <div class="text-center mb-xl reveal">
          <h2>What Our Clients Say</h2>
        </div>
        <div class="testimonial-slider reveal">
          <!-- Testimonial 1 -->
          <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text">LuxeEstate helped me find the perfect investment property in Downtown Dubai. Their professionalism is unmatched.</p>
            <div class="client-info">
              <div class="client-name">Michael Chen</div>
              <div class="client-property">Purchased Zenith Penthouse</div>
            </div>
          </div>
          <!-- Testimonial 2 -->
          <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text">The team went above and beyond to ensure a smooth transaction for our family home. Highly recommended!</p>
            <div class="client-info">
              <div class="client-name">Sarah Williams</div>
              <div class="client-property">Purchased Azure Bay Villa</div>
            </div>
          </div>
          <!-- Testimonial 3 -->
          <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text">Transparent, efficient, and deeply knowledgeable about the luxury market trends in 2025.</p>
            <div class="client-info">
              <div class="client-name">Ahmed Al-Maktoum</div>
              <div class="client-property">Investor Portfolio</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Blog Preview -->
    <section class="section-padding">
      <div class="container">
        <div class="text-center mb-xl reveal">
          <h2>Market Insights</h2>
          <p class="color-text-muted">Stay updated with the latest real estate trends.</p>
        </div>
        <div class="blog-grid">
          <div class="blog-card reveal">
            <div class="blog-image">
              <img src="https://images.unsplash.com/photo-1460472178825-e5240623abe5?auto=format&fit=crop&w=600&q=80" alt="Market Trends" loading="lazy" referrerPolicy="no-referrer">
            </div>
            <div class="blog-content">
              <span class="blog-meta">Investment</span>
              <h3>Dubai Real Estate Market Outlook 2025</h3>
              <p>An in-depth analysis of the luxury segment and upcoming growth areas.</p>
              <div class="blog-footer">
                <span>5 min read</span>
                <span>Oct 12, 2025</span>
              </div>
            </div>
          </div>
          <div class="blog-card reveal">
            <div class="blog-image">
              <img src="https://images.unsplash.com/photo-1582408921715-18e7806365c1?auto=format&fit=crop&w=600&q=80" alt="Buying Guide" loading="lazy" referrerPolicy="no-referrer">
            </div>
            <div class="blog-content">
              <span class="blog-meta">Guides</span>
              <h3>The Ultimate Guide to Off-Plan Investing</h3>
              <p>Everything you need to know before signing your first off-plan contract.</p>
              <div class="blog-footer">
                <span>8 min read</span>
                <span>Oct 10, 2025</span>
              </div>
            </div>
          </div>
          <div class="blog-card reveal">
            <div class="blog-image">
              <img src="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=600&q=80" alt="Luxury Living" loading="lazy" referrerPolicy="no-referrer">
            </div>
            <div class="blog-content">
              <span class="blog-meta">Lifestyle</span>
              <h3>Top 5 Sustainable Luxury Developments</h3>
              <p>Eco-friendly living meets high-end architectural design.</p>
              <div class="blog-footer">
                <span>6 min read</span>
                <span>Oct 05, 2025</span>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-lg" style="margin-top: 3rem;">
          <a href="blog.php" class="btn btn-primary">Visit Our Blog</a>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-grid">
        <div class="footer-col">
          <a href="index.php" class="logo mb-md" style="display: block;">LUXE<span>ESTATE</span></a>
          <p>Redefining luxury real estate with a focus on architectural excellence and client trust since 2010.</p>
          <div class="social-links">
            <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a>
            <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></a>
            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></a>
          </div>
        </div>
        <div class="footer-col">
          <h4>Quick Links</h4>
          <ul class="footer-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="contact.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="blog.php">Blog</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Legal & Info</h4>
          <ul class="footer-links">
            <li><a href="privacy-policy.php">Privacy Policy</a></li>
            <li><a href="terms-conditions.php">Terms & Conditions</a></li>
            <li><a href="#">Cookie Policy</a></li>
            <li><a href="#">Sitemap</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Connect</h4>
          <p>Subscribe to our newsletter for exclusive property previews.</p>
          <form class="newsletter">
            <input type="email" placeholder="Your Email" aria-label="Newsletter email">
            <button type="button">Join</button>
          </form>
        </div>
      </div>
      <div class="footer-bottom">
        <p>Copyright © 2025 LUXEESTATE. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <!-- WhatsApp Float -->
  <a href="https://wa.me/1234567890" class="whatsapp-float" aria-label="WhatsApp Contact">
    <svg width="30" height="30" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
  </a>

  <script>
    // Header Scroll Effect
    window.addEventListener('scroll', function() {
      const header = document.getElementById('header');
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });

    // Mobile Menu Toggle
    const mobileToggle = document.querySelector('.mobile-toggle');
    const nav = document.querySelector('nav');
    mobileToggle.addEventListener('click', () => {
      nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
      if (nav.style.display === 'flex') {
        nav.style.position = 'absolute';
        nav.style.top = '100%';
        nav.style.left = '0';
        nav.style.width = '100%';
        nav.style.background = 'var(--color-primary)';
        nav.style.padding = '2rem';
        nav.querySelector('ul').style.flexDirection = 'column';
      }
    });

    // Reveal on Scroll
    const observerOptions = { threshold: 0.1 };
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('active');
        }
      });
    }, observerOptions);

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // Stats Counter
    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const counter = entry.target;
          const target = +counter.getAttribute('data-target');
          const updateCounter = () => {
            const count = +counter.innerText;
            const increment = target / 100;
            if (count < target) {
              counter.innerText = Math.ceil(count + increment);
              setTimeout(updateCounter, 20);
            } else {
              counter.innerText = target + '+';
            }
          };
          updateCounter();
          counterObserver.unobserve(counter);
        }
      });
    }, observerOptions);

    document.querySelectorAll('.counter').forEach(el => counterObserver.observe(el));
  </script>

  <!-- Schema.org JSON-LD -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "RealEstateAgent",
    "name": "LuxeEstate",
    "image": "https://images.unsplash.com/photo-1560518883-ce09059eeffa",
    "url": "https://ais-dev-2nobq4wlk3myvrfq5fom4r-113536671102.asia-southeast1.run.app",
    "telephone": "+971500000000",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Downtown Dubai",
      "addressLocality": "Dubai",
      "addressCountry": "UAE"
    }
  }
  </script>
</body>
</html>
