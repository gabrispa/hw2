<?php
namespace App\Models;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $fillable = [
        'username', 'name', 'surname', 'email', 'password', 'photo', 'ncomments'
    ];
    public $timestamps = false;

    public function posts(){
        return $this->hasMany('App\Models\Post', 'user');
    }

    
    public function likedPosts(){
        return $this->belongsToMany('App\Models\Post', 'likes', 'user', 'post');
    }


    public function comments(){
        return $this->hasMany('App\Models\CommentMongoDB', 'comments', 'user');
    }

}

?>