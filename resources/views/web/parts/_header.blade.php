<div class="info"><!-- info -->
    <div class="container">
        <div class="row">
            <a id="mobile-menu-button" href="#mobile-menu" class="visible-xs"><i class="fa fa-bars"></i></a>
            <div class="col-md-2 logo-withe">
                <a href="{{ url('/') }}"><img src="{{ asset('images/img-logo.png') }}" alt="Logo guia celiaca" title="Guía Celíaca"/></a>
            </div><!-- /.logo -->
            @if(Auth::check())
                <div class="col-md-10 hidden-xs" id="login-pan">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    ><i class="icon fa fa-sign-out"></i> Salir</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('profile') }}"><i class="icon fa fa-user"></i> Hola, {{ Auth::user()->name }}</a>
                </div>
            @endif
            @if(Auth::guest())
                <div class="col-md-10 hidden-xs" id="login-pan">
                    <a href="#" data-toggle="modal" data-target=".login-modal" class="btn btn-danger btn-lg" data-section="sign-in"><i
                                class="icon fa fa-pencil-square-o"></i> Registrarse</a>
                    <a href="#" data-toggle="modal" data-target=".login-modal" data-section="login"><i
                                class="icon fa fa-user user"></i> Ingresar</a>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="container" id="menu-nav">
    @include('web.parts._menu')
</div>