<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogs</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="blogs-page">
    <header class="page-header">
        <h1>Jaunumi</h1>
    </header>
    <section class="posts-list">
        @foreach ($posts as $post)
        <article class="post">
            <h2 class="post-title">{{ $post->title }}</h2>
            <p class="post-content">{{ $post->content }}</p>
            @if ($post->image_path)
            <img class="post-image" src="{{ $post->image_path }}" alt="{{ $post->title }}">
            @endif
            <p class="post-date">{{ $post->published_at }}</p>
        </article>
        @endforeach
    </section>
    <footer class="page-footer">
        <button class="login-btn" type="button" onclick="window.location.href='/login'">Login</button>
    </footer>
</body>
</html>
