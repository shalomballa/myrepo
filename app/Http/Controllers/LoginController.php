<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view ('login');
    }

    public function login(Request $request){
        Session::flush();
        
        $users = User::where('email', '=', $request->email)->first();

        if($users==null){    
            $error='L\'email est incorrect || Ce Champs Est requis';
            return back()->with('error',$error);
        }

        else if($users != null){
            if(Hash::check($request->password, $users->password)){
                $user=User::where('email', '=', $request->email)->first();
                
                Session::put('user', $user);
            }
            else{
                $error='Le mot de passe est incorrect || ce champs est requis';
                return back()->with('error',$error); 
            }
        }
        return redirect()->route('index')->with('success', 'Bienvenu'.' : '.$user->name);
    }
}
