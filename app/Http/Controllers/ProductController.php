<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index')->with('data', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create')->with('categories', Category::all());
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
      'preview' => 'mimes:jpeg,jpg,png,gif|required',
      'file' => 'required',
      'price' => 'required',
      'user_id' => 'required'
    ]);

        $input = $request->all();

        // Save preview
        $previewName = date('d-m-Y') . $request->file('preview')->getClientOriginalName();
        $preview = $request->file('preview')->storeAs('products', $previewName);

        // Save file
        $fileName = $request->file('file')->getClientOriginalName();
        $file = $request->file('file')->storeAs('products', $fileName);

        $input['preview'] = $preview;
        $input['file'] = $file;

        Product::create($input);

        return redirect('/admin/products') . with(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', ['data' => $product, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
      'title' => 'required',
      'category_id' => 'required',
      'user_id' => 'required'
    ]);

        $input = $request->all();

        if (!empty($request->file('file'))) {
            // Delete existing file
            if (Storage::exists($product->file)) {
                Storage::delete($product->file);
            }

            // Save new file
            $fileName = $request->file('file')->getClientOriginalName();
            $file = $request->file('file')->storeAs('products', $fileName);

            $input['file'] = $file;
        }

        if (!empty($request->file('preview'))) {
            // Delete existing preview file
            if (Storage::exists($product->preview)) {
                Storage::delete($product->preview);
            }

            // Save new preview
            $previewName = date('d-m-Y') . $request->file('preview')->getClientOriginalName();
            $preview = $request->file('preview')->storeAs('products', $previewName);

            $input['preview'] = $preview;
        }

        $product->update($input);
        return redirect('/admin/products') . with(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // This validation is not necessary but I put it in case something
        if (Storage::exists($product->file)) {
            Storage::delete($product->file);
        }

        if (Storage::exists($product->preview)) {
            Storage::delete($product->preview);
        }

        $product->delete();
        return redirect('/admin/products')->with('success', 'Task Deleted Successfully');
    }

    public function download(Product $product)
    {
        return Storage::download($product->file);
    }
}
