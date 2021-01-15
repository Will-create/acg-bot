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
                <?php echo $__env->make('partials._notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<div class="page-header">
					<div>
						<h1 class="page-title">Liste des Pays</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Pays</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="<?php echo e(route('pays.create')); ?>"  >  <span>
                            <i class="fe fe-plus"></i>
                            AJouter un pays
                        </span>
                        </a>
					</div>
				</div>
				<!-- PAGE-HEADER END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
            <!-- ROW-1 OPEN -->
            <div class="row">
               
                   <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                    <div class="col-sm-3">
                       <a href="<?php echo e(route('pays.show',$pay->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails de <?php echo e($pay->nom); ?>">
                        <div class="card">
                            <div class="card-header">
                                <div class="">
                                    <h3 class="card-title" ><?php echo e($pay->nom); ?></h3>
                                
                                    <small>Code ISO 3 : <?php echo e($pay->codeiso3_pays_origine); ?> </small>
                                    
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body wideget-user-contact">
                            <img src="<?php echo e(asset('storage').'/'.$pay->icone); ?>"   style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                            <div class="clearfix"></div>
                            </div>
                        </div>
                       </a>
                       </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- ROW-1 CLOSED -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/pages/backoffice/pays/index.blade.php ENDPATH**/ ?>