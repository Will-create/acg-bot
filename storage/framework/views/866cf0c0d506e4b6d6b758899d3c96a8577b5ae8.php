
<?php $__env->startSection('css'); ?>
		<!-- INTERNAL SINGLE-PAGE CSS -->
		<link href="<?php echo e(URL::asset('assets/plugins/single-page/css/main.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
			<!-- CONTAINER OPEN -->
			<div class="container-login100">
				<div class="wrap-login100 p-6">

					<div class="row">
						<div class="col-md-3"></div>

						<div class="col-md-6">
							<img src="<?php echo e(asset('assets/logo.jpeg')); ?>" style="max-width:20vh; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
							<br><br>
						</div>
						<div class="col-md-3"></div>
					</div>
                <form class="login100-form validate-form" action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
						<span class="login100-form-title">
							Connexion
						</span>
						<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="Email">
                            <?php $__errorArgs = ['email'];
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
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
									<path d="M0 0h24v24H0V0z" fill="none" />
									<path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3" />
									<path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z" /></svg>
							</span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <?php $__errorArgs = ['password'];
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
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
									<g fill="none">
										<path d="M0 0h24v24H0V0z" />
										<path d="M0 0h24v24H0V0z" opacity=".87" />
									</g>
									<path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3" />
									<path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" />
								</svg>
							</span>
						</div>
						<div class="text-right pt-1">
							<p class="mb-0"><a href="<?php echo e(url('/' . $page='forgot-password')); ?>" class="text-primary ml-1">Mot de passe oublié?</a></p>
						</div>
						<div class="container-login100-form-btn">
							<button type="submit" class="login100-form-btn btn-primary">
								Connexion
							</button>
						</div>

					</form>
				</div>
			</div>
			<!-- CONTAINER CLOSED -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.masterLogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views/auth/login.blade.php ENDPATH**/ ?>