@extends('master')

@section('content')

    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('blog') }}">Retour</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $post->title }}</h1>
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            {{-- les !! !! pour prendre aussi les tag HTML qui se trouve dans le texte de notre article qu'on a créer avec voyager --}}
            <p>{!! $post->body !!}</p>
        </div>
    </div>


@endsection
