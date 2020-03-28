<section id="submit-property" data-parallax-speed="0"
         style="background: url({{ asset('style/images/parallax/restaurant.jpg') }})50% 32px / cover;">
    <span class="overlay"></span>
    <div class="container">
        <div class="section-detail">
            <h1 style="color: #0c0e0f">Recomendar Local</h1>
            <h2 style="color: #0c0e0f">Nos gustaría llegar a la mayor cantidad de locales en toda Argentina, así
                celíacos de todo el país
                podrán conocer locales cerca de sus domicilios. Si quieres ayudarnos, escribe el email del local que
                quieres recomendar
                y nosotros lo contactamos para que se registre.</h2>
        </div>
        <form method="get" action="{{ route('recommend.email') }}" role="form" class="form-large grey-color"
              data-toggle="validator">
            @csrf
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" placeholder="Email Negocio" name="email" id="email" class="margin-bottom form-control">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="submit" class="btn btn-default center-block" value="Enviar Invitación">
                </div>
            </div>
        </form>
    </div>
</section>