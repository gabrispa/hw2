<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class PageController extends Controller {
    public function home(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $user = User::find(Session::get('user_id'));
        return view('home');
    }

    public function myProfile(){
        if(!Session::get('user_id')){
            return redirect('login');
        }      
        return view('my-profile');
    }

    public function searchUser(){
        if(!Session::get('user_id')){
            return redirect('login');
        }       
        return view('search-user');
    }

    
}
?>