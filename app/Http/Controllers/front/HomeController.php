<?php

namespace App\Http\Controllers\front;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendMessageMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::with('user','tags')->latest()->paginate(10); //aggregate

        return view('front.index', compact('posts'));
    }

    public function about()
    {


        return view('front.about');
    }

    public function contact()
    {


        return view('front.contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function SendMessage(Request $request)
    {
        $message = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|min:10|max:200',
        ]);
        Mail::to('yasmeen@yahoo.com')->send(new SendMessageMail($message));

        return back()->with('success','message has been sent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
