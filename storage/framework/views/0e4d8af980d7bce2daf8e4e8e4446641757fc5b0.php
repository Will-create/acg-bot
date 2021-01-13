        <div class="card">
            <div class="card-head"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="designation">Dénomination <strong class="text-danger">*</strong> </label>
                            <input type="text" class="form-control" name="designation" placeholder="Dénomination" id="designation"  value="<?php echo e(old('designation') ?? $unite->designation); ?>" required>
                            <?php $__errorArgs = ['designation'];
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label " for="tel">Téléphone <strong class="text-danger">*</strong></label>
                                        <input class="form-control phone"  name="tel" placeholder="Téléphone" type="text"  value="<?php echo e(old('tel') ?? $unite->tel); ?>" required >
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
                               <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="tel">Téléphone 2</label>
                                    <input class="form-control phone" placeholder="Téléphone"  name="tel2" type="text"  value="<?php echo e(old('tel2')?? $unite->tel2); ?>">
                                    <?php $__errorArgs = ['tel2'];
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
                            <label class="form-label" for="organisation">Pays <strong class="text-danger">*</strong></label>
                            <select onchange="lier(this.value)" id="select"  name="pays_id" id="pays_id" class="form-control custom-select select2" required>
                                <option  value="<?php echo e(Route::currentRouteName() == 'unites.edit' ? $unite->pays->id : ''); ?>" <?php echo e(Route::currentRouteName() == 'unites.edit' ? '' : 'disabled'); ?> selected ><?php echo e(Route::currentRouteName() == 'unites.edit' ? $unite->pays->nom : 'Sélectionner'); ?></option>
                                <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option  id="<?php echo e($pay->id); ?>" value="<?php echo e($pay->id); ?>"><?php echo e($pay->nom); ?></option>
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
                            <label class="form-label" for="organisation">Localité <strong class="text-danger">*</strong></label>
                            <select name="localite_id" id="localite_id" class="form-control custom-select select2" required>
                                <option value="<?php echo e(Route::currentRouteName() == 'unites.edit' ? $unite->localite->id : ''); ?>" <?php echo e(Route::currentRouteName() == 'unites.edit' ? '' : 'disabled'); ?> selected ><?php echo e(Route::currentRouteName() == 'unites.edit' ? $unite->localite->nom.', ('.$unite->localite->pay->nom.')'  : 'Sélectionner'); ?></option>
                            </select>
                            <?php $__errorArgs = ['localite_id'];
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="long">Longitude <strong class="text-danger">*</strong> </label>
                                    <input type="text" class="form-control" placeholder="Longitude" name="long" placeholder="Longitude" id="long"  value="<?php echo e(old('long') ?? $unite->long); ?>" >
                                    <?php $__errorArgs = ['long'];
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
                                    <label class="form-label" for="lat">Latitude <strong class="text-danger">*</strong> </label>
                                    <input type="text" class="form-control" placeholder="Latitude" name="lat" placeholder="Latidude" id="lat"  value="<?php echo e(old('lat') ?? $unite->lat); ?>" >
                                    <?php $__errorArgs = ['lat'];
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="organisation">Type d'unité <strong class="text-danger">*</strong></label>
                            <select name="type_unite_id" id="type_unite_id" class="form-control custom-select select2" required>
                                <option value="<?php echo e(Route::currentRouteName() == 'unites.edit' ? $unite->type->id : ''); ?>" <?php echo e(Route::currentRouteName() == 'unites.edit' ? '' : 'disabled'); ?> selected ><?php echo e(Route::currentRouteName() == 'unites.edit' ? ucfirst($unite->type->nom) : 'Sélectionner'); ?></option>
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type->id); ?>"><?php echo e(ucFirst($type->nom)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['type_unite_id'];
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
                       <div class="row">
                       <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="administration_tutelle">Administration tutelle</label>
                            <input class="form-control" placeholder="Administration tutelle"  name="administration_tutelle" type="text"  value="<?php echo e(old('administration_tutelle') ?? $unite->administration_tutelle); ?>" >
                            <?php $__errorArgs = ['administration_tutelle'];
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
                            <label class="form-label" for="organisation">Responsables <strong class="text-danger">*</strong></label>
                            <select name="responsable_id" id="responsable_id" class="form-control custom-select select2" required>
                                <option  value="<?php echo e(Route::currentRouteName() == 'unites.edit' ? $unite->responsable->id : ''); ?>" <?php echo e(Route::currentRouteName() == 'unites.edit' ? '' : 'disabled'); ?> selected ><?php echo e(Route::currentRouteName() == 'unites.edit' ? $unite->responsable->nom  : 'Sélectionner'); ?></option>
                                <?php $__currentLoopData = $responsables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $responsable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($responsable->role->designation == 'Agent d’une Unité'): ?>
                                 <option  value="<?php echo e($responsable->id); ?>"> <span class="red-text"></span><?php echo e($responsable->nom); ?> <?php echo e($responsable->prenom); ?>,
                                    <?php echo e($responsable->pays->nom); ?>,
                                              <?php echo e($responsable->role->designation); ?></option>
                                 <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['responsable_id'];
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
                            <label class="form-label" for="adresse">Adresse complete <strong class="text-danger">*</strong></label>
                            <textarea class="form-control" placeholder="Adresse" rows="6" name="adresse" id="adresse"  ><?php echo e(old('adresse') ?? $unite->adresse); ?></textarea>
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
                    <div class="col-md-6 ">
                        <div class="card shadow">
                            <div class="card-header">
                                <h3 class="mb-0 card-title">Veuillez ajouter un logo </h3>
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
                    <div class="col-md-6 ">
                        <div class="card shadow">
                            <div class="card-header">
                                <h3 class="mb-0 card-title">Veuillez insérer une photo de couverture </h3>
                            </div>
                            <div class="card-body">
                                <input type="file" class="dropify" id="photo_couverture" data-max-file-size="1M" name="photo_couverture" accept="image/*" />
                                <?php $__errorArgs = ['photo_couverture'];
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
            <a href="<?php echo e(route('unites.index')); ?>" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"> <span>
                    <i class="fe fe-save"></i>
                </span> <?php echo e($btnAction); ?></button>
        </div>
        <script>
            var listlocalite = document.getElementById('localite_id');
            function lier(id){
                 axios.get('/localites/api/filtreur/'+id).then(function(data){
                    data.data.localites.map(function(loc){
                    listlocalite.innerHTML += '<option value="' + loc.id + '">  ' + loc.nom + ' </option>';
                })
            })
            }
    </script>
<?php /**PATH D:\Switch Maker\criminalite\resources\views/pages/backoffice/unites/_form.blade.php ENDPATH**/ ?>