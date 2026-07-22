@extends('theme::layouts.main')

@section('title', 'Contact | ZeloCoreCMS')

@section('content')
<section class="container">
    <div class="prose" style="max-width: 600px;">
        <h1 style="text-align: center;">Contact Us</h1>
        <p style="text-align: center;">Have a question about ZeloCoreCMS or want to inquire about enterprise features? Drop us a line.</p>
        
        @if(session('success'))
            <div style="background-color: #dcfce7; color: #166534; padding: 1rem; border-radius: 8px; margin-top: 1rem; text-align: center;">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="/contact" method="POST" style="margin-top: 2rem;">
            @csrf
            <div class="form-group">
                <label class="form-label" for="name">Your Name</label>
                <input class="form-input" type="text" id="name" name="name" required placeholder="John Doe">
            </div>
            
            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input class="form-input" type="email" id="email" name="email" required placeholder="john@example.com">
            </div>
            
            <div class="form-group">
                <label class="form-label" for="message">Message</label>
                <textarea class="form-input" id="message" name="message" rows="5" required placeholder="How can we help?"></textarea>
            </div>
            
            <button type="submit" class="btn-primary" style="width: 100%;">Send Message</button>
        </form>
    </div>
</section>
@endsection
