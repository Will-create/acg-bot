        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="designation">Designation <strong
                                    class="text-danger">*</strong>
                            </label>
                            <input type="text" class="form-control" name="nom" placeholder="Designation" id="nom"
                                value="<?php echo e(old('nom') ?? $type->nom); ?>" required>
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
                        <div class="form-group">
                            <label class="form-label" for="designation">Description <strong
                                    class="text-danger">*</strong>
                            </label>
                            <textarea rows="4" type="text" class="form-control" name="description"
                                placeholder="Description" id="description"
                                required><?php echo e(old('description') ?? $type->description); ?></textarea>
                            <?php $__errorArgs = ['description'];
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
        </div>
        <div class="modal-footer">
            <a href="<?php echo e(route('type_unites.index')); ?>" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"> <span>
                    <i class="fe fe-save"></i>
                </span> <?php echo e($btnAction); ?></button>
        </div><?php /**PATH D:\Switch Maker\criminalite\resources\views/pages/backoffice/type_crimes/_form.blade.php ENDPATH**/ ?>