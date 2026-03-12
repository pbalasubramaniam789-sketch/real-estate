import express from "express";
import { createServer as createViteServer } from "vite";
import path from "path";
import fs from "fs";

async function startServer() {
  const app = express();
  const PORT = 3000;

  app.use(express.urlencoded({ extended: true }));
  app.use(express.json());

  // Form handling logic (simulating PHP backend)
  app.post("/api/contact", (req, res) => {
    const { name, email, phone, interest, budget, message, privacy } = req.body;
    
    // Server-side validation
    if (!name || !email || !phone || !privacy) {
      return res.status(400).send("Missing required fields");
    }

    console.log("Form Submission Received:", { name, email, phone, interest, budget, message });
    
    // In a real PHP app, this would use mail()
    // Here we just redirect to thankyou.php (which we will serve as HTML)
    res.redirect("/thankyou.php");
  });

  // Vite middleware for development
  if (process.env.NODE_ENV !== "production") {
    const vite = await createViteServer({
      server: { middlewareMode: true },
      appType: "custom", // Use custom to handle .php files manually
    });
    
    app.use(vite.middlewares);

    // Custom middleware to serve .php files as HTML in dev
    app.use(async (req, res, next) => {
      const url = req.originalUrl;
      
      if (url.endsWith(".php") || url === "/" || !url.includes(".")) {
        let filename = url === "/" ? "index.php" : url.split("?")[0];
        if (filename.startsWith("/")) filename = filename.substring(1);
        
        const filePath = path.resolve(process.cwd(), filename);
        
        if (fs.existsSync(filePath)) {
          try {
            let template = fs.readFileSync(filePath, "utf-8");
            
            // Strip PHP tags for preview purposes since we are in Node
            // This is a hack to show the HTML content of the PHP files
            template = template.replace(/<\?php[\s\S]*?\?>/g, "");
            
            const html = await vite.transformIndexHtml(url, template);
            res.status(200).set({ "Content-Type": "text/html" }).end(html);
            return;
          } catch (e) {
            vite.ssrFixStacktrace(e as Error);
            next(e);
            return;
          }
        }
      }
      next();
    });
  } else {
    const distPath = path.join(process.cwd(), 'dist');
    app.use(express.static(distPath));
    app.get('*', (req, res) => {
      res.sendFile(path.join(distPath, 'index.html'));
    });
  }

  app.listen(PORT, "0.0.0.0", () => {
    console.log(`Server running on http://localhost:${PORT}`);
  });
}

startServer();
