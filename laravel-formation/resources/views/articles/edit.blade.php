@extends('../layout/App')
@section('page-content')
   <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-body">
                    <h4>Editer un article</h4>
                    <form action="{{ route('articles.update', $article->id) }}" method="POST">

                        @csrf
                        @method('put')

                        <input type="text" name="titre" value="{{ $article->titre }}" class="form-control">
                        <textarea name="description" class="form-control mt-1">{{ $article->description }}</textarea>
                        <button class="btn btn-outline-success mt-1" type="submit">Actualiser</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
   </div>
@endsection
