<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller {
    
    public function login() {
        if(Session::get('user_id') != null) {
            return redirect("home");
        }
        else {
            return view('login');
        }
     }

     public function checkLogin() {
        $user = User::where('username', request('username'))
                    ->first();
        $errors = array();

        if($user !== null){
            if(password_verify(request('password'), $user->password) ){
            Session::put('user_id', $user->id);
            Session::put('username', $user->username);
            return redirect('home');
            }else{
                array_push($errors, "Password errata.");
                return redirect('login')->withInput()->with('errors', $errors);  
            }
        }
         else {
            array_push($errors, "Username errato.");
            return redirect('login')->withInput()->with('errors', $errors);  
         }
     }

     public function logout() {
         Session::flush();
         return redirect('login');
     }
}
?>