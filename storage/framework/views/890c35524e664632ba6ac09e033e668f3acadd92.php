
<?php $__env->startSection('content'); ?>
			<br>
			<?php $__env->startSection('page-header'); ?>
			<div class="page-header">
				<div>
					<h1 class="">Statistiques globales</h1>
					
				</div>
				<div class="ml-auto pageheader-btn">
					<div class="btn-list">
						<a href="#" class="btn btn-secondary btn-icon text-white dropdown-toggle" data-toggle="dropdown">
							<span>
								<i class="fe fe-external-link"></i>
							</span> Exporter <span class="caret"></span>
						</a>
						<div class="dropdown-menu" role="menu">
							<a href="#" class="dropdown-item"><i class="bx bxs-file-pdf mr-2"></i>Export as Pdf</a>
							<a href="#" class="dropdown-item"><i class="bx bxs-file-image mr-2"></i>Export as Image</a>
							<a href="#" class="dropdown-item"><i class="bx bxs-file mr-2"></i>Export as Excel</a>
						</div>
					</div> 
				</div>
			</div>
			<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
		<!-- INTERNAL CHARTJS CHART JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/chart/Chart.bundle.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/chart/utils.js')); ?>"></script>
		<!-- INTERNAL PIETY CHART JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/peitychart/jquery.peity.min.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/peitychart/peitychart.init.js')); ?>"></script>
		<!-- INTERNAL APEXCHART JS -->
		<script src="<?php echo e(URL::asset('assets/js/index1.js')); ?>"></script>
		<!--INTERNAL  INDEX JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/p-scroll/perfect-scrollbar.min.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/sidemenu/sidemenu-scroll.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontoffice2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/pages/frontoffice/espece.blade.php ENDPATH**/ ?>