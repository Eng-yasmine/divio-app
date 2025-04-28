@extends('layouts.app')

@dd(21111)
@section('content')
    <div class="col-12">


        <h1 class="p-3 border text-center my-3">All posts</h1>
        @foreach ($posts as $post)
            <div class="col-8 mx-auto">
                <div class="card my-3">
                    <div class="card-header">
                        {{ $post->user->name }} - {{ $post->created_at }}
                    </div>
                    <div class="col-8 mx-auto">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <div class="card-img">
                            <img src="{{ $post->image() }}" height="350" width="100%" alt="">
                        </div>
                        <p class="card-text">{{ Str::limit($post->content, 200, '....') }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Show Post</a>
                    </div>
                    </div>
                </div>
            </div>
    </div>
    @endforeach
    <div>
        {{ $posts->links() }}
    </div>
    </div>
@endsection
