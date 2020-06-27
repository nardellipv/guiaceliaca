<div class="section-title line-style">
    <h3 class="title">Seleccione un paquete</h3>
</div>
<a href="{{ route('faq.packets') }}" type="button" class="btn btn-reverse btn-block" target="_blank">Más información sobre los paquetes</a>
<br>
<div id="pricing-box" class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="pricing hover-effect {{ $commerce->type == 'FREE' ? 'select' : 'no-select' }}">
									<span class="header">
										<span class="title">FREE</span>
										<span class="sub-title">Exposición Baja</span>
										<span class="cover"></span>
									</span>
            <div class="price">$ 0,00</div>
            <input class="btn btn-default select-button" name="type" value="FREE" type="radio"
                    {{ $commerce->type == 'FREE' ? 'checked' : '' }}>
        </div><!-- /.pricing -->
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="pricing hover-effect {{ $commerce->type == 'BASIC' ? 'select' : 'no-select' }}">
									<span class="header">
										<span class="title">Básica</span>
										<span class="sub-title">Exposición Normal</span>
										<span class="cover"></span>
									</span>
            <div class="price">$ 399<small>/Mes</small></div>
            <input class="btn btn-default select-button" name="type" value="Basic" type="radio" {{ $commerce->type == 'BASIC' ? 'checked' : '' }}>
        </div><!-- /.pricing -->
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="pricing hover-effect {{ $commerce->type == 'CLASIC' ? 'select' : 'no-select' }}">
									<span class="header">
										<span class="title">Clásica</span>
										<span class="sub-title">Exposición Alta</span>
										<span class="cover"></span>
									</span>
            <div class="price">$ 745<small>/Mes</small></div>
            <input class="btn btn-default select-button" name="type" value="Clasic"
                   type="radio" {{ $commerce->type == 'CLASIC' ? 'checked' : '' }}>
        </div><!-- /.pricing -->
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="pricing hover-effect {{ $commerce->type == 'PREMIUM' ? 'select' : 'no-select' }}">
									<span class="header">
										<span class="title">Premium</span>
										<span class="sub-title">Alta Exposición + Sitio web</span>
										<span class="cover"></span>
									</span>
            <div class="price">Consultar</div>
            <input class="btn btn-default select-button" name="type" value="Premium"
                   type="radio" {{ $commerce->type == 'PREMIUM' ? 'checked' : '' }}>
        </div><!-- /.pricing -->
    </div>
</div>