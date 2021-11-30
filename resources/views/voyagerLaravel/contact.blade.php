@extends('master')

@section('content')

    {{-- Message de contact réussi, voir fichier SiteController ligne: return redirect()->route('contact')->with('success', 'Contact réussi'); --}}
    @if (session('success'))
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            </div>
        </div>
    @endif


    <div class="row">
        <div class="col-md-12">
            <h1>Contacts</h1>
        </div>
    </div>
    {{-- Ne pas oublier de générer la route dans le fichier routes/web.php --}}

    <div class="row">
        <div class="col-md-6">
            {{-- Pour pouvoir controller ces infos de contact on va coller le setting généré dans voyager (tuto 12) --}}
            <h2>N°&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: {{ setting('contact.telephone') }}</h2>
            <h2>Email: {{ setting('contact.email') }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            {{-- on va sur google map et on click sur intéger une carte et on copie le iframe --}}
            {{-- {{ setting('contact.carte') }} si on laisse cette commande comme ça laravel ne va pas prendre en considération le code html, il faur donc !! !! --}}
            {!! setting('contact.carte') !!}
        </div>
        <div class="col-md-6">
            <form method="POST" action="{{ route('contact') }}">
                {{-- directive pour générer un token --}}
                @csrf
                <div class="form-group">
                    <label for="Objet">Objet</label>
                    <input type="text" name="objet" id="Objet" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" name="email" id="Email" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="Message">Message</label>
                    <textarea class="form-control" name="message" id="Message" cols="30" rows="10"></textarea>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-block mt-2">Envoyer</button>
                </div>
            </form>

        </div>
    </div>

@endsection
