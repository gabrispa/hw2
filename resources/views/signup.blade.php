@extends('layouts.login_signup')

@section('title', 'Signup')

@section('script')
<script src="{{ asset('js/signup.js') }}" defer="true"></script>
@endsection

@section('content')
<div id="signup-block">
    <h1>Signup</h1>
    <form id="signup-form" method="post" name="signup-form"  enctype="multipart/form-data">
        @if (count($errors) > 0)
            <div id="top-error" class="error">
                @foreach($errors as $error)
                    <?php echo $error."</br>"; ?>
                @endforeach
            </div>
        @endif   

        @csrf
        <div class="field">
            <input id="entry-name" type='text' name='name' placeholder="Nome" onblur="checkName()">
            <div id="error-name" class="error hidden">Inserisci il tuo nome.</div>
        </div>
        <div class="field">
            <input id="entry-surname" type='text' name='surname' placeholder="Cognome" onblur="checkSurname()">
            <div id="error-surname" class="error hidden">Inserisci il tuo cognome.</div>
        </div>
        <div class="field">
            <input id="entry-username" type='text' name='username' placeholder="Username" onblur="checkUsername()">
            <div id="error-username" class="error hidden" >NULL.</div>
        </div>
        <div class="field">
            <input id="entry-email" type='text' name='email' placeholder="E-mail" onblur="checkEmail()">
            <div id="error-email" class="error hidden">NULL</div>
        </div>
        <div class="field">  
            <input id="entry-password" type='password' name='password' placeholder="Password" onblur="checkPassword()">
            <div id="error-password" class="error hidden">Password non valida. Minimo 8 caratteri, tra cui una lettera maiuscola, 
                una minuscola e un numero.</div>
        </div>    
        <div class="field">
            <input id="entry-confpassword" type='password' name='conf-password' placeholder="Conferma Password" onblur="checkConfPassword()">
            <div id="error-confpassword" class="error hidden">Le due password non coincidono.</div>
        </div>
        <div class="field">
            <label for="entry-propic" class="custom-file-upload" ><input id="entry-propic" type='file' name='propic'onchange="checkPropic()">
            Scegli una foto profilo</label>    
            <div id="error-propic" class="error hidden">Inserisci una foto profilo.</div>
        </div>
        <p id="file-name" class="field"></p>
        
        <input class="button" id="signup-button" type='submit' value="Registrati">
        
    </form>
    
</div>
@endsection