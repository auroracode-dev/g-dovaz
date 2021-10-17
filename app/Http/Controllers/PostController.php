<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
      'title' => 'required',
      'category' => 'required',
      'type' => 'required',
      'user' => 'required'
    ]);

        $data = new Post();
        $data->title = $request->title;
        $data->category_id = $request->category;
        $data->type = $request->type;
        $data->user_id = $request->user;
        $data->content = $request->content;

        if (!empty($request->file('banner'))) {
            $fileName = date('d-m-Y-') . $request->file('banner')->getClientOriginalName();
            $file = $request->file('banner')->storeAs('posts', $fileName);
            $data->banner = $file;
        }

        $data->save();

        return redirect('/admin/posts') . with(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $input = $request->all();

        if (!empty($request->file('banner'))) {
            if (Storage::exists($post->banner)) {
                Storage::delete($post->banner);
            }
            $fileName = date('d-m-Y-') . $request->file('banner')->getClientOriginalName();
            $file = $request->file('banner')->storeAs('posts', $fileName);
            $input['banner'] = $file;
        }
        $post->update($input);

        return redirect('/admin/posts') . with(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Storage::exists($post->banner)) {
            Storage::delete($post->banner);
        }
        $post->delete();
        return redirect('/admin/posts')->with('success', 'Task Deleted Successfully');
    }
}
