@extends('layouts.app')

@section('content')
    <div class="col-12">
        <a href="{{ route('posts.create') }}" class="btn btn-primary my-3">Add new <i class="mdi mdi-post:"></i></a>
        <h1 class="p-3 border text-center my-3">All posts for user {{ $user->name }}</h1>
        @if (@session('success'))
            <div class="alert alert-success">
                <h2>{{ session('success') }}</h2>
            </div>
        @endif
        <table class="table table-borderd">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>posts</th>
                    <th>Role</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($user->posts as $post)
                    <tr>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $user->role }}</td>
                    </tr>


                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>


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

    </div>
@endsection
