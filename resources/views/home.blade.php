@extends('layouts.feed_layout')

@section('title', 'Home')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('scripts')
  <script  src="{{ asset('js/handle_likes.js') }}" defer="true"></script>
  <script  src="{{ asset('js/handle_comments.js') }}" defer="true"></script>
  <script  src="{{ asset('js/load_posts.js') }}" defer="true"></script>
@endsection


@section('links')
<div id="links">
  <a id="home-button" class="current-page" href="{{ route('home') }}">Home</a>
  <a id="my-profile-button" href="{{ route('myProfile') }}">Profile</a>
  <a id="search-button" href="{{ route('searchUser') }}" >Search</a>
  <a id="new-post-button" href="{{ route('addPostPage') }}">New Post</a>
  <a id="logout-button" href="{{ route('logout') }}">Logout</a>
</div>
@endsection


@section('profile_info')
@endsection

