<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model 
{

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'user_type'];
    public $timestamps = true;

    public function Likes()
    {
        return $this->hasMany('Likes');
    }

    public function Posts()
    {
        return $this->hasMany('Post');
    }

    public function Beats()
    {
        return $this->hasMany('Beat');
    }

}