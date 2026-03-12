<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Real Estate Insights | LuxeEstate Blog</title>
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
    
    .container { max-width: 1200px; margin: 4rem auto; padding: 0 2rem; }
    h1 { font-family: var(--font-display); font-size: 3.5rem; color: var(--color-primary); text-align: center; margin-bottom: 3rem; }
    
    .blog-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 3rem; }
    .blog-card { background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: 0.3s; }
    .blog-card:hover { transform: translateY(-10px); box-shadow: 0 20px 50px rgba(0,0,0,0.1); }
    .blog-image { height: 250px; overflow: hidden; }
    .blog-image img { width: 100%; height: 100%; object-fit: cover; }
    .blog-content { padding: 2rem; }
    .category { color: var(--color-accent); font-size: 0.8rem; text-transform: uppercase; font-weight: 700; margin-bottom: 0.5rem; display: block; }
    .blog-card h2 { font-family: var(--font-display); font-size: 1.8rem; margin: 0.5rem 0 1rem; color: var(--color-primary); }
    .blog-card p { color: #666; font-size: 0.95rem; margin-bottom: 1.5rem; }
    .read-more { color: var(--color-primary); font-weight: 700; text-decoration: none; border-bottom: 2px solid var(--color-accent); padding-bottom: 2px; }
    
    footer { background: var(--color-primary); color: white; padding: 4rem 0; text-align: center; margin-top: 6rem; }
  </style>
</head>
<body>
  <header>
    <a href="index.php">LUXE<span>ESTATE</span></a>
  </header>

  <div class="container">
    <h1>Market Insights & Guides</h1>
    
    <div class="blog-grid">
      <article class="blog-card">
        <div class="blog-image">
          <img src="https://images.unsplash.com/photo-1460472178825-e5240623abe5?auto=format&fit=crop&w=800&q=80" alt="Market Trends" referrerPolicy="no-referrer">
        </div>
        <div class="blog-content">
          <span class="category">Investment</span>
          <h2>Dubai Real Estate Market Outlook 2025</h2>
          <p>An in-depth analysis of the luxury segment and upcoming growth areas. We explore why HNWIs are flocking to the region.</p>
          <a href="#" class="read-more">Read Full Article</a>
        </div>
      </article>

      <article class="blog-card">
        <div class="blog-image">
          <img src="https://images.unsplash.com/photo-1582408921715-18e7806365c1?auto=format&fit=crop&w=800&q=80" alt="Buying Guide" referrerPolicy="no-referrer">
        </div>
        <div class="blog-content">
          <span class="category">Guides</span>
          <h2>The Ultimate Guide to Off-Plan Investing</h2>
          <p>Everything you need to know before signing your first off-plan contract. Risk management and ROI projections included.</p>
          <a href="#" class="read-more">Read Full Article</a>
        </div>
      </article>

      <article class="blog-card">
        <div class="blog-image">
          <img src="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=800&q=80" alt="Luxury Living" referrerPolicy="no-referrer">
        </div>
        <div class="blog-content">
          <span class="category">Lifestyle</span>
          <h2>Top 5 Sustainable Luxury Developments</h2>
          <p>Eco-friendly living meets high-end architectural design. Discover the future of green luxury living in 2025.</p>
          <a href="#" class="read-more">Read Full Article</a>
        </div>
      </article>
    </div>
  </div>

  <footer>
    <p>Copyright © 2025 LUXEESTATE. All Rights Reserved.</p>
  </footer>
</body>
</html>
