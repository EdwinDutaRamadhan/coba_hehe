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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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


        <div class="body-overlay"></div>
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="{{ asset('img/logo.png') }}" class="img-fluid w-100 px-3" /></h3>
            </div>
            <ul class="list-unstyled components">


                @foreach (auth()->user()->role()->withFeature()->get() as $f)
                {{-- sidebar parent --}}
                @foreach ($f->feature as $sidebar)
                    <li class="dropdown"><!-- MANAJEMEN USER -->
                        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#{{ 'admin_'.$sidebar->feature_id }}" role="button"
                            aria-expanded="false" aria-controls="{{ 'admin_'.$sidebar->feature_id }}">
                            <i class="{{ $sidebar->icon_name }} fs-3 px-auto" style="width: 32px;"></i>
                            <span>{{ $sidebar->name }}</span>
                        </a>
                        <ul class="collapse {{ Request::segment(2) == strtolower(str_replace('-',' ',$sidebar->name)) ? 'show' : '' }}"
                            id="{{ 'admin_'.$sidebar->feature_id }}">
                            {{-- sidebar child --}}
                            @foreach ($sidebar->children as $c)
                                <li class="{{ Request::segment(3) == 'admin' ? 'active' : '' }}">
                                    <a href="{{ route($c->route_name) }}">
                                        {{-- <i class="material-icons ps-4">folder_shared</i> --}}
                                        <i class="{{ $c->icon_name }} fs-4 ps-4" style="width: 48px;"></i>
                                        <span style="font-size: 13px;">{{ $c->name }}</span></a>
                                </li>
                            @endforeach
                            {{-- strtolower(str_replace('-',' ',$sidebar->name)) --}}
                        </ul>
                    </li>
                @endforeach
            @endforeach
            </ul>


        </nav>

       
        {{-- {{ dd(auth()->user()->role()->withFeature()->get()) }} --}}
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
