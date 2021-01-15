
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
			            <h1 class="page-title">Détails d'une Arme de crime</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('armes.index')); ?>">Armes de crime</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo e($arme->nom); ?></li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="<?php echo e(route('armes.index')); ?>"><span>
                            <i class="fe fe-list"></i>
                        </span>
                        Toutes les armes de crime</a>
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
                                <h3 class="card-title"><?php echo e(ucFirst($arme->libelle)); ?></h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body wideget-user-contact">
                            <img src="<?php echo e(asset('storage/'.$arme->photo)); ?>" style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                                <br><br>
                            <div  id="profile-log-switch">
                                <dl class="dl">
                                    <dt>Reference:</dt>
                                    <dd> <?php echo e($arme->reference); ?> </dd>
                                    <dt>Remarques:</dt>
                                    <dd> <?php echo e($arme->remarques); ?>

                                    </dd>
                                    <dt>Crime :</dt>
                                    <dd>  <a class="text-dark" href="<?php echo e(route('crimes.show', $arme->crime->uuid)); ?>"><?php echo e(ucFirst($arme->crime->localite_apprehension)); ?></a></dd>
                                </dl>
                                        <br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-51">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="page-title">Autres armes du même crime</h3>
                                    <?php $__currentLoopData = $autres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($autre->id != $arme->id): ?>
                                    <a class="text-dark" href="<?php echo e(route('armes.show', $autre->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >
                                        <span class=""><?php echo e($autre->libelle); ?></span>
                                    </a> <br>
                                    <?php endif; ?>
                                    <?php if($autres->count() == 1): ?>
                                    <span class="">Aucune autre arme n'est utilisée que celle-la</span>
                                    <?php endif; ?>
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- COL-END -->
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 mb-4">
                    <a href="<?php echo e(route('armes.index')); ?>" class="btn btn-dark"> <span>
                            <i class="fe fe-close"></i>
                        </span><i class="fa fa-times"></i> Retour</a>

                    <a href="<?php echo e(route('armes.edit', $arme->uuid)); ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Modifier</a>

                    <button type="button" class="btn btn-danger  mb-1" data-toggle="modal"
                        data-target="#exampleModalDelete<?php echo e($arme->id); ?>"><i class="fa fa-trash"></i> Supprimer</button>
                </div>
            </div>
            <div class="modal" id="exampleModalDelete<?php echo e($arme->id); ?>" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalDelete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalDelete">Suppression de <?php echo e($arme->nom); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p> Etes-vous sûr de vouloir supprimer cette arme de crime ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <form action="<?php echo e(route('armes.destroy', $arme->uuid)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger ">
                                    <i class="fa fa-trash"></i>
                                    <span>Confirmer</span>
                                </button>
                                <button type="reset" class="btn btn-success" data-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                    <span>Annuler</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ROW-1 CLOSED -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/armes/show.blade.php ENDPATH**/ ?>