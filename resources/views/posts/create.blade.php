<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Pievienot jaunumus</title>
</head>
<body class="add-post-page">
    <header class="page-header">
        <h1>Pievienot jaunu ierakstu</h1>
    </header>
    <form class="post-form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Virsraksts:</label>
        <input class="form-input" type="text" name="title" required><br>
        
        <label for="content">Saturs:</label>
        <textarea class="form-textarea" name="content" required></textarea><br>
        
        <label for="image">Attēls:</label>
        <input class="form-input" type="file" name="image"><br>
        
        <label for="published_at">Publicēšanas datums:</label>
        <input class="form-input" type="date" name="published_at" required><br>
        
        <label for="is_active">Aktīvs:</label>
        <input class="form-checkbox" type="checkbox" name="is_active" checked><br>
        
        <button class="form-button" type="submit">Saglabāt</button>
    </form>
    <footer class="page-footer">
        <button class="back-btn" type="button" onclick="window.location.href='/admin/posts'">Admin Home</button>
    </footer>
</body>
</html>
