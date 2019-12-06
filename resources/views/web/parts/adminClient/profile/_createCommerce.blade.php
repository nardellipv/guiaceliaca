@extends('layouts.main')

@section('content')
    <section id="create-agency" style="margin-top: 10%">
        <div class="container">
            <form method="post" action="{{ route('store.accountCommerce') }}" enctype="multipart/form-data"
                  class="grey-color">
                @csrf
                <div class="row">
                    <div class="col-sm-3 col-md-2" id="edit-image">
                        <!-- avatar -->
                        <a href="#" class="avatar image-fill">
                            <img alt="Image Sample"
                                 src="{{ asset('images/img-logo-grande.png') }}">
                        </a>
                    </div>
                    <div class="col-sm-9 col-md-6">
                        <div class="section-title line-style no-margin">
                            <h3 class="title">Información General</h3>
                        </div>
                        <ul class="profile create">
                            <li>
                                <span>Nombre Comercio</span> <input type="text" class="form-control" id="name"
                                                                    name="name"
                                                                    placeholder="Nombre Comercio"
                                                                    value="{{ old('name') }}" required>
                            </li>
                            <li>
                                <span>Sobre el comercio</span>
                                <textarea class="form-control" id="about" name="about" required>{{ old('about') }}</textarea>
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
                            <h3 class="title">Información Postal</h3>
                        </div>
                        <ul class="profile create">
                            <li>
                                <span>Dirección</span> <input type="text" class="form-control" id="address"
                                                              name="address"
                                                              placeholder="Dirección"
                                                              value="{{ old('address') }}" required>
                            </li>
                            <li>
                                <span>Provincia</span>
                                <select class="dropdown" name="province_id" data-settings='{"cutOff": 5}' required>
                                    <option value="">-- Elegir Provincia --</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li>
                                <span>Teléfono</span> <input type="text" class="form-control" id="phone"
                                                             name="phone"
                                                             placeholder="Teléfono"
                                                             value="{{ old('phone') }}">
                            </li>
                        </ul>

                        {{--<div class="section-title line-style">
                            <h3 class="title">Seleccione un paquete</h3>
                        </div>
                        <div id="pricing-box" class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="pricing hover-effect select" data-price="99.99">
									<span class="header">
										<span class="title">FREE</span>
										<span class="sub-title">Exposición Baja</span>
										<span class="cover"></span>
									</span>
                                    <div class="price">$ 0,00</div>
                                    <input class="btn btn-default select-button" name="type" value="free" type="radio" checked>
                                </div><!-- /.pricing -->
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="pricing hover-effect no-select">
									<span class="header">
										<span class="title">Básica</span>
										<span class="sub-title">Exposición Normal</span>
										<span class="cover"></span>
									</span>
                                    <div class="price">$ 99,99</div>
                                    <input class="btn btn-default select-button" name="type" value="basic" type="radio">
                                </div><!-- /.pricing -->
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="pricing hover-effect no-select">
									<span class="header">
										<span class="title">Clásica</span>
										<span class="sub-title">Exposición Alta</span>
										<span class="cover"></span>
									</span>
                                    <div class="price">$ 209,99</div>
                                    <input class="btn btn-default select-button" name="type" value="clasic" type="radio">
                                </div><!-- /.pricing -->
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="pricing hover-effect no-select">
									<span class="header">
										<span class="title">Premium</span>
										<span class="sub-title">Alta Exposición + Sitio web</span>
										<span class="cover"></span>
									</span>
                                    <div class="price">$ 399,99</div>
                                    <input class="btn btn-default select-button" name="type" value="premium" type="radio">
                                </div><!-- /.pricing -->
                            </div>
                        </div>--}}
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="section-title line-style no-margin">
                            <h3 class="title">Redes Sociales</h3>
                        </div>
                        <ul class="profile create">
                            <li>
                                <span>Facebook</span> <input type="text" class="form-control" id="facebook"
                                                             name="facebook"
                                                             placeholder="Facebook"
                                                             value="{{ old('facebook') }}">
                            </li>
                            <li>
                                <span>Twitter</span> <input type="text" class="form-control" id="twitter"
                                                            name="twitter"
                                                            placeholder="Twitter"
                                                            value="{{ old('twitter') }}">
                            </li>
                            <li>
                                <span>Instagram</span> <input type="text" class="form-control"
                                                              id="instagram"
                                                              name="instagram"
                                                              placeholder="instagram"
                                                              value="{{ old('instagram') }}">
                            </li>
                            <li>
                                <span>Web</span> <input type="text" class="form-control" id="web"
                                                        name="web"
                                                        placeholder="Web"
                                                        value="{{ old('web') }}">
                            </li>
                        </ul>
                        <div class="info-block" id="features">
                            <div class="section-title line-style">
                                <h3 class="title">Caracteristicas</h3>
                            </div>
                            <div class="row features-box">
                                @foreach($characteristics as $characteristic)
                                    <div class="col-xs-6"><input class="labelauty" type="checkbox" name="characteristic_id[]" value="{{ $characteristic->id }}"
                                                                 data-labelauty="{{ $characteristic->name }}"></div>
                                @endforeach
                            </div><!-- ./row -->
                        </div>

                        <div class="info-block" id="features">
                            <div class="section-title line-style">
                                <h3 class="title">Medios de Pago</h3>
                            </div>
                            <div class="row features-box">
                                @foreach($payments as $payment)
                                    <div class="col-xs-6"><input class="labelauty" type="checkbox" name="payment_id[]" value="{{ $payment->id }}"
                                                                 data-labelauty="{{ $payment->name }}"></div>
                                @endforeach
                            </div><!-- ./row -->
                        </div>
                    </div><!-- /.col-md-4 -->
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8 text-right">
                        <button class="btn btn-default signin-button" type="submit"><i class="fa fa-sign-in"></i> Crear
                            Comercio
                        </button>
                        <a href="{{ route('profile') }}" class="btn btn-reverse signin-button" type="submit"><i class="fa fa-level-up"></i> Volver
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection