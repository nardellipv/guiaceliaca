@extends('layouts.main')

@section('content')
    <section id="login-page" style="margin-top: 10%">

        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-sm-push-5 col-md-8 col-md-push-4">
                    <div class="text-desclaimer">
                        <h1>Bienvenidos</h1>
                        <h3>Guía Celíaca</h3>
                        Estamos concentrados en poner énfasis en la enfermedad celiaca y en todo lo que la rodea. <br/>
                        Ya sea por necesidad o por elección, vivir un estilo de vida libre de gluten es un cambio
                        significativo para que cualquiera pueda asumir y lograr.<br/>
                        La información en este sitio web tiene no tiene fines diagnosticar o tratar trastornos
                        relacionados con el gluten u otras afecciones médicas. Para preguntas sobre estas condiciones,
                        consulte a su equipo de atención médica cuando considere esta información.
                    </div>
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="col-sm-5 col-sm-pull-7 col-md-4 col-md-pull-8">
                        <div class="box">
                            <h2 class="title">Recuperar contraseña</h2>
                            <div class="field">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="EMail" autofocus>
                                <i class="fa fa-envelope"></i>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field footer-form text-right">
                                <button type="submit" class="btn btn-default button-form">Recuperar Contraseña</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
