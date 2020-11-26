<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Systeme de paiement en masse">
        <meta name="author" content="Switch Maker">
        <meta name="keywords" content="">
        <title> {{ $titrePage ??  'Criminalité environnementale'}} </title>
        @include('layouts.head')

        <link rel="stylesheet" href="{{asset('css/custom.css')}}">


    </head>

<body class="app sidebar-mini">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="{{URL::asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
    </div>
    <!-- End GLOABAL LOADER -->

    <!-- PAGE -->


    <div class="page">
        <div class="page-main">
            @if (Auth::user()->role->designation == 'Administrateur Général')
            @include('layouts.aside-menu-admin')
             @elseif(Auth::user()->role->designation == 'Coordonnateur Régional')
            @include('layouts.aside-menu-coodonnateur-regional')
             @elseif(Auth::user()->role->designation == 'Coordonnateur National')
            @include('layouts.aside-menu-coodonnateur-national')
             @elseif(Auth::user()->role->designation == 'Chef d’Unité')
            @include('layouts.aside-menu-chef-unite')
             @elseif(Auth::user()->role->designation == 'Agent d’une Unité')
            @include('layouts.aside-menu-agent-unite')
            @endif
            @include('layouts.header')
            <br>
            <div class="app-content">
                <div class="side-app">
                    @yield('page-header')
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.aside-bar')
        @include('layouts.footer')
    </div>

    <!--END PAGE -->

    <!-- BACKGROUND-IMAGE CLOSED -->

    @include('layouts.footer-scripts')
@stack('ajax_crud')
</body>

</html>
