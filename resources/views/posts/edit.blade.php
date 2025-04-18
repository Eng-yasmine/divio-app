@extends('layouts.app')


@section('content')
    <div class="col-12">

        <h1 class="p-3 text-center my-3">Edit posts Info</h1>
    </div>
    <div class="col-8 mx-auto">
        @include('inc.message')
        <form action="{{ url('posts', $post->id) }}" method="POST" class="form border p-3" enctype="multipart/form-data">
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
                <label for="">Post Image</label>
                <input type="file" id="title" value="" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Tags</label>
                <select name="tags[]" multiple class="form-control">
                    @foreach ($tags as $tag)
                        <option @if ($post->tags->contains($tag)) selected @endif value="{{ $tag->id }}">
                            {{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="">Writer</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option @selected($user->id == $post->user_id) value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <input type="submit" value="Save" class="form-control bg-success">
            </div>



        </form>

    </div>
@endsection
