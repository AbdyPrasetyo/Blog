@extends('layouts.mainuser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mt-5">
                <h1>Data Blog  User</h1>
                <p class="lead">This is the home page of My Blog</p>
            </div>
            <div class="row mt-4">
                @if($posts->count() > 0) <!-- Pastikan terdapat data postingan -->
                <ol>
                @foreach($posts as $post)
                    <h1>   <li>     {{ $post->title }}</li></h1>


                <p>{{ Str::limit($post->content, 100) }}</p>

                <div class="card-footer">
                    <small class="text-muted">Posted by {{ $post->user->name }} on {{ $post->created_at ? $post->created_at->format('d F Y') : 'Unknown Date' }}</small>
                </div>
                @endforeach


                @else
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        No posts found.
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
