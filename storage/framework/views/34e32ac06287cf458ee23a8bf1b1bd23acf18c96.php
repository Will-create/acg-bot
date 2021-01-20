        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="nom">Nom <strong class="text-danger">*</strong> </label>
                                    <input type="text" class="form-control" name="nom" placeholder="Dénomination" id="nom"  value="<?php echo e(old('nom') ?? $espece->nom); ?>" required>
                                    <?php $__errorArgs = ['nom'];
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
                                    <label class="form-label" for="famille">Famille <strong class="text-danger">*</strong></label>
                                    <input class="form-control"  name="famille" placeholder="Famille" type="text"  value="<?php echo e(old('famille') ?? $espece->famille); ?>" required>
                                    <?php $__errorArgs = ['famille'];
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
                        <label class="form-label" for="ordre_id">Ordres <strong class="text-danger">*</strong></label>
                        <select name="ordre_id" id="ordre_id" class="form-control custom-select select2">
                            <option value="<?php echo e(Route::currentRouteName() == 'especes.edit' ? $espece->ordre->id : ''); ?>" selected ><?php echo e(Route::currentRouteName() == 'especes.edit' ? ucfirst($espece->ordre->nom) : 'Sélectionner'); ?></option>
                            <?php $__currentLoopData = $ordres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ordre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($ordre->id); ?>"><?php echo e(ucFirst( $ordre->nom)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['ordre_id'];
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
                        <label class="form-label" for="nom_scientifique">Nom scientifique <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" placeholder="Nom scientifique" name="nom_scientifique" placeholder="nom_scientifiqueidude" id="nom_scientifique"  value="<?php echo e(old('nom_scientifique') ?? $espece->nom_scientifique); ?>" required>
                        <?php $__errorArgs = ['nom_scientifique'];
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
                <div class="form-group">
                    <label class="form-label" for="organisation"> Règne <strong class="text-danger">*</strong></label>
                    <select name="regne" id="type" class="form-control custom-select select2">
                        <?php if( isset ($regne) && $regne): ?>
                    <option value="<?php echo e($regne); ?>"> <?php echo e(ucFirst($regne)); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e(Route::currentRouteName() == 'especes.edit' ? $espece->regne : ''); ?>" selected ><?php echo e(Route::currentRouteName() == 'especes.edit' ? ucfirst( $espece->regne) : 'Sélectionner'); ?></option>
                        <option value="animal"> Animal</option>
                        <option value="vegetal"> Végétal</option>
                        <?php endif; ?>
                    </select>
                    <?php $__errorArgs = ['type'];
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
                            <h3 class="mb-0 card-title">Photo d'illustration <strong class="text-danger">*</strong></h3>
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
<?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/especes/_form.blade.php ENDPATH**/ ?>