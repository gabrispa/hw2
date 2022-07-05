<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SignupController extends Controller {
    public function index(){      
        return view('signup');  
    }

    public function addUser(){
        $errors = array();
        $request = request();

        if(!($this->checkUsername($request['username']))['exists']) {

            if(!($this->checkEmail($request['email']))['exists']) {

                $newUser =  User::create([
                'username' => $request['username'],
                'password' => password_hash($request['password'], PASSWORD_BCRYPT),
                'name' => $request['name'],
                'surname' => $request['surname'],
                'email' => $request['email'],
                'photo' => file_get_contents($request['propic'])
                ]);
                if ($newUser) {
                    Session::put('user_id', $newUser->id);
                    Session::put('username', $newUser->username);
                    return redirect('home');
                } 
                else {
                    return redirect('signup')->withInput();
                }
            }
            else{
                array_push($errors, "Email già in uso con un altro account.");
                return redirect('signup')->withInput()->with('errors', $errors); 
            }
        }
        else {
            array_push($errors, "Username già in uso con un altro account.");
            return redirect('signup')->withInput()->with('errors', $errors); 
        }
    }

    public function checkUsername($username) {
        $exists = User::where('username', $username)->exists();
        return ['exists' => $exists];
    }

    public function checkEmail($email) {
        $exists = User::where('email', $email)->exists();
        return ['exists' => $exists];
    }


}
?>