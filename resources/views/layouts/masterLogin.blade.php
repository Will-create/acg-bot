<!doctype html>
<html lang="en" dir="ltr">

<head>
	<!-- META DATA -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Criminalité environnementale">
	<meta name="author" content="Switch Maker">
	<meta name="keywords" content="">
	<title> {{ $titrePage ??  'Criminalité environnementale'}} </title>
	@include('layouts.custom-head')
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>

		<body class="app sidebar-mini">

			<!-- BACKGROUND-IMAGE -->
			<div class="login-img">

				<!-- GLOABAL LOADER -->
				<div id="global-loader">
					<img src="{{URL::asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
				</div>
				<!-- End GLOABAL LOADER -->

				<!-- PAGE -->
				<div class="page">
					<div class="">
						<div class="col col-login mx-auto">

							<div class="text-center">

								<img src="{{ asset('images/logo_yelli.png') }}" class="header-brand-img" alt="">

								{{-- <img src="{{URL::asset('assets/images/brand/logo-3.png')}}" class="header-brand-img" alt=""> --}}

							</div>
						</div>
						@yield('content')
					</div>
				</div>
				<!-- END PAGE -->
			</div>
			<!-- BACKGROUND-IMAGE CLOSED -->
			@include('layouts.custom-footer-scripts')
		</body>

</html>
