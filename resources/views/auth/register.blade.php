@extends('layouts.main')

@section('title', 'Registro en Guía Celíaca')

@section('og:url', 'https://guiaceliaca.com.ar/register')
@section('og:description', 'Registrate Gratis y ofrece tus productos sin TACC')

@section('content')
    <section id="signin-page" style="margin-top: 7%">

        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-sm-push-5 col-md-8 col-md-push-4">
                    <div class="text-desclaimer">
                        <h1>Bienvenido</h1>
                        <h3>Registro de usuario para GuiaCeliaca</h3>
                        La información que se encuentra en este sitio web no pretende ser un reemplazo o un sustituto de
                        un tratamiento médico profesional o un consejo médico profesional relacionado con una afección
                        médica específica. Le instamos a que siempre busque el consejo de su médico. No hay reemplazo
                        para el tratamiento médico personal y el consejo de su médico personal.<br/>
                        <div class="bs-callout callout-info">
                            <h4>En Guía Celíaca podrás:</h4>
                            <ul class="text">
                                <li>Comprar precios</li>
                                <li>Publicar tus productos</li>
                                <li>Comunicarte con futuros clientes</li>
                                <li>Dar visibilidad de tu negocio a celíacos cerca de tu domicilio</li>
                                <li>Y mucho más... Totalmente GRATIS!!!</li>
                            </ul>
                        </div>
                        Constantemente estamos mejorando y agregando nuevas funcionalidades al sitio. Este sitio esta pensado
                        para ayudar a personas con problemas de celiaquia.
                    </div>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="col-sm-5 col-sm-pull-7 col-md-4 col-md-pull-8">
                        <div class="box">
                            <h2 class="title">Crear una nueva cuenta</h2>
                            Tu cuenta se creará como cliente final, luego podras modificar el tipo de cuenta en caso de
                            vendar productos para celíacos.
                            <div class="field">
                                <input id="name"
                                       class="form-control input-inline margin-right @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                       type="text" placeholder="Nombre">
                                <i class="fa fa-user user"></i>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <input id="lastname"
                                       class="form-control input-inline @error('lastname') is-invalid @enderror"
                                       type="text"
                                       name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname"
                                       autofocus placeholder="Apellido">
                                <i class="fa fa-user user"></i>

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="text"
                                       name="email"
                                       placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                                <i class="fa fa-envelope-o"></i>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <input id="password" class="form-control @error('password') is-invalid @enderror"
                                       type="password"
                                       name="password"
                                       placeholder="Password" required autocomplete="new-password">
                                <i class="fa fa-ellipsis-h"></i>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <input id="password-confirm" class="form-control" type="password"
                                       name="password_confirmation"
                                       required autocomplete="new-password" placeholder="Repetir password">
                                <i class="fa fa-ellipsis-h"></i>
                            </div>
                            <div class="field footer-form text-right">
                             <span class="remember"><input class="labelauty" type="checkbox"
                                                           data-labelauty="Leí políticas de privacidad"
                                                           checked/></span>
                                <button type="submit" class="btn btn-default button-form">Registrarme</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
