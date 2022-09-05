<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest();
            if(request('search')){
                $posts
                ->where('body','like','%'.request('search').'%')
                ->orwhere('created_at','like','%'.request('search').'%');
            }
        return view('home',['posts' => $posts->get()]);
    }
    
    public function store(Request $request){
    DB::transaction(function() use($request){
        if(!empty(request('body')) || !empty(request('image')) ){

            request()->validate(['image' => 'image']);

        if(request()->has('image')){
            $image = request()->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $path = public_path('/images/posts/');
            $image->move($path,$imageName);
        }
            $post = new Post();
            
            $post->user_id = auth()->user()->id;
            $post->slug = bcrypt($request->body);
            $post->body = $request->body;
            $post->image = request()->has('image') ? '/images/posts/'.$imageName : NULL;
            $post->save();
            
            Notification::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
                'notification' => ' created a post',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
        }
        else{
            return back()->with('status','Attempting to submit an empty post');
        }
    });
    return back();
    }

    public function destroy(Post $post){
        $path = $post->image;
        if($path != NULL){
            if(FacadesFile::exists(public_path($path))){
                unlink(public_path($path));
            }
        }
        $post->delete();
        return back()->with('success','Post deleted successfully');
    }
}