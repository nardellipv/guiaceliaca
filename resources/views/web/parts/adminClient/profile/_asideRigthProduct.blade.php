<div class="col-sm-2 col-md-2">
    <a href="{{ route('product.index') }}" type="button"
       class="{{ request()->routeIs('product.index') ? 'btn btn-warning' : 'btn btn-reverse' }} btn-block"
       style="margin: 20% 15%;">Crear Producto</a>
    <a href="{{ route('product.list') }}" type="button"
       class="{{ request()->routeIs('product.list') ? 'btn btn-warning' : 'btn btn-reverse' }} btn-block"
       style="margin: 20% 15%;">Listado de
        Productos</a>
    <a href="{{ route('product.paused') }}" type="button"
       class="{{ request()->routeIs('product.paused') ? 'btn btn-warning' : 'btn btn-reverse' }} btn-block"
       style="margin: 20% 15%;">Productos
        Pausados</a>
</div>