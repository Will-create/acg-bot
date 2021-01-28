

<?php $__env->startSection('content'); ?>
			<br>
					<div class="row">
						<div class="col-lg-4 col-md-12 col-sm-12 col-xl-3">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Crimes par pays</h3>
								</div>
								<div class="card-body">
									<div class="">
										<canvas id="canvasDoughnut" class="chartsh"></canvas>
									</div>
									<div class="mt-5 fs-12">
										<?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div  class="float-left mr-3"><span id="<?php echo e($p['nom']); ?>"  class="dot-label mr-1"></span><span class=""><?php echo e($p['nom']); ?></span></div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-md-12 col-sm-12 col-xl-9">
							<div class="card overflow-hidden">
								<div class="card-header">
									<h3 class="card-title">Evolution des crimes par espèces</h3>
								</div>
								<div class="card-body">
									<div id="sales" class=""></div>
								</div>
							</div>
						</div>
					</div>
			<!-- Row-1 End -->
			<!-- ROW-2 -->
			<!-- ROW-2 END -->
			<!-- Row-3 -->
			<?php $__env->startSection('page-header'); ?>
			<!-- PAGE-HEADER -->
			<div class="page-header">
				<div>
					<h1 class="page-title">Statistiques globales</h1>
					
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
			<!-- PAGE-HEADER END -->
            <?php $__env->stopSection(); ?>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
					<div class="card overflow-hidden">
						<div class="card-body pb-0">
							<div class="">
								<div class="d-flex">
									<div class="">
										<h3 class="card-title">Les crimes de l'année en cours</h3>
										<p class="mb-1  number-font">Total= 234 678 </p>
									</div>
									<div class="ml-auto">
										<i class="bx bxs-alert fs-40 text-secondary"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="chart-wrapper">
							<canvas id="widgetChart1" class=""></canvas>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
					<div class="card overflow-hidden">
						<div class="card-header">
							<h3 class="card-title">Total des espèces <?php echo e($total_especes); ?></h3>
						</div>
						<div class="card-body">
							<div class="mb-5">
								<p class="mb-2">Espèces Animales<span class="float-right"><b><?php echo e($total_especeanimaux); ?></b><span class="text-muted ml-1">(<?php echo e($percent_especeanimaux); ?>%)</span></span></p>
								<div class="progress h-2">
									<div class="progress-bar bg-primary w-<?php echo e($percent_especeanimaux); ?> " role="progressbar"></div>
								</div>
							</div>
							<div class="mb-5">
								<p class="mb-2">Espèces Végétales<span class="float-right"><b><?php echo e($total_especevegetaux); ?></b><span class="text-muted ml-1">(<?php echo e($percent_especevegetaux); ?>%)</span></span></p>
								<div class="progress h-2">
									<div class="progress-bar bg-secondary w-<?php echo e($percent_especevegetaux); ?> " role="progressbar"></div>
								</div>
							</div>
							<br>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-body">
							<div class="">
								<p class="mb-1 card-title"> <i class="fa fa-balance-scale" ></i> Reglement des crimes</p>
								
								
							</div>
							<div class="mt-5">
								<p class="mb-5 d-flex">
									<span class=""><i class="fa fa-money text-muted mr-2 mt-1 fs-16"></i></span>
								<span class="fs-13 font-weight-normal text-muted mr-2">Amendes </span> : <span class="ml-auto fs-14">57 876</span>
								</p>
								<p class="mb-6 d-flex">
									<span class=""><i class="fa fa-credit-card mr-2 mt-1 fs-16 text-muted"></i></span>
									<span class="fs-13 font-weight-normal text-muted mr-2">Confiscations </span> : <span class="ml-auto fs-14">2 556</span>
								</p>
								<p class="d-flex mb-5">
									<span class=""><i class="fa fa-university mr-2 fs-16 text-muted"></i></span>
									<span class="fs-13 font-weight-normal text-muted mr-2">Emprisonnement</span> : <span class="ml-auto font-weight-bold fs-15">100 576</span>
								</p>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Pays</p>
									<h3 class="mb-0 number-font"><?php echo e(count($pays)); ?></h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-orange">
										<i class="fa fa-globe"></i>
									</div>
								</div>
							</div>
							<span class="fs-12 text-muted">Les <strong><?php echo e(count($pays)); ?></strong> <span class="text-muted fs-12 ml-0 mt-1">pays de l'Afrique de l'Ouest</span></span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Aires protégées</p>
									<h3 class="mb-0 number-font"><?php echo e($total_aires); ?></h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-secondary1">
										<i class="zmdi zmdi-block"></i>
									</div>
								</div>
							</div>
							<span class="fs-12 text-muted"><span class="text-muted fs-12 ml-0 mt-1">Tout espace protégé confondu.</span></span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Unités</p>
									<h3 class="mb-0 number-font"><?php echo e($total_unites); ?></h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-secondary">
										<i class="mdi mdi-domain"></i>
									</div>
								</div>
							</div>
							<span class="fs-12 text-muted"> <span class="text-muted fs-12 ml-0 mt-1">Unités d'application des lois</span></span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Agents</p>
									<h3 class="mb-0 number-font"><?php echo e($agents); ?></h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-warning">
										<i class="mdi mdi-account-multiple"></i>
									</div>
								</div>
							</div>
							<span class="fs-12 text-muted"> <span class="text-muted fs-12 ml-0 mt-1">Agents d'unités</span></span>
						</div>
					</div>
				</div>
			</div>
			
			<!-- ROW-5 END -->
			<script>


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
				
			</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
		<!-- INTERNAL CHARTJS CHART JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/chart/Chart.bundle.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/chart/utils.js')); ?>"></script>
		<!-- INTERNAL PIETY CHART JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/peitychart/jquery.peity.min.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/peitychart/peitychart.init.js')); ?>"></script>
		<!-- INTERNAL APEXCHART JS -->
		<script src="<?php echo e(URL::asset('assets/js/index1.js')); ?>"></script>

		<!--INTERNAL  INDEX JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/p-scroll/perfect-scrollbar.min.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/sidemenu/sidemenu-scroll.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/index.blade.php ENDPATH**/ ?>