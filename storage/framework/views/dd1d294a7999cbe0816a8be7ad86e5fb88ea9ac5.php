<?php $__env->startSection('css'); ?>
        <!-- FORN WIZARD CSS -->
		<link href="<?php echo e(URL::asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard_theme_arrows.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard_theme_circles.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard_theme_dots.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::asset('assets/plugins/forn-wizard/css/demo.css')); ?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo e(URL::asset('assets/plugins/multipleselect/multiple-select.css')); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startPush('livewire'); ?>
<?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-header'); ?>
			<!-- PAGE-HEADER -->
			<div class="page-header">
                <div>
                    <h1 class="page-title">Règlement de crime</h1>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
                    </ol>
                </div>
                <div class="ml-auto pageheader-btn">
                <a class="btn btn-primary" href="<?php echo e(route('crimes.show', $crimeTypeReglement->crime->uuid)); ?>">  <span>
                        <i class="fe fe-plus"></i>
                    </span>
                   Revenir au crime</a>
                </button>

                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                            <div>
                                <div class="row">
                                    <?php echo $__env->make('partials._notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <br>
                                <form method="POST" action="<?php echo e(route('crime_reglements.update', $crimeTypeReglement)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('patch'); ?>
                                    <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>   Auteur  <span class="text-danger">*</span></label>
                                        <select   name="auteur"  class="form-control custom-select select2">
                                        <option value="<?php echo e($crimeTypeReglement->auteur->id); ?>"> <?php echo e($crimeTypeReglement->auteur->nom. ' '. $crimeTypeReglement->auteur->nom); ?></option>
                                        <?php $__empty_1 = true; $__currentLoopData = $crimeTypeReglement->crime->auteurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auteur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($auteur->id); ?>"> <?php echo e($auteur->nom. ' '. $auteur->prenom); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            Aucun auteur dans ce crime
                                        <?php endif; ?>
                                        </select>
                                        <?php $__errorArgs = ['auteur'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>   Mode de règlement  <span class="text-danger">*</span></label>
                                        <select   name="reglement"  class="form-control custom-select select2">
                                            <option value="<?php echo e($crimeTypeReglement->mode->id); ?>"> <?php echo e($crimeTypeReglement->mode->mode); ?></option>
                                            <?php $__empty_1 = true; $__currentLoopData = $modeReglements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modeReglement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($modeReglement->id); ?>"> <?php echo e($modeReglement->mode); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            Aucun mode de règlemnt disponible
                                        <?php endif; ?>
                                        </select>
                                        <?php $__errorArgs = ['reglement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                </div>
                            </div>

                               <div class="row">
                                   <?php if($crimeTypeReglement->suite): ?>

                                <div class="col-md-6">
                                    <div class=" ">
                                        <label>   Suite  <span class="text-danger">*</span></label>
                                            <select class="js-example-basic-singl form-control select-lg custom-select"  style="width: 100%" id="mySelect2">
                                                <option value="<?php echo e($crimeTypeReglement->suite ? $crimeTypeReglement->suite->id : ''); ?>"> <?php echo e($crimeTypeReglement->suite ? $crimeTypeReglement->suite->decision: ''); ?></option>
                                                <?php $__empty_1 = true; $__currentLoopData = $suites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($suite->id); ?>"> <?php echo e($suite->decision); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            Aucune suite disponible
                                            <?php endif; ?>
                                              </select>
                                              <?php $__errorArgs = ['suite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                </div>
                                <?php endif; ?>
<?php if($crimeTypeReglement->amende): ?>

                                <div class="col-md-6" >
                                    <div class="form-group">
                                        <label>   Amende  <span class="text-danger">*</span></label>
                                           <input type="number" name="amende" id="" class="form-control" value="<?php echo e($crimeTypeReglement->amende); ?>">
                                              <?php $__errorArgs = ['amende'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                </div>
<?php endif; ?>

                               </div>
                                <div class="row" style="margin-top: 28px">
                                    <?php if(Auth::user()->role->designation == "Chef d’Unité" || Auth::user()->role->designation == "Agent d’une Unité"): ?>

                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                        <?php endif; ?>
                                </div>
                            </form>
                            <div wire:loading wire:target="submit">
                                <div id="loader" class="">
                                    <div class="loader"></div>
                                  </div>
                            </div>
                            </div>
                                                    </div>
                    </div>

                    <div class="text-right">
                    <button type="button" class="btn btn-outline-danger   mb-1" data-toggle="modal" data-target="#exampleModalDelete<?php echo e($crimeTypeReglement->id); ?>"><i class="fa fa-trash"></i> Supprimer le règlement</button>

                    </div>
                    <div class="modal" id="exampleModalDelete<?php echo e($crimeTypeReglement->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalDelete" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalDelete">Suppression  <span class="text-success"> </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>  Voullez-vous supprimer ce règlement ?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <form action="<?php echo e(route('crime_reglements.destroy', $crimeTypeReglement)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger ">
                                            <i class="fa fa-trash"></i>
                                        <span>Confirmer la suppression</span>
                                        </button>
                                        <button type="reset" class="btn btn-success" data-dismiss="modal">
                                            <i class="fa fa-times"></i>
                                                        <span>Annuler</span>
                                        </button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>				</div>
			</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
		<!-- INTERNAL FORN WIZARD JS-->
		<script src="<?php echo e(URL::asset('assets/plugins/formwizard/jquery.smartWizard.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/formwizard/fromwizard.js')); ?>"></script>

		<!-- INTERNAL ACCORDION-WIZARD FORM JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js')); ?>"></script>

        <!--INTERNAL  ADVANCED FORM JS -->
        	<!--INTERNAL  FORMELEMENTS JS -->
		
		
        <script src="<?php echo e(URL::asset('assets/js/advancedform.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/plugins/multipleselect/multiple-select.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/multipleselect/multi-select.js')); ?>"></script>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('ajax_crud'); ?>

<script src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>
<link href="<?php echo e(URL::asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

<script src="<?php echo e(asset('js/ajax.js')); ?>"></script>




<?php $__env->stopPush(); ?>

<?php $__env->startPush('livewirescript'); ?>
<?php echo \Livewire\Livewire::scripts(); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/regelements/edit.blade.php ENDPATH**/ ?>