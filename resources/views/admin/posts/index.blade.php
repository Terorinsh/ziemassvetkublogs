<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Manage Posts</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="manage-posts-page">
    <header class="page-header">
        <h1>Manage Posts</h1>
        <a class="add-post-btn" href="{{ route('posts.create') }}">Add New Post</a>
    </header>
    <section class="posts-table-section">
        <table class="posts-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <form class="toggle-status-form" action="{{ route('admin.posts.toggle', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="toggle-btn" type="submit">
                                {{ $post->is_active ? 'Izslēgt' : 'Ieslēgt' }}
                            </button>
                        </form>
                        <form class="delete-form" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <form class="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="form-button logout-button" type="submit">Logout</button>
    </form>
</body>
</html>
