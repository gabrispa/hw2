<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        @yield('stylesheets')
        <link rel="stylesheet" href="{{URL::asset('css/modal-view.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Belleza&family=Bodoni+Moda&family=Cinzel:wght@500&display=swap" 
    rel="stylesheet">
        <script>const BASE_URL = "{{url('/')}}";</script>
        @yield('scripts')
        <meta name="viewport"
    content="width=device-width, initial-scale=1">
    </head>

    <body>
    <header>
        <div id="overlay"></div>
         
        <div id="logo">
            Social Art Gallery
        </div>
        <nav>   
            @yield('links')   
          
        </nav>     
    </header>
    @yield('search-user')
    @yield('profile_info')
    <section id="scroll-view">
        <div id="posts_container">
            
        </div>
    </section>

    <section id="modal-view" class="hidden"> 
      <div id="post-modal">
        <div id="post-image">

        </div>
        <div id="comment-block">
          <div id="comments">
              
          </div>
          <div id="comment-input">
            <form>
              @csrf
              <meta name="token"  content="{{ csrf_token() }}">
              <textarea id="comment-entry" placeholder="Inserisci un commento..." rows="4" cols="32" maxlentgh="255"></textarea>
              <input class="button" id="post-comment" type='submit' value="Invia">
            </form>
          </div>
        </div>
      </div>
    </section>
    <a href="{{ route('addPostPage') }}"><button id="add-post" >+</button></a>
    <footer>
        <address>Gabriele Spagnuolo (1000002217)</address>
        <p>Web Programming Course <br/> 2022</p>
    </footer>
    </body>
</html>