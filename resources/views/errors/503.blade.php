@extends('layouts.main')

@section('content')
    <section id="error-page" class="fixed-no-header" style="margin-top: -200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <span class="title"><span>Siti<img src="{{ asset('images/img-logo.png') }}" alt="" /> en mantenimiento</span></span>
                    <div class="text">
                        Estamos realizando mejoras al sitio, volveremos pronto.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection