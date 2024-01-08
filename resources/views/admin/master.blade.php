<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('/frontEnd2')}}/vendor/simple-line-icons/css/simple-line-icons.css">
    {{--<link rel="stylesheet" href="{{asset('/frontEnd2')}}/vendor/font-awesome/css/fontawesome-all.min.css">--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/frontEnd2')}}/css/styles.css">
    <link rel="stylesheet" href="{{asset('/frontEnd2')}}/css/mycode.css">
    <link  href="{{asset('')}}datepicker-master/dist/datepicker.css" rel="stylesheet">

    <script src="{{asset('/frontEnd2')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('/frontEnd2')}}/vendor/popper.js/popper.min.js"></script>
    <script src="{{asset('/frontEnd2')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('/frontEnd2')}}/vendor/chart.js/chart.min.js"></script>
    <script src="{{asset('')}}datepicker-master/dist/datepicker.js"></script>
    <script src="{{asset('')}}datepicker-master/i18n/datepicker.pt-BR.js"></script>
    <script src="{{asset('')}}tinymce/js/tinymce/tinymce.min.js"></script>


    <script src="{{asset('/frontEnd2')}}/js/carbon.js"></script>
    <script src="{{asset('/frontEnd2')}}/js/demo.js"></script>
    <script src="{{asset('/frontEnd2')}}/js/mycode.js"></script>

</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    <!-- top menu -->
    <nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a class="navbar-brand" href="#">
            <img src="{{asset('/frontEnd2')}}/imgs/condolonLogo.png" alt="logo" width="110px">
        </a>

        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>&nbsp;&nbsp;&nbsp;&nbsp;

        </a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{--<img src="./imgs/avatar-1.png" class="avatar avatar-sm" alt="logo">--}}
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header">Account</div>

                    <a href="{{url('admin/message/')}}" class="dropdown-item">
                        <i class="fa fa-envelope"></i> Messages
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>
        </ul>
    </nav>
    <!-- left menu -->
    <div class="main-container">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">

                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="icon icon-speedometer"></i> Controle
                        </a>
                    </li>
                    <!-- admin -->
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="fa fa-user-shield"></i> Admin <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{url('admin/admins/')}}" class="nav-link">
                                    <i class="fas fa-align-justify"></i> Lista
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/admins/create')}}" class="nav-link">
                                    <i class="far fa-address-card"></i> Cadastro
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- morador -->
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-user-friends"></i> Morador <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{url('admin/users/')}}" class="nav-link">
                                    <i class="fas fa-align-justify"></i> Lista
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/users/create')}}" class="nav-link">
                                    <i class="far fa-address-card"></i> Cadastro
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- portaria -->
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-user-cog"></i></i> Portaria <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{url('admin/employers/')}}" class="nav-link">
                                    <i class="fas fa-align-justify"></i> Lista
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/employers/create')}}" class="nav-link">
                                    <i class="far fa-address-card"></i> Cadastro
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- serviços -->
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-address-card"></i></i> Serviços <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{url('admin/services/')}}" class="nav-link">
                                    <i class="fas fa-align-justify"></i> Lista
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/services/create')}}" class="nav-link">
                                    <i class="far fa-address-card"></i> Cadastro
                                </a>
                            </li>

                        </ul>
                    </li>

                    <!-- forum -->
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="far fa-comments"></i> Forum <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{url('admin/forum/')}}" class="nav-link">
                                    <i class="fas fa-align-justify"></i> Lista
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/forum/create')}}" class="nav-link">
                                    <i class="far fa-address-card"></i> Novo
                                </a>
                            </li>

                        </ul>
                    </li>


                </ul>
            </nav>
        </div>

        <!-- conteudo pagina -->
        <div class="content">
            <main>

                @yield('content')
                @yield('page-js-script')
            </main>
        </div>
        <!-- conteudo pagina -->

    </div>



</div>


</body>
</html>



