<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ZeloCoreCMS')</title>
    <meta name="description" content="@yield('meta_description', 'The default marketing theme for ZeloCoreCMS')">
    <link rel="stylesheet" href="/theme-assets/css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="nav-container">
            <a href="/" class="brand">ZeloCoreCMS</a>
            <nav class="nav-links">
                <a href="/">Home</a>
                <a href="/about">About</a>
                <a href="/docs">Documentation</a>
                <a href="/contact">Contact</a>
                <a href="/admin" class="btn-primary" style="margin-left: 1rem;">Dashboard</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-content">
            <div>
                <h3 style="margin-bottom: 1rem;">ZeloCoreCMS</h3>
                <p style="color: #94a3b8; max-width: 300px;">The next generation headless CMS for creators and developers.</p>
            </div>
            <div>
                <h4 style="margin-bottom: 1rem;">Resources</h4>
                <ul style="list-style: none; color: #94a3b8; display: flex; flex-direction: column; gap: 0.5rem;">
                    <li><a href="/docs">Documentation</a></li>
                    <li><a href="/api-reference">API Reference</a></li>
                    <li><a href="/plugins">Plugins</a></li>
                </ul>
            </div>
            <div>
                <h4 style="margin-bottom: 1rem;">Company</h4>
                <ul style="list-style: none; color: #94a3b8; display: flex; flex-direction: column; gap: 0.5rem;">
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; {{ date('Y') }} ZeloCore Team. All rights reserved.
        </div>
    </footer>
</body>
</html>
