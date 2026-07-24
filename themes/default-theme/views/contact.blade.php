@extends('theme::layouts.main')

@section('title', 'Contact - ZeloCoreCMS')

@section('content')
<div class="page-content">
    <h2>Contact Us</h2>
    
    @if(session('success'))
        <div class="alert alert-success" style="background:#d4edda; color:#155724; padding:15px; border-radius:4px; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="/contact" method="POST" style="max-width:500px;">
        @csrf
        <div style="margin-bottom:15px;">
            <label for="name" style="display:block; margin-bottom:5px;">Name</label>
            <input type="text" id="name" name="name" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>
        
        <div style="margin-bottom:15px;">
            <label for="email" style="display:block; margin-bottom:5px;">Email</label>
            <input type="email" id="email" name="email" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>
        
        <div style="margin-bottom:15px;">
            <label for="message" style="display:block; margin-bottom:5px;">Message</label>
            <textarea id="message" name="message" rows="5" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"></textarea>
        </div>
        
        <button type="submit" style="background:#007cba; color:#fff; padding:10px 20px; border:none; border-radius:4px; cursor:pointer;">Send Message</button>
    </form>
</div>
@endsection
