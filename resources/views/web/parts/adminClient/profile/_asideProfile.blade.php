<div class="col-sm-4 col-md-3">
    <!-- . Agent Box -->
    <div class="agent-box-card grey">
        <div class="image-content">
            <div class="image image-fill">
                @if (!$user->picture)
                    <img alt="guía celiaca"
                         src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                @else
                    <img alt="Image Sample"
                         src="{{ asset('users/images/' . $user->id . '/perfil/512x512-'. $user->picture) }}">
                @endif
            </div>
        </div>
        <div class="info-agent">
            <span class="name">{{ $user->name }}</span>
            @if(Auth::user()->type == 'OWNER')
                <p style="margin: 5% 25% -10% 25%;">Cuenta Comercio</p>
            @else
                <a href="{{ route('create.accountCommerce') }}" type="button" class="btn btn-danger btn-lg btn-block"
                >Crear
                    Cuenta Comercio</a>
            @endif
        </div>
    </div>
    <br/>
    <ul class="block-menu">
        <li><a class="faq-button {{ request()->is('perfil') ? 'active' : '' }}" href="{{ route('profile') }}"><i
                        class="icon fa fa-user-secret"></i>
                Perfíl</a></li>
        @if(Auth::user()->type == 'OWNER')
            <li><a class="faq-button {{ request()->is('perfil/cuenta-comercio/editar/*') ? 'active' : '' }}"
                   href="{{ route('edit.accountCommerce', $commerce->slug) }}"><i
                            class="icon fa fa-building-o"></i>
                    Perfíl Comercial</a></li>
            <li><a class="faq-button {{ request()->routeIs('product.index') ? 'active' : '' }}"
                   href="{{ route('product.index') }}"><i
                            class="icon fa fa-cart-plus"></i>
                    Productos</a></li>
            <li><a class="faq-button {{ request()->routeIs('create.promotion') ? 'active' : '' }}"
                   href="{{ route('create.promotion') }}"><i
                            class="icon fa fa-ticket"></i>
                    Promociones </a></li>
            <li><a class="faq-button {{ request()->routeIs('message.list') ? 'active' : '' }}"
                   href="{{ route('message.list') }}"><i
                            class="icon fa fa-envelope-o"></i>
                    Mensajes <span class="badge">{{ $countMessage }}</span></a></li>
            <li><a class="faq-button {{ request()->routeIs('comment.list') ? 'active' : '' }}"
                   href="{{ route('comment.list') }}"><i
                            class="icon fa fa-comment-o"></i>
                    Comentarios <span class="badge">{{ $countComment }}</span></a></li>
        @endif
        <li><a class="faq-button {{ request()->is('perfil/recetas/*') ? 'active' : '' }}"
               href="{{ route('add.recipes') }}"><i class="icon fa fa-cutlery"></i> Subí Receta</a>
        </li>
        <li><a class="faq-button" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="icon fa fa-sign-out"></i> Salir</a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</div>