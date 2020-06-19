<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm y-2">
    <div class="container">
        <span class="navbar-brand mb-0 h1">{{ config('app.name') }}</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                {{-- ***************************** --}}
                {{-- {{ dump(request()->url()) }}
                {{ dump(request()->path()) }}
                {{ dump(request()->routeIs('blogs')) }} --}}
                {{-- ********************************************** --}}
                {{-- ESTO INDICA SI ES TRUE O FALSE EN LA URL SI ES LA MISMA URL --}}
                {{-- <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a
                    href="/"> Inicio </a></li>
                <li
                    class="{{ request()->routeIs('blogs') ? 'active' : '' }}">
                    <a href="/blogs"> Blog </a></li>
                <li
                    class="{{ request()->routeIs('servicio') ? 'active' : '' }}">
                    <a href="/servicio"> Servicio </a></li>
                <li
                    class="{{ request()->routeIs('soporte') ? 'active' : '' }}">
                    <a href="/soporte"> Soporte </a></li>
                <li
                    class="{{ request()->routeIs('contacto') ? 'active' : '' }}">
                    <a href="/contacto"> Contacto </a></li> --}}
                {{-- ***************************************************************************** --}}
                {{-- Para usar esta configuracion creamos un archivo en la carpeta app helpers.php --}}
                {{-- Abrimos el archivo coomposer.json y agregamos "files": ["app/helpers.php"] en --}}
                {{-- autoload, de ahi nos dirigimos a nuestra terminal y escribimos este comando --}}
                {{-- composer dumpautoload y regarga el navegador --}}
                <li class=" nav-item {{ setActive('home') }}"><a href="/" class="nav-link"> Inicio</a></li>
                <li class=" nav-item {{ setActive('bibliotecario') }}"><a href="/bibliotecario"class="nav-link"> Bibliotecarios </a></li>
                {{-- <li class=" nav-item {{ setActive('autor') }}"><a
                    href="/autor" class="nav-link"> Autores </a></li>
                <li class=" nav-item {{ setActive('categoria') }}"><a href="/categoria"
                        class="nav-link"> Categoria Libro </a></li>
                <li class=" nav-item {{ setActive('editorial') }}"><a href="/editorial"
                        class="nav-link"> Editorial </a></li> --}}
                <li class=" nav-item dropdown "><a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Libros </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item {{ setActive('libro') }}" href="/libro">Libros
                            Registrados</a>
                        <a class="dropdown-item {{ setActive('autor') }}"" href=" /autor">Autores</a>
                        <a class="dropdown-item {{ setActive('categoria') }}"
                            href="/categoria">Categorias</a>
                        <a class="dropdown-item {{ setActive('editorial') }}"
                            href="/editorial">Editoriales</a>
                    </div>
                </li>
                <li class=" nav-item {{ setActive('usuario') }}"><a href="/usuario" class="nav-link">
                        Clientes </a></li>
                <li class=" nav-item {{ setActive('prestamo') }}"><a href="/prestamo"
                        class="nav-link"> Prestamos </a></li>
            </ul>
        </div>
    </div>
</nav>
