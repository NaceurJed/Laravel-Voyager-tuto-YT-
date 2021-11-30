{{-- dans cette page on veut afficher les 10 derniers posts (ça vient de la table posts) --}}
{{-- les images sont stockées dans le doccier public/storage/posts --}}
@extends('master')

@section('slider')
    <h1 class="text-center mt-4">Bienvenue sur mon site</h1>
    <div class="row m-5">
        <div class="col-md-6 offset-md-3">

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($myPosts as $post)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img src="{{ asset('/storage/' . $post->image) }}"
                                class="d-block w-100 border border-5 rounded-pill" alt="{{ $post->title }}">
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>

@endsection

@section('content')
    {{-- Ne pas oublier de générer la route dans le fichier routes/web.php --}}

    <div class="row">
        @foreach ($myPosts as $post)
            <div class="col-md-4 pt-3">
                <div class="card">
                    <img src="{{ asset('/storage/' . $post->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <p class="card-text">{{ Str::limit($post->excerpt, 100) }}</p> {{-- str::limit pour définir une limite du text à 100 ici. --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('.carousel').carousel()
        })
    </script>
@endsection
