@extends('layouts.app')

@section('content')
    <div class="col-12">
        @can('create-post')
            <a href="{{ route('posts.create') }}" class="btn btn-primary my-3">Add Post</a>
        @endcan
        <a href="{{ route('posts.export') }}" class="btn btn-success my-3">Excell Export</a>
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
                    <th>Tags</th>
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
                            @foreach ($post->tags as $tag)
                                <span class="badge bg-warning my-1">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            {{ $post->user->name }}
                        </td>

                        <td>
                            @if ($post->image )

                            <img src="{{ $post->image() }}" width="200">
                            @endif

                        </td>
                        @can('update-post', $post)
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
                        @endcan

                    </tr>
                @endforeach()
            </tbody>
        </table>
        <div>
            {{ $posts->links() }}
        </div>
    </div>
@endsection
