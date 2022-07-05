<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CreatePostController;

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

Route::get('/home', [PageController::class, "home"])->name("home");
Route::get('/myProfile', [PageController::class, "myProfile"])->name("myProfile");
Route::get('/searchUser', [PageController::class, "searchUser"])->name("searchUser");

Route::get("/login", [LoginController::class, "login"])->name("login");
Route::post("/login", [LoginController::class, "checklogin"])->name("checkLogin");
Route::post("/logout", [LoginController::class, "logout"])->name("logout");
Route::get("/logout", [LoginController::class, "logout"])->name("logout");


Route::get('/signup', [SignupController::class, "index"])->name('signup');
Route::get('/signup/checkUsername/{username}', [SignupController::class, "checkUsername"]);
Route::get('/signup/checkEmail/{email}', [SignupController::class, "checkEmail"]);
Route::post('/signup', [SignupController::class, "addUser"]);


Route::get('/homeFeed', [FeedController::class, "homeFeed"]);
Route::get('/myProfileFeed', [FeedController::class, "myProfileFeed"]);
Route::get('/userSearchedFeed/{userId}', [FeedController::class, "userSearchedFeed"]);
Route::get('/loadUserInfo/{userToFind?}', [FeedController::class, "loadUserInfo"]);
Route::get('/deletePost/{postId}', [FeedController::class, "deletePost"]);


Route::get('/addLike/{postId}', [LikeController::class, "addLike"]);
Route::get('/removeLike/{postId}', [LikeController::class, "removeLike"]);

Route::get('/loadComments/{postId}', [CommentController::class, "loadComments"]);
Route::post('/postComment', [CommentController::class, "postComment"]);

Route::get('/addPostPage', [CreatePostController::class, "index"])->name("addPostPage");
Route::get('/searchGif/{q}', [CreatePostController::class, "searchGif"]);
Route::post('/addPostPage', [CreatePostController::class, "createPost"]);


