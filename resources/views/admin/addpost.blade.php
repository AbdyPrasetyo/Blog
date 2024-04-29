@extends('layouts.main')

@section('content')
<div class="text-center mt-5">
    <h1>Add New Post</h1>
</div>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter content" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
