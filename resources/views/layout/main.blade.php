<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Laravel 10">
    <meta name="author" content="Edwin Duta Ramamdhan">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CMS ALFAMIDIKRING')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min-5.css') }}">
    <!----css3---->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


    <!--google fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    
    <style>
        body {
            /* background: #e0e0e0; */
            background: #D9E2E6;
        }
    </style>
    @stack('css')
</head>

<body>
    @include('sweetalert::alert')

    <div class="wrapper">


        {{-- sidebar --}}
        @include('partials.sidebar')
        {{-- sidebar --}}


        {{-- content --}}
        <div id="content">
            @yield('content')
        </div>
        {{-- content --}}


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    {{-- Global Script --}}
    <script>
        $(document).ready(function() {
            $(".xp-menubar").on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $(".xp-menubar,.body-overlay").on('click', function() {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });

        });

        function eksekusi() {
            swal({
                title: `Permintaan Sedang Diproses`,
                icon: "info",
                buttons: false,
                text: 'Mohon tunggu sebentar',
            })
        }
    </script>

    
    @stack('js')

</body>

</html>
