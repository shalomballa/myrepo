<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Likes;
use App\Models\Post;
use App\Models\Beat;

class IndexController extends Controller
{
    public function index(){
        $posts = Post::all();
        $beats = Beat::all();

        return view('index', compact('posts', 'beats'));
    }
}
