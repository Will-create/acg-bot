

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
						<h1 class="page-title">Liste des Confiscations</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Modifier </li>
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

<form action="<?php echo e(route('confiscations.update',$confiscation->uuid)); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="designation">Désignation <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="designation" placeholder="Désignation" id="designation"  value="<?php echo e($confiscation->designation); ?>" required>
                        <?php $__errorArgs = ['designation'];
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
                <div class="col-md-6">
					<div class="form-group">
                        <label class="form-label" for="organisation">Conditions <strong class="text-danger">*</strong></label>
                        <select name="condition" id="" class="form-control custom-select select2">
                            <option value="" > Sélectionner</option>

                            <option <?php echo e($confiscation->condition == 'frais' ? 'selected' : ''); ?> value="frais">Frais</option>
                            <option <?php echo e($confiscation->condition == 'vivant' ? 'selected' : ''); ?> value="vivant">Vivant</option>
                        
                        </select>
                        <?php $__errorArgs = ['condition'];
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

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="designation">Poids <strong class="text-danger"></strong> </label>
                        <input type="number" class="form-control" name="poids" placeholder="Le poids en kg" id="poids"  value="<?php echo e($confiscation->poids); ?>"  >
                        <?php $__errorArgs = ['poids'];
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombre <strong class="text-danger"></strong> </label>
                        <input type="number" class="form-control" name="nombre" placeholder="Nombre" id="nombre"  value="<?php echo e($confiscation->nombre); ?>"  >
                        <?php $__errorArgs = ['nombre'];
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
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="adresse">Description <strong class="text-danger"></strong></label>
                        <textarea class="form-control" rows="4" name="description" id="description"  value="<?php echo e(old('description')); ?>"  ><?php echo e($confiscation->description); ?></textarea>
                        <?php $__errorArgs = ['description'];
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
    </div>
    
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span>
            <i class="fe fe-save"></i>
        </span> Mettre à jour</button>

    </div>
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




<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/confiscations/edit.blade.php ENDPATH**/ ?>