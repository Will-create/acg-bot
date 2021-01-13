<div id="largeModalAddUser" class="modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title text-center">Ajouter un utilisateur </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <div class="row">
                    <div class="col-md-12">
                    <form action="<?php echo e(route('utilisateurs.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="nom">Nom</label>
                                            <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"  value="<?php echo e(old('nom')); ?>" required>
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
                                            <label class="form-label" for="email">Email</label>
                                         <input type="email" class="form-control" name="email" placeholder="Email" id="email"  value="<?php echo e(old('email')); ?>" required>
                                         <?php $__errorArgs = ['email'];
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
                                            <label class="form-label" for="organisation">Organisation</label>
                                            <input type="text" class="form-control" name="organisation" placeholder="Organisation"  value="<?php echo e(old('organisation')); ?>" id="organisation">
                                            <?php $__errorArgs = ['organisation'];
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
                                            <label class="form-label" for="prenom">Prénom</label>
                                            <input type="text" class="form-control" name="prenom" placeholder="Prénom" id="prenom"  value="<?php echo e(old('prenom')); ?>" required>
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
                                        <div class="input-group w-100 form-group">
                                            <label class="form-label" for="tel">Téléphone</label>
                                            <input class="form-control" id="phone" name="tel" type="tel"  value="<?php echo e(old('tel')); ?>" required>
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

                                        <div class="form-group">
                                            <label class="form-label" for="num_cnib">Référence du document d'identification</label>
                                            <input type="text" class="form-control" name="num_cnib" id="num_cnib" placeholder="Numéro d'identification"  value="<?php echo e(old('num_cnib')); ?>" required>
                                            <?php $__errorArgs = ['num_cnib'];
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
                                                <h3 class="mb-0 card-title">Veuillez importer le document d'identification</h3>
                                            </div>
                                            <div class="card-body">
                                                <input type="file" class="dropify" data-max-file-size="1M" name="photo_cnib" accept=".pdf" />
                                                <?php $__errorArgs = ['photo_cnib'];
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
                            <button type="submit" class="btn btn-primary"> <span>
                                <i class="fe fe-save"></i>
                            </span> Enregistrer</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <span>
                                    <i class="fa fa-close"></i>

                                </span>Fermer</button>
                        </div>
                    </form>

                    </div>
                </div>
            </div><!-- modal-body -->
            
        </div>
    </div><!-- MODAL DIALOG -->
</div>
<?php /**PATH D:\Switch Maker\criminalite\resources\views\pages\backoffice\administrateur\utilisateurs\_modelCreationUtilisateur.blade.php ENDPATH**/ ?>