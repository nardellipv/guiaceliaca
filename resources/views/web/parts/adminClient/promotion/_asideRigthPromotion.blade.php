<div class="col-sm-2 col-md-2">
    <a href="{{ route('create.promotion') }}" type="button"
       class="{{ request()->routeIs('create.promotion') ? 'btn btn-warning' : 'btn btn-reverse' }} btn-block"
       style="margin: 20% 15%;">Crear Promocion</a>
    <a href="{{ route('list.promotion') }}" type="button"
       class="{{ request()->routeIs('list.promotion') ? 'btn btn-warning' : 'btn btn-reverse' }} btn-block"
       style="margin: 20% 15%;">Listado de
        Promociones</a>
</div>