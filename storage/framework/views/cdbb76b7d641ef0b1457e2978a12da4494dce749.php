<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials._notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		
            <iframe src="http://localhost:5601/app/dashboards#/view/10aa9a50-5748-11eb-9f9a-016191b0374e?embed=true&_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-15m,to:now))&_a=(description:'',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:''),timeRestore:!f,title:'Dashboard%20crime',viewMode:view)&hide-filter-bar=true" style="width: 80vw;height:110vh"></iframe>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
		<!-- INTERNAL CHARTJS CHART JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/chart/Chart.bundle.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/chart/utils.js')); ?>"></script>

		<!-- INTERNAL PIETY CHART JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/peitychart/jquery.peity.min.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/peitychart/peitychart.init.js')); ?>"></script>
		<!-- INTERNAL APEXCHART JS -->
		<script src="<?php echo e(URL::asset('assets/js/apexcharts.js')); ?>"></script>

		<!--INTERNAL  INDEX JS -->
		<script src="<?php echo e(URL::asset('assets/js/index1.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/administrateur/dasboard-agent-unite.blade.php ENDPATH**/ ?>