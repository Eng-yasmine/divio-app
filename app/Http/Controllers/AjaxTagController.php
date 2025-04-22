<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;

class AjaxTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        // Gate::authorize('admin-control');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('ajax-tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajax-tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|string|min:3'
        ]);
        Tag::create($data);
        return back()->with('success', 'tag added successfully');
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
        $tag = Tag::findOrFail($id);

        return view('ajax-tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {


        $data = $request->validate([
            'name' => 'required|string|min:3'
        ]);
        $tag->update($data);
        $tag->save();
        return redirect()->route('ajax-tags.index')->with('success', 'Tag Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back()->with('success', 'Tag deleted succefully');
    }
}


