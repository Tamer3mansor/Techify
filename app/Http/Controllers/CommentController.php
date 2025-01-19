<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog, StoreCommentRequest $request)
    {
        // $blog_id = $blog->id;
        $data = $request->validated();
        Comment::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'blog_id' => $data['blog_id']
        ]);
         return back()->with('comment','Your Comment Add Successfully');
        //       'name','email','subject','message'


    }
    public function show(Blog $blog)
    {
        $blog_id = $blog->id;
        $comments =  Comment::where('blog_id',$blog_id)->get();
         return back()->with('comment','Your Comment Add Successfully');
        //       'name','email','subject','message'


    }
}
