@extends('theme::layouts.main')

@section('title', 'For Investors | ZeloCoreCMS')

@section('content')
<section class="container">
    <div class="prose" style="max-width: 900px;">
        <h1 style="text-align: center; margin-bottom: 1rem;">Go-To-Market & Investment Strategy</h1>
        <p style="text-align: center; font-size: 1.25rem; font-style: italic; color: var(--text-muted); margin-bottom: 3rem;">
            "We don't advertise. We build something so good that people can't stop talking about it."
        </p>

        <h2>The Market Opportunity</h2>
        <p>The CMS industry is stuck between two flawed paradigms:</p>
        <ol>
            <li><strong>Monolithic (WordPress):</strong> Easy for editors, but a nightmare for modern developers (PHP templating, security vulnerabilities).</li>
            <li><strong>Headless (Contentful, Strapi):</strong> Great for developers, but isolates content editors without heavy custom frontend work.</li>
        </ol>
        <p><strong>ZeloCoreCMS bridges this gap</strong>. We clone the best parts of the WordPress data model but rebuild it with a modern, secure, headless API architecture powered by Laravel.</p>

        <h2>Product-Led Growth (PLG) Engine</h2>
        <ul>
            <li><strong>Developer-First Acquisition:</strong> Win developers first, and enterprises follow. Open-source means zero friction to adoption.</li>
            <li><strong>Content-Led organic growth:</strong> Tutorials, SEO ("Best Headless CMS 2025"), and documentation drive high-intent traffic.</li>
            <li><strong>Community-Led Retention:</strong> Thriving Discord and GitHub communities turn users into evangelists.</li>
        </ul>

        <h2>Success Metrics (5-Year Target)</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 1rem; margin-bottom: 2rem;">
            <thead>
                <tr style="background-color: var(--bg-main); border-bottom: 2px solid var(--border-color);">
                    <th style="padding: 1rem; text-align: left;">Metric</th>
                    <th style="padding: 1rem; text-align: left;">Year 1</th>
                    <th style="padding: 1rem; text-align: left;">Year 3</th>
                    <th style="padding: 1rem; text-align: left;">Year 5</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 1rem;">GitHub Stars</td>
                    <td style="padding: 1rem;">5,000</td>
                    <td style="padding: 1rem;">75,000</td>
                    <td style="padding: 1rem;">200,000+</td>
                </tr>
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 1rem;">Active Installations</td>
                    <td style="padding: 1rem;">1,000</td>
                    <td style="padding: 1rem;">200,000</td>
                    <td style="padding: 1rem;">2,000,000</td>
                </tr>
                <tr>
                    <td style="padding: 1rem; font-weight: bold;">ARR (Managed Cloud)</td>
                    <td style="padding: 1rem; color: var(--primary-color);">$0</td>
                    <td style="padding: 1rem; color: var(--primary-color);">$6M</td>
                    <td style="padding: 1rem; color: var(--primary-color);">$120M+</td>
                </tr>
            </tbody>
        </table>

        <h2>Why Invest in ZeloCoreCMS?</h2>
        <p>We are disrupting a $50B market dominated by legacy players who are too slow to adapt. We have the architecture to win the enterprise, and the open-source community to win the world.</p>
        <div style="text-align: center; margin-top: 3rem;">
            <a href="/contact" class="btn-primary">Request Pitch Deck</a>
        </div>
    </div>
</section>
@endsection
