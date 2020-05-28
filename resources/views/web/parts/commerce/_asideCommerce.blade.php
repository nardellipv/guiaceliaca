<div class="col-md-3">
<!-- . Agent Form -->
    <div class="contact-agent">
        <form method="post" action="{{ route('MessageClientToCommerce', $commerce) }}" role="form" data-toggle="validator">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Nombre" class="form-control" name="name" id="name"
                       required>
            </div>
            <div class="form-group">
                <input type="email" placeholder="Email" class="form-control" name="email"
                       id="email" required>
            </div>
            <div class="form-group">
                                <textarea placeholder="Mensaje" rows="5" class="form-control" name="messageText"
                                          id="text-message" required></textarea>
            </div>
            <button class="btn btn-default" type="submit">Enviar Mensaje</button>
        </form>
    </div>

    <!-- Other property -->
    <div class="section-title line-style line-style">
        <h3 class="title">Otros Comercios</h3>
    </div>

    @foreach($randCommerces as $randCommerce)
        <div class="box-ads box-grid mini">
            <a class="hover-effect image image-fill" href={{ route('name.commerce', $randCommerce->slug) }}">
                <span class="cover"></span>
                @if (!$randCommerce->logo)
                    <img alt="guía celiaca"
                         src="{{ asset('images/img-logo-grande.png') }}" class="img-responsive">
                @else
                    <img alt="{{ $randCommerce->name }}"
                         src="{{ asset('users/images/' . $randCommerce->user->id . '/comercio/260x160-'. $randCommerce->logo) }}">
                @endif
                <h3 class="title"> {{ $randCommerce->name }}</h3>
            </a>
            <div class="footer">
                <a class="btn btn-default" href="{{ route('name.commerce', $randCommerce->slug) }}">Ir al negocio</a>
            </div>
        </div><!-- /.box-ads -->
    @endforeach

</div>