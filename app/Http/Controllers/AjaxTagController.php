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
        // dd('ghghghghgh');
        $data =  $request->validate([
            'name' => 'required|string|min:3'
        ]);
        Tag::create($data);
        // return back()->with('success', 'tag added successfully');
        return response()->json(['message' => '  tag added successfully ']);
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
    public function update(Request $request, Tag $ajax_tag)
{
    // $tag = Tag::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string|min:3'
    ]);

    $ajax_tag->update($data); // كفاية دي بس، مش لازم بعدها save()
    $ajax_tag->save();
    return response()->json(['message' => 'Tag updated successfully']);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $ajax_tag)
    {
        $ajax_tag->delete();

        return response()->json(['message' => 'Tag deleted successfully']);
    }
}


