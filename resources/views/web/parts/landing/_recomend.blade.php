<section id="recent-listed" data-parallax-speed="-0.3" class="hidden-xs">
    <div class="section-detail">
        <h1>Recent Listed</h1>
        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor, sagittis sed elementum dignissim,
            lobortis.</h2>
    </div>
    <div class="margin-box">
        <div class="property-slide" data-navigation="#property-slide-nav">
            <div class="crsl-wrap">
                @foreach($commercesPro as $commercePro)
                    <figure class="crsl-item">
                        <div class="box-property-slide">
                            <div class="left-block">
                                <span class="title">{{ $commercePro->name }}</span>
                                <span class="address"><i class="fa fa-map-marker"></i> {{--{{ $commercePro->region->name }}--}}
                                    {{ $commercePro->province->name }}</span>
                                <hr>
                                <span class="description">{{ Str::limit($commercePro->about, 100)  }}</span>
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
                                <a href="{{ route('name.commerce', $commercePro->slug) }}" class="btn btn-reverse button"><i
                                            class="fa fa-search"></i> Ir al negocio</a>
                            </div>
                            <a href="property-detail.html" class="right-block hover-effect image-fill">
                                @if (!$commercePro->logo)
                                    <img alt="guía celiaca"
                                         src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                                @else
                                    <img alt="{{ $commercePro->name }}"
                                         src="{{ asset('users/images/' . $commercePro->user->id . '/comercio/284x386-'. $commercePro->logo) }}">
                                @endif
                                <span class="cover"></span>
                                <span class="cover-title">Recomendada</span>
                            </a>
                        </div>
                    </figure>
                @endforeach
            </div>
        </div><!-- ./property-slide -->
        <div id="property-slide-nav" class="nav-box">
            <a href="#" class="previous"></a>
            <a href="#" class="next"></a>
        </div>
    </div>
</section>