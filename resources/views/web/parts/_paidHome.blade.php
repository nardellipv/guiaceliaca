<section id="recent-listed" data-parallax-speed="-0.3">
    <div class="section-detail">
        <h1>Comercios Recomendados</h1>
    </div>
    <div class="margin-box">
        <div class="property-slide" data-navigation="#property-slide-nav">
            @foreach($commercesPro as $commercePro)
                <div class="col-md-4">
                    <div class="box-ads box-home">
                        <a class="hover-effect image image-fill"
                           href="{{ route('name.commerce', $commercePro->slug) }}">
                            <span class="cover"></span>
                            @if (!$commercePro->logo)
                                <img alt="guía celiaca"
                                     src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                            @else
                                <img alt="{{ $commercePro->name }}"
                                     src="{{ asset('users/images/' . $commercePro->user->id . '/comercio/358x250-'. $commercePro->logo) }}">
                            @endif
                            <h3 class="title">{{ $commercePro->name }}</h3>
                        </a>
                        <span class="price" style="color: #0c0e0f">Comercio Recomendado</span>
                        <span class="address"><i class="fa fa-map-marker"></i> {{--{{ $commercePro->region->name }}--}}
                            {{ $commercePro->province->name }}</span>
                        <span class="description">{{ Str::limit($commercePro->about, 75)  }}</span>
                        <dl class="detail">
                            <dt class="status">Visitas:</dt>
                            <dd>{{ $commercePro->visit }}</dd>
                            <dt class="area">Votos:</dt>
                            <dd>
                                @if($commercePro->votes_positive > 0)
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width:{{($commercePro->votes_positive * 100)/ ($commercePro->votes_positive + $commercePro->votes_negative)}}%;height: 80%;">
                                        {{round(($commercePro->votes_positive * 100)/ ($commercePro->votes_positive + $commercePro->votes_negative)),0}}
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
                            <a class="btn btn-reverse" href="{{ route('name.commerce', $commercePro->slug) }}"><i
                                        class="fa fa-search"></i> Ir al negocio</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>