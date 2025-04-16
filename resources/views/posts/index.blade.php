@extends('layouts.app')

@section('content')
    <div class="col-12">
        <a href="{{ route('posts.create') }}" class="btn btn-primary my-3">Add Post</a>
        <h1 class="p-3 border text-center my-3">All posts</h1>
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
                    <th>Discribtion</th>
                    <th>Writer</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            {{ $post->user->name }}
                        </td>

                        <td>
                            <img src="{{ asset('storage/' . $post->image()) }}" width="200">

                        </td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>

                        </td>
                        <td>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>

                        </td>
                        <td></td>
                    </tr>
                @endforeach()
            </tbody>
        </table>
        <div>
            {{ $posts->links() }}
        </div>
    </div>
@endsection
