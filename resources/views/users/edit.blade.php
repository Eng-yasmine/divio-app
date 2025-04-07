@extends('layouts.app')


@section('content')
    <div class="col-12">

        <h1 class="p-3 text-center my-3">Update Users Info</h1>
    </div>
    <div class="col-8 mx-auto">
       @include('inc.message')
        <form action="{{ route('users.update',$user->id) }}" method="POST" class="form border p-3">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">User Name</label>
                <input type="text" id="name" value="{{ $user->name }}" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email">User Email</label>
                <input type="email" id="email" value="{{ $user->email }}" name="email" class="form-control">

            </div>
            <div class="mb-3">
                <label for="pass">User Password</label>
                <input type="password" id="pass" value="" name="password" class="form-control">

            </div>
            <div class="mb-3">
                <label for="Conf_pass">Confirm Password</label>
                <input type="password" id="Conf_pass" value="" name="confirm_password" class="form-control">

            </div>
            <div class="mb-3">
                <label for="">Role</label>
                <select name="role" class="form-control">
                    <option @selected($user->role == 'admin') value="admin">Admin</option>
                    <option @selected($user->role == 'writer') value="writer">Writer</option>
                </select>
                <div class="mb-3">
                    <input type="submit" value="Save" class="form-control bg-success">
                </div>
            </div>



        </form>

    </div>
@endsection
