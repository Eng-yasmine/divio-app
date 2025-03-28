@extends('layouts.app')

@section('content')

<div class="col-12">
    <a href="{{ route('posts.create') }}" class="btn btn-primary my-3">Add Post</a>
    <h1 class="p-3 border text-center my-3">All posts</h1>
    <table class="table table-borderd">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Discribtion</th>
                <th>Writer</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>first title</td>
                <td>first disc</td>
                <td>
                    yasmeen
                </td>
                <td>
                    <a href="{{ route('posts.edit',1) }}" class="btn btn-info">Edit</a>

                </td>
                <td>

                    <form action="" method="POST">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>

                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

@endsection

