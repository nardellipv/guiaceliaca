@extends('layouts.main')

@section('title',' ⚠ ' . $commerce->name . ' local para celiacos')

@section('meta-description','💪 Local de comida sin TACC '.$commerce->name .' ingresa y conoce más sobre este local')

@section('style')
    <link rel="stylesheet" href="{{ asset('style/css/vendor/fotorama/fotorama.css') }}">
@endsection

@section('content')
    <section id="property-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- . Agent Box -->
                            <div class="agent-box-card grey hidden-xs hidden-sm">
                                <div class="image-content">
                                    <div class="image image-fill">
                                        @if($commerce->created_at->diffInDays(now()) <= '30')
                                            <span class="large-price">Nuevo Comercio</span>
                                        @endif
                                        @if (!$commerce->logo)
                                            <img alt="guía celiaca"
                                                 src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                                        @else
                                            <img alt="{{ $commerce->name }}"
                                                 src="{{ asset('users/images/' . $commerce->user->id . '/comercio/358x250-'. $commerce->logo) }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="info-agent">
                                    <ul class="contact">
                                        <li><a class="icon" href="{{ $commerce->facebook }}" target="_blank"><i
                                                        class="fa fa-facebook"></i></a></li>
                                        <li><a class="icon" href="{{ $commerce->instagram }}" target="_blank"><i
                                                        class="fa fa-instagram"></i></a></li>
                                        <li><a class="icon" href="{{ $commerce->twitter }}" target="_blank"><i
                                                        class="fa fa-twitter" target="_blank"></i></a></li>
                                        <li><a class="icon" href="#ubicacion"><i class="fa fa-map-marker"></i></a></li>
                                        <li><a class="icon" href="#datos"><i
                                                        class="fa fa-info-circle"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 7. Rating -->
                            <div class="section-title line-style">
                                <h3 class="title">Rating</h3>
                            </div>

                            <ul class="rating">
                                <li class="value">
                                    <span class="name">Votos</span>
                                    @if($commerce->votes_positive > 0)
                                        <span class="graphic"><span class="percent"
                                                                    style="width: {{($commerce->votes_positive * 100)/ ($commerce->votes_positive + $commerce->votes_negative)}}%"></span></span>
                                        <span class="count">{{$commerce->votes_positive + $commerce->votes_negative}} </span>
                                    @else
                                        <span class="graphic"><span class="percent"
                                                                    style="width: 0%"></span></span>
                                        <span class="count">0 </span>
                                    @endif
                                </li>
                                <li class="value">
                                    <span class="name">Visitas</span>
                                    <span class="graphic"><span class="percent"
                                                                style="width: {{ $totalVisit }}%"></span></span>
                                    <span class="count">{{ $commerce->visit }}</span>
                                </li>
                            </ul>
                            <span class="footer">
											¿Cómo Te fue con {{ $commerce->name }}?
											<a href="{{ route('positive', $commerce->slug) }}"><i
                                                        class="fa fa-thumbs-o-up" style="color: red"></i></a>
											<a href="{{ route('negative', $commerce->slug) }}"><i
                                                        class="fa fa-thumbs-o-down" style="color: red"></i></a>
										</span>

                            <!-- 9. Mortage -->
                            <div class="section-title line-style">
                                <h3 class="title">Dejar comentario</h3>
                            </div>
                            @if(Auth::check())
                                {{--hacer--}}
                                {{--probar cuando este logueado--}}
                                <form method="post" action="{{ route('add.commentCommerce', $commerce->slug) }}"
                                      class="form-large grey-color" role="form"
                                      data-toggle="validator">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="name">Nombre</label>
                                            <input type="text" class="margin-bottom form-control" id="name" name="name"
                                                   placeholder="Nombre" required>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="email">Email</label>
                                            <input type="email" class="margin-bottom form-control" id="email"
                                                   name="email" placeholder="Email" value="{{ Auth::user()->email }}"
                                                   readonly required>
                                            <sup>Tu email no se mostrará</sup>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="text-message">Comentario</label>
                                            <textarea class="margin-bottom form-control" rows="4" id="text-message"
                                                      name="text-message" placeholder="Comentario" required></textarea>
                                        </div>
                                    </div>
                                    <input type="submit" value="Dejar Comentario" class="btn btn-default">
                                </form>

                            @else
                                <h6>Necesita estar logueado para poder dejar comentarios.</h6>
                                <a href="{{ url('register') }}" type="button" class="btn btn-reverse btn-xs">Registrarse</a>
                            @endif

                            <div class="section-title line-style">
                                <h3 class="title">Publicidad</h3>
                            </div>

                        </div>
                        <div class="col-md-8" id="ubicacion">
                            <h1>{{ $commerce->name }}</h1>
                            <!-- 6. Description -->
                            <div class="section-title line-style">
                                <h3 class="title">Descripción</h3>
                            </div>
                            <div class="description">
                                {!! $commerce->about !!}
                            </div>
                            <br>
                            <a href="{{ route('list.blog') }}" target="_blank">
                                <div class="alert alert-warning" role="alert">
                                    Visitá nuestro blog y <b>enterate</b> de las últimas noticias en el mundo celíaco.
                                </div>
                            </a>
                            <i class="fa fa-map-marker"></i><b style="color: #1ccdaa"> Ubicación del comercio</b>
                            <iframe
                                    width="100%"

                                    height="300px"
                                    frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD7eUalpQrZ5TA9BrE5XgsudugZC7TIPYo
                                        &q={{ $commerce->address .','. $commerce->location . $commerce->province->name}}"
                                    allowfullscreen>
                            </iframe>
                            <!-- 7. Details -->
                            <div id="datos" class="section-title line-style line-style">
                                <h3 class="title">Datos de contacto</h3>
                            </div>
                            <ul class="rating">
                                <li class="value">
                                    <span class="name">Teléfono</span>
                                    <span class="graphic"><span class="percent"
                                                                style="width:100%"><b
                                                    style="color: black;margin-left: 5%;">{{ $commerce->phone }}</b></span></span>
                                </li>
                                <li class="value">
                                    <span class="name">Dirección</span>
                                    <span class="graphic"><span class="percent"
                                                                style="width:100%"><b
                                                    style="color: black;margin-left: 5%;">{{ $commerce->address }}</b></span></span>
                                </li>
                                <li class="value">
                                    <span class="name">Web</span>
                                    <span class="graphic"><span class="percent"
                                                                style="width:100%"><b style="margin-left: 5%;"><a
                                                        href="{{ $commerce->web }}" style="color: black;"
                                                        target="_blank">{{ $commerce->web }}</a> </b></span></span>
                                </li>
                                <li class="value">
                                    <span class="name">Provincia</span>
                                    <span class="graphic"><span class="percent"
                                                                style="width:100%"><b
                                                    style="color: black;margin-left: 5%;">{{ $commerce->province->name }}</b></span></span>
                                </li>
                            </ul>


                            <div class="section-title line-style line-style">
                                <h3 class="title">Caracteristicas</h3>
                            </div>
                            <div class="details">
                                <div class="row">
                                    @foreach($characteristics as $characteristic)
                                        <div class="col-sm-4 col-xs-6">
                                            <span class="detail"><i
                                                        class="fa fa-square"></i> {{ $characteristic->characteristic->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="section-title line-style line-style">
                                <h3 class="title">Medios de Pago</h3>
                            </div>
                            <div class="details">
                                <div class="row">
                                    @foreach($payments as $payment)
                                        <div class="col-sm-4 col-xs-6">
                                            <span class="detail"><i
                                                        class="fa fa-square"></i> {{ $payment->payment->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="section-title line-style line-style">
                                <h3 class="title">Productos</h3>
                            </div>
                            @if(count($products) > 0)
                                <div class="details">
                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-sm-4 col-xs-6">
                                            <span class="detail">
                                                @if (!$product->photo)
                                                    <img alt="guía celiaca"
                                                         src="{{ asset('images/img-logo-grande.png') }}"
                                                         class="img-responsive" style="width: 72%;">
                                                @else
                                                    <img alt="{{ $product->photo }}"
                                                         src="{{ asset('users/images/' . $commerce->user->id . '/producto/100x100-'. $product->photo) }}">
                                                @endif
                                                {{ Str::limit($product->name, 15) }}
                                            </span>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if(count($products) > 6)
                                        <button type="button" class="btn btn-warning">Ver listado de Productos</button>
                                    @endif
                                </div>
                            @else
                                <div class="details">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-6">
                                            <h5>El comercio no publico ningún producto.</h5>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        <!-- 8. Maps -->
                            <div id="ubicacion" class="section-title line-style">
                                <h3 class="title">Comentarios</h3>
                            </div>

                            @if(count($comments) == 0)
                                <p>Este local no posee ningún comentario. Se el primero en opinar.</p>
                            @else
                                @foreach($comments as $comment)
                                    <div class="agent-box-card rounded top-agent">
                                        <div class="info-agent">
                                            <span class="name">{{ $comment->name }}
                                                <h6> {{ $comment->created_at->format('d/m/Y') }}</h6></span>
                                            <div class="text">{{ $comment->message }}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            @endif
                            <div class="container" id="pagination">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <ul class="pagination">
                                            {!! $comments->render() !!}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                @include('web.parts.commerce._asideCommerce')
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('style/script/vendor/noui-slider/nouislider.all.min.js') }}"></script>
    <script src="{{ asset('style/script/vendor/fotorama/fotorama.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>

        function initialize() {
            var mapOptions = {
                zoom: 18,
                center: new google.maps.LatLng(-33.890542, 151.274856)
            }
            var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

            var image = 'images/maps/pin-maps.png';
            var myLatLng = new google.maps.LatLng(-33.890542, 151.274856);
            var beachMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: image
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
@endsection