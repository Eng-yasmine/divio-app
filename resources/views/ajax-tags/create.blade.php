@extends('layouts.app')


@section('content')
    <div class="col-12">

        <h1 class="p-3 text-center my-3">Add New tag</h1>
    </div>
    <div class="col-8 mx-auto">
        <div id="message-area"></div>

        <form action="{{ route('ajax-tags.store') }}" method="POST" id="send-data" class="form border p-3">
            @csrf
            <div class="mb-3">
                <label for="name">Tag Name</label>
                <input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" value="Save" class="form-control bg-success">
            </div>
        </form>


    </div>
@endsection


@section('script')
    <script>
       document.addEventListener("DOMContentLoaded", function() {
    let formElement = document.getElementById("send-data");

    formElement.addEventListener("submit", function(e) {
        e.preventDefault();

        let input = document.querySelector("input[name='name']");
        let token = document.querySelector("input[name='_token']");

        fetch(formElement.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": token.value,
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    name: input.value
                })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById("message-area").innerHTML = `
                    <div class="alert alert-success">Tag added successfully   </div>
                `;
            })
            .catch(err => {
                document.getElementById("message-area").innerHTML = `
                    <div class="alert alert-danger">حدث خطأ أثناء الإرسال</div>
                `;
            });
    });
});

    </script>
@endsection
