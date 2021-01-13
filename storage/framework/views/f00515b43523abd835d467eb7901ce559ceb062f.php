<!doctype html>
<html lang="en" dir="ltr">

<head>
	<!-- META DATA -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Criminalité environnementale">
	<meta name="author" content="Switch Maker">
	<meta name="keywords" content="">
	<title> <?php echo e($titrePage ??  'Criminalité environnementale'); ?> </title>
	<?php echo $__env->make('layouts.custom-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
</head>

		<body class="app sidebar-mini">

			<!-- BACKGROUND-IMAGE -->
			<div class="login-img">

				<!-- GLOABAL LOADER -->
				<div id="global-loader">
					<img src="<?php echo e(URL::asset('assets/images/loader.svg')); ?>" class="loader-img" alt="Loader">
				</div>
				<!-- End GLOABAL LOADER -->

				<!-- PAGE -->
				<div class="page">
					<div class="">
						<div class="col col-login mx-auto">

							<div class="text-center">

								<img src="<?php echo e(asset('images/logo_yelli.png')); ?>" class="header-brand-img" alt="">

								

							</div>
						</div>
						<?php echo $__env->yieldContent('content'); ?>
					</div>
				</div>
				<!-- END PAGE -->
			</div>
			<!-- BACKGROUND-IMAGE CLOSED -->
			<?php echo $__env->make('layouts.custom-footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</body>

</html>
<?php /**PATH D:\switch_maker\war_crimes\resources\views/layouts/masterLogin.blade.php ENDPATH**/ ?>