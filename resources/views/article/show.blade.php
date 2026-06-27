<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">{{ $article->title }}</h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 d-flex flex-column">
                <img src="{{ Storage::url($article->image) }}" class="img-fluid"
                    alt="Immagine dell'articolo: {{ $article->title }}">
                <div class="text-center">
                    <h2>{{ $article->subtitle }}</h2>
                    <p class="h6">Categoria:
                        <a href="{{ route('article.byCategory', $article->category) }}"
                            class="text-capitalize fw-bold text-muted">{{ $article->category->name }}</a>
                    </p>
                    <div class="text-muted my-3">
                        <p>Redatto il: {{ $article->created_at->format('d/m/Y') }} da {{ $article->user->name }}</p>
                    </div>
                </div>
                <p>{{ $article->body }}</p>
                <div class="text-center">
                    <a href="{{ route('article.index') }}" class="text-secondary">Vai alla lista degli articoli</a>
                </div>
            </div>
        </div>
    </div>
    @auth
        @if (Auth::user()->is_revisor)
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-md-6 d-flex justify-content-around">
                        <form action="{{ route('revisor.acceptArticle', compact('article')) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Accetta l'articolo</button>
                        </form>
                        <form action="{{ route('revisor.rejectArticle', compact('article')) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Rifiuta l'articolo</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endauth
</x-layout>
