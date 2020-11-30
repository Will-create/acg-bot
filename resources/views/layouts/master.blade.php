<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Criminalité environnementale">
	<meta name="author" content="Switch Maker">
	<meta name="keywords" content="">
	<title> {{ $titrePage ??  'Criminalité environnementalee'}} </title>
    @include('layouts.head')
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>
	<body class="app sidebar-mini">
		<div id="global-loader">
			<img src="{{URL::asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<div class="page">
			<div class="page-main">


				@include('layouts.aside-menu')

				@include('layouts.head')
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
	</body>
</html>
