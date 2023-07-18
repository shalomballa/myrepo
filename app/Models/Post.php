<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model 
{

    protected $table = 'posts';
    protected $fillable = ['content', 'slug', 'user_id'];
    public $timestamps = true;

    public function Likes()
    {
        return $this->hasMany('Likes');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}