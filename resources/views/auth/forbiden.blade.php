<!-- resources/views/errors/forbidden.blade.php -->

@extends('layouts.mainuser')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Access Forbidden 400!!</div>

                <div class="card-body bg-danger">
                    <p>You do not have permission to access this page.</p>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
