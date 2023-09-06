<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous" defer></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('acceuil') }}">Felix OMBAGHO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('acceuil') }}">Acceuil</a>
                </li>

                @auth


                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.mine') }}">Mes Articles</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">dashboard</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">log out</a>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('registration') }}">Mon compte</a>
                  </li>
                @endauth

                </ul>

            </div>
          </nav>
        @yield('page-content')
    </div>
</body>
</html>
