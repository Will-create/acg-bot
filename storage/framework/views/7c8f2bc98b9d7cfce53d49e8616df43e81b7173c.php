

<?php $__env->startSection('css'); ?>
        <!-- INTERNAL SELECT2 CSS -->
		<link href="<?php echo e(URL::asset('assets/plugins/fileuploads/css/fileupload.css')); ?>" rel="stylesheet" type="text/css" />

		<link href="<?php echo e(URL::asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

		<!-- INTERNAL  DATA TABLE CSS-->
		<link href="<?php echo e(URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
		<link href="<?php echo e(URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" />

          <!-- INTERNAL PRISM CSS -->
          <link href="<?php echo e(URL::asset('assets/plugins/prism/prism.css')); ?>" rel="stylesheet">
          	<!-- INTERNAL TELEPHONE CSS-->
		<link rel="stylesheet" href="<?php echo e(URL::asset('assets/plugins/telephoneinput/telephoneinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
                <!-- PAGE-HEADER -->
                
				<div class="page-header">
					<div>
						<h1 class="page-title" id="page-title">Liste des localités dans <?php echo e($pay->nom); ?></h1>
						<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('unites.index')); ?>">Unités</a></li>
						<li class="breadcrumb-item active" aria-current="page">Unités dans <?php echo e($pay->nom); ?></li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="<?php echo e(route('unites.create')); ?>"  >  <span>
                            <i class="fe fe-plus"></i>
                        </span>
						Ajouter une unité</a>
	

                    </button>

					</div>
				</div>
				<!-- PAGE-HEADER END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials._notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			            <!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-lg-3">
							   
								<div class="card">
									<div class="card-header">
										<div class="float-left">
											<h3 class="card-title">Liste de tous les pays</h3>
										</div>
										<div class="clearfix"></div>
									</div>
									<div id="listpays" class="card-body side-menu" style="height:55vh;overflow-y: scroll">
										<?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
				
															
												<a style="cursor:pointer" onclick="filtreur(<?php echo e($p->id); ?>)" class="side-menu__item <?php echo e($p->id == $pay->id ? 'active' : ''); ?>">
																	 
												<span class="side-menu__label"><?php echo e($p->nom); ?> </span>
												
												</a>
																 
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</div>
							</div>
							<div class="col-lg-9">
							<div id="loader" class="d-none">
                                    <div class="loader"></div>
                                  </div>
			
								<div class="row">
									<div id="loader" class="d-none">
										<div class="loader"></div>
									  </div>
									<div id="aire_proteger_content" class="col-md-12 col-lg-12">
										<div class="card">
											<div class="card-header">
												<h3 class="card-title">Les unités de <?php echo e($pay->nom); ?> </h3>
											</div>
											<div class="card-body">
												<div class="table-responsive">
													<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
														<thead>
															<tr>
																<th class="wd-15p">Dénomination</th>
																<th class="wd-15p">Type</th>
																<th class="wd-20p">Pays</th>
																<th class="wd-20p">localité</th>
																<th class="wd-15p">Téléphone</th>
																
															</tr>
														</thead>
														<tbody id="tableBody">

															<?php $__currentLoopData = $unites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
				
															<tr>
																<td> <a class="text-dark" href="<?php echo e(route('unites.show', $unite->uuid)); ?>"  data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails"> <?php echo e($unite->designation); ?> </a></td>
																<td> <a class="text-dark" href="<?php echo e(route('unites.show', $unite->uuid)); ?>"  data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails"><?php echo e($unite->type->nom); ?></a></td>
																<td> <a class="text-dark" href="<?php echo e(route('unites.show', $unite->uuid)); ?>"  data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails"> <?php echo e($unite->pays->nom); ?> </a></td>
																<td> <a class="text-dark" href="<?php echo e(route('unites.show', $unite->uuid)); ?>"  data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails"><?php echo e($unite->localite->nom); ?></a></td>
																<td> <a class="text-dark" href="<?php echo e(route('unites.show', $unite->uuid)); ?>"  data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails"><?php echo e($unite->tel); ?></a></td>
															</tr>
												
																 
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															
				
				
														</tbody>
													</table>
												</div>
											</div>
											<!-- TABLE WRAPPER -->
										</div>
										<!-- SECTION WRAPPER -->
									</div>
								</div>
							</div><!-- COL-END -->
						</div>
						<div class="modal-footer">	
						<a href="<?php echo e(URL::previous()); ?>" class="btn btn-dark"> <span>
							<i class="fa fa-times" aria-hidden="true"></i>
							</span> Retour</a>
						
						</div>
						<!-- ROW-1 CLOSED -->

				<!-- ROW-1 OPEN -->
			
			 



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
     <!-- INTERNAL  DATA TABLE JS-->
    <script src="<?php echo e(URL::asset('assets/plugins/fileuploads/js/fileupload.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/fileuploads/js/file-upload.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/datatable.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('assets/plugins/clipboard/clipboard.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/clipboard/clipboard.js')); ?>"></script>

    <!-- INTERNALPRISM JS -->
    <script src="<?php echo e(URL::asset('assets/plugins/prism/prism.js')); ?>"></script>
        <!-- INTERNAL TELEPHONE JS -->
    <script src="<?php echo e(URL::asset('assets/plugins/telephoneinput/telephoneinput.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')); ?>"></script>
    <script type="text/javascript">
    var modal = document.getElementById('largeModalAddUser');
        <?php if(count($errors) > 0): ?>
            $('#largeModalAddUser').modal('show');
            modal.classList.add("show");
		<?php endif; ?>
		var tableBody = document.getElementById('tableBody');	
		var listpays = document.getElementById('listpays')	;	
		var pageTitle = document.getElementById('page-title')	;								
		function injecteur(res){
			var {unites, pays, pay} = res;
			var rows = '';
			var lignes = '';
			unites.map(function(u){
            rows +='<tr><td> <a class="text-dark" href="/unites/'+u.uuid+'"> '+u.designation+' </a></td><td> <a class="text-dark" href="/unites/'+u.uuid+'">'+u.type.nom+'</a></td><td> <a class="text-dark" href="/unites/'+u.uuid+'">'+u.pays.nom+' </a></td><td> <a class="text-dark" href="/unites/'+u.uuid+'">'+u.localite.nom+'</a></td><td> <a class="text-dark" href="/unites/'+u.uuid+'">'+u.tel+'</a></td></tr>'
			})
			pays.map(function(p){
				var active = p.id == pay.id ? 'active' : '' ;
              lignes +='<a style="cursor:pointer" onclick="filtreur('+p.id+')" class="side-menu__item '+active+'"><span class="side-menu__label">'+p.nom+' </span></a>'
			})
			tableBody.innerHTML = rows;
			listpays.innerHTML = lignes;
			pageTitle.innerHTML = 'Liste des unités dans '+pay.nom;
			$('#loader').addClass('d-none');
        $('#aire_proteger_content').show();
		}
		function filtreur(pays){
			$('#loader').removeClass('d-none');
       		 $('#aire_proteger_content').hide();
			event.preventDefault();
			
		
 			 axios.get('/unites/api/filtreur/'+pays).then(function(data){
														var res = data.data;
													injecteur(res);
									})
        }
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/unites/filter.blade.php ENDPATH**/ ?>