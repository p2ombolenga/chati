<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
public function store(Comment $comment, Request $request){
    request()->validate(['body' => 'required']);
    
    $reply = new Reply();
    $reply->user_id = auth()->id();
    $reply->comment_id = $comment->id;
    $reply->body = $request->body;
    $reply->save();
    return back();
}

public function destroy(Reply $reply){
    $reply->delete();

    return back();
}

}
