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
            'profile_picture' => 'required|image',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|max:10',
            'gender' =>'required',
            'dob' => 'required|date',
            'address' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        $imagePath = request()->file('profile_picture');
        $extension = $imagePath->getClientOriginalExtension();
        $imageName = time().'.'.$extension;
        $path = public_path('/images/profiles/');
        $imagePath->move($path,$imageName);

        $validated['password'] = bcrypt(request('password'));
        $validated['profile_picture'] = '/images/profiles/'.$imageName;
        $user = User::create($validated);

        auth()->login($user);
        return redirect('/home');
    }
}
