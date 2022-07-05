<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class CommentMongoDB extends Model{
    protected $fillable = [
        'username', 'post', 'text'
    ];
    protected $connection = 'mongodb';
    protected $table = 'comments';

    public function user(){
        return $this->belongsTo('App\Models\User', 'username', 'username');
    }


    public function post(){
        return $this->belongsTo('App\Models\Post', 'post');
    }

}

?>