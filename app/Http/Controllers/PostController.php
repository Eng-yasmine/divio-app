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
    public function store()
    {
       // return view('posts.add');
    }
    public function edit()
    {
        return view('posts.edit');
    }
}
