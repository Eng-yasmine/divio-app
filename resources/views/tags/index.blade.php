@extends('layouts.app')

@section('content')
    <div class="col-12">
        <a href="{{ route('tags.create') }}" class="btn btn-primary my-3">Add Tag</a>
        <h1 class="p-3 border text-center my-3">All Tags</h1>
        @include('inc.message')
        <table class="table table-borderd">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tag->name }}</td>




                        <td>
                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary">Edit</a>
                        </td>

                        <td>

                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>

                        </td>

                    </tr>
                @endforeach()
            </tbody>
        </table>
        <div>
            {{ $tags->links() }}
        </div>
    </div>
@endsection
