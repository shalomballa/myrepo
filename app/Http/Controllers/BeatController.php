<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beat;

class BeatController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('add_beat');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('add_beat');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
        'title' => 'required|max:50'
    ]);

    $slug = rand(11111111, 99999999);

    Beat::create([
        'title' => $request->title,
        'slug' => $slug,
        'premium_file' => $request->premium_file,
        'free_file' => $request->free_file
    ]);

    return back()->with('success', 'Beat ajouté avec succès');
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