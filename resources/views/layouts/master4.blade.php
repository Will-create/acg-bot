<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Plateforme de lutte contre la criminalité environnementale en Afrique de l'Ouest - UICN PACO">
    <meta name="keywords"
        content="criminalité, uicn, paco, afrique, ouest, burkina, nigeria, faso, senegal, mali, togo, environnement, crime, espace, animal, végétal, cote d'ivoie">
    <title> {{ isset($titrePage) ? $titrePage : 'Administration' }} || Criminalité environnementale - UICN PACO </title>
    @include('layouts.head')
    <link rel="stylesheet" href="{{ asset('assets/css/fakeLoader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="app sidebar-mini">

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

    @include('layouts.footer-scripts')
    @stack('ajax_crud')
    <script>
        $.fakeLoader();

    </script>
</body>

</html>
