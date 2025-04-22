@extends('layouts.app')

@section('content')
    <div class="col-12">

        <a href="{{ route('ajax-tags.create') }}" class="btn btn-primary my-3">Add Tag</a>

        <h1 class="p-3 border text-center my-3">All Tags</h1>
        <div id="message-area"></div>
        <table class="table table-borderd">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>posts</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tag->name }}</td>

                        <td>
                            @foreach ($tag->posts as $post)
                                <span class="badge bg-success my-1">{{ $post->title }}</span>
                            @endforeach
                        </td>
                        <td>


                            <a href="{{ route('ajax-tags.edit', $tag->id) }}" class="btn btn-primary">Edit</a>

                        </td>

                        <td>

                            <form action="{{ route('ajax-tags.destroy', $tag->id) }}" class="delete-item" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>

                        </td>

                    </tr>
                @endforeach()
            </tbody>
        </table>
        <div>
            {{ $tags->links() }}
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let deleteForms = document.querySelectorAll('.delete-item');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    if (!confirm("Are you sure you want to delete this tag?")) return;

                    let url = this.action;
                    let token = this.querySelector("input[name='_token']").value;

                    fetch(url, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": token,
                                "Accept": "application/json"
                            },
                        })
                        .then(async res => {
                            let data = await res.json();

                            if (!res.ok) {
                                throw {
                                    response: data
                                };
                            }

                            // حذف الصف من الجدول
                            this.closest('tr').remove();

                            // عرض رسالة النجاح
                            let messageArea = document.getElementById("message-area");
                            messageArea.style.display = "block";
                            messageArea.innerHTML =
                                `<div class="alert alert-success">${data.message}</div>`;

                            setTimeout(() => {
                                messageArea.innerHTML = "";
                                messageArea.style.display = "none";
                            }, 3000);
                        })
                        .catch(async err => {
                            let messageArea = document.getElementById("message-area");
                            messageArea.innerHTML =
                                `<div class="alert alert-danger">حدث خطأ أثناء الحذف</div>`;
                        });
                });
            });
        });
    </script>
@endsection
