@extends('layouts.main')

@section('content')
    <section id="error-page" class="fixed-no-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <span class="title"><span>5<img src="{{ asset('images/img-logo.png') }}" alt="" />0</span> Error!</span>
                    <h2 class="line-broken">Lo siento!</h2>
                    <div class="text">
                        Hay un error la solicitud que esta realizando.
                    </div>
                    <a href="{{ url('/') }}" class="btn btn-default error-button">Volver al inicio</a>
                </div>
            </div>
        </div>
    </section>
@endsection