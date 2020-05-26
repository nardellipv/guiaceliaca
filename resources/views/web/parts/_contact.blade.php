@extends('layouts.main')

@section('content')
    <section id="contact" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-push-4 col-md-9 col-md-push-3 form-container">
                    <h3 class="title">Contacto con Guía Celíaca</h3>
                    <p>Si tienes alguna pregunta, duda o sugerencia, por favor Contactanos</p>
                    <form method="post" action="{{ route('MailContactToSite') }}" class="form-large" role="form" data-toggle="validator">
                        @csrf
                        {!! RecaptchaV3::field('contact') !!}
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label for="name">Nombre</label>
                                <input type="text" class="margin-bottom form-control" id="name" name="name" placeholder="Nombre" required>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label for="email">Email</label>
                                <input type="email" class="margin-bottom form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <label for="subject">Asunto</label>
                                <input type="text" class="margin-bottom form-control" id="subject" name="subject" placeholder="Asunto">
                            </div>
                            <div class="col-md-12">
                                <label for="messageText">Mensaje</label>
                                <textarea class="margin-bottom form-control" rows="4" name="messageText" id="messageText" required></textarea>
                            </div>
                        </div>
                        <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-default">
                    </form>
                </div><!-- /.form-container -->

                <div class="col-sm-4 col-sm-pull-8 col-md-3 col-md-pull-9 hidden-xs">
                    <div class="info-container">
                        <h2>Contacto</h2>
                        <ul class="grey-box">
                            <li><a href="#">info@guiaceliaca.com.ar</a><i class="icon fa fa-envelope-o"></i></li>
                        </ul>
                        <span class="clear-fix"></span>
                    </div><!-- /.info-container -->
                </div><!-- ./col-sm-4 -->

            </div>
        </div>
    </section>
@endsection