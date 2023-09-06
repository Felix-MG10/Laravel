@extends('../layout/App')
@section('page-content')
   <div class="row">
    <div class="col-md-8 col-sm-12">
        <ul class="list-group mt-4">
            <h4>Articles disponibles</h4>
           @forelse ($my_articles as $article)
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
        </ul>
    </div>
   </div>
@endsection
