@extends('layouts.main')

@section('style')
    <style>
        #faq {
            margin-top: 10%;
        }
    </style>
@endsection

@section('content')
    <section id="faq">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="block-menu-content">
                    <div class="section-title line-style no-margin">
                        <h3 class="title">Menú Ayuda</h3>
                    </div>
                    <ul class="block-menu" data-spy="affix" data-offset-top="500" data-offset-bottom="400">
                        <li><a class="faq-button active" href="#basic"><i class="icon fa fa-caret-right"></i> Paquete
                                Free</a>
                        </li>
                        <li><a class="faq-button" href="#account"><i class="icon fa fa-caret-right"></i> Paquete Básico</a>
                        </li>
                        <li><a class="faq-button" href="#property"><i class="icon fa fa-caret-right"></i> Paquete
                                Clásico</a></li>
                        <li><a class="faq-button" href="#selling"><i class="icon fa fa-caret-right"></i> Paquete Premium</a>
                        </li>
                        <li><a class="faq-button" href="#price"><i class="icon fa fa-caret-right"></i> Precios</a>
                        </li>
                        <li><a class="faq-button" href="#choose"><i class="icon fa fa-caret-right"></i> ¿Comó
                                seleccionar un paquete?</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-9">

                    <h2>Paquete Free</h2>
                    <div class="faq-container accordion" id="basic">

                        <div class="accordion-box">
                            <a data-target="#acc-1" href="#" class="title">¿Dónde aparece mi local con un paquete
                                FREE?</a>
                            <div class="text-container" id="acc-1">
                                <p>Con un paquete FREE su local aparecerá solo en la primera pantalla en la sección de
                                    <b>Recientemente Agregados</b>
                                    y eventualmente en la sección <b>Otros Comercios</b>.</p>
                                <p>Ten en cuenta que a medida que se registren más negocios tu local se quedará en
                                    paginas mal alta a la que los usuario no ingresan muy a menudo.</p>
                                <img src="{{ asset('style/images/faqPackets/Free.png') }}" class="img-responsive">
                            </div>
                        </div>
                        <div class="accordion-box">
                            <a data-target="#acc-2" href="#" class="title">¿Qué funciones no podré utilizar?</a>
                            <div class="text-container" id="acc-2">
                                <p>Con un paquete free podrá seguir utlizando el 100% del sitio.</p>
                            </div>
                        </div>
                        <div class="accordion-box">
                            <a data-target="#acc-3" href="#" class="title">¿Qué significa tener menos exposición?</a>
                            <div class="text-container" id="acc-3">
                                <p>Tener menos exposición, significa que, solo los usuarios y futuros clientes que
                                    visiten el sitio
                                    podrán ver su local si navengan en la pagina principal del mismo, ya que, su local
                                    no se mostrará en
                                    ninguna otra parte del sitio.</p>
                                <p>Tampoco se mostrará cuando guiaceliaca.com.ar realicé campañas en redes sociales
                                    promocionando
                                    locales y productos que contiene el sitio.</p>
                            </div>
                        </div>
                    </div>

                    <h2>Paquete Básico</h2>
                    <div class="faq-container accordion" id="account">
                        <div class="accordion-box">
                            <a data-target="#acc-7" href="#" class="title">¿Dónde aparece mi local con un paquete
                                Básico?</a>
                            <div class="text-container" id="acc-7">
                                <p>Su local aparecerá además de mostrarse en el listado de Recientemente Agregados, en
                                    el costado
                                    derecho de la lista de recetas.</p>
                                <img src="{{ asset('style/images/faqPackets/basicRecipe.png') }}"
                                     class="img-responsive">
                            </div>
                        </div>
                        <div class="accordion-box">
                            <a data-target="#acc-8" href="#" class="title">¿Qué funciones no podré utilizar?</a>
                            <div class="text-container" id="acc-8">
                                <p>Con un paquete free podrá seguir utlizando el 100% del sitio.</p>
                            </div>
                        </div>
                    </div>

                    <h2>Paquete Clásico</h2>
                    <div class="faq-container accordion" id="property">
                        <div class="accordion-box">
                            <a data-target="#acc-10" href="#" class="title">¿Dónde aparece mi local con un paquete
                                Clásico?</a>
                            <div class="text-container" id="acc-10">
                                <p>Su local aparecerá además de mostrarse en el listado de Recientemente Agregados, en
                                    el costado derecho de los las noticias de nuestro blog y dentro de cada noticia.</p>
                                <img src="{{ asset('style/images/faqPackets/clasicAsidePost.png') }}"
                                     class="img-responsive">
                                <img src="{{ asset('style/images/faqPackets/clasicListBlog.png') }}"
                                     class="img-responsive">
                            </div>
                        </div>
                        <div class="accordion-box">
                            <a data-target="#acc-11" href="#" class="title">¿Qué funciones no podré utilizar?</a>
                            <div class="text-container" id="acc-11">
                                <p>Con un paquete free podrá seguir utlizando el 100% del sitio.</p>
                            </div>
                        </div>
                    </div>

                    <h2>Paquete Premium</h2>
                    <div class="faq-container accordion" id="selling">
                        <div class="accordion-box">
                            <a data-target="#acc-13" href="#" class="title">¿Dónde aparece mi local con un paquete
                                Básico?</a>
                            <div class="text-container" id="acc-13">
                                <p>Con un paquete premium su local se mostrará además de la lista de recientemente
                                    agregados,
                                    en la pagina principal, también aparecera en la seccion de recomendados por arriba
                                    del listado de todos los locales, en el perfíl de los clientes y en el costado
                                    derecho de cada receta.</p>
                                <img src="{{ asset('style/images/faqPackets/premiumHome.png') }}"
                                     class="img-responsive">
                                <img src="{{ asset('style/images/faqPackets/premiumProfileClient.png') }}"
                                     class="img-responsive">
                            </div>
                        </div>
                        <div class="accordion-box">
                            <a data-target="#acc-14" href="#" class="title">Alta exposición</a>
                            <div class="text-container" id="acc-14">
                                <p>Al aparecer en tantos lugares dentro de nuestro sitio, su local de celíco tendra una
                                    mayor exposición que los demás locales. Lo que se traduce que mucha más gente pueda
                                    visualizar su comercio y tenga un mayor contacto con usted.</p>
                                <p>También su local se promocionará en las distintas redes sociales en donde se
                                    encuentra guiaceliaca.com.ar</p>
                            </div>
                        </div>
                        <div class="accordion-box">
                            <a data-target="#acc-15" href="#" class="title">¿Qué más tengo por ser Premium?</a>
                            <div class="text-container" id="acc-15">
                                <p>Además de los puntos anterior, se creará un sitio web autoadministrable de su local y
                                    se redirigirá trafico desde guiaceliaca.com.ar hacia su sitio web.</p>
                            </div>
                        </div>
                    </div>

                    <h2>Precios</h2>
                    <div class="faq-container accordion" id="price">
                        <div id="pricing-box" class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="pricing hover-effect">
									<span class="header">
										<span class="title">FREE</span>
										<span class="sub-title">Exposición Baja</span>
										<span class="cover"></span>
									</span>
                                    <div class="price">$ 0,00</div>
                                </div><!-- /.pricing -->
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="pricing hover-effect">
									<span class="header">
										<span class="title">Básica</span>
										<span class="sub-title">Exposición Normal</span>
										<span class="cover"></span>
									</span>
                                    <div class="price">$ 399
                                        <small>/Mes</small>
                                    </div>
                                </div><!-- /.pricing -->
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="pricing hover-effect">
									<span class="header">
										<span class="title">Clásica</span>
										<span class="sub-title">Exposición Alta</span>
										<span class="cover"></span>
									</span>
                                    <div class="price">$ 745
                                        <small>/Mes</small>
                                    </div>
                                </div><!-- /.pricing -->
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="pricing hover-effect">
									<span class="header">
										<span class="title">Premium</span>
										<span class="sub-title">Alta Exposición + Sitio web</span>
										<span class="cover"></span>
									</span>
                                    <div class="price">Consultar</div>
                                </div><!-- /.pricing -->
                            </div>
                        </div>
                    </div>

                    <h2>Seleccionar un paquete</h2>
                    <div class="faq-container accordion" id="choose">
                        <div class="table-responsive description">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td colspan="2">Ingrese a su cuenta desde el botón "Ingresar", esquina superior derecha.</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td colspan="2">En el menú de su perfil, seleccione "Perfil comercial".</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td colspan="2">Seleccione una de las opciones.</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td colspan="2">Precione el botón "Modificar Comercio".</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td colspan="2">Un representante se estará comunicando con usted.</td>
                                </tr>
                                </tbody>
                            </table><!-- /.table -->
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>
@endsection

@section('scrip')
    <script>

        "use strict";

        // ACCORDION
        $(document).ready(function () {
            var $title, $content;
            var $selector = $('.accordion').selector;
            var $title = $($selector + ' .title');
            var $content = $($selector + ' .text-container');
            var $close = function () {
                $title.removeClass('active');
                $content.slideUp(500).removeClass('open');
            }
            $($selector).find('.title').on('click', function (e) {
                var $idTarget = $(this).data('target');
                var currentAttrValue = $(this).attr('href');
                if ($(e.target).is('.active')) {
                    $($idTarget).css({'display': 'block'});
                    $close();
                } else {
                    $($idTarget).css({'display': 'none'});
                    $close();
                    $(this).addClass('active');
                    $($idTarget).slideDown(400).addClass('open');
                }
                e.preventDefault();
            });
        });

    </script>
@endsection