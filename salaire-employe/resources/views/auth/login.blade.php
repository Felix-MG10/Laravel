<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Tp salaire | Laravel 9</title>
</head>
<body>

<form method="post" action="{{ route('handleLogin') }}">

    @csrf
    @method('POST')

    <div class="box">
        <h1>Connexion</h1>
        @if (Session::get('error_msg'))
            <b class="alert alert-danger">{{ (Session::get('error_msg')) }}</b>
             {{--  {{ Hash::make('qwerty') }} Generer le chiffre du mot passe --}} 
        @endif
        <input type="email" name="email" class="email" />

        <input type="password" name="password" class="email" />

        <div class="btn-container">
            <button type="submit">Login</button>
        </div>

        <!-- End Btn -->
        <!-- End Btn2 -->
    </div>
    <!-- End Box -->
</form>
</body>
</html>
