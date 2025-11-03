<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware('auth'),
            // You can also limit middleware to certain methods:
            // new Middleware('auth', only: ['create', 'store', 'edit', 'update', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('tags.index')->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        $tag = new Tag($validated);
        $tag->save();

        return redirect(route('tags.index'))->with('success','Tag Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('tags.show',['tag'=>$tag]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit',['tag'=>$tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);

        $tag->update($validated);
        return redirect(route('tags.show',['tag'=>$tag]))->with('success','Tag Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->posts()->detach();
        $tag->delete();
        return redirect(route('tags.index'))->with('success','Tag deleted successfully!');
    }
}
