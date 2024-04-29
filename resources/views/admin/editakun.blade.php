@extends('layouts.main')

@section('content')
<div class="text-center mt-5">
    <h1>Edit Data User</h1>
</div>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>user</option>
                                <!-- Tambahkan opsi lain sesuai kebutuhan -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('users.index') }}" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
