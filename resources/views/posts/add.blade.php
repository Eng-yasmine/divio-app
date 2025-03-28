@extends('layouts.app')


@section('content')
    <div class="col-12">

        <h1 class="p-3 text-center my-3">Add New posts</h1>
    </div>
    <div class="col-8 mx-auto">
        <form action="{{ route('posts.store') }}" method="POST" class="form border p-3">
            @csrf
            <div class="mb-3">
                <label for="title">Post Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Post Content</label>
                <textarea   name="content" class="form-control" rows="7"></textarea>
            </div>
            <div class="mb-3">
                <label for="">Writer</label>
                <select name="user_id" class="form-control">
                    <option value="1">yasmeen</option>
                    <option value="2">Sara</option>
                </select>
                <div class="mb-3">
                    <input type="submit" value="Save" class="form-control bg-success">
                </div>
            </div>



        </form>

    </div>
@endsection
