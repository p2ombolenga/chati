<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    
    public function store(Post $post, Request $request){
        if($post->likedBy($request->user())){
            return response(null, 409);
        }
        $post->likes()->create([
            'user_id' => auth()->id(),
        ]);
        return back();
    }

    public function destroy(Post $post, Request $request){
       $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    } 
}
