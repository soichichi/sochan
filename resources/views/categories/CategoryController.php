<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest; ;
use App\Category;

class PostController extends Controller
{
    public function index(Category $category)
    {
        return view('categories/index')->with(['posts' => $category->getByCategory()]); 
    }
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);;
    }
    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    public function update(Post $post, PostRequest $request)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}