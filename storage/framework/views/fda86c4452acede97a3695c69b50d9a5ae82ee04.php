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
									<p class="mb-1">Aires protégées</p>
									<h3 class="mb-0 number-font"><?php echo e(count($airesprotegers)); ?></h3>
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
									<h3 class="mb-0 number-font"><?php echo e($crimes); ?></h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-secondary">
                                        <i class="mdi mdi-alert aide-icon"></i>
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
									<p class="mb-1">Unités de loi</p>
									<h3 class="mb-0 number-font"><?php echo e($unites); ?></h3>
								</div>
								<div class="col-auto mb-0">
									<div class="dash-icon text-warning">
                                        <i class="mdi mdi-domain  "></i>
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
                                    <img class="" src="<?php echo e(asset('storage/'. Auth::user()->profile_photo_path )); ?>" alt="img">
                                    </div>
                                    <div class="user-wrap">
                                    <h4 class="mb-1"><?php echo e(Auth::user()->nom. ' '. Auth::user()->prenom); ?></h4>
                                    <h6 class=" mb-4"> <i class="fa fa-envelope"> </i> <?php echo e(Auth::user()->email); ?> </h6>
                                    <h6 class="text-muted mb-4"> Adminsitrateur Général de la plateforme</h6>
                                    <a href="<?php echo e(route('profil')); ?>" class="btn btn-primary mt-1 mb-1 btn-sm" data-toggle="tooltip" data-placement="top" title=" Voir mon profil " > <i class="zmdi zmdi-eye text-white"></i> Voir le profil</a>


                                    
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
                                       <?php $__empty_1 = true; $__currentLoopData = $coordonateurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coordonateur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											<td>
                                            <img src="<?php echo e(asset('assets/images/users/3.jpg')); ?>" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												<?php echo e($coordonateur->pays->nom); ?>

											</td>
                                        <td><?php echo e($coordonateur->nom); ?></td>
                                        <td><?php echo e($coordonateur->prenom); ?></td>
                                        <td><?php echo e($coordonateur->tel); ?></td>
											<td>
                                                
                                            <button type="button" class="badge handleAcount <?php echo e($coordonateur->actif ?  'badge-success':'badge-danger'); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e($coordonateur->actif ? 'Cliquer pour désactiver':'Cliquer pour activer'); ?>" data-status="<?php echo e($coordonateur->actif ? 'Désactiver':'Activer'); ?>"   data-url="<?php echo e(route('gerer-utilisateur', $coordonateur)); ?>" data-toggle="modal" data-clocation="<?php echo e(url()->current()); ?>"
                                                    data-target="#exampleModalDelete<?php echo e($coordonateur->id); ?>" style="border:none">  <?php echo e($coordonateur->actif ? 'Ativé':'Désactivé'); ?></button>

                                                
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
		

		<!--INTERNAL  INDEX JS -->
		
<?php $__env->stopSection(); ?>
<?php $__env->startPush('ajax_crud'); ?>
<script src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>


<script>
    $('.handleAcount').click( function () {
        var item = $(this);
        var url = item.attr('data-url');
        var clocation = item.attr('data-clocation');
         var status = item.attr('data-status');// item.data('status')

        swal({
    title: "Confirmer",
    text: " Voullez-vous "+status+" le compte  cet utilisateur ? ",
    icon:  status == 'Désactiver' ? "warning" : "success",
    buttons: {
        confirm: {
          text: status,
          value: true,
          visible: true,
          className: "btn-sm",
          closeModal: true
        },
        cancel: {
          text: "Annuler",
          value: false,
          visible: true,
          className: "btn-sm",
          closeModal: true,
        }
      },
    dangerMode: status == 'Désactiver' ? true : false,
  })
  .then((willDelete) => {
    if (willDelete) {
        $('#loader').show();
      $.ajax({
          url: item.attr('data-url'),
           data: { "_token": "<?php echo e(csrf_token()); ?>" },
          success: function (response) {
            // item.parent().parent().hide();
           location.href = clocation;
            swal({
            position: 'center',
            icon: 'success',
            title: 'Succès',
            text: 'Traitement effectué',
            button: false,
            timer: 2500
          })
           $('#loader').hide();
          },
          error: function(err){
              console.log('----------------------------error-------------------------');
              console.log(err);
              item.parent().parent().hide();
              location.href = clocation;
              swal({
            position: 'center',
            icon: 'error',
            title: 'Echec',
            title: 'Opération échouée',
            button: false,
            timer: 2500
          })
          $('#loader').hide();
          }
        });
    }

    else {
    swal({
        position: 'center',
        icon: 'info',
        title: 'Info',
        text: 'Opération annulée',
        button:false,
        timer: 1500

    });
  }
  });
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views/pages/backoffice/administrateur/dasboard-admin.blade.php ENDPATH**/ ?>