@extends('layouts.main')
@section('content')
<div class="text-center mt-5">
    <h1>User Accounts</h1>
    <p class="lead">List of all user accounts</p>
</div>
<div class="container mt-4">
    <div class="table-responsive">

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-2"> Tambah data</a>
        <div class="container mt-4">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</button>
                        </form>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
