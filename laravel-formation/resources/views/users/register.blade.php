@extends('./layout/App')
@section('page-content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('registration') }}" method="post" class="form-product">

                        @method('post')
                        @csrf
                        <h4 class="text-center">Ajouter un Utilisateur</h4>

                        <div class="form-group">
                            <label for="inputName">Nom</label>
                            <input type="text" placeholder="Entrer votre nom" name="nom" value="{{ old('nom') }}" class="form-control mt-2">
                            @error('nom')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputMail">Email</label>
                            <input  type="email" placeholder="Entrer votre email" name="email" value="{{ old('email') }}" class="form-control mt-2">
                            @error('email')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputPassword">Mot de passe</label>
                            <input type="password" placeholder="Entrer votre mot de passe" name="password"  class="form-control mt-2">
                            @error('password')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" name='submit' class="btn btn-outline-primary">Inscription</button>
                    </form>
                    <p>Deja un Compte? <a href="{{ route('login') }}">Connecter vous</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
