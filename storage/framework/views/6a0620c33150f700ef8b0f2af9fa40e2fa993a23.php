
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
						<h1 class="page-title">Listes des confiscations de crime</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo e($confiscation->designation); ?></li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="<?php echo e(route('confiscations.index')); ?>"  >  <span>
                            <i class="fe fe-list"></i>
                        </span>
                        Toutes les confiscations</a>
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
                        <div class="card-header">
                            <div class="float-left">
                                <h3 class="card-title">Objet confisqué <?php echo e($confiscation->designation); ?></h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body wideget-user-contact">
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-51">
                            <div class="card">
                                <div class="card-body">
                                    <div id="profile-log-switch">
                                        <div class="media-heading">
                                            <h5><strong>Details de <?php echo e($confiscation->designation); ?></strong></h5>
                                        </div>
                                        

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                </div><!-- COL-END -->
            </div>
            <div class="modal-footer">
                <form method="POST" action="<?php echo e(route('confiscations.destroy',$confiscation->uuid)); ?>" onsubmit="return confirm('Voulez vous vraiment supprimer cette Confiscation?')">
                <?php echo e(csrf_field()); ?>

                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger">
                    Supprimer cette Confiscation
                    </button>
                
                </form>
                
                
                <a href="<?php echo e(route('confiscations.edit',$confiscation->uuid)); ?>" class="btn btn-primary">
                    Modifier cette Confiscation</a>
            
            <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary"> <span>
                    <i class="fe fe-close"></i>
                </span> Retour</a>
            
            </div>
            <!-- ROW-1 CLOSED -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views/pages/backoffice/confiscations/show.blade.php ENDPATH**/ ?>