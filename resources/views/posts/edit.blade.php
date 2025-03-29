@extends('layouts.app')


@section('content')
    <div class="col-12">

        <h1 class="p-3 text-center my-3">Edit posts Info</h1>
    </div>
    <div class="col-8 mx-auto">
        @if (@session('success'))
            <div class="alert alert-success">
                <h2>{{ session('success') }}</h2>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('posts',$post->id) }}" method="POST" class="form border p-3">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title">Post Title</label>
                <input type="text" value="{{ $post->title }}" id="title" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Post Content</label>
                <textarea name="content" class="form-control" rows="7">{{ $post->content }}</textarea>
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
