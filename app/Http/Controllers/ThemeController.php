<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(4);
        return view('theme.index', compact('blogs'));

    }
   public function category($name)
{
    $category = category::where('name', '=', $name)->first();
    if (!$category) {
        abort(404, 'Category not found.');
    }

    $blogs = Blog::where('category_id', $category->id)->paginate(8);
    return view('theme.category', compact('blogs', 'name'));
}

    public function contact()
    {
        return view('theme.contact');

    }
    public function login()
    {
        return view('login');

    }
    public function register()
    {
        return view('register');

    }
    public function singleBlog()
    {
        return view('theme.singleBlog');

    }
}
