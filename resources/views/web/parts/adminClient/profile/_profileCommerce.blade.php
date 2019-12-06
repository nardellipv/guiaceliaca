@extends('layouts.main')

@section('content')
    <section id="create-agency" style="margin-top: 10%">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-2" id="edit-image">
                    <!-- avatar -->
                    <a href="#" class="avatar image-fill">
                        <img src="images/default-user-image.png" alt="Image Sample"/>
                    </a>
                </div>
                <div class="col-sm-9 col-md-6">
                    <div class="section-title line-style no-margin">
                        <h3 class="title">Información General</h3>
                    </div>
                    <ul class="profile create">
                        <li>
                            <span>Nombre Comercio</span> <input type="text" class="form-control" id="name"
                                                                name="name"
                                                                placeholder="Nombre Comercio"
                                                                value="{{ $commerce->name ?  : ''  }}">
                        </li>
                        <li>
                            <span>Sobre el comercio</span>
                            <textarea class="form-control" id="about" name="about">{{ $commerce->about ?  : ''  }}</textarea>
                        </li>
                    </ul>

                    <div class="info-block" id="images">
                        <div class="section-title line-style">
                            <h3 class="title">Imagen Perfíl</h3>
                        </div>
                        <input name="photo" type="file">
                        <br>
                        <span class="text">Imagenes jpg, png. Menos de 1MB.</span>
                    </div>

                    <div class="section-title line-style">
                        <h3 class="title">Información Postal</h3>
                    </div>
                    <ul class="profile create">
                        <li>
                            <span>Dirección</span> <input type="text" class="form-control" id="address"
                                                          name="address"
                                                          placeholder="Dirección"
                                                          value="{{ $commerce->address ?  : ''  }}">
                        </li>
                        <li>
                            <span>Provincia</span>
                            <select class="dropdown" name="province_id" data-settings='{"cutOff": 5}'>
                                @if(isset($commerce->province_id))
                                    <option value="">{{ $commerce->province->name }}</option>
                                @else
                                    <option value="">-- Elegir Provincia --</option>
                                @endif
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <span>Teléfono</span> <input type="text" class="form-control" id="phone"
                                                         name="phone"
                                                         placeholder="Teléfono"
                                                         value="{{ $commerce->phone ?  : ''  }}">
                        </li>
                    </ul>

                    <div class="section-title line-style">
                        <h3 class="title">Select a Package</h3>
                    </div>

                    <div id="pricing-box" class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="pricing hover-effect no-select">
									<span class="header">
										<span class="title">FREE</span>
										<span class="sub-title">Fusce aliquet</span>
										<span class="cover"></span>
									</span>
                                <div class="price">$ 0,00</div>
                                <button class="btn btn-default select-button" type="button"><i
                                            class="icon fa fa-cart-arrow-down"></i></button>
                            </div><!-- /.pricing -->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="pricing hover-effect no-select">
									<span class="header">
										<span class="title">Basic</span>
										<span class="sub-title">Fusce aliquet</span>
										<span class="cover"></span>
									</span>
                                <div class="price">$ 99,99</div>
                                <button class="btn btn-default select-button" type="button"><i
                                            class="icon fa fa-cart-arrow-down"></i></button>
                            </div><!-- /.pricing -->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="pricing hover-effect select">
									<span class="header">
										<span class="title">Classic</span>
										<span class="sub-title">Fusce lobortis</span>
										<span class="cover"></span>
									</span>
                                <div class="price">$ 209,99</div>
                                <button class="btn btn-default select-button" type="button"><i
                                            class="icon fa fa-check"></i></button>
                            </div><!-- /.pricing -->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="pricing hover-effect no-select">
									<span class="header">
										<span class="title">Premium</span>
										<span class="sub-title">Fusce aliquet</span>
										<span class="cover"></span>
									</span>
                                <div class="price">$ 399,99</div>
                                <button class="btn btn-default select-button" type="button"><i
                                            class="icon fa fa-cart-arrow-down"></i></button>
                            </div><!-- /.pricing -->
                        </div>
                    </div>

                    <div class="section-title line-style">
                        <h3 class="title">Term & Condition</h3>
                    </div>
                    <div class="terms"><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipiscing elit. Cras
                        non turpis ut nunc malesuada sollicitudin et eu ipsum. Quisque in ultrices ante. Vivamus
                        molestie enim vitae tortor auctor ultricies. Mauris fringilla rutrum neque, sodales cursus arcu.
                        Duis ac lectus rutrum, condimentum elit ut, suscipit tortor. Nulla elementum, elit sed tincidunt
                        rutrum, orci lorem dapibus sem, eget aliquam enim nisl porttitor quam. Ut eu porta velit, a
                        iaculis mi.
                        <br/><br/>
                        Donec quis vestibulum lectus, id scelerisque ipsum. Sed tristique facilisis ante sit amet
                        eleifend. Suspendisse luctus aliquet vehicula. Quisque venenatis in neque vitae imperdiet.
                        Vivamus interdum scelerisque erat ut vehicula. Donec malesuada hendrerit tempor. Fusce eros
                        felis, mattis eu pharetra quis, iaculis at diam. Praesent quam tortor, pellentesque a mi a,
                        elementum commodo nisl. In dapibus nisi eu turpis porttitor scelerisque. Etiam mattis consequat
                        lectus malesuada eleifend.
                        <br/><br/>
                        Phasellus tincidunt fermentum elit, quis vulputate nulla placerat non. Praesent tristique purus
                        sapien, ac efficitur urna porttitor et. Nam eu justo mi. Sed sit amet eros pretium nunc
                        dignissim mattis ut id erat. Vivamus bibendum nulla sed mauris tincidunt porttitor. Pellentesque
                        habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam ut
                        iaculis erat. Sed ultricies augue augue, a scelerisque massa efficitur a.
                        <br/><br/>
                        Nullam a lectus iaculis, luctus leo eget, ultricies purus. Ut ipsum felis, semper ut ultrices
                        et, sollicitudin id lorem. Proin sed ligula eros. Nulla eu erat quis lectus posuere pellentesque
                        non eget ex. Aliquam eget fringilla odio. Curabitur vitae semper est. Phasellus odio nisi,
                        ultricies sed lacinia non, pulvinar nec neque. Pellentesque eget mi ipsum. In sodales dictum
                        lacus ut sagittis. Sed magna nunc, condimentum ut mauris eu, laoreet mollis mi. Integer eu elit
                        id quam ultrices sagittis vel sed neque.
                        <br/><br/>
                        Sed ultrices lectus dui, id consectetur felis congue in. Cras imperdiet nisl et aliquet
                        efficitur. Curabitur venenatis et metus ac faucibus. Nunc sit amet consequat ex, porttitor porta
                        orci. Mauris ante ligula, consectetur ac rhoncus vitae, tristique ac augue. Donec in diam non
                        diam euismod luctus. Maecenas ut est sit amet tellus rutrum volutpat. Vivamus pellentesque odio
                        non mi rutrum, eu placerat urna congue. Ut arcu nibh, consequat eu cursus et, sodales vitae
                        felis. Nam molestie a risus in volutpat. In interdum ac nisi non sagittis. Duis volutpat nunc
                        sapien, nec lacinia nibh semper et. Mauris tincidunt ante neque, eget placerat arcu congue
                        dapibus. Suspendisse potenti. Donec vitae nulla et elit auctor consequat a sit amet diam. Morbi
                        at tellus nec arcu gravida laoreet blandit sit amet neque.
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="section-title line-style no-margin">
                        <h3 class="title">Redes Sociales</h3>
                    </div>
                    <ul class="profile create">
                        <li>
                            <span>Facebook</span> <input type="text" class="form-control" id="facebook"
                                                         name="facebook"
                                                         placeholder="Facebook"
                                                         value="{{ $commerce->facebook ?  : 'Facebook' ?  : '' }}">
                        </li>
                        <li>
                            <span>Twitter</span> <input type="text" class="form-control" id="twitter"
                                                        name="twitter"
                                                        placeholder="Twitter"
                                                        value="{{ $commerce->twitter ?  : '' }}">
                        </li>
                        <li>
                            <span>Instagram</span> <input type="text" class="form-control"
                                                          id="instagram"
                                                          name="instagram"
                                                          placeholder="Instagram"
                                                          value="{{ $commerce->instagram ? : '' }}">
                        </li>
                        <li>
                            <span>Web</span> <input type="text" class="form-control" id="web"
                                                    name="web"
                                                    placeholder="Web"
                                                    value="{{ $commerce->web ?  : '' }}">
                        </li>
                    </ul>
                    <div class="section-title line-style">
                        <h3 class="title">Position on Map</h3>
                    </div>
                    <div class="map-box">
                        <div id="map-canvas" style="height: 500px"></div>
                        <span><i class="fa fa-map-marker"></i> Drag the pin to the location on the map</span>
                    </div>
                </div><!-- /.col-md-4 -->
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8 text-right">
                    <button class="btn btn-default signin-button" type="button"><i class="fa fa-sign-in"></i> Create
                        Agency
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection