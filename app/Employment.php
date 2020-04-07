<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
