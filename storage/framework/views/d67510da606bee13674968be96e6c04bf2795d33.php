
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
			<!-- PAGE -->
			<div class="page page-h">
				<div class="page-content z-index-10">
					<div class="container text-center">
						<div class="row">
							<div class="col-lg-6 col-xl-6 col-md-6 d-block mx-auto">
								<div class="">
									<div class="">
										<div class="display-1 t mb-5">404</div>
										<h1 class="h2   mb-3">Oops!!!</h1>
										<p class="h4 font-weight-normal mb-7 leading-normal">We can't find the page that you're looking for..</p>
										<a class="btn btn-primary" href="<?php echo e(url('/' . $page='index')); ?>">
											Back To Home
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End PAGE -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views\partials\404.blade.php ENDPATH**/ ?>