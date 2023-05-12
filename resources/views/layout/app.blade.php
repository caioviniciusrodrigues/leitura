<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>.:Leitura:.</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('bibliotecas/css/bootstrap.min.css') }}" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
    <link href="{{ asset('bibliotecas/css/select2.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('bibliotecas/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bibliotecas/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bibliotecas/css/responsive.dataTables.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('bibliotecas/css/datatables.min.css') }}" />


       <!--ICON-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bibliotecas/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bibliotecas/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bibliotecas/css/colors.min.css') }}">




<!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ asset('bibliotecas/js/jquery-3.3.1.slim.min.js') }}"></script>
    <!-- Popper.JS -->
    <script src="{{ asset('bibliotecas/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('bibliotecas/js/bootstrap.min.js') }}"></script>




    <!--ATENÇÃO JQUERY PRA FUNCIONAR DATATABLE -->
    <script src="{{ asset('bibliotecas/js/jquery.min.js') }}"></script>

    <script src="{{ asset('bibliotecas/js/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('bibliotecas/js/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bibliotecas/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bibliotecas/js/datatables.min.js') }}"></script>


    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <!-- PDF FUNCIONA <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>-->
    <!--<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>-->
    <script src="{{ asset('bibliotecas/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('bibliotecas/js/dataTables.responsive.min.js') }}"></script>
    <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">

    <script src="{{ asset('bibliotecas/js/polyfill.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/portal.css') }}">
    <link rel="stylesheet" href="{{ asset('jbility/css/jbility.css') }}">
    <link rel="stylesheet" href="{{ asset('jbility/css/custom.css') }}">


    <script src="{{ asset('js/jquery.mask.js') }} "></script>


    @yield('css')

</head>

<body>

    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
        <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
        <div class="bolas">
            <div></div>
            <div></div>
            <div></div>
        </div>
        </div>
    </div>
    <!-- fim do preloader -->

    <div class="wrapper">

        @include('layout.sidebar')

        <!-- Page Content  -->
        <div id="content" class="mb-5">

            @include('layout.header')

            @include('layout.errors')
            @include('layout.success')

            @yield('content')

        </div>

    </div>



<script>
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

        $('#access').on('click', function () {
            $('.on').toggle();
        });

    });
</script>


<script src="{{asset('js/script_portal.js?v=1')}}"></script>

@yield('script')


<script>

$(window).on('load', function () {
    $('#preloader .inner').fadeOut();
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350).css({'overflow': 'visible'});

});


</script>

</body>

</html>
