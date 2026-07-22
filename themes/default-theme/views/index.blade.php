@extends('theme::layouts.main')

@section('title', 'ZeloCoreCMS | The Headless CMS for Modern Teams')

@section('content')
<section class="hero">
    <h1>Build Faster with ZeloCoreCMS</h1>
    <p>A completely headless, API-first content management system designed for speed, flexibility, and absolute control over your digital experiences.</p>
    <div class="hero-actions">
        <a href="/docs" class="btn-primary">Get Started</a>
        <a href="/admin" class="btn-secondary">View Dashboard</a>
    </div>
</section>

<section class="container">
    <h2 class="section-title">Core Features</h2>
    <div class="grid-3">
        <div class="card">
            <div class="card-icon">⚡</div>
            <h3>Lightning Fast API</h3>
            <p>Deliver content to any platform instantly using our robust RESTful APIs built on the powerful Laravel framework.</p>
        </div>
        <div class="card">
            <div class="card-icon">🛠️</div>
            <h3>Dynamic Content Types</h3>
            <p>Design your schema using our intuitive UI. From rich text to complex media relations, structure data your way.</p>
        </div>
        <div class="card">
            <div class="card-icon">🔒</div>
            <h3>Secure Sandboxed Plugins</h3>
            <p>Extend functionality safely. Our tiered plugin sandbox ensures third-party code never compromises your core system.</p>
        </div>
    </div>
</section>
@endsection
