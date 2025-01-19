<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image_path',
        'category_id',
        'user_id',

    ];
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
