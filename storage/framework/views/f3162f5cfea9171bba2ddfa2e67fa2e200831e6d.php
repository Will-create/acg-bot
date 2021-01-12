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
                    <h1 class="page-title">Crime</h1>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
                    </ol>
                </div>
                <div class="ml-auto pageheader-btn">
                <a class="btn btn-primary" href="<?php echo e(route('crimes.index')); ?>">  <span>
                        <i class="fe fe-plus"></i>
                    </span>
                   Tous les crimes</a>
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
                            <div id="loader" class="d-none">
                                <div class="loader"></div>
                              </div>
                                <div >
                                
                                <div>
                                    <div id="smartwizard" class="">
                                        <form method="POST"   id="form_setp_1">
                                            <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>   Type de crime  <span class="text-danger">*</span></label>
                                                    <select name="type_id"  class="form-control custom-select select2">
                                                        <option value="" selected disabled> Séléctionnez un type de crime</option>
                                                        <?php $__empty_1 = true; $__currentLoopData = $typeCrimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeCrime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option value="<?php echo e($typeCrime->id); ?>"> <?php echo e($typeCrime->nom); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        Aucun pays disponible
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('crime')->html();
} elseif ($_instance->childHasBeenRendered('QeXQYQT')) {
    $componentId = $_instance->getRenderedChildComponentId('QeXQYQT');
    $componentTag = $_instance->getRenderedChildComponentTagName('QeXQYQT');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('QeXQYQT');
} else {
    $response = \Livewire\Livewire::mount('crime');
    $html = $response->html();
    $_instance->logRenderedChild('QeXQYQT', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>   Date d'apprehension  <span class="text-danger">*</span></label>
                                                    <input type="date" name="date_apprehension"  class="form-control">
                                                </div>
                                            </div>

                                                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Localité d'aprrehension <span class="text-danger">*</span></label>
                                                    <input type="text" name="localite_apprehension"  class="form-control" placeholder="Ex Ouagadougou">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Longitude  <span class="text-danger"></span></label>
                                                    <input type="text" name="longitude" id="longitude" class="form-control" placeholder=" Ex. 12.336770681743598">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Latitude <span class="text-danger"></span></label>
                                                    <input type="text" name="latitude" id="latitude" class="form-control" placeholder=" Ex. -1.510282283797802">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                               <div class="form-group">
                                               <label for="pays_origine_produit"> Pays d'origine du produit <span class="text-danger">*</span> </label>
                                               <select name="pays_origine_produit"  class="form-control select2">
                                                   <option value="" disabled selected> Sélectionnez</option>
                                                   <?php $__empty_1 = true; $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pays_origine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                               <option value="<?php echo e($pays_origine->id); ?>"><?php echo e($pays_origine->nom); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                   Aucun pays
                                                   <?php endif; ?>
                                               </select>
                                               </div>
                                        </div>
                                            <div class="col-md-6">
                                               <div class="form-group">
                                               <label for="pays_destination"> Pays de destination du produit <span class="text-danger">*</span> </label>
                                               <select name="pays_destination"  class="form-control select2">
                                                   <option value="" disabled selected> Sélectionnez</option>
                                                   <?php $__empty_1 = true; $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pays_destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                               <option value="<?php echo e($pays_destination->id); ?>"><?php echo e($pays_destination->nom); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                   Aucun pays
                                                   <?php endif; ?>
                                               </select>
                                               </div>
                                        </div>
                                        </div>
                                        <div class="text-right">
                                    <button type="submit" class="btn btn-primary" id="submit1"> Enregistrer</button>

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
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

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/pages/backoffice/crimes/create.blade.php ENDPATH**/ ?>