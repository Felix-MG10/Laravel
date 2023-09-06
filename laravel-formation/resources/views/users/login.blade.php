@extends('./layout/App')
@section('page-content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">  

                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session()->get('error') }}</div>
                     @endif

                    <form action="{{ route('login') }}" method="post" class="form-product">

                        @method('post')
                        @csrf
                        <h4 class="text-center">Connecter-vous</h4>

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
                    <p class="mt-1">Vous n'avez pas de compte? <a href="{{ route('registration') }}">Inscrivez vous</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
