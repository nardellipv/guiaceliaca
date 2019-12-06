<footer id="footer-page" class="section-color">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3">
						<span class="title with-icon">
							<img class="logo-footer" src="{{ asset('images/img-logo.png') }}" alt="guia celiaca"/>
							Guía Celíaca
						</span>
                <span class="text">
							Una forma fácil de ubicar locales celiacos cerca de tu domicilio y poder contactarlos de forma aún mas fácil.
						</span>
            </div>
            <div class="col-sm-6 col-md-3">
                <span class="title">Contacto</span>
                <i class="fa fa-map-marker"></i> Mendoza, Argentina <br>
                <i class="fa fa-envelope"></i> info@guiaceliaca.com.ar
            </div>
            <div class="hidden-xs hidden-sm col-md-3">
                <span class="title">Links</span>
                <ul class="link-extra">
                    <li><a href="{{ route('term') }}">Términos y Condiciones</a></li>
                    <li><a href="{{ route('policity') }}">Política de privacidad</a></li>
                    <li><a href="{{ route('contact') }}">Contacto</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3">
                <span class="title">Newsletter</span>
                Mantenete actualizado con nuestro newsletter y recibe las últimas novedades del sitio en tu email.
                <form method="post" action="{{ route('newsletter.add') }}" role="form"
                      data-toggle="validator">
                    @csrf
                    <div class="newsletter-box">
                        <input type="email" name="email" class="form-control" placeholder="Ingresar Email">
                        <button class="btn btn-default send" type="submit"><i class="fa fa-envelope-o"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="credits">
        <div class="container">
            <div class="row">
                <div class="hidden-xs col-md-6 credits-text">Copyright {{ date('Y') }} <b>MikAnt</b> | All Rights Reserved |
                    Designed By MikAnt
                </div>
                <div class="col-md-6">
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/guiaceliaca" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/guiaceliaca/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>