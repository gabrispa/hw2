<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class CreatePostController extends Controller {

    public function index(){
        if(!Session::get('user_id')){
            return redirect('login');
        }

        
        return view('add-post');
    }

    public function searchGif($query){
        $apikey = 'Dx1NrFXUNyMIrckSH9NDBI00QRniPiRB';
    
        $query = urlencode($query);
        $url = "http://api.giphy.com/v1/gifs/search?q=".$query."&api_key=".$apikey."&limit=5";
        
        //CURL Handler
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch); //Richiesta eseguita
        
        $json = json_decode($data, true);
        curl_close($ch);

        $newJson = array();
        //Restituisco nel nuovo json solo i campi che mi interessano
        for ($i = 0; $i < count($json['data']); $i++) {
            $newJson[] = array('id' => $json['data'][$i]['id'], 'preview' => $json['data'][$i]['images']['downsized_medium']['url']);
        }

        return json_encode($newJson, JSON_UNESCAPED_SLASHES);
    }

    public function createPost(){
        $request = request();

        if($request['text-entry']!=null && $request['id-gif']!=null){
            $newPost = Post::create([
                'user' => Session::get('user_id'),
                'text' => $request['text-entry'],
                'gif_link' => $request['id-gif'],
                'type' => 1
            ]);
            if ($newPost) {
                return redirect('home');
            } 
            else {
                print_r("Errore nel caricamento post");
            }
        }

        if($request['text-entry']!=null && $request->file('upload-image')!=null){
           
            $newPost = Post::create([
                'user' => Session::get('user_id'),
                'text' => $request['text-entry'],
                'photo' => file_get_contents($request['upload-image']),
                'type' => 0
            ]);
            if ($newPost) {
                return redirect('home');
            } 
            else {
                print_r("Errore nel caricamento post");
            }
        }


    }
}

?>