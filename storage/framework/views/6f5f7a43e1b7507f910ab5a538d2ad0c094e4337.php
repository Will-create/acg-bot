
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
            <h1 class="page-title"> <?php echo $titrePage; ?> </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('crimes.index')); ?>">Crimes</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('type_crimes.index')); ?>">Types de crimes</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($btnAction); ?> un type de crimes</li>
            </ol>
        </div>
        <div class="ml-auto pageheader-btn">
            <a class="btn btn-primary" href="<?php echo e(route('type_crimes.index')); ?>"> <span>
                    <i class="fe fe-list"></i>
                </span> Tous les types d'unité</a>
            </button>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Route::currentRouteName() == 'type_crimes.create'): ?>
        <form action="<?php echo e(route('type_crimes.store')); ?>" method="post" enctype="multipart/form-data">
        <?php else: ?>
            <form action="<?php echo e(route('type_crimes.update', $type->uuid)); ?>" method="post" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    <?php echo csrf_field(); ?>
    <?php echo $__env->make('pages.backoffice.type_crimes._form', ['btnAction' => $btnAction, 'type' => $type ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(URL::asset('assets/plugins/fileuploads/js/fileupload.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/fileuploads/js/file-upload.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')); ?>"></script>
    <!-- INTERNALPRISM JS -->
    <script src="<?php echo e(URL::asset('assets/plugins/prism/prism.js')); ?>"></script>
    <!-- INTERNAL TELEPHONE JS -->
    <script src="<?php echo e(URL::asset('assets/plugins/telephoneinput/telephoneinput.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master4', ['titrePage' => $titrePage], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views\pages\backoffice\type_crimes\createdit.blade.php ENDPATH**/ ?>