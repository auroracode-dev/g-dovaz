<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Product;
use App\Models\Site_init;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $site_init = Site_init::find(1);
        return view('index', compact('site_init'));
    }

    public function post(Request $request)
    {
        $posts = Post::where('type', 'blog')->get();
        $ultimes = Post::whereDate('created_at', '<', '2040-10-11')->where('type', 'blog')->get();
        $categories = Category::all();
        $route = "post";
        if (!empty($request->ct)) {
            $posts = Post::where('type', 'blog')->where('category_id', $request->ct)->get();
        }
        return view('post', compact('posts', 'categories', 'route', 'ultimes'));
    }

    public function shop(Request $request)
    {
        $products = Product::all();
        $ultimes = Product::whereDate('created_at', '<', '2040-10-11')->get();

        $route = "shop";
        $categories = Category::all();
        if (!empty($request->ct)) {
            $products = Product::where('category_id', $request->ct)->get();
        }
        return view('shop', compact('products', 'categories', 'route', 'ultimes'));
    }

    public function news(Request $request)
    {
        $posts = Post::where('type', 'news')->get();
        $ultimes = Post::whereDate('created_at', '<', '2040-10-11')->where('type', 'news')->get();
        $route = "news";
        $categories = Category::all();
        if (!empty($request->ct)) {
            $posts = Post::where('type', 'news')->where('category_id', $request->ct)->get();
        }
        return view('post', compact('posts', 'categories', 'route', 'ultimes'));
    }

    public function project(Request $request)
    {
        $posts = Post::where('type', 'project')->get();
        $ultimes = Post::whereDate('created_at', '<', '2040-10-11')->where('type', 'project')->get();
        $route = "project";
        $categories = Category::all();
        if (!empty($request->ct)) {
            $posts = Post::where('type', 'project')->where('category_id', $request->ct)->get();
        }
        return view('post', compact('posts', 'categories', 'route', 'ultimes'));
    }

    // public function gallery(Request $request)
    // {
    //     $products = Gallery::all();
    //     $ultimes = Gallery::whereDate('created_at', '<', '2040-10-11')->get();
    //     $route = "gallery";
    //     $categories = Category::all();
    //     if (!empty($request->ct)) {
    //         $products = Gallery::where('category_id', $request->ct)->get();
    //     }
    //     return view('gallery', compact('products', 'categories', 'route', 'ultimes'));
    // }

    public function see_more(Post $post)
    {
        $site_banner = Site_init::where('id', 1)->get('site_banner');
        $products = Gallery::all();
        return view('see_more.see_more', compact('post', 'site_banner'));
    }

    // public function gallery_see(Gallery $product)
    // {
    //     $site_banner = Site_init::where('id', 1)->get('site_banner');
    //     $products = Gallery::all();
    //     return view('see_more.gallery_see', compact('product', 'site_banner'));
    // }
    
    public function shop_see(Product $product)
    {
        $products = Gallery::all();
        return view('see_more.shop_see', compact('product'));
    }
}
