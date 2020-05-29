<section class="shortcode-box" id="shortcode-accordions">
    <div class="section-title line-style no-margin"><h3 class="title">Registrarse</h3></div>
    <div class="accordion">
        <div class="accordion-box">
            <a class="title" href="#" data-target="#acc-1">¿Todavía no te registras? hacelo gratis desde acá</a>
            <div id="acc-1" class="text-container">
                <div class="row">
                    <div class="col-lg-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="field" style="margin-bottom: 5%; margin-top: 10%">
                                <input id="name"
                                       class="form-control input-inline margin-right @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name"
                                       autofocus
                                       type="text" placeholder="Nombre">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field" style="margin-bottom: 5%">
                                <input id="lastname"
                                       class="form-control input-inline @error('lastname') is-invalid @enderror"
                                       type="text"
                                       name="lastname" value="{{ old('lastname') }}" required
                                       autocomplete="lastname"
                                       autofocus placeholder="Apellido">

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field" style="margin-bottom: 5%">
                                <input id="email" class="form-control @error('email') is-invalid @enderror"
                                       type="text"
                                       name="email"
                                       placeholder="Email" value="{{ old('email') }}" required
                                       autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field" style="margin-bottom: 5%">
                                <input id="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       type="password"
                                       name="password"
                                       placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field" style="margin-bottom: 5%">
                                <input id="password-confirm" class="form-control" type="password"
                                       name="password_confirmation"
                                       required autocomplete="new-password" placeholder="Repetir password">
                            </div>
                            <div class="field footer-form text-right">
                                        <span class="remember"><input class="labelauty" type="checkbox"
                                                                      data-labelauty="Leí políticas de privacidad"
                                                                      checked/>
                                        </span>
                                <button type="submit" class="btn btn-default button-form">Registrarme</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <h3>Registro de usuario para GuiaCeliaca</h3>
                        La información que se encuentra en este sitio web no pretende ser un reemplazo o un
                        sustituto de
                        un tratamiento médico profesional o un consejo médico profesional relacionado con una
                        afección
                        médica específica. Le instamos a que siempre busque el consejo de su médico. No hay
                        reemplazo
                        para el tratamiento médico personal y el consejo de su médico personal.<br/>
                        <div class="bs-callout callout-info">
                            <h4>En Guía Celíaca podrás:</h4>
                            <ul class="text">
                                <li>Comprar precios</li>
                                <li>Publicar tus productos</li>
                                <li>Comunicarte con futuros clientes</li>
                                <li>Dar visibilidad de tu negocio a celíacos cerca de tu domicilio</li>
                                <li>Y mucho más... Totalmente GRATIS!!!</li>
                            </ul>
                        </div>
                        Constantemente estamos mejorando y agregando nuevas funcionalidades al sitio. Este sitio
                        esta pensado
                        para ayudar a personas con problemas de celiaquia.
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@section('scrip')
    <script>
        $(document).ready(function() {
            var $title, $content;
            var $selector = $('.accordion').selector;
            var $title    = $($selector + ' .title');
            var $content  = $($selector + ' .text-container');
            var $close = function(){
                $title.removeClass('active');
                $content.slideUp(500).removeClass('open');
            }
            $($selector).find('.title').on('click', function(e) {
                var $idTarget = $(this).data('target');
                var currentAttrValue = $(this).attr('href');
                if($(e.target).is('.active')) {
                    $($idTarget).css({'display':'block'});
                    $close();
                }else {
                    $($idTarget).css({'display':'none'});
                    $close();
                    $(this).addClass('active');
                    $($idTarget).slideDown(400).addClass('open');
                }
                e.preventDefault();
            });
        });
    </script>
@endsection