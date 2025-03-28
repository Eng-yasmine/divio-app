<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
    public function create()
    {
        return view('posts.add');
    }
    public function store(Request $request) // recieve request post so this routing must be post
    {
        echo "yas";
       // return view('posts.add');
    }
    public function edit()
    {
        return view('posts.edit');
    }
}
