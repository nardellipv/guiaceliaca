<nav id="navigation">
    <ul>
        <li>
            <a href="{{ url('/') }}">Inicio</a>
        </li>
        <li>
            <a href="{{ route('list.blog') }}">Blog</a>
        </li>
        <li>
            <a href="{{ route('list.recipes') }}">Recetas</a>
        </li>
        <li>
            <a href="{{ route('contact') }}">Contacto</a>
        </li>
        @if($device)
            @if(Auth::check())
                <li>
                    <a href="{{ route('profile') }}"><i class="icon fa fa-user"></i> Hola, {{ Auth::user()->name }}</a>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}">Ingresar</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">Registrarme</a>
                </li>
            @endif
        @endif
        <li class="has_submenu">
            <a href="#">Ayuda</a>
            <ul>
                <li><a href="{{ route('term') }}">Términos y Condiciones</a></li>
                <li><a href="{{ route('policity') }}">Política de privacidad</a></li>
            </ul>
        </li>
    </ul>
</nav>