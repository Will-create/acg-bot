
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="nom">Nom<strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"  value="<?php echo e(old('nom')?? $pays->nom); ?>">
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
                        <label class="form-label" for="codeiso3_pays_origine">Code ISO 3 <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" name="codeiso3_pays_origine" placeholder="Code ISO" id="codeiso3_pays_origine"  value="<?php echo e(old('codeiso3_pays_origine') ?? $pays->codeiso3_pays_origine); ?>">
                        <?php $__errorArgs = ['codeiso3_pays_origine'];
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
                <div class="col-md-6 ">
                    <br>
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Veuillez ajouter le drapeau du pays </h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" id="icone" data-max-file-size="1M" name="icone" accept="image/*" />
                            <?php $__errorArgs = ['icone'];
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
    </div>
    <div class="modal-footer">
        <a href="<?php echo e(route('pays.index')); ?>" class="btn btn-dark"> <i class="fa fa-times"
                aria-hidden="true"></i>
            Annuler </a>
        <button type="submit" class="btn btn-primary"> <span>
                <i class="fe fe-save"></i>
            </span> <?php echo e($btnAction); ?></button>
    </div>


<?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/pages/backoffice/pays/_form.blade.php ENDPATH**/ ?>