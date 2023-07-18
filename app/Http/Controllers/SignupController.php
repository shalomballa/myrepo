<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        Session::flush();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'user_type' => 'required'
        ]);

        $mdp=Hash::make($request->password);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $mdp,
            'user_type' => $request->user_type
        ]);
        $user = User::where('email', '=', $request->email)->first();
        Session::put('user', $user);

        return redirect()->route('index')->with('success', 'Bienvenu'.' : '.$user->name);
    }
}
