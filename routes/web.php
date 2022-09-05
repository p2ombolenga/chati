<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SinglePostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('guest')->group(function(){
    
    //login & logout
    Route::get('/login',[SessionController::class,'index'])->name('login');
    Route::post('/login',[SessionController::class,'store']);


    //register a new account
    Route::get('/register',[RegisterController::class,'index']);
    Route::post('/register',[RegisterController::class,'store']);

});

Route::middleware('auth')->group(function(){
    Route::get('/home',[PostController::class,'index']);
    Route::post('/home/post',[PostController::class,'store']);
    Route::get('/home/delete/{post:id}',[PostController::class,'destroy']);
    //single post view
    Route::get('/home/post/{post:id}/comments',[SinglePostController::class,'index']);
    //like
    Route::post('/home/{post:id}/like',[PostLikeController::class,'store']);
    //unlike
    Route::delete('/home/{post:id}/like',[PostLikeController::class,'destroy']);
    //comment
    Route::post('/home/post/comment/{post:id}',[CommentController::class,'store']);
    Route::get('/home/post/comment/delete/{comment:id}',[CommentController::class,'destroy']);
    //comment reply
    Route::post('/home/comment/{comment:id}/reply',[ReplyController::class,'store']);
    Route::get('/home/comment/reply/{reply:id}/delete',[ReplyController::class,'destroy']);
    //messages
    Route::get('/messages',[MessageController::class,'index']);
    Route::get('/messages/{user:username}',[MessageController::class,'show']);

    Route::get('/profile', [UserController::class,'index']);

    Route::get('/notifications',[NotificationController::class,'index']);
    

    Route::post('/logout',[SessionController::class,'destroy']);

});


require __DIR__.'/auth.php';
