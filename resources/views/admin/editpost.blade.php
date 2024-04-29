@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', $post->id_post) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title" class="col-form-label">Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" required autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content" class="col-form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ $post->content }}</textarea>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">
                                Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
