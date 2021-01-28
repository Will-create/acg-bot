@extends('layouts.frontoffice2')
@section('content')
			<br>
			@section('page-header')
			<div class="page-header">
				<div>
					<h1 class="">{{$nom}} </h1>
					{{-- <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Accueil</a></li>
						<li class="breadcrumb-item active" aria-current="page">Statistiques</li>
					</ol> --}}
				</div>
				<div class="ml-auto pageheader-btn">
					<div class="btn-list">
						<a href="#" class="btn btn-secondary btn-icon text-white dropdown-toggle" data-toggle="dropdown">
							<span>
								<i class="fe fe-external-link"></i>
							</span> Exporter <span class="caret"></span>
						</a>
						<div class="dropdown-menu" role="menu">
							<a href="#" class="dropdown-item"><i class="bx bxs-file-pdf mr-2"></i>Export as Pdf</a>
							<a href="#" class="dropdown-item"><i class="bx bxs-file-image mr-2"></i>Export as Image</a>
							<a href="#" class="dropdown-item"><i class="bx bxs-file mr-2"></i>Export as Excel</a>
						</div>
					</div> 
				</div>
			</div>
			@endsection

			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12 col-xl-3">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Crimes par localites</h3>
						</div>
						<div class="card-body">
							<div class="">
								<canvas id="canvasDoughnut" class="chartsh"></canvas>
							</div>
							<div class="mt-5 fs-12">
								@foreach ($pays as $p)
								<div  class="float-left mr-3"><span id="{{$p['nom']}}"  class="dot-label mr-1"></span><span class="">{{$p['nom']}}</span></div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-12 col-sm-12 col-xl-9">
					
					<div class="card overflow-hidden">
                        <div class="card-header">
                            <h3 class="card-title">Multiple locations</h3>
                        </div>
                        <div class="card-map" id="map3"></div>
                    </div>
				</div>
			</div>
			<script>
					   var ctx = document.getElementById("canvasDoughnut").getContext("2d");
					   var pays_labels =["B\u00e9nin","Burkina Faso","Cap Vert","C\u00f4te d'Ivoire","Gambie","Ghana","Guin\u00e9e","Guin\u00e9e-Bissau","Lib\u00e9ria","Mali","Mauritanie","Niger","Nig\u00e9ria","S\u00e9n\u00e9gal","Sierra Leone","Togo"];
					   console.log(pays_labels);
					   var pays_nbrcrimes = [4,2,1,2,1,1,0,4,2,2,2,1,0,1,2,5];
					   var pays_colors = ["#C156A2","#1A876B","#3A6FCD","#E945C1","#A8B7D0","#5AF1C6","#F70C18","#941D36","#B1ED5C","#7F2641","#46B8AF","#E91604","#834102","#CB0562","#A0C27B","#218B4F"];
					   var pays_colors = ["#C156A2","#1A876B","#3A6FCD","#E945C1","#A8B7D0","#5AF1C6","#F70C18","#941D36","#B1ED5C","#7F2641","#46B8AF","#E91604","#834102","#CB0562","#A0C27B","#218B4F"];
					   var total_crimes = 30;
					   var total_especes = 140;
					   var total_crimesanimaux = 11;
					   var total_crimevegetaux = 49;
					   var total_especevegetaux = 117;
					   var total_especeanimaux = 23;
					   var data_animaux = [4,2,1,0,0,1,0,0,1,2,0,0];
					   var data_vegetaux = [12,4,1,2,2,7,8,0,5,4,2,0];
					   var data_annees = ["2010","2011","2012","2013","2014","2015","2016","2017","2018","2019","2020","2021"];
					   var agents = 1;
					   var current_year = 2020;
					   var current_month = 0;
					   var current_year_months = ["Jan"];
					   var data_current_year_months = [0];
			   
					   // function getRandomColor() {
					   // 	var letters = '0123456789ABCDEF';
					   // 	var color = '#';
					   // 	for (var i = 0; i < 6; i++) {
					   // 		color += letters[Math.floor(Math.random() * 16)];
					   // 	}
					   // 	return color;
					   // 	}
					   var couleurs = [];
					   for (var i = 0; i < pays_labels.length; i++) {
						   var elem = document.getElementById(pays_labels[i]);
						   elem.style="background-color:"+pays_colors[i]+";"
						   }
					   new Chart(ctx, {
						   type: 'doughnut',
						   data: {
							   labels:pays_labels  ,
							   datasets: [{
								   data:  pays_nbrcrimes,
								   backgroundColor: pays_colors,
								   borderColor : 'transparent',
								}]
						   },
						   options: {
							   responsive: true,
							   maintainAspectRatio: false,
							   legend: {
								   display: false
							   },
							   cutoutPercentage: 65,
						   }
					   });
			   </script>
@endsection
@section('js')
		<!-- INTERNAL  GOOGLE MAPS JS -->
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyAykAdIIsNMu0V2wyGOMQcguo8zKngWlyM"></script>
		<script src="{{URL::asset('assets/plugins/maps-google/jquery.googlemap.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/maps-google/map.js')}}"></script>
		<!-- INTERNAL CHARTJS CHART JS -->
		<script src="{{URL::asset('assets/plugins/chart/Chart.bundle.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/chart/utils.js')}}"></script>
		<!-- INTERNAL PIETY CHART JS -->
		<script src="{{URL::asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>
		<!-- INTERNAL APEXCHART JS -->
		<script src="{{URL::asset('assets/js/index1.js')}}"></script>
		<!--INTERNAL  INDEX JS -->
		{{-- <script src="{{URL::asset('assets/plugins/p-scroll/perfect-scrollbar.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/sidemenu/sidemenu-scroll.js')}}"></script> --}}
@endsection