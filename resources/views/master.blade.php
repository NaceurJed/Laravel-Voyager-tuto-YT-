<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- On va intéger le bootswatch, (on creér d'abord les dossiers css et js dans public et on enregistre les fichier min de css et js et jquery) --}}
    {{-- on va rendre le href de ce link dynamique (avec une variable setting aprés créeation de paramétre théme dans voyager) --}}
    <link rel="stylesheet" href="{{ asset('css/' . setting('site.theme') . '.min.css') }}">

    {{-- Si on a besoin d'un style particulier on va l'intéf=grer ici --}}
    @yield('stylesheets')

    <title>Blog | Laravel Voyager</title>
</head>

<body>
    {{-- on va inclur le fichier navbar.blade.php --}}
    @include('partials.navbar')

    @yield('slider')

    {{-- on va déclarer les zones dynamiques, la section de content est dans le fichier index.blade.php --}}
    <div class="container mt-4">
        @yield('content')
    </div>







    {{-- on va aussi intégrer le script de bootstrap --}}
    {{-- ici on met le Jquery qu'on a téléchargé et et mis dans le dossier ressources/js/jquery.js --}}
    <script src="{{ asset('/js/jquery.js') }}"></script>
    {{-- ici on met le javascript --}}
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>


    {{-- Si on a besoin d'un script particulier on va l'intégrer ici --}}
    @yield('javascript')

    {{-- pour tester si notre site a pris le jquery --}}
    {{-- <script>
        $(document).ready(function() {
            alert(1)
        })
    </script> --}}
</body>

</html>
