<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Likes;
use App\Models\Post;
use App\Models\Beat;

class LikesController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  public function like($id) {
    $user_id = Session('user')->id;
    $post_id = Post::find($id)->id;
    $post_likes = Likes::where('likeable_type', '=', 1)->where('likeable_id', '=', $post_id)->where('user_id', '=', $user_id)->count();

    if($post_likes == 0){
      Likes::create([
        'likeable_type' => 1,
        'likeable_id' => $post_id,
        'user_id' => $user_id
      ]);
      return back();
    }
    else{
      return back()->with('error', 'vous avez deja liké ce post');
    }

    $likes = Likes::where('likeable_type', '=', 1)->where('likeable_id', '=', $post_id)->count();
  }

  public function likeBeat($id) {
    $user_id = Session('user')->id;
    $beat_id = Beat::find($id)->id;
    $beat_likes = Likes::where('likeable_type', '=', 2)->where('likeable_id', '=', $beat_id)->where('user_id', '=', $user_id)->count();

    if($beat_likes == 0){
      Likes::create([
        'likeable_type' => 2,
        'likeable_id' => $beat_id,
        'user_id' => $user_id
      ]);
      return back();
    }
    else{
      return back()->with('error', 'vous avez deja liké ce beat');
    }

    $likes = Likes::where('likeable_type', '=', 2)->where('likeable_id', '=', $beat_id)->count();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>