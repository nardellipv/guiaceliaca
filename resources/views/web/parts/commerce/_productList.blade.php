@extends('layouts.main')

@section('title',' ⚠ Productos ' . $commerce->name . ' local para celiacos')

@section('meta-description','💪 Local de comida sin TACC '.$commerce->name .' ingresa y conoce más sobre este local')

@section('og:url', 'https://guiaceliaca.com.ar/productos/' . $commerce->slug)
@section('og:title', $commerce->name)
@section('og:description', $commerce->about)

@if ($commerce->logo)
    @section('og:image', 'https://guiaceliaca.com.ar/users/images/' . $commerce->user->id . '/comercio/358x250-'. $commerce->logo)
@endif


@section('content')

    <section id="grid-content" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="filter-title">
                        <h2>{{ $commerce->name }}</h2>
                        <span class="address"><i class="fa fa-map-marker"></i> {{ $commerce->province->name }}</span>
                    </div>

                    @foreach($products as $product)
                        <div class="box-ads box-list hover-effect">
                            <a href="{{ asset('users/images/' . $product->commerce->user->id . '/producto/512x512-'. $product->photo) }}"
                               class="hover-effect image image-fill">
                                <span class="cover"></span>
                                <img alt="{{ $product->photo }}"
                                     src="{{ asset('users/images/' . $product->commerce->user->id . '/producto/100x100-'. $product->photo) }}"
                                     class="img-responsive" width="50%">
                            </a>
                            <span class="address"><i class="fa fa-cutlery"></i> {{ $product->name }}</span>
                            <span class="description">{!! $product->description !!}</span>
                            <dl class="detail">
                                <dt class="status">Precio:</dt>
                                <dd><span>${{ $product->price }}</span></dd>
                                <dt class="bed">Oferta:</dt>
                                @if ($product->offer)
                                    <dd><span>${{ $product->offer }}</span></dd>
                                @else
                                    <dd><span>Sin oferta</span></dd>
                                @endif
                                <dt class="status">Categoria:</dt>
                                <dd><span>{{ $product->category->name }}</span></dd>
                            </dl>
                            <div class="footer">
                                {{-- ¿Te gusto el producto?
                                 <a href="#" style="margin-right: 7%"><i
                                             class="fa fa-thumbs-o-up" style="color: red"></i></a>
                                 <a href="#"><i
                                             class="fa fa-thumbs-o-down" style="color: red"></i></a>--}}
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="col-md-3">
                    {{--<div class="section-title line-style no-margin">
                        <h3 class="title">Publicidad</h3>
                    </div>--}}
                </div>
            </div>
        </div>

        <div class="container" id="#pagination">
            <div class="row">
                <div class="col-md-9">
                    <ul class="pagination">

                    </ul>
                </div>
            </div>
        </div>

    </section>

    <!-- Marcado JSON-LD generado por el Asistente para el marcado de datos estructurados de Google. -->
    <script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Product",
  "name" : "$commerce->name",
  "image" : "{{ 'https://guiaceliaca.com.ar/users/images/' . $product->commerce->user->id . '/producto/100x100-'. $product->photo}}",
  "description" : "{!! $product->description !!}",
  "brand" : {
    "@type" : "Brand",
    "name" : "{{ $product->name }}"
  },
  "offers" : {
    "@type" : "Offer",
    "url" : "{{ 'https://guiaceliaca.com.ar/productos/' . $commerce->slug }}",
    "priceCurrency " : "$",
    "price" : "{{ $product->price }}"
  }
}
</script>
@endsection

