<section id="recent-listed" data-parallax-speed="-0.3" class="hidden-xs" style="background: url({{ asset('style/images/parallax/strawberry.jpg') }})50% 32px / cover;">
    <div class="section-detail">
        <h1 style="color: cornsilk;">Negocios Sin TACC Destacados</h1>
        <h2 style="padding: 10px 110px 0px 110px">Felicitamos a <b>{{ $ratingVote->name }}</b> por ser el local con mayor cantidad de votos positivos y
            a <b>{{ $ratingVisit->name }}</b> por tener la mayor cantidad de visitas.
            Estos locales se encuentran como destacados gracias a los usuarios finales que participan visitando y votando a cada
            local registrado.</h2>
    </div>
    <div class="margin-box">
        <div class="property-slide" data-navigation="#property-slide-nav">
            <div class="col-md-6">
                <div class="box-ads box-home">
                    <a class="hover-effect image image-fill"
                       href="{{ route('name.commerce', $ratingVote->slug) }}">
                        <span class="cover"></span>
                        @if (!$ratingVote->logo)
                            <img alt="guía celiaca"
                                 src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                        @else
                            <img alt="{{ $ratingVote->name }}"
                                 src="{{ asset('users/images/' . $ratingVote->user->id . '/comercio/358x250-'. $ratingVote->logo) }}">
                        @endif
                        <h3 class="title">{{ $ratingVote->name }}</h3>
                    </a>
                    <span class="price" style="color: #0c0e0f">Mayor cantidad de votos</span>
                    <span class="address"><i class="fa fa-map-marker"></i> {{--{{ $ratingVote->region->name }}--}}
                        {{ $ratingVote->province->name }}</span>
                    <span class="description">{{ Str::limit($ratingVote->about, 75)  }}</span>
                    <dl class="detail">
                        <dt class="status">Visitas:</dt>
                        <dd>{{ $ratingVote->visit }}</dd>
                        <dt class="area">Votos:</dt>
                        <dd>
                            @if($ratingVote->votes_positive > 0)
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                     aria-valuemin="0" aria-valuemax="100"
                                     style="width:{{($ratingVote->votes_positive * 100)/ ($ratingVote->votes_positive + $ratingVote->votes_negative)}}%;height: 80%;">
                                    {{round(($ratingVote->votes_positive * 100)/ ($ratingVote->votes_positive + $ratingVote->votes_negative)),0}}
                                    %
                                </div>
                            @else
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                     aria-valuemin="0" aria-valuemax="100"
                                     style="width:0%;height: 80%;">0%
                                </div>
                            @endif
                        </dd>
                    </dl>
                    <div class="footer">
                        <a class="btn btn-reverse" href="{{ route('name.commerce', $ratingVote->slug) }}"><i
                                    class="fa fa-search"></i> Ir al negocio</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-ads box-home">
                    <a class="hover-effect image image-fill"
                       href="{{ route('name.commerce', $ratingVisit->slug) }}">
                        <span class="cover"></span>
                        @if (!$ratingVisit->logo)
                            <img alt="guía celiaca"
                                 src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                        @else
                            <img alt="{{ $ratingVisit->name }}"
                                 src="{{ asset('users/images/' . $ratingVisit->user->id . '/comercio/358x250-'. $ratingVisit->logo) }}">
                        @endif
                        <h3 class="title">{{ $ratingVisit->name }}</h3>
                    </a>
                    <span class="price" style="color: #0c0e0f">Mayor cantidad de visitas</span>
                    <span class="address"><i class="fa fa-map-marker"></i> {{--{{ $ratingVisit->region->name }}--}}
                        {{ $ratingVisit->province->name }}</span>
                    <span class="description">{{ Str::limit($ratingVisit->about, 75)  }}</span>
                    <dl class="detail">
                        <dt class="status">Visitas:</dt>
                        <dd>{{ $ratingVisit->visit }}</dd>
                        <dt class="area">Votos:</dt>
                        <dd>
                            @if($ratingVisit->votes_positive > 0)
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                     aria-valuemin="0" aria-valuemax="100"
                                     style="width:{{($ratingVisit->votes_positive * 100)/ ($ratingVisit->votes_positive + $ratingVisit->votes_negative)}}%;height: 80%;">
                                    {{round(($ratingVisit->votes_positive * 100)/ ($ratingVisit->votes_positive + $ratingVisit->votes_negative)),0}}
                                    %
                                </div>
                            @else
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                     aria-valuemin="0" aria-valuemax="100"
                                     style="width:0%;height: 80%;">0%
                                </div>
                            @endif
                        </dd>
                    </dl>
                    <div class="footer">
                        <a class="btn btn-reverse" href="{{ route('name.commerce', $ratingVisit->slug) }}"><i
                                    class="fa fa-search"></i> Ir al negocio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>