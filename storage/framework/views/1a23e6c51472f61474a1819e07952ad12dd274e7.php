        <div class="card">
            <div class="card-head">

            </div>
                    <div class="card-body">
                        <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label" for="libelle">Libellé<strong class="text-danger">*</strong> </label>
                                 <input type="text" class="form-control" name="libelle" placeholder="Libellé" id="libelle"  value="<?php echo e(old('libelle') ?? $aire->libelle); ?>">
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
                                 <label class="form-label" for="tel">Téléphone <strong class="text-danger">*</strong></label>
                                 <input class="form-control"  name="tel" placeholder="Téléphone" type="text"  value="<?php echo e(old('tel') ?? $aire->tel); ?>">
                                 <?php $__errorArgs = ['tel'];
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
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label" for="organisation">Pays <strong class="text-danger">*</strong></label>
                                 <select name="pays_id" id="pays_id" class="form-control custom-select select2">
                                     <option value="<?php echo e(Route::currentRouteName() == 'aire_protegees.edit' ? $aire->pays->id : ''); ?>" selected ><?php echo e(Route::currentRouteName() == 'aire_protegees.edit' ? $aire->pays->nom : 'Sélectionner'); ?></option>
                                     <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($pay->id); ?>"><?php echo e($pay->nom); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                                 <?php $__errorArgs = ['pays_id'];
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
                                     <label class="form-label" for="map">Map<strong class="text-danger">*</strong> </label>
                                     <input type="text" class="form-control" placeholder="Lien Google map" name="map"  value="<?php echo e(old('map') ?? $aire->map); ?>">
                                         <?php $__errorArgs = ['map'];
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
                                     <label class="form-label" for="code_wdpa_aire">Code wdpa<strong class="text-danger">*</strong> </label>
                                     <input type="text" class="form-control" placeholder="Code_wdpa_aire" name="code_wdpa_aire"  id="code_wdpa_aire"  value="<?php echo e(old('code_wdpa_aire') ?? $aire->code_wdpa_aire); ?>">
                                         <?php $__errorArgs = ['code_wdpa_aire'];
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
                                 <label class="form-label" for="adresse">Adresse complete<strong class="text-danger">*</strong></label>
                             <textarea class="form-control" placeholder="Adresse" rows="5" name="adresse" id="adresse" ><?php echo e(old('adresse') ?? $aire->adresse); ?></textarea>
                                 <?php $__errorArgs = ['adresse'];
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
                     <div class="row">
                         <div class="col-md-6">
                         </div>
                         <div class="col-md-6">
                         </div>
                        </div>
                    </div>
        </div>
       
       <div class="row">
           <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0 card-title">Veuillez ajouter un logo  <strong class="text-danger">*</strong></h3>
                </div>
                <div class="card-body">
                    <input type="file" class="dropify" id="logo" data-max-file-size="1M" name="logo" accept="image/*" />
                    <?php $__errorArgs = ['logo'];
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
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0 card-title">Veuillez insérer une image de couverture <strong class="text-danger">*</strong></h3>
            </div>
            <div class="card-body">
                <input type="file" class="dropify" id="image_couverture" data-max-file-size="1M" name="image_couverture" accept="image/*" />
                <?php $__errorArgs = ['image_couverture'];
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
        <a href="<?php echo e(route('aire_protegees.index')); ?>" class="btn btn-dark"> <i class="fa fa-times"
                aria-hidden="true"></i>
            Annuler </a>
        <button type="submit" class="btn btn-primary"> <span>
                <i class="fe fe-save"></i>
            </span> <?php echo e($btnAction); ?></button>
        </div><?php /**PATH D:\Switch Maker\criminalite\resources\views/pages/backoffice/aire_protegees/_form.blade.php ENDPATH**/ ?>