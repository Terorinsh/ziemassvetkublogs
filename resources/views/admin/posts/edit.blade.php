<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="edit-post-page">
    <header class="page-header">
        <h1>Edit Post</h1>
    </header>
    <form class="post-form" action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="title">Title:</label>
        <input class="form-input" type="text" name="title" value="{{ old('title', $post->title) }}" required><br>

        <label for="content">Content:</label>
        <textarea class="form-textarea" name="content" required>{{ old('content', $post->content) }}</textarea><br>
        
        <label for="is_active">Active:</label>
        <input class="form-checkbox" type="checkbox" name="is_active" {{ $post->is_active ? 'checked' : '' }}><br>

        <button class="form-button" type="submit">Update Post</button>
    </form>
    <form class="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="form-button logout-button" type="submit">Logout</button>
        <button class="back-btn" type="button" onclick="window.location.href='/admin/posts'">Admin Home</button>
    </form>
</body>
</html>
