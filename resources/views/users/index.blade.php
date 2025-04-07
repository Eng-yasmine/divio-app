@extends('layouts.app')

@section('content')
    <div class="col-12">
        <a href="{{ route('users.create') }}" class="btn btn-primary my-3">Add users</a>
        <h1 class="p-3 border text-center my-3">All Users</h1>
        @if (@session('success'))
            <div class="alert alert-success">
                <h2>{{ session('success') }}</h2>
            </div>
        @endif
        <table class="table table-borderd">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {!! $user->role() !!}
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>

                        </td>
                        <td>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>

                        </td>
                        <td> </td>
                    </tr>
                @endforeach()
            </tbody>
        </table>
        <div>
            {{ $users->links() }}
        </div>
    </div>
@endsection
