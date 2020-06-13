@extends('layouts.main')

@section('title',' ⚠ ' . $commerce->name . ' local para celiacos')

@section('meta-description','💪 Local de comida sin TACC '.$commerce->name .' ingresa y conoce más sobre este local')

@section('og:url', 'https://guiaceliaca.com.ar/' . $commerce->slug)
@section('og:title', $commerce->name)
@section('og:description', $commerce->about)
@if ($commerce->logo)
    @section('og:image', 'https://guiaceliaca.com.ar/users/images/' . $commerce->user->id . '/comercio/358x250-'. $commerce->logo)
@endif

@section('style')
    <link rel="stylesheet" href="{{ asset('style/css/vendor/fotorama/fotorama.css') }}">
    <link rel="stylesheet" href="{{ asset('style/css/shareButton.css') }}">
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
                                <a href="{{ url('login') }}" type="button"
                                   class="btn btn-reverse btn-xs">Ingresar</a>
                                <a href="{{ url('register') }}" type="button"
                                   class="btn btn-reverse btn-xs">Registrarse</a>
                            @endif

                            <div class="section-title line-style">
                                <h3 class="title">Compartir local</h3>
                            </div>

                            <!-- Sharingbutton Facebook -->
                            <a class="resp-sharing-button__link"
                               href="https://facebook.com/sharer/sharer.php?u=https://guiaceliaca.com.ar/{{$commerce->slug}}"
                               target="_blank" rel="noopener" aria-label="">
                                <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small">
                                    <div aria-hidden="true"
                                         class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>

                            <!-- Sharingbutton Twitter -->
                            <a class="resp-sharing-button__link"
                               href="https://twitter.com/intent/tweet/?text={{$commerce->name}}&amp;url=https://guiaceliaca.com.ar/{{$commerce->slug}}"
                               target="_blank" rel="noopener" aria-label="">
                                <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small">
                                    <div aria-hidden="true"
                                         class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>

                            <!-- Sharingbutton Pinterest -->
                            <a class="resp-sharing-button__link"
                               href="https://pinterest.com/pin/create/button/?url=https://guiaceliaca.com.ar/{{$commerce->slug}}&amp;media=https://guiaceliaca.com.ar/{{$commerce->slug}}&amp;description={{$commerce->name}}"
                               target="_blank" rel="noopener" aria-label="">
                                <div class="resp-sharing-button resp-sharing-button--pinterest resp-sharing-button--small">
                                    <div aria-hidden="true"
                                         class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M12.14.5C5.86.5 2.7 5 2.7 8.75c0 2.27.86 4.3 2.7 5.05.3.12.57 0 .66-.33l.27-1.06c.1-.32.06-.44-.2-.73-.52-.62-.86-1.44-.86-2.6 0-3.33 2.5-6.32 6.5-6.32 3.55 0 5.5 2.17 5.5 5.07 0 3.8-1.7 7.02-4.2 7.02-1.37 0-2.4-1.14-2.07-2.54.4-1.68 1.16-3.48 1.16-4.7 0-1.07-.58-1.98-1.78-1.98-1.4 0-2.55 1.47-2.55 3.42 0 1.25.43 2.1.43 2.1l-1.7 7.2c-.5 2.13-.08 4.75-.04 5 .02.17.22.2.3.1.14-.18 1.82-2.26 2.4-4.33.16-.58.93-3.63.93-3.63.45.88 1.8 1.65 3.22 1.65 4.25 0 7.13-3.87 7.13-9.05C20.5 4.15 17.18.5 12.14.5z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
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
                                                <p>
                                                {{ Str::limit($product->name, 15) }}
                                                </p>
                                            </span>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{--                                    @if(count($products) > 6)--}}
                                    <a href="{{ route('list.productCommerce', $commerce->slug) }}" type="button"
                                       class="btn btn-warning">Ver listado de Productos</a>
                                    {{--@endif--}}
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


                            <div class="section-title line-style line-style">
                                <h3 class="title">Promociones</h3>
                            </div>
                            @if(count($promotions) > 0)
                                <div class="details">
                                    <div class="row">
                                        @foreach($promotions as $promotion)
                                            <div class="col-sm-4 col-xs-6">
                                            <span class="detail">
                                                <a href="{{ asset('users/images/' . $commerce->user->id . '/voucher/' . $promotion->percentage .'-'. $promotion->end_date .'.jpg') }}"
                                                   target="_blank" >
                                                    <img alt="{{ $promotion->name }}"
                                                         src="{{ asset('users/images/' . $commerce->user->id . '/voucher/'. $promotion->percentage . '-' . $promotion->end_date . '.jpg') }}"
                                                         class="img-responsive">
                                                </a>
                                                <p>
                                                {{ Str::limit($promotion->name, 15) }}
                                                </p>
                                            </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="details">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-6">
                                            <h5>El comercio no publico ninguna promoción.</h5>
                                        </div>
                                    </div>
                                </div>
                            @endif

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
@endsection

<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Restaurant",
  "name" : "{{ $commerce->name }}",
  @if ($commerce->logo)
        "image" : "{{ 'https://guiaceliaca.com.ar/users/images/' . $commerce->user->id . '/comercio/358x250-'. $commerce->logo }}",
  @else
        "image" : "https://guiaceliaca.com.ar/images/img-logo.png",
@endif
    "telephone" : "{{ $commerce->phone }}",
  "address" : {
    "@type" : "PostalAddress",
    "streetAddress" : "{{ $commerce->address }}",
    "addressRegion" : "{{ $commerce->province->name }}"
    },
    "aggregateRating" : {
      "@type" : "AggregateRating",
      "ratingValue" : "Votos",
      "bestRating" : "{{$commerce->votes_positive }}",
      "ratingCount" : "{{$commerce->votes_positive + $commerce->votes_negative}}"
    }
  }

</script>