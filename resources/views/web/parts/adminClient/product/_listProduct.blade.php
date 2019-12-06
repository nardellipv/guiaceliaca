@extends('layouts.main')


@section('content')
    <section id="user-profile" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                @include('web.parts.adminClient.profile._asideProfile')
                <div class="col-sm-7 col-md-7">
                    <div class="section-title line-style no-margin">
                        <h3 class="title">Listado de productos activos</h3>
                    </div>
                    <div class="table-responsive property-list">
                        <table class="table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Imágen</th>
                                <th class="hidden-xs">Nombre</th>
                                <th class="hidden-xs">Descripción</th>
                                <th class="hidden-xs">Precio</th>
                                <th class="hidden-xs">Oferta</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        @if (!$product->photo)
                                            <span class="image image-fill">
                                            <img alt="guía celiaca"
                                                 src="{{ asset('images/img-logo-grande.png') }}">
                                            </span>
                                        @else
                                            <span class="image image-fill">
                                            <img alt="Image Sample"
                                                 src="{{ asset('users/images/' . Auth::user()->id . '/producto/100x100-'. $product->photo) }}">
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($product->name,30) }}</td>
                                    <td class="hidden-xs">{{ Str::limit($product->description, 50) }}</td>
                                    <td class="hidden-xs">$ {{ $product->price }}</td>
                                    <td class="hidden-xs">{{ $product->offer ? '$ '. $product->offer : 'Sin Oferta' }}</td>
                                    <td><a href="{{ route('product.pausedAction', $product) }}"><i class="icon fa fa-pause"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <div class="pagination-content">
                        <ul class="pagination">
                           {{ $products->render() }}
                        </ul><!-- /.pagination -->
                    </div><!-- /.pagination-content -->
                </div>
                @include('web.parts.adminClient.profile._asideRigthProduct')
            </div>
        </div>
    </section>
@endsection