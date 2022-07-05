<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\CommentMongoDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class FeedController extends Controller {
    
    public function homeFeed(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $rawPosts = Post::orderBy('id', 'desc')->get();
        $posts = $this->fixPosts($rawPosts);

        return json_encode($posts);          
    }

    public function myProfileFeed(){
        //Ritorna i post dell'utente loggato
        $rawPosts = Post::where('user', Session::get('user_id'))->orderBy('id', 'desc')->get();
        $posts = $this->fixPosts($rawPosts);

        return json_encode($posts);
        
    }

    public function userSearchedFeed($userId){
       //Post dell'utente cercato 
        $rawPosts = Post::where('user', $userId)->orderBy('id', 'desc')->get();
        $posts = $this->fixPosts($rawPosts);

        return json_encode($posts);
    }

    public function loadUserInfo($userToFind = ''){
        if($userToFind == ''){
            $userToFind = Session::get('username');
        }

        $user = User::where('username', 'like', $userToFind.'%')->first();
        $user['photo'] = base64_encode($user['photo']);

        return json_encode($user);
    }

    public function deletePost($postId){
        $comments = CommentMongoDB::where('post', (int)$postId)->get();
        foreach($comments as $comment){
            $comment->delete();
        }

        Post::find($postId)->delete();
        return;
    }

    private function fixPosts($posts){
        //$likedPosts = Array contenente gli ID dei post a cui l'utente ha messo like
        $likedByUser = User::find(Session::get('user_id'))->likedPosts;
        $likedPosts = array();

        foreach($likedByUser as $post){
            array_push($likedPosts, $post->id);
        }

        //Per ogni post convertiamo le immagini presenti, aggiungiamo il campo liked e 
        //formattiamo le key dell'array per il javascript
        foreach($posts as $post){
            $user = Post::find($post['id'])->creator;

            $post['userid'] = $post['user'];
            $post['username'] = $user['username'];
            $post['name'] = $user['name'];
            $post['surname'] = $user['surname'];
            $post['userphoto'] = base64_encode($user['photo']);
            $post['postid'] = $post['id'];
            $post['posttext'] = $post['text'];
            $post['posttype'] = $post['type'];
            $post['postphoto'] = base64_encode($post['photo']);
            $post['postgif'] = $post['gif_link'];
            $post['time'] = $this->getTime($post['time']);
            $post['liked'] = in_array($post['postid'], $likedPosts);

            unset($post['user']);
            unset($post['id']);
            unset($post['text']);
            unset($post['type']);
            unset($post['photo']);
            unset($post['gif_link']);       
        }

        return $posts;
    }

    private function getTime($timestamp) {      
        // Calcola il tempo trascorso dalla pubblicazione del post       
        $old = strtotime($timestamp); 
        $diff = time() - $old;           
        $old = date('d/m/y', $old);

        if ($diff /60 <1) {
            return intval($diff%60)."s"; 
        } else if ($diff / 60 < 60) {
            return intval($diff/60)."m";
        } else if ($diff / 3600 <24) {
            return intval($diff/3600) ."h";
        } else if ($diff/86400 < 30) {
            return intval($diff/86400) ."gg";
        } else {
            return $old; 
        }
    }
}
?>