@extends('theme::layouts.main')

@section('title', 'Documentation | ZeloCoreCMS')

@section('content')
<section class="container">
    <div class="prose">
        <h1>Documentation</h1>
        <p>Welcome to the official ZeloCoreCMS documentation. Learn how to set up, configure, and extend your headless CMS.</p>
        
        <h2>Getting Started</h2>
        <p>Once you have ZeloCoreCMS installed, the first step is to log into the admin dashboard at <code>/admin</code>. Here you can create your first <strong>Content Type</strong>.</p>
        
        <h3>Content Types & Schemas</h3>
        <p>ZeloCoreCMS relies on JSON schemas. When you create a Content Type, you are defining the exact structure (fields, validation) for your content. The API will automatically enforce this schema.</p>
        
        <h2>Plugin System</h2>
        <p>We provide a unique Sandboxed Plugin system. Plugins can interact with the core through the <code>PluginAPI</code> object.</p>
        <ul>
            <li><code>addAction(hook, callback)</code></li>
            <li><code>addFilter(hook, callback)</code></li>
            <li><code>applyFilters(hook, value)</code></li>
        </ul>
        <p>Example: To modify SEO data, hook into <code>api.response.content</code>.</p>
    </div>
</section>
@endsection
