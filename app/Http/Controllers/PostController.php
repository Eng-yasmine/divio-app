<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(20);
        return view('home', compact('posts'));
    }
    public function view()
    {
        $posts = Post::paginate(20);
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.add');
    }

    public function store(Request $request) // recieve request post so this routing must be post
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required|string|max:256|min:6',
            'content' => 'required|string|max:256|min:20',
            'user_id' => 'required|exists:users,id',
        ]);

        // Post::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'user_id' => $request->user_id
        // ]);

        $posts = new Post();
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->user_id = $request->user_id;
        $posts->save();
        return back()->with('success', 'post add successfully');
    }

    public function edit($id)
    {
        $post = post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->save();
        // dd($post);
        return redirect()->route('posts.view')->with('success', 'post  updated successfully');
    }

    public function search(Request $request)
    {
// dd($request->all());
    $q = $request->q;
    $posts = Post::where('content','like','%'. $q . '%')->get();
    return view('posts.search',compact('posts'));
    }

    public function destroy($id)
    {
        $post = post::findOrFail($id);
        $post->delete();
        return back()->with('success', 'post deleted successfully');
    }
}
