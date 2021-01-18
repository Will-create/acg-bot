<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials._notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<!-- Row -->
			<div class="row">
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Utilisateurs</p>
									<h3 class="mb-0 number-font"><?php echo e(count($utilisateurs)); ?></h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-orange">
                                <i class="mdi mdi-account-multiple "  ></i>

									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Espaces</p>
									<h3 class="mb-0 number-font">587 3652</h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-secondary1">
										<i class="bx bxs-wallet"></i>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Crimes</p>
									<h3 class="mb-0 number-font">58</h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-secondary">
                                        <i class="fa fa-skull-crossbones"></i>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
									<p class="mb-1">Espèces</p>
									<h3 class="mb-0 number-font">10 523</h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-warning">
										<i class="bx bxs-credit-card-front"></i>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="wideget-user text-center">
                                <div class="wideget-user-desc">
                                    <div class="wideget-user-img">
                                        <img class="" src="<?php echo e(asset('storage/'. Auth::user()->profile_photo_path)); ?>" alt="img">
                                    </div>
                                    <div class="user-wrap">
                                    <h4 class="mb-1"><?php echo e(Auth::user()->nom. ' '. Auth::user()->prenom); ?></h4>
                                    <h6 class=" mb-4"> <i class="fa fa-envelope"> </i> <?php echo e(Auth::user()->email); ?> </h6>
                                    <h6 class="text-muted mb-4"> Adminsitrateur Général de la plateforme</h6>
                                    <a href="#" class="btn btn-primary mt-1 mb-1 btn-sm"> <i class="zmdi zmdi-eye text-white"></i> Voir le profil</a>


                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
				<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Les coordonnateurs nationaux</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover text-nowrap mb-0">
									<thead>
										<tr>
											<th>Pays</th>
											<th>Nom</th>
											<th>Prenom</th>
											<th>tel</th>
											<th>Statut</th>
										</tr>
									</thead>
									<tbody>
                                       
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
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

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/administrateur/dasboard-coordonnateur-national.blade.php ENDPATH**/ ?>