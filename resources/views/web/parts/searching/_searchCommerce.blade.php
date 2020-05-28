@extends('layouts.main')


@section('content')
    <section id="grid-content" style="margin-top: 10%">
        <div class="container">
            <div class="list-box-title">
                <span><i class="icon fa fa-plus-square"></i>Busqueda</span>
            </div>
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div class="row">
                        @if(count($searching) > 0)
                        @foreach($searching as $search)
                            <div class="col-sm-6 col-md-4">
                                <div class="box-ads box-grid">
                                    <a class="hover-effect image image-fill"
                                       href="{{ route('name.commerce', $search->slug) }}">
                                        <span class="cover"></span>
                                        @if (!$search->logo)
                                            <img alt="guía celiaca"
                                                 src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                                        @else
                                            <img alt="{{ $search->name }}"
                                                 src="{{ asset('users/images/' . $search->user->id . '/comercio/358x250-'. $search->logo) }}">
                                        @endif
                                        <h3 class="title">{{ $search->name }}</h3>
                                    </a>
                                    <span class="price"></span>
                                    <span class="address"><i
                                                class="fa fa-map-marker"></i> {{--{{ $search->region->name }}--}}
                                        {{ Str::limit($search->province->name,20) }}</span>
                                    <span class="description">{{ Str::limit($search->about, 40)  }}</span>
                                    <dl class="detail">
                                        <dt class="status">Visitas:</dt>
                                        <dd>{{ $search->visit }}</dd>
                                        <dt class="area">Votos:</dt>
                                        <dd>
                                            @if($search->votes_positive > 0)
                                                <div class="progress-bar progress-bar-warning" role="progressbar"
                                                     aria-valuenow="60"
                                                     aria-valuemin="0" aria-valuemax="100"
                                                     style="width:{{($search->votes_positive * 100)/ ($search->votes_positive + $search->votes_negative)}}%;height: 80%;">
                                                    {{round(($search->votes_positive * 100)/ ($search->votes_positive + $search->votes_negative)),0}}
                                                    %
                                                </div>
                                            @else
                                                <div class="progress-bar progress-bar-warning" role="progressbar"
                                                     aria-valuenow="60"
                                                     aria-valuemin="0" aria-valuemax="100"
                                                     style="width:0%;height: 80%;">0%
                                                </div>
                                            @endif
                                        </dd>
                                    </dl>
                                    <div class="footer">
                                        <a class="btn btn-reverse" href="{{ route('name.commerce', $search->slug) }}"><i
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
                @include('web.parts.searching._asideSearching')
            </div>
        </div>

        <div class="container" id="pagination">
            <div class="row">
                <div class="col-md-9">
                    <ul class="pagination">
                        {{--{{ $searching->render() }}--}}
                    </ul>
                </div>
            </div>
        </div>

    </section>
@endsection