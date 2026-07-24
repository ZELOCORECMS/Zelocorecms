<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ZeloCore Default Theme')</title>
    <link rel="stylesheet" href="/theme-assets/css/style.css">
    @stack('styles')
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1><a href="/">ZeloCoreCMS</a></h1>
            <nav class="site-navigation">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/features">Features</a></li>
                    <li><a href="/docs">Docs</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="site-main container">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} ZeloCoreCMS. All rights reserved.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
