        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="nom">Nom <strong class="text-danger">*</strong>
                                    </label>
                                    <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"
                                        value="<?php echo e(old('nom') ?? $auteur->nom); ?>" required>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="prenom">Prénom <strong
                                            class="text-danger">*</strong></label>
                                    <input class="form-control" name="prenom" placeholder="Prénom" type="text"
                                        value="<?php echo e(old('prenom') ?? $auteur->prenom); ?>" required>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="genre">Qualité<strong
                                            class="text-danger">*</strong></label>
                                    <select name="type" id="genre" class="form-control custom-select select2">
                                        <option
                                            value="<?php echo e(Route::currentRouteName() == 'crime_auteurs.show' ? ($auteur->type) : ''); ?>"
                                            <?php echo e(Route::currentRouteName() == 'crime_auteurs.show' ? '' : 'disabled'); ?>

                                            selected>
                                            <?php echo e(Route::currentRouteName() == 'crime_auteurs.show' ? ucFirst($auteur->type) : 'Sélectionner'); ?>

                                        </option>
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="nationalite">Nationalité <strong
                                    class="text-danger">*</strong> </label>
                            <input type="text" class="form-control" name="nationalite" placeholder="Nationalité"
                                id="nationalite" value="<?php echo e(old('nationalite') ?? $auteur->nationalite); ?>" required>
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
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="form-label" for="date_naiss">Date de Naissance <strong
                                    class="text-danger">*</strong> </label>
                            <input type="date" class="form-control" name="date_naiss" placeholder="Date de naissance"
                                id="date_naiss" value="<?php echo e(old('date_naiss') ?? $auteur->date_naiss); ?>" required max="<?php echo e(date('Y-m-d')); ?>">
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
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="form-label" for="genre">Genre <strong class="text-danger">*</strong></label>
                            <select name="genre" id="genre" class="form-control custom-select select2" required>
                                <option
                                    value="<?php echo e(Route::currentRouteName() == 'crime_auteurs.show' ? $auteur->genre : ''); ?>"
                                    <?php echo e(Route::currentRouteName() == 'crime_auteurs.show' ? '' : 'disabled'); ?> selected>
                                    <?php echo e(Route::currentRouteName() == 'crime_auteurs.show' ? ucFirst($auteur->genre) : 'Sélectionner'); ?>

                                </option>
                                <option value="masculin">Masculin</option>
                                <option value="feminin">Feminin</option>
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


                    
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="travail">Profession <strong class="text-danger"></strong></label>
                        <input class="form-control" name="travail" placeholder="Réference" type="text"
                            value="<?php echo e(old('travail') ?? $auteur->travail); ?>">
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

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="revenue">Revenue <strong class="text-danger"></strong></label>
                        <input class="form-control" name="revenue" placeholder="Réference" type="text"
                            value="<?php echo e(old('revenue') ?? $auteur->revenue); ?>">
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
                <div class="col-md-4">
                    
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
<input type="hidden" name="crimeUiid" value="<?php echo e($crimeUuid); ?>">

            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group">
                            <label for="">Voyageur internationnal? </label>
                            <label for="voyageur_international">
                                <input type="radio" <?php if(!$auteur->voyageur_international || $auteur->voyageur_international == 0): ?>  checked <?php endif; ?> name="voyageur_international" value="0"
                                    id="voyageur_international">
                                Non
                            </label>
                            <label for="passport">
                                <input type="radio" <?php if($auteur->voyageur_international && $auteur->voyageur_international == 1): ?>  checked <?php endif; ?> name="voyageur_international" id="passport" value="1" >
                                Oui
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
                                <input type="radio"  <?php if(!$auteur->education || $auteur->education == 0): ?> checked <?php endif; ?>   name="education" id="cnib" value="0">
                                Non
                            </label>
                            <label for="passport">
                                <input type="radio" <?php if($auteur->education && $auteur->education == 1): ?> checked <?php endif; ?> name="education" value="1">
                                Oui
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
        
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="adresse">Adresse <strong class="text-danger">*</strong> </label>
                        </label>
                        <textarea rows="5" type="text" class="form-control" name="addresse"
                            placeholder="Précédents judiciaires" id="addresse"
                            ><?php echo e(old('addresse') ?? $auteur->addresse); ?></textarea>
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
                            <label class="form-label" for="affaire_judiciaire">Précédents judiciaires<strong
                                    class="text-danger"></strong>
                            </label>
                            <textarea rows="5" type="text" class="form-control" name="affaire_judiciaire"
                                placeholder="Précédents judiciaires" id="affaire_judiciaire"
                                ><?php echo e(old('affaire_judiciaire') ?? $auteur->affaire_judiciaire); ?></textarea>
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


                    <a href="<?php echo e(route('crimes.show', $auteur->crime ? $auteur->crime->uuid : $crimeUuid)); ?>" onclick="cibleur('auteur')" class="btn btn-dark"> <i class="fa fa-times"
                            aria-hidden="true"></i>
                        Annuler </a>
                    <button type="submit" class="btn btn-primary"><span>
                            <i class="fe fe-save"></i>
                        </span> <?php echo e($btnAction); ?></button>

                        
                </div>
                </div>
<?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/pages/backoffice/auteurs/_form.blade.php ENDPATH**/ ?>