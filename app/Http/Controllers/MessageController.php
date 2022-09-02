<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $users = User::whereHas('messages')->with('messages')->withCount('messages')->latest()->get();
        return view('messages',[ 'users' => $users ]);
    }

    public function show(User $user){
        return view('inbox',['users' => $user]);
    }

}
