		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/logo.jpeg') }}" />
		<!-- TITLE -->
		<title>UICN-PACO Plateforme de lutte contre la criminalité environnementale dans l'espace Afrique de l'Ouest</title>
		<!-- BOOTSTRAP CSS -->
		<link href="{{URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
		<!-- STYLE CSS -->
		<link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/css/skin-modes.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/css/dark-style.css')}}" rel="stylesheet" />

		<!-- SIDE-MENU CSS -->
		<link href="{{URL::asset('assets/css/sidemenu.css')}}" rel="stylesheet">

		<!--PERFECT SCROLL CSS-->
		<link href="{{URL::asset('assets/plugins/p-scroll/perfect-scrollbar.css')}}" rel="stylesheet" />

		<!-- CUSTOM SCROLL BAR CSS-->
		<link href="{{URL::asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet" />

		<!--- CUSTOM CSS -->
		@yield('css')
		<!-- FORN WIZARD CSS -->
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard_theme_arrows.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard_theme_circles.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard_theme_dots.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/forn-wizard/css/demo.css')}}" rel="stylesheet">
		<!-- SIDEBAR CSS -->
		<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
		<!-- COLOR SKIN CSS -->
		<script src="{{URL::asset('js/axios.js')}}"></script>
		<script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
		<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
		<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
		
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{URL::asset('assets/colors/color1.css')}}" />
		<link href="{{URL::asset('css/custom.css')}}" rel="stylesheet" />
		<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

        @stack('livewire')
