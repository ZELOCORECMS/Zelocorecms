@extends('theme::layouts.main')

@section('title', 'Features | ZeloCoreCMS')

@section('content')
<section class="container">
    <div class="prose" style="max-width: 1000px;">
        <h1 style="text-align: center; margin-bottom: 3rem;">Unrivaled Core Features</h1>
        
        <div class="grid-3" style="grid-template-columns: 1fr 1fr;">
            <div class="card">
                <div class="card-icon">⚡</div>
                <h3>Headless Content Engine</h3>
                <p>Fully typed, versioned, and structured content models. Supports 21+ field types including relations, dynamic components, and AI blocks.</p>
            </div>
            
            <div class="card">
                <div class="card-icon">🔒</div>
                <h3>Sandboxed Plugins</h3>
                <p>Plugins run in Web Worker-like isolation. Cryptographically signed packages ensure third-party code can never break your core system or leak secrets.</p>
            </div>
            
            <div class="card">
                <div class="card-icon">🛡️</div>
                <h3>Auth & IAM</h3>
                <p>Enterprise-ready authentication built-in. OAuth2, SAML, and granular Role-Based Access Control (RBAC) scoped per workspace.</p>
            </div>
            
            <div class="card">
                <div class="card-icon">🖼️</div>
                <h3>Advanced Media Manager</h3>
                <p>On-the-fly WebP/AVIF transcoding, responsive srcset generation, and seamless integration with AWS S3, MinIO, or Cloudflare R2.</p>
            </div>
            
            <div class="card">
                <div class="card-icon">🚀</div>
                <h3>ZeloMigrate</h3>
                <p>One-click WordPress migration tool. Imports users, media, posts, custom types, and even redirects old URLs to the new architecture.</p>
            </div>
            
            <div class="card">
                <div class="card-icon">🪝</div>
                <h3>TypeScript Hook System</h3>
                <p>A beautifully typed async hook system (add_action, add_filter) modeled after the flexibility of WordPress but with the safety of modern engineering.</p>
            </div>
        </div>

        <h2 style="text-align: center; margin-top: 5rem; margin-bottom: 2rem;">Universal Architecture</h2>
        <p style="text-align: center;">ZeloCoreCMS is built on three foundational principles to guarantee scale and accessibility:</p>
        
        <div class="grid-3" style="margin-top: 3rem;">
            <div class="card" style="text-align: center;">
                <h3 style="color: var(--primary-color);">1. Universal Hostability</h3>
                <p>Runs on shared hosting, VPS, cloud, Docker, or bare metal. Requires only PHP 8.2+ and MySQL/MariaDB. Zero Node.js required in production.</p>
            </div>
            <div class="card" style="text-align: center;">
                <h3 style="color: var(--primary-color);">2. Security at the Core</h3>
                <p>Security constraints are enforced at the architecture level, not the plugin level. Our three-tier plugin isolation model covers every hosting type.</p>
            </div>
            <div class="card" style="text-align: center;">
                <h3 style="color: var(--primary-color);">3. Developer Experience</h3>
                <p>Modern PHP 8.2+ (Fibers, Enums, Readonly classes) is not "legacy PHP" — it's a joy to use. Built on the rock-solid Laravel foundation.</p>
            </div>
        </div>
    </div>
</section>
@endsection
