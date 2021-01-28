<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Yoha –  HTML5 Bootstrap Admin Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin dashboard html template, admin dashboard template bootstrap 4, analytics dashboard templates, best admin template bootstrap 4, best bootstrap admin template, bootstrap 4 template admin, bootstrap admin template premium, bootstrap admin ui, bootstrap basic admin template, cool admin template, dark admin dashboard, dark admin template, dark dashboard template, dashboard template bootstrap 4, ecommerce dashboard template, html5 admin template, light bootstrap dashboard, sales dashboard template, simple dashboard bootstrap 4, template bootstrap 4 admin">
		<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</head>
	<body>
				<!-- GLOBAL-LOADER -->
				<div id="global-loader">
					<img src="<?php echo e(URL::asset('assets/images/loader.svg')); ?>" class="loader-img" alt="Loader">
				</div>
				<!-- /GLOBAL-LOADER -->
				<!-- PAGE -->
				<div class="page">
					<div class="page-main">
						<?php echo $__env->make('layouts.header-welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php echo $__env->make('layouts.horizontal-menu-welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<!--Content-area open-->
						<div class="content-area">
							<div class="container">
								<?php echo $__env->make('layouts.uicn-welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php echo $__env->yieldContent('page-header'); ?>
								<?php echo $__env->yieldContent('content'); ?>	
							</div>
						</div>
						<!-- CONTAINER END -->
					</div>
					<?php echo $__env->make('layouts.side-bar-welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php echo $__env->make('layouts.footer-welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>						
					<?php echo $__env->make('layouts.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</div>
	</body>
</html><?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/layouts/frontoffice.blade.php ENDPATH**/ ?>