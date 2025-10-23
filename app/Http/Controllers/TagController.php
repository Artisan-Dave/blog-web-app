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
        $tags = Tag::all();
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
