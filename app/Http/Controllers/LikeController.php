<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class LikeController extends Controller {
    public function addLike(){
        $request = request();
        $postid = $request['postId'];
        $userid = Session::get('user_id');
        
        return DB::table('likes')->insert(['user' => $userid, 'post' => $postid]);

    }

    public function removeLike(){
        $request = request();
        $postid = $request['postId'];
        $userid = Session::get('user_id');
        
        return DB::table('likes')->where('user', $userid)->where('post', $postid)->delete();
    }
}
?>