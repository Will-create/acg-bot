<!doctype html>
<html lang="en" dir="ltr">

	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Yoha –  HTML5 Bootstrap Admin Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin dashboard html template, admin dashboard template bootstrap 4, analytics dashboard templates, best admin template bootstrap 4, best bootstrap admin template, bootstrap 4 template admin, bootstrap admin template premium, bootstrap admin ui, bootstrap basic admin template, cool admin template, dark admin dashboard, dark admin template, dark dashboard template, dashboard template bootstrap 4, ecommerce dashboard template, html5 admin template, light bootstrap dashboard, sales dashboard template, simple dashboard bootstrap 4, template bootstrap 4 admin">
        @include('layouts.head')
        <link rel="stylesheet" href="css/custom.css">
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
@if (Auth::user()->role_id == 1 )
@include('layouts.aside-menu-admin')

@else
@include('layouts.aside-menu')

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

	</body>

</html>
