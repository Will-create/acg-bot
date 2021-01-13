<?php $__env->startSection('css'); ?>
        <!-- INTERNAL SELECT2 CSS -->
		<link href="<?php echo e(URL::asset('assets/plugins/fileuploads/css/fileupload.css')); ?>" rel="stylesheet" type="text/css" />

		<link href="<?php echo e(URL::asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

		<!-- INTERNAL  DATA TABLE CSS-->
		<link href="<?php echo e(URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
		<link href="<?php echo e(URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" />

          <!-- INTERNAL PRISM CSS -->
          <link href="<?php echo e(URL::asset('assets/plugins/prism/prism.css')); ?>" rel="stylesheet">
          	<!-- INTERNAL TELEPHONE CSS-->
		<link rel="stylesheet" href="<?php echo e(URL::asset('assets/plugins/telephoneinput/telephoneinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
                <!-- PAGE-HEADER -->
                <?php echo $__env->make('partials._notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<div class="page-header">
					<div>
						<h1 class="page-title">Liste des utilisateurs</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Mise à jour du mot de passe</li>
						</ol>
					</div>

				</div>
				<!-- PAGE-HEADER END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-8 offset-md-">
            <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title text-lighten">Mise à jour du mot de passe</h4><hr>
            <p class="card-text">
            <br>

            <form action="<?php echo e(route('change_password')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>

                <div class=" row form-group">
                    <label class=" col-md-12 col-form-label text-md-left">Votre actuel mot de passe</label>
                    <input type="password"  class ="col-md-12 form-control" name="current_password" id="" required>
                    <?php if($errors->has('current_password')): ?>
                        <small class="col-md-12 help-block text-danger text-center">
                            <?php echo e($errors->first('current_password')); ?>

                        </small>
                    <?php endif; ?>
                </div>

                <div class="row form-group">
                    <label class= "col-md-12 col-form-label text-md-left" >Nouveau mot de passe </label>
                    <input type="password" class="col-md-12 form-control"  name="new_password" id="" required>
                    <?php if($errors->has('new_password')): ?>
                        <small class="col-md-12 help-block text-danger text-center">
                            <?php echo e($errors->first('new_password')); ?>

                        </small>
                    <?php endif; ?>
                </div>

                <div class="row form-group">
                    <label class="col-md-12 col-form-label text-md-left">  Confirmation mot de passe </label>
                    <input type="password" name="new_password_confirmation" class="col-md-12 form-control" required>
                    <?php if($errors->has('new_password_confirmation')): ?>
                        <small class="help-block text-danger text-center">
                            <?php echo e($errors->first('new_password_confirmation')); ?>

                        </small>
                    <?php endif; ?>
                </div>
                <br>
                <a class="btn btn-secondary float-left" href="<?php echo e(route('accueil')); ?>">Annuler</a>
                <button type="submit" class="btn btn-outline-danger float-right"> Changer Mot de passe</button>
                    </form>
          </div>
        </div>
    </div>
    <div class="col-md-4"> <br>
    </div>
</div>
</div>
<br>
<script>
$(".alert").alert();
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views\pages\backoffice\administrateur\utilisateurs\edit-password.blade.php ENDPATH**/ ?>