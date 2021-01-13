
<?php $__env->startSection('page-header'); ?>
                <!-- PAGE-HEADER -->
                <?php echo $__env->make('partials._notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<div class="page-header">
					<div>
                    <h1 class="page-title">Details aires protégées</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('aire_protegees.index')); ?>">Aires protégées</a></li>                           
                            <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span><?php echo e($aire->libelle); ?></li>
                            
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="<?php echo e(route('aire_protegees.index')); ?>"  >  <span>
                            <i class="fe fe-list"></i>
                        </span>
                        Toutes les aires protégées</a>
                    </button>

					</div>
				</div>
				<!-- PAGE-HEADER END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- ROW-2 END -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12" >
    <div class="card">
        <div class="card-body">
            <div id="profile-log-switch">
                <div class="media-heading text-dark">
                    <h5><strong><?php echo e(ucfirst($aire->libelle)); ?></strong></h5>
                </div>
                <div class="table-responsive ">
                    <table class="table row table-borderless">
                        <tbody class="col-lg-12 col-xl-6 p-0">
                            <tr>
                            <td><strong>Pays : </strong><a  data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails" class="text-dark" href="<?php echo e(route('pays.show',$aire->pays->uuid)); ?>"><?php echo e($aire->pays->nom); ?></a> </td>
                            </tr>
                            <tr>
                            <td><strong>Code : </strong> <?php echo e($aire->code_wdpa_aire); ?></td>
                            </tr>
                          
                        </tbody>
                        <tbody class="col-lg-12 col-xl-6 p-0">
                            <tr>
                            <td><strong>Adresse : </strong> <?php echo e($aire->adresse); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Téléphone : </strong><?php echo e($aire->tel); ?></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
<!-- ROW-2 -->
<div class="row" style="height: auto">
    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-3 mb-10" >
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Photo de Couverture</h3>
            </div>
            <div class="card-body">
            <img src="<?php echo e(asset('storage').'/'.$aire->image_couverture); ?>" style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Logo</h3>
            </div>
            <div class="card-body">
            <img src="<?php echo e(asset('storage').'/'.$aire->logo); ?>" style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 col-sm-12 col-xl-9" >
        <div class="card overflow-hidden"  >
            <div class="card-header" >
                <h3 class="card-title">Localisation</h3>
            </div>
            <div class="card-body">
                
            <div>
            {<?php echo $aire->map; ?>}
            </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6 mb-4">
        <a href="<?php echo e(route('aire_protegees.index')); ?>" class="btn btn-dark"> <span>
                <i class="fe fe-close"></i>
            </span><i class="fa fa-times"></i> Retour</a>

        <a href="<?php echo e(route('aire_protegees.edit', $aire->uuid)); ?>" class="btn btn-primary">
            <i class="fa fa-edit"></i> Modifier</a>
        <button type="button" class="btn btn-danger  mb-1" data-toggle="modal"
            data-target="#exampleModalDelete<?php echo e($aire->id); ?>"><i class="fa fa-trash"> Supprimer</i></button>
    </div>
</div>
<div class="modal" id="exampleModalDelete<?php echo e($aire->id); ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalDelete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalDelete">Suppression de <?php echo e($aire->designation); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                            
                <p> Etes-vous sûr de bien vouloir supprimer cette Aire protégée ?
                </p>
            </div>
            <div class="modal-footer">
                <form action="<?php echo e(route('aire_protegees.destroy', $aire->uuid)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger ">
                        <i class="fa fa-trash"></i>
                        <span>Confirmer</span>
                    </button>
                    <button type="reset" class="btn btn-success" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        <span>Annuler</span>
                    </button>
                </form>


            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.masterCarte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views/pages/backoffice/aire_protegees/show.blade.php ENDPATH**/ ?>