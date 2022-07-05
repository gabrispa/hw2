@extends('layouts.feed_layout')

@section('title', 'Search')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset('css/search.css') }}">
  <link rel="stylesheet" href="{{ asset('css/my_profile.css') }}">
@endsection

@section('scripts')
  <script  src="{{ asset('js/search_user.js') }}" defer="true"></script>
  <script  src="{{ asset('js/handle_likes.js') }}" defer="true"></script>
  <script  src="{{ asset('js/handle_comments.js') }}" defer="true"></script>
  <script  src="{{ asset('js/load_posts.js') }}" defer="true"></script>
  <script src="{{ asset('js/load_user_info.js') }}" defer="true"></script>
@endsection


@section('links')
<div id="links">
  <a id="home-button"  href="{{ route('home') }}">Home</a>
  <a id="my-profile-button" href="{{ route('myProfile') }}">Profile</a>
  <a id="search-button"  href="{{ route('searchUser') }}" class="current-page">Search</a>
  <a id="new-post-button" href="{{ route('addPostPage') }}">New Post</a>
  <a id="logout-button" href="{{ route('logout') }}">Logout</a>
</div>
@endsection

@section('search-user')
<section id="search-user-section">
    <h2>Cerca il profilo di un utente</h2>
    <form id="search-user-form">
        @csrf
        <input type="text" id="user-to-find">
        <input type="submit" id="search" value="Cerca">
    </form>
    <h2 id="user-not-found" class="hidden">Nessun utente trovato con questo username.</h2>
</section>
@endsection

@section('profile_info')
<div id="profile-info" class="hidden">
        <img id="profile-photo" />
        <div id="info-container">
        <div id="name-surname-username">
            <h2 id="name-surname"></h2>
            <h2 id="username"></h2>
        </div>
        <div class="stats">
            <div>
                <h4 class="stats-num">Posts</h4>
                <h4  id="nposts" class="stats-num"></h4>
            </div>
            <div>
                <h4 class="stats-num">Likes</h4>
                <h4 id="nlikes" class="stats-num"></h4>
            </div>
            <div>
                <h4 class="stats-num">Comments</h4>
                <h4 id="ncomments" class="stats-num"></h4>
            </div>    
        </div>
        </div>
</div>
@endsection

