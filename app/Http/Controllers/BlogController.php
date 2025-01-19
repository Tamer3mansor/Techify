<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\category;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Middleware\Authenticate;
// use Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only(['create']);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('hi');
        // return view('theme.blogs.my-blog');
    }
    public function myBlog()
    {
        $user_id = Auth::user()->id;
        $blogs = Blog::where('user_id', $user_id)->paginate(5);
        return view('theme.blogs.my-blog', compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            $categories = category::get();
            return view('theme.blogs.create', compact('categories'));
        } else
            abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        // dd($request);
        $data = $request->validated();
        $image = $data['image_path'];
        $newImageName = $data['name'] . '_' . time() . '_' . $image->getClientOriginalName();
        $image->storeAs('blogs', $newImageName, 'public');
        $data['image_path'] = $newImageName;
        $data['user_id'] = Auth::user()->id;
        // dd($data);
        Blog::create([
            'name' => $data['name'],
            'image_path' => $data['image_path'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'user_id' => $data['user_id'],
        ]);

        return back()->with("blog_created", 'created success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        if (Auth::check()) {
            return view('theme.singleBlog', compact('blog'));
        } else
            abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
            $categories = category::get();
            return view('theme.blogs.edit', compact('categories', 'blog'));
        } else
            abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
            $data = $request->validated();
            if ($request->hasFile('image_path')) {
                Storage::delete("public/blogs/$blog->image_path");
                $image = $request->image_path;
                $newImageName = $data['name'] . '_' . time() . '_' . $image->getClientOriginalName();
                $image->storeAs('blogs', $newImageName, 'public');
                $data['image_path'] = $newImageName;
                $blog->Update([
                    'image_path' => $data['image_path'],
                ]);
            }
            $data['user_id'] = Auth::user()->id;
            $blog->Update([
                'name' => $data['name'],
                'category_id' => $data['category_id'],
                'description' => $data['description'],
            ]);
            return redirect()->route('/');
        }
        abort(402);



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {

            Storage::delete("public/blogs/$blog->image_path");
            $blog->delete();
            to_route('blogs.myBlog');
        }
        abort(403);


    }
}
