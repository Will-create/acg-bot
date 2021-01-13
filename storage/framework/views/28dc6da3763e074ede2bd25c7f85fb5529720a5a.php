
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
        <h1 class="page-title">Liste des utilisateurs</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <a class="btn btn-primary" href="<?php echo e(route('utilisateurs.index')); ?>"> <span>
                <i class="fe fe-list"></i>
            </span>
            Les utilisateurs</a>
        </button>

    </div>
</div>
<!-- PAGE-HEADER END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('utilisateurs.store')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
   <?php echo $__env->make('pages.backoffice.administrateur.utilisateurs.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span>
                <i class="fe fe-save"></i>
            </span> Enregistrer</button>

    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views/pages/backoffice/administrateur/utilisateurs/create.blade.php ENDPATH**/ ?>