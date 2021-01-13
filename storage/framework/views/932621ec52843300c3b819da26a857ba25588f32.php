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
			            <h1 class="page-title">Détails d'un auteur de crime</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('crime_auteurs.index')); ?>">Auteurs de crime</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo e($auteur->nom); ?> <?php echo e($auteur->prenom); ?></li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="<?php echo e(route('crime_auteurs.index')); ?>"><span>
                            <i class="fe fe-list"></i>
                        </span>
                        Tous les auteurs de crimes</a>
                    </button>
					</div>
				</div>
				<!-- PAGE-HEADER END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div id="profile-log-switch">
                                <div class="media-heading">
                                    <h5><strong>Informations personnelles</strong></h5>
                                </div>
                                <div class="table-responsive ">
                                    <table class="table row table-borderless">
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Nom :</strong> <?php echo e(Ucfirst($auteur->nom)); ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Prénom :</strong><?php echo e(Ucfirst($auteur->prenom)); ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Genre :</strong> <?php echo e($auteur->genre); ?></td>
                                            </tr>
                                            <tr>
                                            <td><strong>Date de naissance :</strong> <?php echo e($auteur->date_naiss); ?></td>
                                            </tr>
                                            
                                        </tbody>
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Nationalité :</strong> <?php echo e(Ucfirst($auteur->nationalite)); ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Adresse :</strong> <?php echo e(formatel($auteur->adresse)); ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
            
            <!-- ROW-1 CLOSED -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views/pages/backoffice/auteurs/show.blade.php ENDPATH**/ ?>