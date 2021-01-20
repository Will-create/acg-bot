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
            <li class="breadcrumb-item active" aria-current="page"><span class="text-dark">Details</span>
                <?php echo e(ucfirst($pays->nom)); ?></li>
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
                                <h3 class="card-title"><?php echo e($pays->nom); ?></h3>
                                <small>Code ISO 3 : <?php echo e($pays->codeiso3_pays_origine); ?> </small>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body wideget-user-contact">
                            <img src="<?php echo e(asset('storage').'/'.$pays->icone); ?>"
                                style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                            <div class="clearfix"></div>


                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="tab-pane active show" id="tab-56">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Localités associées à ce pays</h3>
                    <div class="row">
                            <?php $__currentLoopData = $localites->split( 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3" data-aos="fade-right" data-aos-duration="2000">
                                    <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="text-dark" href="<?php echo e(route('localites.show', $localite->uuid)); ?>"
                                        data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails">
                                        <span class=""><?php echo e($localite->nom); ?> </span>
                                    </a> <br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane active show" id="tab-52">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Unités associées à ce pays</h3>
                <?php $__empty_1 = true; $__currentLoopData = $unites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a class="text-dark" href="<?php echo e(route('unites.show', $unite->uuid)); ?>" data-toggle="tooltip"
                    data-placement="right" title="Cliquer pour afficher les détails">
                    <span class=""><?php echo e($unite->designation); ?> </span>
                </a> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <small class="text-danger">Aucune unité</small>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <div class="tab-pane active show" id="tab-54">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Aires protégées associées à ce pays</h3>
                <?php $__empty_1 = true; $__currentLoopData = $aires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a class="text-dark" href="<?php echo e(route('aire_protegees.show', $aire->uuid)); ?>" data-toggle="tooltip"
                    data-placement="right" title="Cliquer pour afficher les détails">
                    <span class=""><?php echo e($aire->libelle); ?> </span>
                </a> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <small class="text-danger">Aucune aire protégée</small>
                <?php endif; ?>

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

        <a href="<?php echo e(route('pays.edit', $pays->uuid)); ?>" class="btn btn-primary">
            <i class="fa fa-edit"></i> Modifier</a>
        <button type="button" class="btn btn-danger  mb-1" data-toggle="modal"
            data-target="#exampleModalDelete<?php echo e($pays->id); ?>"><i class="fa fa-trash"> Supprimer</i></button>
    </div>
</div>
<div class="modal" id="exampleModalDelete<?php echo e($pays->id); ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalDelete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalDelete">Suppression de <strong> <?php echo e($pays->nom); ?> </strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <p> Etes-vous sûr de vouloir supprimer ce pays ?
                </p>
            </div>
            <div class="modal-footer">
                <form action="<?php echo e(route('pays.destroy', $pays->uuid)); ?>" method="POST">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/pays/show.blade.php ENDPATH**/ ?>