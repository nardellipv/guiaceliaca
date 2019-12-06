@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('style/css/vendor/easydropdown/easydropdown.css') }}">
@endsection

@section('content')
    <section id="user-profile" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                @include('web.parts.adminClient.profile._asideProfile')
                <div class="col-sm-8 col-md-9">
                    <div class="row">
                        <form method="post" action="{{ route('profile.update', $user) }}" enctype="multipart/form-data"
                              class="grey-color">
                            @csrf
                            <div class="col-md-7">
                                <div class="section-title line-style no-margin">
                                    <h3 class="title">Información General</h3>
                                </div>
                                <ul class="profile">
                                    <li>
                                        <span>Nombre</span> <input type="text" class="form-control" id="name"
                                                                   name="name"
                                                                   placeholder="Nombre"
                                                                   value="{{ $user->name }}">
                                    </li>
                                    <li>
                                        <span>Apellido</span> <input type="text" class="form-control" id="lastname"
                                                                     name="lastname"
                                                                     placeholder="Apellido"
                                                                     value="{{ $user->lastname }}">
                                    </li>
                                    <li>
                                        <span>Provincia</span>
                                        @if($user->type == 'OWNER')
                                            <select class="dropdown" name="province_id" data-settings='{"cutOff": 5}'>
                                                @if($commerce->province_id)
                                                    <option value="">{{ $commerce->province->name }}</option>
                                                @else
                                                    <option value="">-- Elegir Provincia --</option>
                                                @endif
                                                @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            Solo para Cuentas Comercio
                                            <i class="set-privacy fa fa-lock"></i>
                                        @endif
                                    </li>
                                    <li>
                                        <span>Tipo de cuenta</span>
                                        @if($user->type == 'OWNER')
                                            Cuenta Comercio
                                        @else
                                            Cuenta Cliente
                                        @endif
                                    </li>
                                </ul>
                                <div class="info-block" id="images">
                                    <div class="section-title line-style">
                                        <h3 class="title">Imagen Perfíl</h3>
                                    </div>
                                    <input name="photo" type="file">
                                    <br>
                                    <span class="text">Imagenes jpg, png. Menos de 1MB.</span>
                                </div>
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
                                            <span>Teléfono</span> <input type="text" class="form-control" id="phone"
                                                                         name="phone"
                                                                         placeholder="Teléfono"
                                                                         value="{{ $commerce->phone }}">
                                        @else
                                            Solo para Cuentas Comercio
                                            <i class="set-privacy fa fa-lock"></i>
                                        @endif
                                    </li>
                                    <li>
                                        <span>Dirección</span>
                                        @if($user->type == 'OWNER')
                                            <span>Dirección</span> <input type="text" class="form-control" id="address"
                                                                          name="address"
                                                                          placeholder="Dirección"
                                                                          value="{{ $commerce->address }}">
                                        @else
                                            Solo para Cuentas Comercio
                                            <i class="set-privacy fa fa-lock"></i>
                                        @endif
                                    </li>
                                </ul>

                                <button type="submit"
                                        class="btn btn-warning btn-xs btn-block">Guardar Perfíl
                                </button>
                            </div>
                        </form>
                        <div class="col-md-5">

                            <div class="section-title line-style no-margin space-form">
                                <h3 class="title">Resetear Password</h3>
                            </div>
                            <form method="post" action="{{ route('profile.pass.update', $user) }}" class="grey-color">
                                @csrf
                                <ul class="profile">
                                    <span class="text">
										Puede modificar su contraseña cuando lo desee, no es necesario que lo haga cada vez que modifique su perfíl.
									</span>
                                    <li>
                                        <span>Nueva Contraseña</span> <input type="password" class="form-control"
                                                                             id="password"
                                                                             name="password"
                                                                             placeholder="Contraseña">
                                    </li>
                                </ul>
                                <button type="submit"
                                        class="btn btn-warning btn-xs btn-block">Cambiar Contraseña
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scrip')
    <script src="{{ asset('style/script/vendor/easydropdown/jquery.easydropdown.min.js') }}"></script>
    <script src="{{ asset('style/script/vendor/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('style/script/vendor/dropzone/custom.js') }}"></script>
@endsection