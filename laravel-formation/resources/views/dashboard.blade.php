
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
            
        </div>
    @endsection
</body>
</html>
