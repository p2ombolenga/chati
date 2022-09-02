<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    
    public function index(){
        return view('login');
    }

    public function store(Request $request){
        request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($request->only(['username','password']))){
            return redirect('/home');
        }
        else{
            return back()->with('status','Invalid login credentials');
        }

    }

    public function destroy(Request $request){
        auth()->logout();
        return redirect('/login');

    }
}
