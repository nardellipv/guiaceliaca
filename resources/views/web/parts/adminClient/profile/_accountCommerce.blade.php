@extends('layouts.main')

@section('content')
    <section id="user-profile" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                @include('web.parts.adminClient.profile._asideProfile')
                <div class="col-sm-8 col-md-9">
                    <div class="row">
                        <div class="col-md-7">
                            @if($device)
                                <div class="alert with-icon alert-warning" role="alert"><i
                                            class="icon fa fa-exclamation"></i>
                                    Se recomienda que para utilizar esta sección del sitio lo realicé
                                    desde una computadora y no desde su móvil o tablet.
                                </div>
                            @endif

                            @if(Request()->cookie('owner'))
                                @include('web.parts._upgrade')
                            @endif

                            <div class="section-title line-style no-margin">
                                <h3 class="title">Información General</h3>
                            </div>
                            <ul class="profile">
                                <li>
                                    <span>Nombre</span> {{ $user->name }}
                                    <i class="icon fa fa-pencil"></i>
                                </li>
                                <li>
                                    <span>Apellido</span> {{ $user->lastname }}
                                    <i class="icon fa fa-pencil"></i>
                                </li>
                                <li>
                                    <span>Provincia</span>
                                    @if($user->type == 'OWNER')
                                        {{ $commerce->province->name }}
                                    @else
                                        Solo para Cuentas Comercio
                                        <i class="icon fa fa-pencil"></i>
                                        <i class="set-privacy fa fa-lock"></i>
                                    @endif
                                </li>
                                <li>
                                    <span>Tipo de cuenta</span>
                                    @if($user->type == 'OWNER')
                                        Cuenta Comercio
                                    @else
                                        Cuenta Cliente
                                        <i class="set-privacy fa fa-lock"></i>
                                    @endif
                                </li>
                                <li>
                                    <span>Nombre Comercio</span>
                                    @if($user->type == 'OWNER')
                                        {{ $commerce->name }}
                                        <i class="set-privacy fa fa-lock"></i>
                                    @else
                                        Solo para Cuentas Comercio
                                        <i class="set-privacy fa fa-lock"></i>
                                    @endif
                                </li>
                            </ul>
                            <div class="section-title line-style">
                                <h3 class="title">Información de Contacto</h3>
                            </div>
                            <ul class="profile">
                                <li>
                                    <span>Email</span> {{ $user->email }}
                                    <i class="set-privacy fa fa-lock"></i>
                                </li>
                                <li>
                                    <span>Teléfono</span>
                                    @if($user->type == 'OWNER')
                                        {{ $commerce->phone }}
                                    @else
                                        Solo para Cuentas Comercio
                                        <i class="icon fa fa-pencil"></i>
                                        <i class="set-privacy fa fa-lock"></i>
                                    @endif
                                </li>
                                <li>
                                    <span>Dirección</span>
                                    @if($user->type == 'OWNER')
                                        {{ $commerce->address }}
                                    @else
                                        Solo para Cuentas Comercio
                                        <i class="icon fa fa-pencil"></i>
                                        <i class="set-privacy fa fa-lock"></i>
                                    @endif
                                </li>
                            </ul>
                            <div class="section-title line-style">
                                <h3 class="title">Redes Sociales</h3>
                            </div>
                            <ul class="profile">
                                <li>
                                    <span>Facebook</span>
                                    @if($user->type == 'OWNER')
                                        @if($commerce->facebook)
                                            {{ $commerce->facebook }}
                                        @else
                                            Sin especificar
                                        @endif
                                    @else
                                        Solo para Cuentas Comercio
                                        <i class="icon fa fa-pencil"></i>
                                        <i class="set-privacy fa fa-lock"></i>
                                    @endif
                                </li>
                                <li>
                                    <span>Twitter</span>
                                    @if($user->type == 'OWNER')
                                        @if($commerce->twitter)
                                            {{ $commerce->twitter }}
                                        @else
                                            Sin especificar
                                        @endif
                                    @else
                                        Solo para Cuentas Comercio
                                        <i class="icon fa fa-pencil"></i>
                                        <i class="set-privacy fa fa-lock"></i>
                                    @endif
                                </li>
                                <li>
                                    <span>Instagram</span>
                                    @if($user->type == 'OWNER')
                                        @if($commerce->instagram)
                                            {{ $commerce->instagram }}
                                        @else
                                            Sin especificar
                                        @endif
                                    @else
                                        Solo para Cuentas Comercio
                                        <i class="icon fa fa-pencil"></i>
                                        <i class="set-privacy fa fa-lock"></i>
                                    @endif
                                </li>
                                <li>
                                    <span>Web</span>
                                    @if($user->type == 'OWNER')
                                        @if($commerce->web)
                                            {{ $commerce->web }}
                                        @else
                                            Sin especificar
                                        @endif
                                    @else
                                        Solo para Cuentas Comercio
                                        <i class="icon fa fa-pencil"></i>
                                        <i class="set-privacy fa fa-lock"></i>
                                    @endif
                                </li>
                            </ul>
                            <br>
                            <a href="{{ route('profile.edit', $user) }}" type="button"
                               class="btn btn-warning btn-xs btn-block">Modificar Perfíl</a>
                        </div>

                        <div class="col-md-5">
                            @if(Auth::user()->type === 'CLIENT' AND count($commercesPro) > 0)
                                <div class="section-title line-style no-margin space-form">
                                    <h3 class="title">Comercios Recomendados</h3>
                                </div>
                                @foreach($commercesPro as $commercePro)
                                    <div class="logs">
                                        <div class="box-ads box-grid mini">
                                            <a class="hover-effect image image-fill"
                                               href="{{ route('name.commerce', $commercePro->slug) }}">
                                                <span class="cover"></span>
                                                @if (!$commercePro->logo)
                                                    <img alt="guía celiaca"
                                                         src="{{ asset('images/img-logo-grande.png') }}"
                                                         class="img-responsive">
                                                @else
                                                    <img alt="{{ $commercePro->name }}"
                                                         src="{{ asset('users/images/' . $commercePro->user->id . '/comercio/358x250-'. $commercePro->logo) }}">
                                                @endif
                                            </a>
                                            <span class="price">{{ Str::limit($commercePro->name, 15) }}</span>
                                            <div class="footer">
                                                <a class="btn btn-default"
                                                   href="{{ route('name.commerce', $commercePro->slug) }}">
                                                    Ir al negocio
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="section-title line-style no-margin space-form">
                                <h3 class="title">Últimas Noticias</h3>
                            </div>
                            @foreach($lastBlog as $blog)
                                <div class="logs">
                                    <div class="box-ads box-grid mini">
                                        <a class="hover-effect image image-fill"
                                           href="{{ route('post.blog', $blog->slug) }}">
                                            <span class="cover"></span>
                                            <img alt="Sample images"
                                                 src="{{ asset('blog/images/301x160-' .$blog->photo) }}">
                                        </a>
                                        <span class="price">{{ Str::limit($blog->title, 20) }}</span>
                                        <div class="footer">
                                            <a class="btn btn-default" href="{{ route('post.blog', $blog->slug) }}">Leer
                                                ahora</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if($user == 'OWNER')
                                <div class="section-title line-style no-margin space-form">
                                    <h3 class="title">Últimos Mensajes</h3>
                                </div>
                                @foreach($lastMessages as $message)
                                    <div class="log">
                                        <span class="image image-fill">{{ Str::limit($message->name, 20) }}</span>
                                        <span class="text">{{ Str::limit($message->messageText, 40) }}</span>
                                        <span class="data">{{ $message->created_at->format('d/m/Y') }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection