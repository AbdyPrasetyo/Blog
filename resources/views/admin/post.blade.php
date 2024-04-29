@extends('layouts.main')

@section('content')
<div class="text-center mt-5">
    <h1>Posts</h1>
    <p class="lead">List of all posts</p>
</div>
<div class="container mt-4">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive">
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">Add Post</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->user->name }}</td> <!-- Assuming 'name' is the attribute of user -->
                    <td>
                        <form action="{{ route('posts.destroy', $post->id_post) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                        <a href="{{ route('posts.edit', $post->id_post) }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
