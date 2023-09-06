@extends('layouts.index')

@section('content')
<h1 class="app-page-title">Departemens</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Modifier</h3>
        <div class="section-intro">Modifier un departement</div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">
                <form class="settings-form" method="POST" action="{{ route('departement.update', $departement->id) }}">
                    @csrf
                    @method('put')


                    {{-- Nom --}}
                    <div class="mb-3">
                        <label for="setting-input-1" class="form-label">
                            Nom
                            <span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">

                            </span>
                        </label>
                        <input type="text" class="form-control" id="setting-input-1" placeholder="Entrer le nom" required name="name" value="{{ $departement->name }}">
                    </div>

                    @error('name')
                       <div class="alert alert-danger">
                            {{ $message }}
                       </div>
                    @enderror

                    <button type="submit" class="btn btn-outline-success">Modifier</button>
                </form>
            </div><!--//app-card-body-->

        </div><!--//app-card-->
    </div>
</div><!--//row-->
@endsection
