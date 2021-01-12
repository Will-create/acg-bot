<div>
    <form action="<?php echo e(route('commentaires.store')); ?>" method="post">
        <?php echo csrf_field(); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="pour">Destinataire <strong class="text-danger">*</strong></label>
                    <select name="pour" id="pour" class="form-control custom-select select2">
                        <option  value="<?php echo e(Route::currentRouteName() == 'commentaires.edit' ? $commentaire->pour : ''); ?>" <?php echo e(Route::currentRouteName() == 'commentaires.edit' ? '' : 'disabled'); ?> selected ><?php echo e(Route::currentRouteName() == 'commentaires.edit' ? $commentaire->destinataire->nom.'  '.$commentaire->destinataire->prenom.' ('.$commentaire->destinataire->role->designation.') ' : 'Sélectionner'); ?></option>
                        <?php $__currentLoopData = $destinataires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destinataire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <option  value="<?php echo e($destinataire->id); ?>"> <span class="red-text"><?php echo e($destinataire->nom); ?> <?php echo e($destinataire->prenom); ?> (<?php echo e($destinataire->role->designation); ?>)
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['pour'];
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
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    
                    <textarea rows="2" type="text" class="form-control" name="commentaire"
                        placeholder="Commentaire" id="commentaire"
                        required></textarea>
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
            </div>
        
        </div>
        <input type="hidden" name="crime_id" value="<?php echo e($crime->id); ?>">
        <div class="text-right">
            <button class="btn btn-primary" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</button> 
        </div>
        <br>
    </form>
</div>
<?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/livewire/commentaire.blade.php ENDPATH**/ ?>