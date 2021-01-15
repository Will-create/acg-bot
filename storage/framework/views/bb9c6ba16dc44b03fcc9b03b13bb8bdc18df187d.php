<div>
    <ul class="demo-accordion accordionjs m-0" data-active-index="false">

        <li class="<?php if(Session::has('section')  &&  (session('section') == "commentaire")): ?> acc_active <?php endif; ?> <?php echo e($section); ?>" >
                        <div class="<?php echo e($head); ?>">
                            <h3>Commentaires</h3>
                            <span class="nom_item_par_collapse badge badge-danger"> <?php echo e(count($commentaires)); ?> </span>
                        </div>
                        <div class="<?php echo e($content); ?>">
                            <?php echo $__env->make('partials._notify',['nom'  => 'commentaire'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <br>
                            <?php if($commentaires->count() < 1): ?>
                            <span class="">Aucun commentaire n'est disponible pour le moment</span>
                            <?php else: ?>
                                    <div id="<?php echo e($idAccordion); ?>">
                                    <?php $__currentLoopData = $commentaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <hr>
                                    <div class="">
                                            <div style=" background: none;
                                            padding: 0rem 0.5rem;" class="row justify-content-center" id="heading<?php echo e($commentaire->id); ?>">
                                                
                                                <span  style="width:5px; height:20px;position: relative; left:-74px;top:-27px;" class="<?php echo e($commentaire->auteur->id == Auth()->user()->id ? 'badge badge-success rounded-circle' : ''); ?> row justify-content-center align-items-center m-0"> <small></small> </span>
                                                <a href="<?php echo e(route('utilisateurs.show', $commentaire->auteur->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e($commentaire->auteur->nom); ?> <?php echo e($commentaire->auteur->prenom); ?>(<?php echo e($commentaire->auteur->role->designation); ?>)">
                                                    <div><img   src="<?php echo e(asset( 'storage/'.$commentaire->auteur->profile_photo_path)); ?>" alt="user" height="60" width="60" class="rounded-circle"></div>
                                                </a>
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo e($commentaire->id); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($commentaire->id); ?>">
                                                    
                                                    <div class="text-dark">
                                                        <?php echo e(ucfirst(substr($commentaire->commentaire, 0,66))); ?>... 
                                                    </div>
                                                </button>
                                            </div>
                                    <div id="collapse<?php echo e($commentaire->id); ?>"  class="collapse" aria-labelledby="heading<?php echo e($commentaire->id); ?>" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="d-flex flex-row comment-row m-t-0">
                                                <div class="comment-text w-100">
                                                    <div class="comment-footer">
                                                        <span class="m-b-15 d-block" style="background-color: rgb(241, 255, 251); border-radius:.5em; padding:1.5em; text-align:center;">
                                                            <?php echo e(ucfirst($commentaire->commentaire)); ?> 
                                                        </span> 
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="text-muted float-right"><?php echo e($commentaire->created_at->format(' d M Y h:i:s')); ?></span> 
                                        </a> 
                                        </div>
                                    </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
        </li>
    
    </ul>
</div>
<?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/livewire/comment.blade.php ENDPATH**/ ?>