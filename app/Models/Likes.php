<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model 
{

    protected $table = 'likes';
    protected $fillable = ['likeable_id', 'likeable_type', 'user_id'];
    public $timestamps = true;

    public function User()
    {
        return $this->belongsTo('User');
    }

    public function Post()
    {
        return $this->belongsTo('Post');
    }

    public function Beat()
    {
        return $this->belongsTo('Beat');
    }

}