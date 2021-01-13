<div>
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="nom">Nom <strong class="text-danger">*</strong> </label>
                                <input type="text" class="form-control" name="nom" placeholder="Libellé" id="nom"  value="<?php echo e(old('nom') ?? $auteur->nom); ?>" required>
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
                                <label class="form-label" for="prenom">Prenom<strong class="text-danger">*</strong></label>
                                <input class="form-control"  name="prenom" placeholder="Réference" type="text"  value="<?php echo e(old('prenom') ?? $auteur->prenom); ?>" required>
                                <?php $__errorArgs = ['prenom'];
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
                                <label class="form-label" for="genre">Genre<strong class="text-danger">*</strong></label>
                                <select name="genre" id="genre" class="form-control custom-select select2">
                                    <option  value="<?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->genre : ''); ?>" <?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? '' : 'disabled'); ?> selected><?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->genre : 'Sélectionner'); ?></option>
                                   <option value="homme">Homme</option>
                                   <option value="femme">Femme</option>
                                    </select>
                                    <?php $__errorArgs = ['genre'];
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
                                    <label class="form-label" for="date_naiss">Date de Naissance <strong class="text-danger">*</strong> </label>
                                    <input type="date" class="form-control" name="date_naiss" placeholder="Date de naissance" id="date_naiss"  value="<?php echo e(old('date_naiss') ?? $auteur->date_naiss); ?>" required>
                                    <?php $__errorArgs = ['date_naiss'];
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="pays">Pays<strong class="text-danger">*</strong></label>
                                <select name="pays_id" id="pays_id" class="form-control custom-select select2">
                                    <option  value="<?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->pays->id : ''); ?>" <?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? '' : 'disabled'); ?> selected ><?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->pays->nom : 'Sélectionner'); ?></option>
                                    <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  value="<?php echo e($p->id); ?>"><span class="red-text"><?php echo e($p->nom); ?></span></option>
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="organisation">Localité<strong class="text-danger">*</strong></label>
                                <select name="localite_id" id="localite_id" class="form-control custom-select select2">
                                    <option  value="<?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->localite->id : ''); ?>" <?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? '' : 'disabled'); ?> selected ><?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->localite->nom  : 'Sélectionner'); ?></option>
                                    <?php $__currentLoopData = $localites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  value="<?php echo e($localite->id); ?>"> <span class="red-text"><?php echo e($localite->nom); ?></span></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="adresse">Adresse<strong class="text-danger">*</strong> </label>
                                <input type="text" class="form-control" name="adresse" placeholder="Adresse" id="adresse"  value="<?php echo e(old('adresse') ?? $auteur->adresse); ?>" required>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="revenue">Revenue<strong class="text-danger">*</strong></label>
                                <input class="form-control"  name="revenue" placeholder="Réference" type="text"  value="<?php echo e(old('revenue') ?? $auteur->revenue); ?>" required>
                                <?php $__errorArgs = ['revenue'];
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
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="nationalite">Nationalité<strong class="text-danger">*</strong> </label>
                                <input type="text" class="form-control" name="nationalite" placeholder="nationalite" id="nationalite"  value="<?php echo e(old('nationalite') ?? $auteur->nationalite); ?>" required>
                                <?php $__errorArgs = ['nationalite'];
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
                                <label class="form-label" for="travail">Travail<strong class="text-danger">*</strong></label>
                                <input class="form-control"  name="travail" placeholder="Réference" type="text"  value="<?php echo e(old('travail') ?? $auteur->travail); ?>" required>
                                <?php $__errorArgs = ['travail'];
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
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group">
                                 <label for="">Voyageur internationnal? </label>
                                 <label for="voyageur_international">
                                     <input  type="radio" checked name="voyageur_international" value="voyageur_international" id="voyageur_international">
                                     Non
                                 </label>
                                 <label for="passport">
                                     <input  type="radio" value="passport" name="voyageur_international" id="passport">
                                    OUi
                                  </div>
                                </div>
                                <?php $__errorArgs = ['voyageur_international'];
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
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group">
                                 <label for="">Education ?</label>
                                 <label for="cnib">
                                     <input  type="radio" checked name="education" value="cnib" id="cnib">
                                     Non
                                 </label>
                                 <label for="passport">
                                     <input  type="radio" value="passport" name="education" id="passport">
                                    OUi
                                  </div>
                                </div>
                                <?php $__errorArgs = ['education'];
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

                    <div class="row">
                        <div class="col-md-6">
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
                                <label class="form-label" for="genre">Type de crime<strong class="text-danger">*</strong></label>
                                <select name="genre" id="genre" class="form-control custom-select select2">
                                    <option  value="<?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->type : ''); ?>" <?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? '' : 'disabled'); ?> selected><?php echo e(Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->type : 'Sélectionner'); ?></option>
                                <option value="auteur">Auteur</option>
                                <option value="complice">Complice</option>
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
                    </div>
                </div>


               <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="affaire_judiciaire">Affaire judiciaire<strong
                        class="text-danger">*</strong>
                         </label>
                            <textarea rows="5" type="text" class="form-control" name="affaire_judiciaire"
                                placeholder="affaire_judiciaire" id="affaire_judiciaire"
                                required><?php echo e(old('affaire_judiciaire') ?? $auteur->affaire_judiciaire); ?></textarea>
                                 <?php $__errorArgs = ['affaire_judiciaire'];
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
            <a href="<?php echo e(route('crime_auteurs.index')); ?>" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"><span>
                    <i class="fe fe-save"></i>
                </span> <?php echo e($btnAction); ?></button>
        </div>
    </div>
    </div>

    <?php echo $__env->make('livewire.crimeauteur.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH D:\Switch Maker\criminalite\resources\views/livewire/crimeauteur/add.blade.php ENDPATH**/ ?>