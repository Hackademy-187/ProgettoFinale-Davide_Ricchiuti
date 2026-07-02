<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Tutti gli articoli per: {{ $query }}</h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-evenly">
            @forelse ($articles as $article)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3 d-flex justify-content-center">

                    <div class="card w-100 shadow-sm">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top"
                            alt="Immagine dell'articolo: {{ $article->title }}">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-subtitle text-muted mb-2">{{ $article->subtitle }}</p>

                            @if ($article->category)
                                <p class="small text-muted mb-2">
                                    Categoria:
                                    <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}"
                                        class="text-capitalize text-muted fw-bold">{{ $article->category->name }}</a>
                                </p>
                            @else
                                <p class="small text-muted mb-2">Nessuna categoria</p>
                            @endif

                            <p class="card-text text-muted small mt-auto">
                                @foreach ($article->tags as $tag)
                                    <span class="me-1">#{{ $tag->name }}</span>
                                @endforeach
                            </p>
                        </div>

                        <div class="card-footer d-flex justify-content-between align-items-center bg-transparent">
                            <p class="small m-0">
                                Redatto il {{ $article->created_at->format('d/m/Y') }} <br>
                                da <a class="text-muted"
                                    href="{{ route('article.byUser', ['user' => $article->user]) }}">{{ $article->user->name }}</a>
                            </p>
                            <a href="{{ route('article.show', ['article' => $article]) }}"
                                class="btn btn-outline-secondary btn-sm">Leggi</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h2>Non ci sono articoli che corrispondono alla tua ricerca.</h2>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
