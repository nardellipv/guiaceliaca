<!DOCTYPE html>
<html lang="en">

<head>
    <meta https-equiv="content-type" content="text/html;charset=UTF-8" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin | Administración GuiaCeliaca.</title>

    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Roboto Slab Font [ OPTIONAL ] -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('styleAdmin/css/bootstrap.min.css') }}" rel="stylesheet">


    <!--Jasmine Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('styleAdmin/css/style.css') }}" rel="stylesheet">


    <!--Font Awesome [ OPTIONAL ]-->
    <link href="{{ asset('styleAdmin/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">


    <!--Switchery [ OPTIONAL ]-->
    <link href="{{ asset('styleAdmin/plugins/switchery/switchery.min.css') }}" rel="stylesheet">


    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="{{ asset('styleAdmin/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="{{ asset('styleAdmin/plugins/bootstrap-validator/bootstrapValidator.min.css') }}" rel="stylesheet">

    @yield('style')

    {{--tostr--}}
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ asset('styleAdmin/css/demo/jquery-steps.min.css') }}" rel="stylesheet">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ asset('styleAdmin/css/demo/jasmine.css') }}" rel="stylesheet">


    <!--SCRIPT-->
    <!--=================================================-->

    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="{{ asset('styleAdmin/plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('styleAdmin/plugins/pace/pace.min.js') }}"></script>


</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
<div id="container" class="effect mainnav-lg">

    <!--NAVBAR-->
    <!--===================================================-->
    <header id="navbar">
        @include('admin.parts._header')
    </header>
    <!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
        {!! Toastr::message() !!}

            <!--Page Title-->

            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">

                @yield('content')

            </div>
            <!--===================================================-->
            <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->

        <!--MAIN NAVIGATION-->
        <!--===================================================-->
            @include('admin.parts._menu')
        <!--===================================================-->
        <!--END MAIN NAVIGATION-->
    </div>



    <!-- FOOTER -->
    <!--===================================================-->
    <footer id="footer">
        <!-- Visible when footer positions are static -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div class="hide-fixed pull-right pad-rgt">Currently v0.1</div>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <p class="pad-lft">&#0169; 2019 GuiaCeliaca</p>

    </footer>
    <!--===================================================-->
    <!-- END FOOTER -->

    <!-- SCROLL TOP BUTTON -->
    <!--===================================================-->
    <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
    <!--===================================================-->

</div>
<!--===================================================-->
<!-- END OF CONTAINER -->

<!--JAVASCRIPT-->
<!--=================================================-->

<!--jQuery [ REQUIRED ]-->
<script src="{{ asset('styleAdmin/js/jquery-2.1.1.min.js') }}"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="{{ asset('styleAdmin/js/bootstrap.min.js') }}"></script>


<!--Fast Click [ OPTIONAL ]-->
<script src="{{ asset('styleAdmin/plugins/fast-click/fastclick.min.js') }}"></script>


<!--Jasmine Admin [ RECOMMENDED ]-->
<script src="{{ asset('styleAdmin/js/scripts.js') }}"></script>


<!--Switchery [ OPTIONAL ]-->
<script src="{{ asset('styleAdmin/plugins/switchery/switchery.min.js') }}"></script>

<!--Jquery Steps [ OPTIONAL ]-->
<script src="{{ asset('styleAdmin/plugins/parsley/parsley.min.js') }}"></script>

<!--Jquery Steps [ OPTIONAL ]-->
<script src="{{ asset('styleAdmin/plugins/jquery-steps/jquery-steps.min.js') }}"></script>

<!--Bootstrap Select [ OPTIONAL ]-->
<script src="{{ asset('styleAdmin/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>

<!--Bootstrap Wizard [ OPTIONAL ]-->
<script src="{{ asset('styleAdmin/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

<!--Masked Input [ OPTIONAL ]-->
<script src="{{ asset('styleAdmin/plugins/masked-input/bootstrap-inputmask.min.js') }}"></script>

<!--Bootstrap Validator [ OPTIONAL ]-->
<script src="{{ asset('styleAdmin/plugins/bootstrap-validator/bootstrapValidator.min.js') }}"></script>

@yield('script')

<!--Form Wizard [ SAMPLE ]-->
<script src="{{ asset('styleAdmin/js/demo/wizard.js') }}"></script>

<!--Demo script [ DEMONSTRATION ]-->
<script src="{{ asset('styleAdmin/js/demo/jasmine.js') }}"></script>

<!--Form Wizard [ SAMPLE ]-->
<script src="{{ asset('styleAdmin/js/demo/form-wizard.js') }}"></script>

</body>
</html>