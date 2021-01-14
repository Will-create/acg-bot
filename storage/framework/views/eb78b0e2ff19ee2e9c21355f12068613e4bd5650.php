<div>

    <div class="card">
        <div class="card-body">
            <ul class="demo-accordion accordionjs m-0" data-active-index="false">
                <li class="<?php if(Session::has('section')  &&  (session('section') == "commentaire")): ?> acc_active <?php endif; ?>">
                    <div>
                        <h3>Commentaires</h3>
                        <span class="nom_item_par_collapse badge badge-danger"> <?php echo e(count($commentaires)); ?> </span>
                    </div>
                    <div>
                        <?php echo $__env->make('partials._notify',['nom'  => 'commentaire'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <br>
                                            <?php if($commentaires->count() < 1): ?>
                                            <span class="">Aucun commentaire n'est disponible pour le moment</span>
                                            <?php else: ?>
                                                  <div id="accordion">
                                                   <?php $__currentLoopData = $commentaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <div class="card">
                                                            <div style="background: none;
                                                            padding: 0rem 0.5rem;" class="card-header" id="heading<?php echo e($commentaire->id); ?>">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo e($commentaire->id); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($commentaire->id); ?>">
                                                                <span class="m-b-15 d-block text-dark"><?php echo e(ucfirst(substr($commentaire->commentaire, 0,28))); ?>... </span>
                                                                </button>
                                                            </h5>
                                                            </div>
                                                    <div id="collapse<?php echo e($commentaire->id); ?>" class="collapse" aria-labelledby="heading<?php echo e($commentaire->id); ?>" data-parent="#accordion">
                                                      <div class="card-body">
                                                          <div class="d-flex flex-row comment-row m-t-0">
                                                              <a class="text-dark" href="<?php echo e(route('utilisateurs.show', $commentaire->auteur->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e($commentaire->auteur->nom); ?> <?php echo e($commentaire->auteur->prenom); ?>(<?php echo e($commentaire->auteur->role->designation); ?>)">
                                                                  <div class="p-2"><img   src="<?php echo e(asset( $commentaire->auteur->profile_photo_path)); ?>" alt="user" height="40" width="50" class="rounded-circle"></div>
                                                              </a> <br>
                                                              <div class="comment-text w-100">
                                                                  <div class="comment-footer">
                                                                        <span class="m-b-15 d-block" style="background-color: rgb(241, 255, 251); border-radius:.5em; padding:1.5em; text-align:center;"><a class="text-dark" href="<?php echo e(route('commentaires.show',  $commentaire->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" ><?php echo e(ucfirst($commentaire->commentaire)); ?></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br><br> <span class="text-muted float-right"><?php echo e($commentaire->created_at->format(' d M Y h:i:s')); ?></span>
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
                            <div class="row m-5" >
                                <form wire:submit.prevent="submit"  style="width: 100%">
                                            <div class="form-group">
                                                <textarea wire:model.lazy="commentaire" rows="2" type="text" class="form-control" name="commentaire"
                                                    placeholder="Commentaire" id="commentaire"
                                                    style="width: 100%"
                                                    ></textarea>
                                                        <?php $__errorArgs = ['commentaire'];
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
                                        </div>
                                    <input type="hidden" wire:model="crime_id" name="crime_id" value="<?php echo e($crime->id); ?>">
                                    <div class="text-right">
                                        <button class="btn btn-primary" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Envoyer</button>
                                    </div>
                                    <br>
                                </form>
                            </div>
                        </div>
</div>
<?php /**PATH D:\switch_maker\war_crimes\resources\views/livewire/commentaire.blade.php ENDPATH**/ ?>