@extends('layouts.app')


@section('content')
    <div class="col-12">

        <h1 class="p-3 text-center my-3">Update Tag Info</h1>
    </div>
    <div class="col-8 mx-auto">
        <div id="message-area"></div>
        <form action="{{ route('ajax-tags.update', $tag->id) }}" id="send-data" method="POST" class="form border p-3">
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

@section('script')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let formElement = document.getElementById("send-data");

        formElement.addEventListener("submit", function(e) {
            e.preventDefault();

            let input = document.querySelector("input[name='name']");
            let token = document.querySelector("input[name='_token']");

            fetch(formElement.action, {
                    method: "PUT",
                    headers: {
                        "X-CSRF-TOKEN": token.value,
                        "Accept": "application/json",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        name: input.value
                    })
                })
                .then(async res => {
                    let data = await res.json();

                    if (!res.ok) {
                        throw { response: data };
                    }

                    document.getElementById("message-area").innerHTML =
                        `<div class="alert alert-success">${data.message}</div>`;  // عرض الرسالة المرسلة من السيرفر

                    setTimeout(() => {
                        document.getElementById("message-area").innerHTML = "";
                    }, 3000); // 3 ثواني
                })
                .catch(async err => {
                    let messageArea = document.getElementById("message-area");

                    try {
                        let errorData = err.response;

                        if (errorData.errors) {
                            let errorsHtml = Object.values(errorData.errors)
                                .map(errorArray =>
                                    `<div class="alert alert-danger">${errorArray[0]}</div>`)
                                .join('');
                            messageArea.innerHTML = errorsHtml;
                        } else {
                            messageArea.innerHTML =
                                `<div class="alert alert-danger">حدث خطأ غير متوقع</div>`;
                        }
                    } catch {
                        messageArea.innerHTML =
                            `<div class="alert alert-danger">حدث خطأ أثناء الإرسال</div>`;
                    }
                });
        });
    });
</script>
@endsection



