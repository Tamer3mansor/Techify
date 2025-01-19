<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
