<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        
        $validated = request()->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|max:10',
            'gender' =>'required',
            'dob' => 'required|date',
            'address' => 'required',
            'password' => 'required|confirmed'
        ]);

        $validated['password'] = bcrypt(request('password'));

        $user = User::create($validated);

        auth()->login($user);
        return redirect('/home');
    }
}
