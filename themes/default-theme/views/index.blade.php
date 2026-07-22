@extends('theme::layouts.main')

@section('title', 'ZeloCoreCMS | The Headless CMS for Modern Teams')

@section('content')
<section class="hero">
    <h1>Zero Compromise. Total Control.</h1>
    <p>The most powerful, secure, and developer-friendly open-source CMS in the world. Built for Builders. Loved by Editors. Trusted by Enterprises.</p>
    <div class="hero-actions">
        <a href="/docs" class="btn-primary">Get Started</a>
        <a href="/features" class="btn-secondary">Explore Features</a>
    </div>
</section>

<section class="container" style="text-align: center; max-width: 900px;">
    <h2 class="section-title">The CMS That Does Everything.</h2>
    <p style="font-size: 1.25rem; color: var(--text-muted); line-height: 1.8;">
        ZELOCORECMS is an open-source CMS that clones and massively improves upon WordPress's core, adds headless API architecture, real-time visual editing, built-in AI content assistance, enterprise-grade security, and a one-click WordPress migration tool — all for free, forever, with no vendor lock-in. We're the first CMS that doesn't force you to choose between developer power and editor simplicity.
    </p>
</section>

<section class="container">
    <h2 class="section-title">Core Modules</h2>
    <div class="grid-3">
        <div class="card">
            <div class="card-icon">⚡</div>
            <h3>Content Engine</h3>
            <p>Typed, versioned, structured content. Build complex content types via UI or code with absolute precision and performance.</p>
        </div>
        <div class="card">
            <div class="card-icon">🔒</div>
            <h3>Plugin Sandbox</h3>
            <p>Security is not a plugin. Our unique isolated sandbox means third-party code never compromises your core system.</p>
        </div>
        <div class="card">
            <div class="card-icon">🧠</div>
            <h3>Intelligence by Default</h3>
            <p>AI is not a bolt-on feature. Auto-generated SEO, structured data, schema generation, and intelligent workflow assistance.</p>
        </div>
    </div>
</section>
@endsection
