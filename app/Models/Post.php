<?php
namespace App\Models;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    protected $fillable = [
        'user', 'text', 'type', 'photo', 'gif_link', 'ncomments'
    ];
    public $timestamps = false;

    public function creator(){
        return $this->belongsTo('App\Models\User', 'user');
    }

    public function likedBy(){
        return $this->belongsToMany('App\Models\User', 'likes', 'post', 'user');
    }

    public function comments(){
        return $this->hasMany('App\Models\CommentMongoDB', 'comments', 'post');
    }

}

?>