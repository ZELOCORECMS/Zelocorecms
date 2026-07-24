@extends('theme::layouts.main')

@section('title', 'Welcome to ZeloCoreCMS')

@section('content')
<div class="welcome-banner">
    <h2>Welcome to ZeloCoreCMS Default Theme</h2>
    <p>This is the default theme structure. You can customize this by editing the files in <code>themes/default-theme/</code>.</p>
</div>

<div class="posts-list">
    <!-- Example loop -->
    @if(isset($posts) && $posts->count() > 0)
        @foreach($posts as $post)
            <article class="post-item">
                <h3><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h3>
                <p>{{ Str::limit($post->excerpt, 100) }}</p>
                <a href="/post/{{ $post->slug }}" class="read-more">Read More &rarr;</a>
            </article>
        @endforeach
    @else
        <p>No posts found. Start by creating some content!</p>
    @endif
</div>
@endsection
