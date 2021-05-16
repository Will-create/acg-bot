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
    <title> {{ isset($titrePage) ? $titrePage : 'Administration' }} || Afric Consulting Group- ACG Burkina </title>
    @include('layouts.head')
    <link rel="stylesheet" href="{{ asset('assets/css/fakeLoader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
</head>
<body class="app sidebar-mini">
    <style type="text/css">
        #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
            height:400px;
        }
    </style>
    <div class="page">
        <div class="page-main">
                @include('layouts.aside-menu-admin')
            
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
    @stack('livewirescript')
    @stack('scriptlive')
    <script>
        $.fakeLoader();
    </script>
</body>
</html>

