@extends('layouts.login_signup')

@section('title', 'Login')

@section('script')
<script src="{{ asset('js/login.js') }}" defer="true"></script>
@endsection

@section('content')
<div id="login-block">
    <h1>Login</h1>
    <form id="login-form" method="post" name="login-form" action="{{ route('checkLogin') }}">
        @if(count($errors) > 0)
            <div id="top-error" class="error">
                @foreach($errors as $error)
                <?php echo $error."</br>" ?>
                @endforeach
            </div>
        @endif
        @csrf
        <div class="field">
            <input id="entry-user" type='text' name='username' placeholder="Username" onblur="checkUsername()">
            <div id="error-user" class="error hidden">Inserisci uno username.</div>
        </div>
        <div class="field">
            <input id="entry-password" type='password' name='password' placeholder="Password" onblur="checkPassword()">
            <div id="error-password" class="error hidden">Inserisci una password.</div>
        </div>
        
        <input class="button" id="login-button" type='submit' value="Accedi">
    </form>
    <h4 id="signup">Non hai ancora un account? <a href="{{ route('signup') }}">Registrati.</a> </h4>
</div>
@endsection