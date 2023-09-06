@extends('layouts.index')

@section('content')
<h1 class="app-page-title">Employers</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Modifier</h3>
        <div class="section-intro">Modifier un Employer</div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">
                <form class="settings-form" method="POST" action="{{ route('employer.update', $employer->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="setting-input-2" class="form-label">Departement</label>
                        <select name="departement_id" id="" class="form-control">
                            <option value="">Choissisez un departement</option>

                            @foreach ($departements as $departement)

                            <option value="{{ $departement->id }}" {{ $employer->departement_id == $departement->id ? 'selected': '' }}>{{ $departement->name }}</option>

                            @endforeach
                        </select>
                        @error('departement_id')
                       <div class="alert alert-danger">
                            {{ $message }}
                       </div>
                    @enderror
                    </div>

                    {{-- Nom --}}
                    <div class="mb-3">
                        <label for="setting-input-1" class="form-label">
                            Nom
                            <span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">

                            </span>
                    </label>
                        <input type="text" class="form-control" id="setting-input-1" placeholder="Entrer le nom" required name="nom"  value="{{ $employer->nom }}">

                        @error('nom')
                       <div class="alert alert-danger">
                            {{ $message }}
                       </div>
                        @enderror
                    </div>


                    {{-- prenom --}}
                    <div class="mb-3">
                        <label for="setting-input-1" class="form-label">
                            Prenom
                            <span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">

                            </span>
                    </label>
                        <input type="text" class="form-control" id="setting-input-1" placeholder="Entrer le prenom" required name="prenom" value="{{ $employer->prenom }}">

                        @error('prenom')
                        <div class="alert alert-danger">
                             {{ $message }}
                        </div>
                     @enderror

                    </div>

                    <div class="mb-3">
                        <label for="setting-input-3" class="form-label">Email</label>
                        <input type="email" class="form-control" id="setting-input-3" placeholder="toto0@gmail.con" name="email" value="{{ $employer->email}}">

                        @error('email')
                       <div class="alert alert-danger">
                            {{ $message }}
                       </div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="setting-input-2" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="setting-input-2" placeholder="Entrer le contact" required name="contact" value="{{ $employer->contact}}">

                        @error('contact')
                       <div class="alert alert-danger">
                            {{ $message }}
                       </div>
                        @enderror

                    </div>


                    <div class="mb-3">
                        <label for="setting-input-2" class="form-label">Montant Journaliere</label>
                        <input type="number" class="form-control" id="setting-input-2" placeholder="Entrer le montant journalier" required name="montant_journalier" value="{{  $employer->montant_journalier }}">

                        @error('montant_journalier')
                        <div class="alert alert-danger">
                             {{ $message }}
                        </div>
                         @enderror

                    </div>

                    <button type="submit" class="btn btn-outline-success">Modifier</button>
                </form>
            </div><!--//app-card-body-->

        </div><!--//app-card-->
    </div>
</div><!--//row-->
@endsection
