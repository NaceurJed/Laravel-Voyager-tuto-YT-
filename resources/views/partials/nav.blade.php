{{-- la variable $items va contenir des info sur le menu --}}
{{-- {{ dd($items) }} --}}

{{-- Cette liste sera envoyée au fichier navbar --}}
<ul class="navbar-nav mr-auto">
    {{-- On va bouvler sur la variable $items pour récupérer les infos dont on a besoin --}}
    @foreach ($items as $item)
        <li class="nav-item active">
            <a class="nav-link" href="{{ $item->url }}">{{ $item->title }} <span
                    class="sr-only"></span></a>
        </li>
    @endforeach
</ul>
