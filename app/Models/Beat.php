<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beat extends Model 
{

    protected $table = 'beats';
    protected $fillable = ['slug', 'title', 'premium_file', 'free_file'];
    public $timestamps = true;

    public function Likes()
    {
        return $this->hasMany('Likes');
    }

    public function User()
    {
        return $this->belongsTo('User');
    }

}