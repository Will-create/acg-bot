
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
            <h1 class="page-title">Details du pays <?php echo e(ucfirst($pays->nom)); ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(route('pays.index')); ?>">Pays</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span class="text-dark">Details</span> <?php echo e(ucfirst($pays->nom)); ?></li>
            </ol>
        </div>
        <div class="ml-auto pageheader-btn">
            <a class="btn btn-primary" href="<?php echo e(route('type_unites.index')); ?>"> <span>
                    <i class="fe fe-list"></i>
                </span>
                Tous les pays</a>
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
                        <div class="media-heading">
                            <h5><strong>Details du pays <?php echo e(ucfirst($pays->nom)); ?></strong></h5>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body wideget-user-contact">

					<a href="<?php echo e(route('pays.show',$pays->uuid)); ?>">
                        <div class="card">
                            <div class="card-header">
                                <div class="">
                                    <h3 class="card-title" ><?php echo e($pays->nom); ?></h3>
                                    <small>Code ISO 3 : <?php echo e($pays->codeiso3_pays_origine); ?> </small>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body wideget-user-contact">
                            <img src="<?php echo e(asset('storage').'/'.$pays->icone); ?>" style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                            <div class="clearfix"></div>
                            
                            
                            </div>
                        </div>
                       </a>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="tab-pane active show" id="tab-52">
                <div class="card">
                    <div class="card-body">
                        <h3>Localités associées à ce pays</h3>
                        <?php $__currentLoopData = $localites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="text-dark" href="<?php echo e(route('localites.show', $localite->uuid)); ?>" data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails">
                                <span class=""><?php echo e($localite->nom); ?> </span>
                            </a> <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane active show" id="tab-52">
                <div class="card">
                    <div class="card-body">
                        <h3>Unités associées à ce pays</h3>
                        <?php $__currentLoopData = $unites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="text-dark" href="<?php echo e(route('unites.show', $unite->uuid)); ?>" data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails">
                                <span class=""><?php echo e($unite->designation); ?> </span>
                            </a> <br>
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
            <a href="<?php echo e(route('pays.index')); ?>" class="btn btn-dark"> <span>
                    <i class="fe fe-close"></i>
                </span><i class="fa fa-times"></i> Retour</a>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views\pages\backoffice\pays\show.blade.php ENDPATH**/ ?>