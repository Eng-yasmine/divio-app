@extends('layouts.app')


@section('content')
    <div class="col-12">

        <h1 class="p-3 text-center my-3">Update Tag Info</h1>
    </div>
    <div class="col-8 mx-auto">
        @include('inc.message')
        <form action="{{ route('ajax-tags.update', $tag->id) }}" method="POST" class="form border p-3">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">Tag Name</label>
                <input type="text" id="name" value="{{ $tag->name }}" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" value="Save" class="form-control bg-success">
            </div>
    </div>



    </form>

    </div>
@endsection
