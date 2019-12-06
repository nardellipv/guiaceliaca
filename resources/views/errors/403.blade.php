@extends('layouts.main')

@section('content')
    <section id="error-page" class="fixed-no-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <span class="title"><span>4<img src="{{ asset('images/img-logo.png') }}" alt="" />3</span> Error!</span>
                    <h2 class="line-broken">Permiso denegado</h2>
                    <div class="text">
                        No tiene permiso para ingresar a esta parte del sitio.
                    </div>
                    <a href="{{ url('/') }}" class="btn btn-default error-button">Volver al inicio</a>
                </div>
            </div>
        </div>
    </section>
@endsection