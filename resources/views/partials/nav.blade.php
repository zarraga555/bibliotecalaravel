<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm y-2">
    <div class="container">
        <span class="navbar-brand mb-0 h1">{{ config('app.name') }}</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            @auth
                {{ auth()->user()->rol }}
            @endauth
            <ul class="navbar-nav ml-auto">
                <li class=" nav-item {{ setActive('home') }}"><a href="/" class="nav-link"> Inicio</a></li>
                @if(auth()->check() && auth()->user()->rol == "Administrador")
                <li class=" nav-item {{ setActive('bibliotecario') }}"><a href="/bibliotecario"class="nav-link"> Bibliotecarios </a></li>
                <li class=" nav-item {{ setActive('persona') }}"><a href="/persona" class="nav-link"> Clientes </a></li>
                @endif
                @if (auth()->check() && auth()->user()->rol == "Asistente")
                    <li class=" nav-item {{ setActive('persona') }}"><a href="/persona" class="nav-link"> Clientes </a></li>
                @endif
                <li class=" nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Libros </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item {{ setActive('libro') }}" href="{{route('libros.index')}}">Libros Registrados</a>
                    @if(auth()->check() && auth()->user()->rol == "Administrador" || auth()->check() && auth()->user()->rol == "Asistente")
                        <a class="dropdown-item {{ setActive('autor') }}"" href=" /autor">Autores</a>
                        <a class="dropdown-item {{ setActive('categoria') }}" href="/categoria">Categorias</a>
                        <a class="dropdown-item {{ setActive('editorial') }}" href="/editorial">Editoriales</a>
                    @endif
                </div>
            </li>
        <li class=" nav-item {{ setActive('prestamo') }}"><a href="{{route('prestamos.index')}}" class="nav-link"> Prestamos </a></li>
            @guest
                <li class=" nav-item {{ setActive('contacto') }}"><a href="/contacto" class="nav-link"> Contacto </a></li>
            @endguest
            @if (auth()->check() && auth()->user()->rol == "Estudiante")
            <li class=" nav-item {{ setActive('contacto') }}"><a href="/contacto" class="nav-link"> Contacto </a></li>
            @endif
                @guest
                <li class=" nav-item {{ setActive('login') }}"><a href="/login" class="nav-link"> Iniciar Sesion </a></li>
                @else
                <li class=" nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img height="30px" width="30px" src="/img/male-avatar.svg" alt=""> </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item {{ setActive('perfil') }}"" href=" /perfil">Perfil</a>
                        <a href="" class="dropdown-item " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Session</a>
                    </div>

                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
