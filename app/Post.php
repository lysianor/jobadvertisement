<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'categories',
        'tags',
        'employments',
        'body',
        'salary',
        'per',
        'experience',
        'degree',
        'address',
        'latitude',
        'longitude',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function employments()
    {
        return $this->belongsToMany(Employment::class);
    }

    public function favorite_to_users()
    {
        return $this->belongsToMany('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }
    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }

    public function scopeSearchResults($query)
    {
        return $query->when(!empty(request()->input('employment', 0)), function($query) {
            $query->whereHas('employments', function($query) {
                $query->whereId(request()->input('employment'));
            });
        })
        ->when(!empty(request()->input('category', 0)), function($query) {
            $query->whereHas('categories', function($query) {
                $query->whereId(request()->input('category'));
            });
        })
        ->when(!empty(request()->input('search', '')), function($query) {
            $query->where(function($query) {
                $search = request()->input('search');
                $query->where('title', 'LIKE', "%$search%")
                    ->orWhere('body', 'LIKE', "%$search%")
                    ->orWhere('address', 'LIKE', "%$search%");
            });
        });
    }
}
