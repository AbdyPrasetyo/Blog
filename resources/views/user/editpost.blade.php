@extends('layouts.mainuser')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2>Edit Post</h2>
            <form action="{{ route('user.posts.update', $post->id_post) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required>{{ $post->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
