<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\CommentMongoDB;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class CommentController extends Controller {
    public function loadComments($postId){
        $comments = CommentMongoDB::where('post', (int)$postId)->orderBy('id', 'desc')->get();
        return json_encode($comments);
    }

    public function postComment(){
        $request = request();

        DB::connection('mongodb')->collection('comments')->insert(['username' => Session::get('username'),
                'post'=> (int)$request['postId'],
                'text'=> $request['text']]);

        $user =  $user = Post::find($request['postId'])->creator;
        $user->ncomments += 1;
        $user->save();

        $post = Post::find($request['postId']);
        $post->ncomments += 1;
        $post->save();

        return json_encode(true);
    }

    
}
?>