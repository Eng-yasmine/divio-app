@extends('layouts.app')

@section('content')
<div class="col-12">


    <h1 class="p-3 border text-center my-3">All posts</h1>
    @foreach ($posts as $post)
            <div class="card">
                <div class="card-header">
                    {{ $post->user->name }} - {{ $post->created_at }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <div class="card-img">
                        <img src="{{ asset('storage/' . $post->image) }}" height="100" width="150" alt="">
                    </div>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('posts.show',$post->id) }}" class="btn btn-primary">Show Post</a>
                </div>
            </div>
            @endforeach
            <div>
                {{ $posts->links() }}
            </div>
        </div>
@endsection
