<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gallery.index')->with('gallery', Gallery::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create')->with('categories', Category::all());
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
      'category_id' => 'required',
      'img' => 'mimes:jpeg,jpg,png,gif|required',
      'user_id' => 'required'
    ]);

        $input = $request->all();

        // Save file
        $fileName = date('d-m-Y-') . $request->file('img')->getClientOriginalName();
        $file = $request->file('img')->storeAs('gallery', $fileName);

        $input['img'] = $file;

        Gallery::create($input);

        return redirect('/admin/gallery') . with(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', ['gallery' => $gallery, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
      'title' => 'required',
      'category_id' => 'required',
      'user_id' => 'required'
    ]);

        $input = $request->all();

        if (!empty($request->file('img'))) {
            // Delete existing image
            if (Storage::exists($gallery->img)) {
                Storage::delete($gallery->img);
            }

            // Save new image
            $fileName = date('d-m-Y-') . $request->file('img')->getClientOriginalName();
            $file = $request->file('img')->storeAs('gallery', $fileName);

            $input['img'] = $file;
        }
        $gallery->update($input);

        return redirect('/admin/gallery') . with(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        // This validation is not necessary but I put it in case something
        if (Storage::exists($gallery->img)) {
            Storage::delete($gallery->img);
        }
        $gallery->delete();
        return redirect('/admin/gallery')->with('success', 'Task Deleted Successfully');
    }

    public function download(Gallery $gallery)
    {
        return Storage::download($gallery->img);
    }
}
