<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Criminalité environnementale">
	<meta name="author" content="Switch Maker">
	<meta name="keywords" content="">
	<title> <?php echo e($titrePage ??  'Criminalité environnementalee'); ?> </title>
    <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
</head>
	<body class="app sidebar-mini">
		<div id="global-loader">
			<img src="<?php echo e(URL::asset('assets/images/loader.svg')); ?>" class="loader-img" alt="Loader">
		</div>
		<div class="page">
			<div class="page-main">


				<?php echo $__env->make('layouts.aside-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<br>
				<div class="app-content">
					<div class="side-app">
						<?php echo $__env->yieldContent('page-header'); ?>
						<?php echo $__env->yieldContent('content'); ?>
					</div>
				</div>
			</div>
			<?php echo $__env->make('layouts.aside-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
		<?php echo $__env->make('layouts.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</body>
</html>
<?php /**PATH D:\Switch Maker\criminalite\resources\views\layouts\master.blade.php ENDPATH**/ ?>