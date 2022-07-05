<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>New Post</title>
        <link rel="stylesheet" href="{{ asset('css/create_post_style.css') }}"> 
        <link href="https://fonts.googleapis.com/css2?family=Belleza&family=Bodoni+Moda&family=Cinzel:wght@500&display=swap" 
    rel="stylesheet">
        <script  src="{{ asset('js/create_post.js')}}" defer="true"></script>
        <script>const BASE_URL = "{{url('/')}}";</script>
        <meta name="viewport"
    content="width=device-width, initial-scale=1">
    </head>
    <body>
        <a href="{{ route('home')}}"> <img id="back" src="{{asset('images/back-arrow.png')}}" /> </a>
        <h1>Crea un nuovo post</h1>
        <div id="create-post-block">
           
                <form method="POST" action="" enctype="multipart/form-data" name="upload-form" id="upload-form">
                    @csrf
                    <div id="add-photo">
                        <div id="radio-buttons">
                            <input type="radio" id="upload-choice" name="choice" >
                            <label for="upload-choice">Carica immagine</label>
                            <input type="radio" id="search-choice" name="choice" >
                            <label for="search-choice">Cerca GIF</label>
                        </div>
                        <input  class="hidden" id="upload-image" type="file" name="upload-image"  accept=".png, .jpg, .jpeg"> 
                        <div id="search-gif" class="hidden">
                            <input id="search-gif-entry" type="text" name="search-gif-entry">
                            <input class="button" id="search-gif-button" type="submit" value="Cerca">
                            <input type="hidden" name="id-gif" id="id-gif">
                        </div>
                    </div>
                    <div id="add-text">
                        <textarea form="upload-form" id="text-entry" name="text-entry" placeholder="Inserisci il testo del tuo post..." 
                                rows="23" cols="32" maxlentgh="512"></textarea>
                        <input class="button" id="send-post" type="submit" value="Invia"> 
                    </div>             
                </form>
        </div>
    </body>

</html>