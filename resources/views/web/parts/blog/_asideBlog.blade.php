<div class="col-md-3" style="margin-top: -40px;">
    @if(count($commercesPro) > 0)
        <div class="section-title line-style">
            <h3 class="title">Recomendados</h3>
        </div>
        @foreach($commercesPro as $commercePro)
            <div class="logs">
                <div class="box-ads box-grid mini">
                    <a class="hover-effect image image-fill" href="{{ route('name.commerce', $commercePro->slug) }}">
                        <span class="cover"></span>
                        @if (!$commercePro->logo)
                            <img alt="guía celiaca"
                                 src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                        @else
                            <img alt="{{ $commercePro->name }}"
                                 src="{{ asset('users/images/' . $commercePro->user->id . '/comercio/358x250-'. $commercePro->logo) }}">
                        @endif
                    </a>
                    <span class="price">{{ Str::limit($commercePro->name, 10) }}</span>
                    <div class="footer">
                        <a class="btn btn-default"
                           href="{{ route('name.commerce', $commercePro->slug) }}">
                            Ir al negocio
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <div class="section-title line-style">
        <h3 class="title">Más Leídos</h3>
    </div>

    @foreach($mostRead as $read)
        <div class="recent-post">
            <a class="image image-fill" href="#">
                <img alt="Image Sample" src="{{ asset('blog/images/301x160-' .$read->photo) }}">
            </a>
            <div class="body">
                <span class="title">{{ $read->title }}</span>
                <span class="date"><i class="fa fa-calendar"></i> {{ $read->created_at->format('d-M-Y') }} <i
                            class="fa fa-eye"></i> {{ $read->view }} Vistas</span>
                <div class="text">
                    <p>{!! Str::limit($read->body, 100) !!}</p>
                </div>
                <a href="{{ url('blog', $read->slug) }}" type="button" class="button-read button-read btn btn-default">Leer
                    más</a>
            </div>
        </div>
    @endforeach
</div>