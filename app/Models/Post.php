<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'slug',
        'thumbnail',
        'excerpt',
        'body',
        'status',
        'views'
        // 'slug',
        // 'excerpt',
        // 'body'
    ];
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  ALWAYS GET THESE
    //
    protected $with = ['author', 'category', 'comments'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  GET AUTHOR (USER)
    //
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  GET COMMENTS
    //
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  SET POST URL
    //
    public function customAsset()
    {
        return 'posts/' . $this->slug;
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  FILTER SHOWN POSTS (INDEX)
    //
    public function scopeFilter($query, array $filters)
    {
        if(request()->routeIs('home')) {
            $query->where('status', 'published');
        }
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
                )
        );
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category))
        );
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('userName', $author))
        );
    }
}