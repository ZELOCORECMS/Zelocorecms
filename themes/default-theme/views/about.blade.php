@extends('theme::layouts.main')

@section('title', 'About Us | ZeloCoreCMS')

@section('content')
<section class="container">
    <div class="prose">
        <h1>About ZeloCoreCMS</h1>
        <p>ZeloCoreCMS was built out of a frustration with legacy monolithic platforms. We realized that modern digital teams need absolute freedom over their frontend stack, while content creators need an intuitive, reliable backend.</p>
        
        <h2>Our Mission</h2>
        <p>To empower developers and content teams to build exceptional digital experiences without compromising on speed, security, or usability.</p>
        
        <h2>The Architecture</h2>
        <p>We chose PHP and Laravel as our foundation because of its battle-tested stability and rich ecosystem. However, we reimagined the CMS architecture:</p>
        <ul>
            <li><strong>Headless by Default:</strong> No assumed frontend framework. Consume via REST APIs.</li>
            <li><strong>Plugin Sandboxing:</strong> Unique tier-based isolation so plugins can't break your core.</li>
            <li><strong>Theme Engine:</strong> Although headless, we provide a robust Blade-powered theme engine for quick landing pages.</li>
        </ul>
    </div>
</section>
@endsection
