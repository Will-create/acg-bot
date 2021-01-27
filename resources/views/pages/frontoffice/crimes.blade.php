@extends('layouts.frontoffice2')

@section('content')
			
			<!-- Row-1 End -->
			<!-- ROW-2 -->
			<!-- ROW-2 END -->
			<!-- Row-3 -->
			@section('page-header')
			<!-- PAGE-HEADER -->
			<div class="page-header">
				<div>
					<h1 class="page-title">Statistiques globales</h1>
					{{-- <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Accueil</a></li>
						<li class="breadcrumb-item active" aria-current="page">Statistiques</li>
					</ol> --}}
				</div>
				<div class="ml-auto pageheader-btn">
					<div class="btn-list">
						{{-- <a href="#" class="btn btn-primary btn-icon text-white" data-toggle="tooltip" title="Add order" data-placement="top">
							<span>
								<i class="fe fe-shopping-cart"></i>
							</span>
						</a>
						<a href="#" class="btn btn-orange btn-icon text-white" data-toggle="tooltip" title="Download" data-placement="top">
							<span>
								<i class="fe fe-download"></i>
							</span>
						</a>
						<a href="#" class="btn btn-info btn-icon text-white" data-toggle="tooltip" title="Add User" data-placement="top">
							<span>
								<i class="fe fe-plus"></i>
							</span>
						</a> --}}
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
			<!-- PAGE-HEADER END -->
            @endsection
			
			<!-- ROW-5 END -->
{{-- <script>
// if ($('#canvasDoughnut').length) {

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
	// }
	/*-----Sales-----*/
	var options1 = {
		chart: {
			height: 390,
			type: 'area',
			zoom: {
				enabled: false
			},
			dropShadow: {
				enabled: true,
				opacity: 0.2,
			},
			toolbar: {
			  show: false
			},
			events: {
			  mounted: function(ctx, config) {
				const highest1 = ctx.getHighestValueInSeries(0);
				const highest2 = ctx.getHighestValueInSeries(1);
				ctx.addPointAnnotation({
				  x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
				  y: highest1,
				  label: {
						style: {
						  cssClass: 'd-none'
						}
					},
					  customSVG: {
						  SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#661fd6" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
						  cssClass: undefined,
						  offsetX: -8,
						  offsetY: 5
						}
					})
					ctx.addPointAnnotation({
					  x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
					  y: highest2,
					  label: {
						style: {
						  cssClass: 'd-none'
						}
					  },
					  customSVG: {
						  SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#f7b731" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
						  cssClass: undefined,
						  offsetX: -8,
						  offsetY: 5
						}
					})
				},
			}
		},
		colors: ['#525ce5', '#fd5261'],
		dataLabels: {
		  enabled: false
		},
		stroke: {
		  show: true,
		  curve: 'smooth',
		  width: 2,
		  lineCap: 'square'
		},
		series: [{
		  name: 'Espèces animales',
		  data: data_animaux
		}, {
		  name: 'Espèces végétales',
		  data: data_vegetaux
		}],
		labels: data_annees,
		xaxis: {
			axisBorder: {
			  show: false
			},
			axisTicks: {
			  show: false
			},
			crosshairs: {
			  show: true
			},
			labels: {
			  offsetX: 0,
			  offsetY: 5,
			}
		},
		yaxis: {
			labels: {
			  offsetX: -2,
			  offsetY: 0,
			}
		},
		grid: {
			borderColor: 'rgba(112, 131, 171, .1)',
			xaxis: {
				lines: {
					show: true
				}
			},
			yaxis: {
				lines: {
					show: false,
				}
			},
			padding: {
			  top: 0,
			  right: 0,
			  bottom: 0,
			  left: 0
			},
		},
		legend: {
			position: 'top',
		},
		tooltip: {
			theme: 'dark',
			marker: {
			  show: true,
			},
			x: {
			  show: false,
			}
		},
		fill: {
		  type:"gradient",
		  gradient: {
			  type: "vertical",
			  shadeIntensity: 1,
			  inverseColors: !1,
			  opacityFrom: .28,
			  opacityTo: .05,
			  stops: [45, 100]
		  }
		},
	}
	var chart1 = new ApexCharts(document.getElementById("sales"), options1);
    chart1.render();
	/*-----Sales-----*/
	/*-----canvasDoughnut-----*/
		// var ctx = document.getElementById("canvasDoughnut").getContext("2d");
		// new Chart(ctx, {
		// 	type: 'doughnut',
		// 	data: {
		// 		labels: ['Mens', 'Womens', 'Kids', 'Electronics', 'Home & Furniture'],
		// 		datasets: [{
		// 			data: [56, 20, 30, 12, 22],
		// 			backgroundColor: ['#525ce5', '#9c52fd', '#24e4ac', "#ffa70b", "#ec5444"],
		// 			borderColor : 'transparent',
 		// 		}]
		// 	},
		// 	options: {
		// 		responsive: true,
		// 		maintainAspectRatio: false,
		// 		legend: {
		// 			display: false
		// 		},
		// 		cutoutPercentage: 65,
		// 	}
		// });
	/*-----canvasDoughnut-----*/
	/*-----AreaChart Echart-----*/
	var ctx = document.getElementById("widgetChart1");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet","Août","Septembre","Octobre","Novembre","Décembre"],
			type: 'line',
			datasets: [{
				label: "Nombre de crimes",
				data: [456, 575, 492, 434, 849, 962, 562,765,523,467,387,999],
				backgroundColor: 'rgba(89, 200, 227,0.6)',
				borderColor: '#1cc5ef',
				borderWidth: 0,
				pointStyle: 'circle',
				pointRadius: 0,
				pointBorderColor: 'red',
				pointBackgroundColor: '#1cc5ef',
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: 'rgba(0,0,0,0.9)',
				bodyFontColor: 'rgba(0,0,0,0.9)',
				backgroundColor: '#fff',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 0,
				intersect: false,
			},
			legend: {
				display: false,
				labels: {
					usePointStyle: true,
					fontFamily: 'Montserrat',
				},
			},
			scales: {
				xAxes: [{
					display: false,
					gridLines: {
						color: 'rgba(112, 131, 171, .2)'
					},
					scaleLabel: {
						display: false,
						labelString: '',
						fontColor: 'rgba(0,0,0,0.61)'
					}
				}],
				yAxes: [{
					display: false,
					gridLines: {
						display: false,
						drawBorder: true
					},
					scaleLabel: {
						display: false,
						labelString: 'Customer retention in %',
						fontColor: 'rgba(0,0,0,0.61)'
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	// var myChart = new Chart(ctx, {
	// 	type: 'line',
	// 	data: {
	// 		labels: current_year_months,
	// 		type: 'line',
	// 		datasets: [{
	// 			data: data_current_year_months,
	// 			label: 'Crimes enregistrés',
	// 			backgroundColor: 'rgba(156, 82, 253,0.8)',
	// 			borderColor: '#9c52fd',
	// 		}, ]
	// 	},
	// 	options: {
	// 		maintainAspectRatio: false,
	// 		legend: {
	// 			display: false
	// 		},
	// 		responsive: true,
	// 		tooltips: {
	// 			mode: 'index',
	// 			titleFontSize: 12,
	// 			titleFontColor: '#000',
	// 			bodyFontColor: '#000',
	// 			backgroundColor: '#fff',
	// 			cornerRadius: 0,
	// 			intersect: false,
	// 		},
	// 		scales: {
	// 			xAxes: [{
	// 				gridLines: {
	// 					color: 'transparent',
	// 					zeroLineColor: 'transparent'
	// 				},
	// 				ticks: {
	// 					fontSize: 2,
	// 					fontColor: 'transparent'
	// 				}
	// 			}],
	// 			yAxes: [{
	// 				display: false,
	// 				ticks: {
	// 					display: false,
	// 				}
	// 			}]
	// 		},
	// 		title: {
	// 			display: false,
	// 		},
	// 		elements: {
	// 			line: {
	// 				borderWidth: 2
	// 			},
	// 			point: {
	// 				radius: 0,
	// 				hitRadius: 10,
	// 				hoverRadius: 4
	// 			}
	// 		}
	// 	}
	// });
				
</script> --}}
@endsection
@section('js')
		<!-- INTERNAL CHARTJS CHART JS -->
		<script src="{{URL::asset('assets/plugins/chart/Chart.bundle.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/chart/utils.js')}}"></script>
		<!-- INTERNAL PIETY CHART JS -->
		<script src="{{URL::asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>
		<!-- INTERNAL APEXCHART JS -->
		<script src="{{URL::asset('assets/js/index1.js')}}"></script>

		<!--INTERNAL  INDEX JS -->
		<script src="{{URL::asset('assets/plugins/p-scroll/perfect-scrollbar.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/sidemenu/sidemenu-scroll.js')}}"></script>

@endsection