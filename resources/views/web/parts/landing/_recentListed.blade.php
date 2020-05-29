<section id="recent-list">
    <div class="container">
        @if(!Request()->cookie('login'))
            @include('web.parts._registerIndex')
        @endif
        <br>
        <div class="list-box-title">
            <span><i class="icon fa fa-plus-square"></i>Recientemente Agregadas</span>
        </div>
        <div class="row">
            @foreach($commercesLastRegister as $commerceLast)
                <div class="col-md-4">
                    <div class="box-ads box-home">
                        <a class="hover-effect image image-fill"
                           href="{{ route('name.commerce', $commerceLast->slug) }}">
                            <span class="cover"></span>
                            @if (!$commerceLast->logo)
                                <img alt="guía celiaca"
                                     src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                            @else
                                <img alt="{{ $commerceLast->name }}"
                                     src="{{ asset('users/images/' . $commerceLast->user->id . '/comercio/358x250-'. $commerceLast->logo) }}">
                            @endif
                            <h3 class="title">{{ $commerceLast->name }}</h3>
                        </a>
                        <span class="price"></span>
                        <span class="address"><i
                                    class="fa fa-map-marker"></i> {{--{{ $commerceLast->region->name }}--}}
                            {{ $commerceLast->province->name }}</span>
                        <span class="description">{{ Str::limit($commerceLast->about, 75)  }}</span>
                        <dl class="detail">
                            <dt class="status">Visitas:</dt>
                            <dd>{{ $commerceLast->visit }}</dd>
                            <dt class="area">Votos:</dt>
                            <dd>
                                @if($commerceLast->votes_positive > 0)
                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                         aria-valuenow="60"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width:{{($commerceLast->votes_positive * 100)/ ($commerceLast->votes_positive + $commerceLast->votes_negative)}}%;height: 80%;">
                                        {{round(($commerceLast->votes_positive * 100)/ ($commerceLast->votes_positive + $commerceLast->votes_negative)),0}}
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
                            <a class="btn btn-reverse" href="{{ route('name.commerce', $commerceLast->slug) }}"><i
                                        class="fa fa-search"></i> Ir al negocio</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination-content" align="center">
            <ul class="pagination">
                {{ $commercesLastRegister->render() }}
            </ul>
        </div>
    </div>
</section>

{{--snipper--}}
@include('external.snipperHome')


