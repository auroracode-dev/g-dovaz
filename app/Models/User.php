<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

    /* Relations */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    protected $guarded = [];
}
