
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
                <a class="btn btn-primary" href="<?php echo e(route('crimes.show', $crime)); ?>">  <span>


                        <i class="fa fa-arrow-left"></i>
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
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('reglement', ['modeReglements'  => $modeReglements, 'suites'   => $suites, 'crime' => $crime])->html();
} elseif ($_instance->childHasBeenRendered('XKeNTg5')) {
    $componentId = $_instance->getRenderedChildComponentId('XKeNTg5');
    $componentTag = $_instance->getRenderedChildComponentTagName('XKeNTg5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XKeNTg5');
} else {
    $response = \Livewire\Livewire::mount('reglement', ['modeReglements'  => $modeReglements, 'suites'   => $suites, 'crime' => $crime]);
    $html = $response->html();
    $_instance->logRenderedChild('XKeNTg5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
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

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/regelements/create.blade.php ENDPATH**/ ?>