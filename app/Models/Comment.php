<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
    protected $fillable = [
        'user', 'post', 'text'
    ];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\User', 'user');
    }


    public function post(){
        return $this->belongsTo('App\Models\Post', 'post');
    }

}

?>