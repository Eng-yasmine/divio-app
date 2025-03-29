@extends('layouts.app')

@section('content')

<div class="col-12">


    <h1 class="p-3 border text-center my-3">All posts</h1>
    <div class="card">
        <div class="card-header">
            {{ $post->user->name }} - {{ $post->created_at }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('posts.view') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

@endsection
