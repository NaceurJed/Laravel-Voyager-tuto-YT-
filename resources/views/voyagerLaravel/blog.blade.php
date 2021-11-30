@extends('master')

@section('content')

    <div class="row">
        <h1 class="text-center">Page du blog</h1>

        {{-- On divise la page blog en deux --}}
        {{-- Partie gauche --}}
        <div class="col-md-8">

            @foreach ($myPosts as $post)
                <h2>Liste des articles @if ($id != null) {{ $post->category->name }} @endif</h2>
                <div class="card text-center mb-3">
                    <a href="{{ route('show', ['slug' => $post->slug]) }}">
                        <img class="card-img-top" src="{{ asset('storage/' . $post->image) }}" alt="">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <p class="card-text">{{ Str::limit($post->excerpt, 200) }}</p>
                        {{-- On veut afficher la catégorie de chaque article, on doit donc lier les tables categorys et posts
                            on doit donc créer un model pour category: php artisan make:model Category 
                            Puis faire les liaison HasMany et belogsTo sur les model category et Post --}}
                        <span class="badge bg-secondary"><a
                                href="{{ route('blog', ['id' => $post->category->id]) }}">{{ $post->category->name }}</a></span>
                        <div>Publié le {{ $post->created_at->format('d-m-Y') }} </div>
                        <div>{{ $post->nb_visite }} vues</div>
                    </div>
                </div>
            @endforeach

            {{-- Pagination --}}
            {{-- Pour pouvoir effectuer la pagination avec style bootstrap: on va dans App/Providers/AppServiceProvider.php pour ajouter le code 
                use Illuminate\Pagination\Paginator;
                public function boot()
                {
                    Paginator::useBootstrap();
                } --}}
            <div class="pagination justify-content-center"> {{-- grace a Bootstrap on peut générer les numéros de pages --}}
                {{ $myPosts->links() }} {{-- la méthode links me génére un systéme de pagination --}}
            </div>

        </div>

        {{-- Partie droite: on va pouvoir choisir une catégories d'article à afficher --}}
        <div class="col-md-4">
            <h2>Liste des catégories</h2>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-start @if (!$id) active @endif">
                    <a href="{{ route('blog') }}">Tous les article</a>
                    <span class="badge bg-primary rounded-pill">{{ $post->count() }}</span>
                </li>
                @foreach ($myCategories as $category)

                    <li class="list-group-item d-flex justify-content-between align-items-start @if ($category->id == $id) active @endif">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><a @if ($category->post->count() == 0) class="btn disabled" @endif
                                    href="{{ route('blog', ['id' => $category->id]) }}">{{ $category->name }}</a>
                            </div>
                        </div>
                        {{-- on va récupérer le nombre d'article --}}
                        <span class="badge bg-primary rounded-pill">{{ $category->post->count() }}</span>
                    </li>

                    {{-- <a class="text-danger" href="{{ url('/blog/' . $category->id) }}">{{ $category->name }}</a> --}}

                @endforeach
            </ul>
        </div>
    </div>
    {{-- Ne pas oublier de générer la route dans le fichier routes/web.php --}}



@endsection
