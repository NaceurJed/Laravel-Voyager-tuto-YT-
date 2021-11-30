<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            {{-- On va ramener le contenu du fichier nav.blade.php --}}
            {{ menu('Nouveau-Menu', 'partials.nav') }}
            {{-- Nouveau-menu c'est celui qu'on a créer avec voyager --}}
        </div>
    </div>
</nav>
