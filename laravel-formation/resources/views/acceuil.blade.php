
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('./layout/App')
    @section('page-content')
        @if (session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
        {{-- Si on a peu de champs ok mais sinon c est pas bon
         @error('nom')
            <p>le champ nom est requis</p>
         @enderror
         @error('email')
            <p>Le champ email est requis</p>
         @enderror
        --}}
        @endif

        <div class="row">

            @auth
            <div class="card col-5 offset-1 mt-5">
                <div class="card-header text-center">
                   Formulaire d'ajout
                </div>
                <div class="card-body">

                    <form action="/articles" method="post" class="form-product">
                        @method('post')
                        @csrf
                        <h3>Enregistrer un <Article></Article></h3>
                        <div class="form-group">
                            <label for="inputName">Nom</label>
                            <input type="text" placeholder="Titre de l'article" name="titre" value="{{ old('titre') }}" class="form-control"><br>
                            @error('titre')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">Description</label>
                            <textarea name="description" class="form-control" placeholder="Entrer la description" value="{{ old('description') }}"></textarea>
                            @error('description')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" name='submit' class="btn btn-outline-primary">Ajouter</button>
                    </form>
                </div>
            </div>
            @endauth

            <div class="col">
                <ol class="list-group mt-4">
                    <h4>Articles disponibles</h4>
                   @forelse ($articles as $article)
                        <li class="list-group-item">
                            <a href="/articles/{{ $article->id }}" class="title">
                                {{ $article->titre }}
                            </a>
                            <div class="description">
                                {{ $article->description }}
                            </div>
                        </li>
                   @empty
                    <p class="text text-info">Aucun Article Trouve</p>
                   @endforelse
                </ol>
            </div>
            <div>
                {{ $articles->links() }}
            </div>
        </div>
    @endsection
    <!-- Affichage avec Laravel-->

    <!-- Structure conditionelle avec Php

    <p>Le nom est bien Felix</p>

e conditionelle avec Laravel-->
    {{--!

        <p>Le nom est bien Felix avec Laravel</p>
    @else
        <p>Le nom n'est pas Felix avec Laravel</p>
    @endif
        --}}

        {{-- !
    @if ($age < 18)
        <p>Felix est mineur</p>
    @elseif ($age >= 18)
        <p>Felix est majeur</p>
    @endif


    @switch($age)
        @case($age < 18)
        <p>Felix est mineur</p>
        @break
        @case($age >= 18)
        <p>Felix est majeur</p>
        @break
        @default
        <p>L'utilisateur est neutre</p>
    @endswitch
     --}}

     {{-- Verifier qu'un element existe --}}
    {{--

     @isset($product)
        <p>Le produit existe</p>
    @else
        <p>Le produit n'existe pas</p>
     @endisset
     --}}

     {{-- Boucle de controle --}}
     {{--
     @while ($age < 18)
        <p>Tu es jeune</p>
        @break
     @endwhile

     @for ($i = 10; $i < $age; $i++)
        <p>{{ $i }}</p>
     @endfor
     @foreach ($numbers as $key)
     <p>la valeur de la key est: {{ $key }}</p>
     @endforeach
     --}}
</body>
</html>
