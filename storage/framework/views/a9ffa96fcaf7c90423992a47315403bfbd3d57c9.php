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
			            <h1 class="page-title">Détails d'un commentaire</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('commentaires.index')); ?>">Commentaire</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo e($commentaire->auteur->titre); ?> <?php echo e($commentaire->auteur->nom); ?></li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="<?php echo e(route('commentaires.index')); ?>"><span>
                            <i class="fe fe-list"></i>
                        </span>
                        Tous les commentaires</a>
                    </button>
					</div>
				</div>
				<!-- PAGE-HEADER END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <h3 class="card-title">Commentaire de  <a class="text-dark" href="<?php echo e(route('utilisateurs.show',$commentaire->auteur->uuid)); ?>"><?php echo e($commentaire->auteur->nom); ?> <?php echo e($commentaire->auteur->prenom); ?></a></h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body wideget-user-contact">
                                <div class="card-body">
                                    <div class="wideget-user text-center">
                                        <div class="wideget-user-desc">
                                            <div class="wideget-user-img">
                                                <dt>Par :</dt>
                                            </div>
                                            <div class="user-wrap">
                                                <a class="text-dark" href="<?php echo e(route('utilisateurs.show', $commentaire->auteur->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les details">
                                                    <h6 class="text-muted mb-4"><?php echo e($commentaire->auteur->nom. ' ' . $commentaire->auteur->prenom); ?> (<?php echo e($commentaire->auteur->role->designation); ?>)</h6>
                                                </a> <br>
                                            </div>
                                        </div>
                                        <div class="wideget-user-desc">
                                            <div class="wideget-user-img">
                                                <dt>Pour :</dt>
                                            </div>
                                            <div class="user-wrap">
                                                <a class="text-dark" href="<?php echo e(route('utilisateurs.show', $commentaire->destinataire->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les details">
                                                    <h6 class="text-muted mb-4"><?php echo e($commentaire->destinataire->nom. ' ' . $commentaire->auteur->prenom); ?> (<?php echo e($commentaire->auteur->role->designation); ?>)</h6>
                                                </a> <br>
                                            </div>
                                        </div><hr>
                                        <div class="wideget-user-desc">
                                            <div class="wideget-user-img">
                                                <dt>Crime concerné:</dt>
                                            </div>
                                            <div class="user-wrap">
                                                <a class="text-dark" href="<?php echo e(route('crimes.show', $commentaire->crime->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer our voir les details">
                                                    <h6 class="mb-1"><?php echo e($commentaire->crime->localite_apprehension); ?></h6>
                                                </a> <br>
                                            </div>
                                        </div>
                                        <dt>Commentaire:</dt>
                                        <h6 class="text-muted mb-4">Commenté le : <?php echo e(formatDate($commentaire->created_at)); ?></h6>
                                        <dd>  <a class="text-dark" href="<?php echo e(route('commentaires.show', $commentaire->uuid)); ?>"><?php echo e(ucFirst($commentaire->commentaire)); ?></a></dd>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-51">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="page-title">Autres commentaires  du même crime</h3>
                                    <?php $__currentLoopData = $autres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($autre->id != $commentaire->id): ?>
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <a class="text-dark" href="<?php echo e(route('utilisateurs.show', $autre->auteur->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e($autre->auteur->nom); ?> <?php echo e($autre->auteur->prenom); ?>(<?php echo e($autre->auteur->role->designation); ?>)">
                                            <div class="p-2"><img   src="<?php echo e(asset( $autre->auteur->profile_photo_path)); ?>" alt="user" height="40" width="50" class="rounded-circle"></div>
                                        </a> <br>
                                        <div class="comment-text w-100">
                                            <div class="comment-footer"><a class="text-dark" href="<?php echo e(route('commentaires.show', $autre->uuid)); ?>"><span class="m-b-15 d-block" style="background-color: rgb(241, 255, 251); border-radius:.5em; padding:2em; text-align:center;"><?php echo e(substr($autre->commentaire, 0,125)); ?> <br><br> <span style="padding:5px;" class="text-muted  float-right"><?php echo e($autre->created_at->format(' d M Y h:i:s')); ?></span> </span> </a><a class="text-dark float-right" href="<?php echo e(route('utilisateurs.show', $autre->destinataire->uuid)); ?>">Pour: <?php echo e($autre->destinataire->nom); ?> <?php echo e($autre->destinataire->prenom); ?>(<?php echo e($autre->destinataire->role->designation); ?>)</a> </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php endif; ?>
                                    <?php if($autres->count() == 1): ?>
                                    <span class="">Aucun autre commentaire n'est disponible que celui-la</span>
                                    <?php endif; ?>
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- COL-END -->
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 mb-4">
                    <a href="<?php echo e(route('commentaires.index')); ?>" class="btn btn-dark"> <span>
                            <i class="fe fe-close"></i>
                        </span><i class="fa fa-times"></i> Retour</a>
                    <a href="<?php echo e(route('commentaires.edit', $commentaire->uuid)); ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Modifier</a>
                    <button type="button" class="btn btn-danger  mb-1" data-toggle="modal"
                        data-target="#exampleModalDelete<?php echo e($commentaire->id); ?>"><i class="fa fa-trash"></i> Supprimer</button>
                </div>
            </div>
            <div class="modal" id="exampleModalDelete<?php echo e($commentaire->id); ?>" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalDelete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalDelete">Suppression de <?php echo e($commentaire->id); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p> Etes-vous sûr de vouloir supprimer ce commentaire ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <form action="<?php echo e(route('commentaires.destroy', $commentaire->uuid)); ?>" method="POST">
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
            <!-- ROW-1 CLOSED -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/pages/backoffice/commentaires/show.blade.php ENDPATH**/ ?>