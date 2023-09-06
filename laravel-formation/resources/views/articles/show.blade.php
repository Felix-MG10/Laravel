@extends('../layout/App')
@section('page-content')
    <div class="card mt-4">

        <div class="card-body">
            <a href="/acceuil" class="btn btn-outline-warning">👈🏾Return</a>
            <div class="title">
                {{ $article->id }}
            </div>
            <p class="description">{{ $article->description }}</p>
        </div>

        @auth
        @if (Auth::user()->id == $article->user_id) {{-- >user_id --}}
        <div class="card-footer">

            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-info">update</a>
            <form action="{{ route('articles.delete', $article->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger" type="submit">delete</button>
            </form>

        </div>
        @endif

        @endauth

    </div>
@endsection
