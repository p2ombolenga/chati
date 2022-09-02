<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
class CommentController extends Controller
{

    public function store(Request $request, Post $post){
      request()->validate(['body' => 'required']);
      $post->comment()->create([
          'user_id' => auth()->id(),
          'body' => $request->body
      ]);
      return back();
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return back()->with('success','one comment removed');
      }

}
