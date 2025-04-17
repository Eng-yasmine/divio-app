@extends('layouts.app')


@section('content')
    <div class="col-12">

        <h1 class="p-3 text-center my-3">Add New posts</h1>
    </div>
    <div class="col-8 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (@session('success'))
            <div class="alert alert-success">
                <h2>{{ session('success') }}</h2>
            </div>
        @endif
        <form action="{{ route('posts.store') }}" method="POST" class="form border p-3" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title">Post Title</label>
                <input type="text" id="title" value="{{ old('title') }}" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Post Content</label>
                <textarea name="content" class="form-control" rows="7">{{ old('content') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="">Post Image</label>
                <input type="file" id="title" value="" name="image" class="form-control">

            </div>


            <div class="mb-3">
                <label for="">Tags</label>
                <select name="tags[]" multiple class="form-control">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="">Writer</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <input type="submit" value="Save" class="form-control bg-success">
                </div>
            </div>



        </form>

    </div>
@endsection
