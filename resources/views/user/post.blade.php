@extends('layouts.mainuser')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>List of Your Posts</h2>
            <div class="mb-3">
                <a href="{{ route('user.posts.create') }}" class="btn btn-primary">Add New Post</a>
            </div>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Posted at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <a href="{{ route('user.posts.edit', $post->id_post) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('user.posts.destroy', $post->id_post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">You haven't posted anything yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
