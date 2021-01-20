

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
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($titrePage); ?></li>
                
            </ol>
        </div>
        <div class="ml-auto pageheader-btn">
            <a class="btn btn-primary" href="<?php echo e(route('armes.index')); ?>"> <span>
                    <i class="fe fe-list"></i>
                </span> Toutes les armes</a>
            </button>

        </div>
    </div>
    <!-- PAGE-HEADER END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('armes.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        
                            <div class="form-group">
                                <label class="form-label" for="libelle">Libéllé <strong class="text-danger">*</strong> </label>
                                <input type="text" class="form-control" name="libelle" placeholder="Libellé" id="libelle"  value="<?php echo e(old('libelle') ?? $arme->libelle); ?>" required>
                                <?php $__errorArgs = ['libelle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="helper-text red-text">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                                
                        
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="form-label" for="reference">Réference <strong class="text-danger"></strong></label>
                                    <input class="form-control"  name="reference" placeholder="Réference" type="text"  value="<?php echo e(old('reference') ?? $arme->reference); ?>" >
                                    <?php $__errorArgs = ['reference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="helper-text red-text">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <input type="hidden" name="crime_id" value="<?php echo e($crime->id); ?>">
                                <input type="hidden" name="crime" value="<?php echo e($crime->uuid); ?>">
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="form-label" for="reference">Origine de l'arme <strong class="text-danger"></strong></label>
                                    <input class="form-control"  name="origine" placeholder="Origine" type="text"  value="<?php echo e(old('origine') ?? $arme->origine); ?>">
                                    <?php $__errorArgs = ['origine'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="helper-text red-text">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <input type="hidden" name="crime_id" value="<?php echo e($crime->id); ?>">
                                <input type="hidden" name="crime" value="<?php echo e($crime->uuid); ?>">
                            </div>
                               
                            </div>
                            
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="remarques">Remarques <strong
                                    class="text-danger">*</strong>
                                        </label>
                                        <textarea rows="10" type="text" class="form-control" name="remarques"
                                            placeholder="Remarques" id="remarques"
                                            required><?php echo e(old('remarques') ?? $arme->remarques); ?></textarea>
                                                <?php $__errorArgs = ['remarques'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="helper-text red-text">
                                                <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                </div>
                        
                            </div>
                            <div class="row">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">Photo de l'arme <strong class="text-danger">*</strong></h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" id="photo" data-max-file-size="1M" name="photo" accept="image/*"/>
                                        <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="helper-text red-text">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                </div>
                <input type="hidden" name="fromcrime" value="<?php echo e($crime->uuid); ?>">
                <div class="modal-footer">
                    <a href="<?php echo e(route('crimes.show',$crime->uuid)); ?>" class="btn btn-dark"> <i class="fa fa-times"
                            aria-hidden="true"></i>
                        Annuler </a>
                    <button type="submit" class="btn btn-primary"><span>
                            <i class="fe fe-save"></i>
                        </span> <?php echo e($btnAction); ?></button>
                </div>
                </div>
                
                
            </form>
        </div>
    </div>
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

<?php echo $__env->make('layouts.master4', ['titrePage' => $titrePage], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/armes/createarme.blade.php ENDPATH**/ ?>