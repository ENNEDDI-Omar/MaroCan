@extends('layouts.dash')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Users</h1>
            <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Create User</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                            <form style="display:inline-block" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection