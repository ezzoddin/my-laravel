<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\Panel\Post\CreatePostRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return view('panel.posts.index');
    }

    public function create()
    {
        return view('panel.posts.create');
    }

    public function store(CreatePostRequest $request)
    {

        $categoryIds = Category::whereIn('name', $request->categories)->get()->pluck('id')->toArray();

        $file = $request->file('banner');

        $file_name = $file->getClientOriginalName();

        $file->storeAs('images/banners', $file_name, 'public_files');

        $data = $request->validated();
        $data['banner'] = $file_name;
        $data['user_id'] = auth()->user()->id;

        Post::create($data);

        return redirect()->route('posts.index');
    }

    public function edit($post)
    {
        return view('panel.posts.edit');
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
