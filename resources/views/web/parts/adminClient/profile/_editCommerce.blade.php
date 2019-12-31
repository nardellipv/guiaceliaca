@extends('layouts.main')

@section('content')
    <section id="create-agency" style="margin-top: 10%">
        <div class="container">
            <form method="post" action="{{ route('update.accountCommerce', $commerce) }}" enctype="multipart/form-data"
                  class="grey-color">
                @csrf
                <div class="row">
                    <div class="col-sm-3 col-md-2" id="edit-image">
                        <!-- avatar -->
                        <a href="#" class="avatar image-fill">
                            @if (!$commerce->logo)
                                <img alt="guía celiaca"
                                     src="{{ asset('images/img-logo-grande.png') }}">
                            @else
                                <img alt="perfil"
                                     src="{{ asset('users/images/' . $commerce->user_id . '/comercio/165x165-'. $commerce->logo) }}">
                            @endif
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
                                                                    value="{{ $commerce->name }}" required>
                            </li>
                            <li>
                                <span>Sobre el comercio</span>
                                <textarea class="form-control" id="about" name="about"
                                          required>{{ $commerce->about }}</textarea>
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
                                                              value="{{ $commerce->address }}" required>
                            </li>
                            <li>
                                <span>Provincia</span>
                                <select class="dropdown" name="province_id" data-settings='{"cutOff": 5}' required>
                                    <option value="{{ $commerce->province_id }}">{{$commerce->province->name}}</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li>
                                <span>Teléfono</span> <input type="text" class="form-control" id="phone"
                                                             name="phone"
                                                             placeholder="Teléfono"
                                                             value="{{ $commerce->phone }}">
                            </li>
                        </ul>
                        <div class="info-block" id="features">
                            <div class="section-title line-style">
                                <h3 class="title">Caracteristicas</h3>
                            </div>
                            <div class="row features-box">
                                @foreach($characteristicsCommerce as $characteristicSelected)
                                    <div class="col-xs-2">
                                        <img src="{{ asset($characteristicSelected->characteristic->photo) }}">
                                        <a href="{{ route('delete.characteristic', $characteristicSelected) }}"><img
                                                    src="{{ asset('style/images/cross.png') }}"></a>
                                    </div>
                                @endforeach
                            </div><!-- ./row -->
                        </div>

                        <div class="info-block" id="features">
                            <div class="section-title line-style">
                                <h3 class="title">Medios de pagos</h3>
                            </div>
                            <div class="row features-box">
                                @foreach($paymentsCommerce as $paymentSelected)
                                    <div class="col-xs-2">
                                        <img src="{{ asset($paymentSelected->payment->photo) }}" width="45%">
                                        <a href="{{ route('delete.payment', $paymentSelected) }}"><img
                                                    src="{{ asset('style/images/cross.png') }}"></a>
                                    </div>
                                @endforeach
                            </div><!-- ./row -->
                        </div>

                        <div class="info-block" id="features">
                                @include('web.parts.adminClient.profile._paquets')
                        </div>

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
                                                             value="{{ $commerce->facebook }}">
                            </li>
                            <li>
                                <span>Twitter</span> <input type="text" class="form-control" id="twitter"
                                                            name="twitter"
                                                            placeholder="Twitter"
                                                            value="{{ $commerce->twitter }}">
                            </li>
                            <li>
                                <span>Instagram</span> <input type="text" class="form-control"
                                                              id="instagram"
                                                              name="instagram"
                                                              placeholder="instagram"
                                                              value="{{ $commerce->instagram }}">
                            </li>
                            <li>
                                <span>Web</span> <input type="text" class="form-control" id="web"
                                                        name="web"
                                                        placeholder="Web"
                                                        value="{{ $commerce->web }}">
                            </li>
                        </ul>
                        <div class="info-block" id="features">
                            <div class="section-title line-style">
                                <h3 class="title">Caracteristicas</h3>
                            </div>
                            <div class="row features-box">
                                @foreach($characteristics as $characteristic)
                                    <div class="col-xs-6"><input class="labelauty" type="checkbox"
                                                                 name="characteristic_id[]"
                                                                 value="{{ $characteristic->id }}"
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
                                    <div class="col-xs-6"><input class="labelauty" type="checkbox" name="payment_id[]"
                                                                 value="{{ $payment->id }}"
                                                                 data-labelauty="{{ $payment->name }}"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8 text-right">
                        <button class="btn btn-default signin-button" type="submit"><i class="fa fa-sign-in"></i>
                            Modificar
                            Comercio
                        </button>
                        <a href="{{ route('profile') }}" class="btn btn-reverse signin-button" type="submit"><i
                                    class="fa fa-level-up"></i> Volver
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection