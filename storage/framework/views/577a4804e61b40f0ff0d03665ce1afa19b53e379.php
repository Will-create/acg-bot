        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="libelle">Libéllé <strong class="text-danger">*</strong> </label>
                                    <input type="text" class="form-control" name="libelle" placeholder="Libellé" id="libelle"  value="<?php echo e(old('libelle') ?? $arme->libelle); ?>" required>
                                    <?php $__errorArgs = ['libelle'];
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
                                    <label class="form-label" for="reference">Réference <strong class="text-danger">*</strong></label>
                                    <input class="form-control"  name="reference" placeholder="Réference" type="text"  value="<?php echo e(old('reference') ?? $arme->reference); ?>" required>
                                    <?php $__errorArgs = ['reference'];
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
                        <div class="form-group">
                            <label class="form-label" for="organisation">Crime <strong class="text-danger">*</strong></label>
                            <select name="crime_id" id="crime_id" class="form-control custom-select select2">
                                <option  value="<?php echo e(Route::currentRouteName() == 'armes.edit' ? $arme->crime->id : ''); ?>" <?php echo e(Route::currentRouteName() == 'armes.edit' ? '' : 'disabled'); ?> selected ><?php echo e(Route::currentRouteName() == 'armes.edit' ? $arme->crime->localite_apprehension  : 'Sélectionner'); ?></option>
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
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="remarques">Remarques <strong
                                class="text-danger">*</strong>
                                 </label>
                                    <textarea rows="5" type="text" class="form-control" name="remarques"
                                        placeholder="Remarques" id="remarques"
                                        required><?php echo e(old('remarques') ?? $arme->remarques); ?></textarea>
                                         <?php $__errorArgs = ['remarques'];
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
                <div class="col-md-12 ">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Photo de l'arme <strong class="text-danger">*</strong></h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" id="photo" data-max-file-size="1M" name="photo" accept="image/*"/>
                            <?php $__errorArgs = ['photo'];
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
            </div>
        <div class="modal-footer">
            <a href="<?php echo e(route('especes.index')); ?>" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"><span>
                    <i class="fe fe-save"></i>
                </span> <?php echo e($btnAction); ?></button>
        </div>
    </div><?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/armes/_form.blade.php ENDPATH**/ ?>