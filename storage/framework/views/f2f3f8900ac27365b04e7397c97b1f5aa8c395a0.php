<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials._notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<!-- Row -->
			<div class="row">
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-1">
								<div class="col">
                                <p class="mb-1">Utilisateur<?php echo e($utilisateurs>0 ? 's' : ''); ?></p>
									<h3 class="mb-0 number-font"><?php echo e(($utilisateurs)); ?></h3>
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
									<p class="mb-1">Aire<?php echo e($airesprotegers>0 ? 's' : ''); ?> protégée<?php echo e($airesprotegers>0 ? 's' : ''); ?></p>
									<h3 class="mb-0 number-font"><?php echo e($airesprotegers); ?></h3>
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
									<p class="mb-1">Crime<?php echo e($airesprotegers>0 ? 's' : ''); ?></p>
									<h3 class="mb-0 number-font"><?php echo e($crimes); ?></h3>
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
									<p class="mb-1">Unite<?php echo e($unites > 0 ? 's' : ''); ?> de loi</p>
									<h3 class="mb-0 number-font"><?php echo e($unites); ?></h3>
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
                                    <h4 class="mb-1"><?php echo e(ucFirst(Auth::user()->nom). ' '. ucFirst(Auth::user()->prenom)); ?></h4>
                                    <h6 class=" mb-4"> <i class="fa fa-envelope"> </i> <?php echo e(Auth::user()->email); ?> </h6>
                                    <h6 class="text-muted mb-4"> Coordonateur régional</h6>
                                    <a href="<?php echo e(route('profil')); ?>" class="btn btn-primary mt-1 mb-1 btn-sm"> <i class="zmdi zmdi-eye text-white"></i> Voir le profil</a>


                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
				<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
					<div class="card">
						<div class="card-header d-spaece-around">
                            <h3 class="card-title">Liste des agents</h3>
                           <a href="<?php echo e(route('utilisateurs.index')); ?>" class="btn btn-sm btn-primary"> Tous les agents </a>
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
                                       <?php $__empty_1 = true; $__currentLoopData = $coordonateurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coordonateur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											<td>
												<img src="<?php echo e(asset('storage/'. $coordonateur->profile_photo_path )); ?>" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												<?php echo e($coordonateur->pay->nom); ?>

											</td>
                                        <td><?php echo e($coordonateur->nom); ?></td>
                                        <td><?php echo e($coordonateur->prenom); ?></td>
                                        <td><?php echo e($coordonateur->tel); ?></td>
											<td>
                                            <a href="<?php echo e(route('gerer-utilisateur', $coordonateur)); ?>" class="badge <?php echo e($coordonateur->actif ? 'badge-success':'badge-danger'); ?> "><?php echo e($coordonateur->actif ? 'Ativé':'Désactivé'); ?></a>
											</td>
										</tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        aucune donné
                                       <?php endif; ?>
									</tbody>
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

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/administrateur/dasboard-coodonnateur-regional.blade.php ENDPATH**/ ?>