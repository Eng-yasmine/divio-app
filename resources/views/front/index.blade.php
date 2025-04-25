@extends('front.layouts.app')


@section('content')
<header class="masthead" style="background-image: url({{ asset('front/assets/img/home-bg.jpg') }})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{ config('app.name') }}</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    <form class="d-flex me-3 my-3" action="{{ route('posts.search') }}" role="search">
                        <input class="form-control me-2" name="q" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            @foreach ($posts as $post)

            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <img src="{{$post->image() }}" alt="">
                    <h3 class="post-subtitle">{{ Str::limit($post->content,200) }}</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">{{ $post->user->name }}</a>
                    on {{ $post->created_at->format('Y-m-d') }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach



            <!-- Pager-->
            <div class=" mb-4">
                {{$posts->links()}}</div>
        </div>
    </div>
</div>

@endsection
