@if(count($commercesPro) > 0)
<div class="col-sm-4 col-md-3">
    <div class="section-title line-style no-margin">
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
</div>
@endif