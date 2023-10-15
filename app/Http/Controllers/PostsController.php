<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Categories;
use App\Models\Posts;
use App\Tables\Posts as TablesPosts;
use ProtoneMedia\Splade\Facades\Toast;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => TablesPosts::class
        ]);
    }

    public function create()
    {
        $categories = Categories::pluck('name', 'id')->toArray();
        return view('posts.create', compact('categories'));
    }

    public function store(StorePostsRequest $request)
    {
        Posts::create($request->validated());

        Toast::success('Post created!');

        return redirect()->route('posts.index');
    }

    public function show(Posts $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Posts $post)
    {
        $categories = Categories::pluck('name', 'id')->toArray();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostsRequest $request, Posts $post)
    {
        $post->update($request->validated());

        Toast::success('Post updated!');

        return redirect()->route('posts.index');
    }

    public function destroy(Posts $post)
    {
        $post->delete();

        Toast::danger('Post deleted!');

        return redirect()->route('posts.index');
    }
}
