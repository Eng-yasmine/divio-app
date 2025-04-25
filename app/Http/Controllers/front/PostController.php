<?php

namespace App\Http\Controllers\front;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    // public function search(Request $request)
    public function search(Request $request)
    {
        // dd($request->all());
        $q = $request->q;
        $posts = Post::where('content', 'like', '%' . $q . '%')->paginate(12)->withQueryString();
        return view('front.index', compact('posts'));
    }
}
