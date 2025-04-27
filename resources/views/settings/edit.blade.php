@extends('layouts.app')


@section('content')
    <div class="col-12">

        <h1 class="p-3 text-center my-3">Edit Settings Of App</h1>
    </div>
    <div class="col-12 mx-auto">
       @include('inc.message')
        <form action="{{ route('settings.update') }}" method="POST" class="form border p-3">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-6">
                    <label for="">Site Name</label>
                    <input type="text" id="" value="{{ $settings->sit_name }}" name="sit_name" class="form-control">
                </div>
                <div class="col-6">
                    <label for="">FaceBook</label>
                    <input type="url" id="" value="{{ $settings->facebook }}" name="facebook" class="form-control">

                </div>
            </div>

            <div class="row">

                <div class="col-6">
                    <label for="">Twitter</label>
                    <input type="url" id="" value="{{ $settings->twitter }}" name="twitter" class="form-control">
                </div>
                <div class="col-6">
                    <label for="">Instagram</label>
                    <input type="url" id="" value="{{ $settings->instagram }}" name="instagram" class="form-control">

                </div>
            </div>

            <div class="row">

                <div class="col-6">
                    <label for="">Youtube</label>
                    <input type="url" id="" value="{{ $settings->youtube }}" name="youtube" class="form-control">
                </div>
                <div class="col-6">
                    <label for="">LinkedIn</label>
                    <input type="url" id="" value="{{ $settings->linkedin }}" name="linkedin" class="form-control">

                </div>
            </div>
            <div class="row">

                <div class="col-12">
                    <label for="">About Us Content</label>
                    <textarea  name="about_us_content" class="form-control" rows="10">{{ strip_tags($settings->about_us_content) }}
</textarea>
                </div>

            </div>



                <div class="mb-3">
                    <input type="submit" value="Save" class="form-control bg-success">
                </div>
            </div>



        </form>

    </div>
@endsection
