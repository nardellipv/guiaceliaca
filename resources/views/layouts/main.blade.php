<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Guía Celíaca | @yield('title','Comercios celíacos') {{ date('Y') }}</title>

    <meta name="description" content="@yield('meta-description','Locales y vendedores de comida y productos para celíacos en toda Argentina.
    Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios')">

    <link rel="stylesheet" href="{{ asset('style/css/bootstrap.min.css') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('style/css/vendor/font-awesom/css/font-awesome.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('style/css/vendor/mmenu/jquery.mmenu.all.css') }}"/>
    <!-- Menu Responsive -->
    <link rel="stylesheet" href="{{ asset('style/css/vendor/animate-wow/animate.css') }}">
    <!-- Animation WOW -->

    <link rel="stylesheet" href="{{ asset('style/css/vendor/labelauty/labelauty.css') }}">
    <!-- Checkbox form Style -->
    <link rel="stylesheet" href="{{ asset('style/css/vendor/nouislider/nouislider.min.css') }}">
    <!-- Slider Price -->
    <link rel="stylesheet" href="{{ asset('style/css/vendor/easydropdown/easydropdown.css') }}">
    <!-- Select form Style -->
    <link rel="stylesheet" href="{{ asset('style/css/ui-spinner.css') }}">
    <!-- Spinner -->

    <link rel="stylesheet" href="{{ asset('style/css/menu.css') }}">
    <!-- Include Menu stylesheet -->
    <link rel="stylesheet" href="{{ asset('style/css/custom.css') }}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('style/css/media-query.css') }}">
    <!-- Media Query -->

    <meta property="og:url" content="@yield('og:url', 'https://guiaceliaca.com.ar')"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="@yield('og:title', 'Comunidad de celiacos en toda la argentina.')"/>
    <meta property="og:site_name" content="Guía Celíaca"/>
    <meta property="og:description" content="@yield('og:description', 'Locales y vendedores de comida y productos para celíacos en Argentina.
    Guía práctica y simple para poder comparar precios y productos, y buscar locales cercanos a sus domicilios')"/>
    <meta property="og:image" content="@yield('og:image', 'https://guiaceliaca.com.ar/images/img-logo.png')"/>
    <meta property="fb:app_id" content="507631946630340"/>
    <meta property=“fb:admins" content=“109559280472432″/>


    <!-- Use Iconifyer to generate all the favicons and touch icons you need: http://iconifier.net -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="{{ asset('style/images/favicon/apple-touch-icon.png') }}"/>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('style/images/favicon/apple-icon-57x57.png') }}"/>
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('style/images/favicon/apple-icon-144x144.png') }}"/>
    <link rel="android-touch-icon" sizes="72x72" href="{{ asset('style/images/favicon/android-icon-72x72.png') }}"/>
    <link rel="android-touch-icon" sizes="144x144" href="{{ asset('style/images/favicon/android-icon-144x144.png') }}"/>
    <link rel="android-touch-icon" sizes="192x192" href="{{ asset('style/images/favicon/android-icon-192x192.png') }}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{--tostr--}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    @yield('style')

    <script src="{{ asset('style/script/modernizr.min.js') }}"></script> <!-- Modernizr -->
    {{--color template--}}
    <link id="color-set" rel="stylesheet" href="{{ asset('style/css/template/color/F1C40F.css') }}">
    <link id="type-set" rel="stylesheet" href="{{ asset('style/css/template/color/DARK.css') }}">
    {{--color template--}}

    @include('external.analytics')
    {{--@include('external.hotjar')--}}
    @include('external.adsenses')
    @include('external.pixel')
    {!! RecaptchaV3::initJs() !!}
</head>
<body class="fixed-header">

{{--cookie si el usuario no ingresa--}}
@if(!Request()->cookie('login'))
    {{ Cookie::queue('ingreso', 'sin_ingreso', '2628000') }}
@endif

<div id="page-container">
    <header class="menu-color-line" id="header-container-box">
        @include('web.parts._header')
        <a href="#" class="fixed-button top"><i class="fa fa-chevron-up"></i></a>
        <a href="#" class="hidden-xs fixed-button email" data-toggle="modal" data-target="#modal-contact"
           data-section="modal-contact"><i class="fa fa-envelope-o"></i></a>
    </header>

    {!! Toastr::message() !!}
    @include('alerts.error')

    @if(route::is('home'))
        @include('web.parts._slider')
    @endif

    @yield('content')

    @include('web.parts._footer')


    @include('web.parts._modalLogin')

    @include('web.parts._modalContact')

</div>

<script src="{{ asset('style/script/jquery.min.js') }}"></script>
<!-- jQuery	(necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('style/script/jquery-ui.min.js') }}"></script>
<!-- jQuery	UI is a	curated	set	of user	interface interactions,	effects, widgets, and themes -->
<script src="{{ asset('style/script/bootstrap.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="{{ asset('style/script/vendor/mmenu/mmenu.min.all.js') }}"></script>
<!-- Menu Responsive -->
<script src="{{ asset('style/script/vendor/animation-wow/wow.min.js') }}"></script>
<!-- Animate Script	-->
<script src="{{ asset('style/script/vendor/labelauty/labelauty.min.js') }}"></script>
<!-- Checkbox Script -->
<script src="{{ asset('style/script/vendor/parallax/parallax.min.js') }}"></script>
<!-- Parallax Script -->
<script src="{{ asset('style/script/vendor/images-fill/imagesloaded.min.js') }}"></script>
<!-- Loaded	image with ImageFill -->
<script src="{{ asset('style/script/vendor/images-fill/imagefill.min.js') }}"></script>
<!-- ImageFill Script -->
<script src="{{ asset('style/script/vendor/easydropdown/jquery.easydropdown.min.js') }}"></script>
<!-- Select	list Script	-->
<script src="{{ asset('style/script/vendor/carousel/responsiveCarousel.min.js') }}"></script>
<!-- Carousel Script -->
<script src="{{ asset('style/script/vendor/noui-slider/nouislider.all.min.js') }}"></script>

@yield('scrip')
<script src="{{ asset('style/script/custom.js') }}"></script>        <!-- Custom	Script -->

</body>
</html>