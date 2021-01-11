        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                 
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
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="organisation">Crime <strong class="text-danger">*</strong></label>
                                <select name="crime_id" id="crime_id" class="form-control custom-select select2">
                                    <option  value="<?php echo e(Route::currentRouteName() == 'commentaires.edit' ? $commentaire->crime_id : ''); ?>" <?php echo e(Route::currentRouteName() == 'commentaires.edit' ? '' : 'disabled'); ?> selected ><?php echo e(Route::currentRouteName() == 'commentaires.edit' ? $commentaire->crime->localite_apprehension  : 'Sélectionner'); ?></option>
                                    <?php $__currentLoopData = $crimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  value="<?php echo e($crime->id); ?>"> <span class="red-text"><?php echo e(strtoupper($crime->uuid)); ?>  
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['crime_id'];
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
               <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="commentaire">Commentaire <strong
                        class="text-danger">*</strong>
                         </label>
                            <textarea rows="5" type="text" class="form-control" name="commentaire"
                                placeholder="commentaire" id="commentaire"
                                required><?php echo e(old('commentaire') ?? $commentaire->commentaire); ?></textarea>
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
        <div class="modal-footer">
            <a href="<?php echo e(route('especes.index')); ?>" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"><span>
                    <i class="fe fe-save"></i>
                </span> <?php echo e($btnAction); ?></button>
        </div>
<?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/pages/backoffice/commentaires/_form.blade.php ENDPATH**/ ?>