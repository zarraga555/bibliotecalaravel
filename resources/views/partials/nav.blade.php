<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm y-2">
    <div class="container">
        <span class="navbar-brand mb-0 h1">{{ config('app.name') }}</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class=" nav-item {{ setActive('home') }}"><a href="/" class="nav-link"> Inicio</a>
                </li>
                @auth
                    <li class=" nav-item {{ setActive('bibliotecario') }}"><a href="/bibliotecario"
                            class="nav-link"> Bibliotecarios </a></li>
                    <li class=" nav-item {{ setActive('usuario') }}"><a href="/usuario"
                            class="nav-link"> Clientes </a></li>
                    <li class=" nav-item dropdown "><a class="nav-link dropdown-toggle" href="#"
                            id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> Libros </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item {{ setActive('libro') }}"
                                href="{{ route('libros.index') }}">Libros
                                Registrados</a>
                            <a class="dropdown-item {{ setActive('autor') }}"" href="
                                /autor">Autores</a>
                            <a class="dropdown-item {{ setActive('categoria') }}"
                                href="/categoria">Categorias</a>
                            <a class="dropdown-item {{ setActive('editorial') }}"
                                href="/editorial">Editoriales</a>
                        </div>
                    </li>
                    <li class=" nav-item {{ setActive('prestamo') }}"><a href="/prestamo"
                            class="nav-link"> Prestamos </a></li>
                @else
                    <li class=" nav-item {{ setActive('contacto') }}"><a href="/contacto"
                            class="nav-link"> Contacto </a></li>
                @endauth
                @guest
                    <li class=" nav-item {{ setActive('login') }}"><a href="/login" class="nav-link">
                            Iniciar Sesion </a></li>
                @else
                    <li class=" nav-item {{ setActive('logout') }}"><a href="" class="nav-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                            Session</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
