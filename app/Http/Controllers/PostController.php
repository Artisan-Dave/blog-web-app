<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\File;



class PostController extends Controller implements HasMiddleware
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
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'tags' => 'nullable|array',
            'body' => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        $post = Post::create([
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'body' => Purifier::clean($validated['body']),
        ]);

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/' . $filename);

            Image::read($request->file('featured_image'))
                ->resize(800, 600)
                ->save($path);

            $post->update(['image' => $filename]);

        }

        if (!empty($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }

        return redirect()->route('posts.show', $post->id)->with('success', 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // dd('update method hit', $request->all());

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'category_id' => 'required|integer',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Base data
        $data = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'body' => Purifier::clean($validated['body']),
        ];

        if ($request->hasFile('featured_image')) {

            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/' . $filename);

            Image::read($image)
                ->resize(800, 600)
                ->save($path);

            // Delete old file
            if ($post->image) {
                $oldPath = public_path('images/' . $post->image);
                if (File::exists($oldPath))
                    File::delete($oldPath);
            }

            $data['image'] = $filename;
        }

        // Single update
        $post->update($data);

        // Sync tags
        $post->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();

        // Delete image file if exists
        if ($post->image) {
            $imagePath = public_path('images/' . $post->image);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully');
    }
}
