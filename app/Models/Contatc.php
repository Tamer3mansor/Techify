<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contatc extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];
}
