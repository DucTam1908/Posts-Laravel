<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    const PATH_VIEW = 'admin.posts.';
    const PATH_UPLOAD = 'posts';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::query()->with('category', 'author')->latest('id')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        $authors = Author::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'content' => 'required|string',
            'author_id' => 'required|exists:authors,id', 
            'category_id' => 'required|exists:categories,id', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $pathFile = Storage::put('posts', $request->file('image'));

            $validateData['image'] = 'storage/' . $pathFile;
        }

        Post::query()->create($validateData);

        return redirect()->route('admin.posts.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Post::query()->with('category', 'author')->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        $authors = Author::query()->pluck('name', 'id')->all();

        $data = Post::query()->with('category', 'author')->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'authors', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'content' => 'required|string',
            'author_id' => 'required|exists:authors,id', 
            'category_id' => 'required|exists:categories,id', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $pathFile = Storage::put('posts', $request->file('image'));

            $validateData['image'] = 'storage/' . $pathFile;
        }

        Post::query()->findOrFail($id)->update($validateData);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::query()->findOrFail($id)->delete();
        return  redirect()->route('admin.posts.list');
    }
}
