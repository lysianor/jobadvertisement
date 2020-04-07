<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'role_id','verified','company','industry','size','name','email', 'password', 'email_address','phone','website','size','industry', 'address', 'latitude', 'longitude',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verification()
    {
        return $this->hasOne(Verification::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function favorite_posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function scopeEmployers($query)
    {
        return $query->where('role_id',2);
    }

    public function scopeSearchCompanies($query) {
        return $query->when(!empty(request()->input('search', '')), function($query) {
            $query->where(function($query) {
                $search = request()->input('search');
                $query->where('company', 'LIKE', "%$search%")
                    ->orWhere('address', 'LIKE', "%$search%");
            });
        });
    }

}
