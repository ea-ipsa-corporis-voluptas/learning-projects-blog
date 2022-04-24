<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body'
    ];
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  GET POST
    //
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  GET AUTHOR
    //
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
