@extends('layouts.main')


@section('content')
    <section id="agent-list" style="margin-top: 10%;">
        <div class="section-detail">
            <h1>Busqueda de Comercios</h1>
            <h2>Resultado de la busqueda de comercios sin TACC.</h2>
        </div>
        <div class="container">
            <div class="row">
                @if(count($searching) > 0)
                    @foreach($searching as $search)
                        <div class="col-sm-6 col-md-3">
                            <!-- . Agent Box -->
                            <div class="agent-box-card">
                                <div class="image-content">
                                    <div class="image image-fill">
                                        @if (!$search->logo)
                                            <img alt="guía celiaca"
                                                 src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                                        @else
                                            <img alt="{{ $search->name }}"
                                                 src="{{ asset('users/images/' . $search->user->id . '/comercio/358x250-'. $search->logo) }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="info-agent">
                                    <span class="name">{{ $search->name }}</span>
                                    <div class="text">
                                        {{ Str::limit($search->about, 75)  }}
                                    </div>
                                </div>

                                <div class="footer">
                                    <a class="btn btn-reverse btn-block"
                                       href="{{ route('name.commerce', $search->slug) }}"><i
                                                class="fa fa-search"></i> Ir al negocio</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3 class="text-center" style="color: #f1c40f">Sin locales</h3>
                @endif
            </div>
        </div>


        <div class="container" id="pagination">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="pagination">
                        {{--{{ $searching->render() }}--}}
                    </ul>
                </div>
            </div>
        </div>

    </section>
@endsection