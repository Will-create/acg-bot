<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="nom">Nom <strong class="text-danger">*</strong> </label>
                    <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"
                        value="<?php echo e(old('nom') ?? $utilisateur->nom); ?>" required>
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
                    <label class="form-label" for="email">Email <strong class="text-danger">*</strong></label>
                    <input type="email" class="form-control" name="email" placeholder="Email" id="email"
                        value="<?php echo e(old('email') ?? $utilisateur->email); ?>" required>
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
                    <label class="form-label" for="pays_id">Pays <strong class="text-danger">*</strong></label>
                <select name="pay_id" id="pays_id" class="form-control custom-select select2" onchange="show_ville();">
                    <?php if($utilisateur->pay): ?>
                    <option value="<?php echo e($utilisateur->pay->id); ?>" selected> <?php echo e($utilisateur->pay->nom); ?></option>
                    <?php endif; ?>
                        <?php if(Auth::user()->role->designation == 'Chef d’Unité' || Auth::user()->role->designation ==
                        'Coordonnateur National'): ?>
                        <option value="<?php echo e($pays->id); ?>" selected> <?php echo e($pays->nom); ?></option>
                        <input type="hidden" id="selected_pays" value="<?php echo e(route('ville_by_country', $pays->id)); ?>">
                        <?php else: ?>
                        <?php if(!$utilisateur->pay): ?>
                        <option value="" selected disabled> Sélectionner</option>

                        <?php endif; ?>
                        <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($pay->id); ?>"><?php echo e($pay->nom); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
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
                <?php if(Auth::user()->role->designation == 'Coordonnateur National' ||  Auth::user()->role->designation == 'Chef d’Unité'): ?>
                    <div class="form-group">
                        <label class="form-label" for="organisation">Role <strong class="text-danger">*</strong></label>
                        <select name="role_id" id="" class="form-control custom-select select2">
                            <?php if(Auth::user()->role->designation == 'Chef d’Unité' || Auth::user()->role->designation ==
                            'Coordonnateur Régional' || Auth::user()->role->designation == 'Coordonnateur National'): ?>
                            <option value="<?php echo e($roles->id); ?>" selected> <?php echo e($roles->designation); ?></option>
                            <?php else: ?>
                            <option value="" selected disabled> Sélectionner</option>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->designation); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
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
                <?php endif; ?>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="prenom">Prénom <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" id="prenom"
                        value="<?php echo e(old('prenom') ?? $utilisateur->prenom); ?>" required>
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
                    <label class="form-label" for="tel">Téléphone <strong class="text-danger">*</strong></label>
                    <input class="form-control phone" id="phone" name="tel" type="tel" value="<?php echo e(old('tel') ?? $utilisateur->tel); ?>" required
                        width="100%">
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
                    <label class="form-label" for="organisation">Localité <strong
                            class="text-danger">*</strong></label>
                    <select name="localite_id" id="ville_id" class="form-control custom-select select2">
                        <?php if($utilisateur->localite): ?>
                    <option value="<?php echo e($utilisateur->localite); ?>" selected > <?php echo e($utilisateur->localite->nom); ?></option>

                        <?php else: ?>
                        <option value="" selected disabled> Sélectionner</option>

                        <?php endif; ?>
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
            <?php if(Auth::user()->role->designation != 'Administrateur Général' && Auth::user()->role->designation !=
            'Coordonnateur Régional' ): ?>
            <div class="form-group">
                <label class="form-label" for="organisation">Unité <strong class="text-danger">*</strong></label>
                <select name="unite_id" id="" class="form-control custom-select select2">
                    <option value="" selected disabled> Sélectionner</option>

                    <?php $__currentLoopData = $unites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($unite->id); ?>"><?php echo e($unite->designation); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
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
            <?php endif; ?>

    </div>
    <div class="col-md-12">
        <?php if(Auth::user()->role->designation != 'Coordonnateur National' && Auth::user()->role->designation != 'Chef d’Unité'): ?>
        <div class="form-group">
            <label class="form-label" for="organisation">Role <strong class="text-danger">*</strong></label>
            <select name="role_id" id="" class="form-control custom-select select2">
                <?php if($utilisateur->role): ?>
             <option value="<?php echo e($utilisateur->role->id); ?>" selected> <?php echo e($utilisateur->role->designation); ?> </option>
                <?php endif; ?>
                <?php if(Auth::user()->role->designation == 'Chef d’Unité' || Auth::user()->role->designation ==
                'Coordonnateur Régional' || Auth::user()->role->designation == 'Coordonnateur National'): ?>
                <option value="<?php echo e($roles->id); ?>" selected> <?php echo e($roles->designation); ?></option>
                <?php else: ?>
                <?php if(!$utilisateur->role): ?>
                <option value="" selected disabled> Sélectionner</option>

                <?php endif; ?>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    if($utilisateur->role && $utilisateur->role->id == $role->id) {
                        continue;
                    }
                ?>
                <option value="<?php echo e($role->id); ?>"><?php echo e($role->designation); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
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
    <?php endif; ?>
    </div>

        <div class="col-md-12 ">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0 card-title">Photo de profil</h3>
                </div>
                <div class="card-body">
                    <input type="file" class="dropify" data-max-file-size="1M" name="profile_photo_path"
                        accept=".png, .JPEG, ." />
                    <?php $__errorArgs = ['profile_photo_path'];
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
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(URL::asset('assets/plugins/fileuploads/js/fileupload.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/fileuploads/js/file-upload.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')); ?>"></script>

<!-- INTERNALPRISM JS -->
<script src="<?php echo e(URL::asset('assets/plugins/prism/prism.js')); ?>"></script>
<!-- INTERNAL TELEPHONE JS -->
<script src="<?php echo e(URL::asset('assets/plugins/telephoneinput/telephoneinput.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')); ?>"></script>
<script>
    $.get(
        $('#selected_pays').val(),
        function(villes){
            try{
                villes.forEach((element) => {
                    $("#ville_id").append(
                        '<option value="' + element.id + '">  ' + element.nom + ' </option>'
                    );
                });
            }
            catch(err){ console.log(err); }
        }
    );

    function show_ville() {
        var select_status = $('#pays_id').val();

        $.ajax({
            headers: {
                'X-CSRF-Token': '<?php echo e(csrf_token()); ?>',
            },
            url: '/pays/ville/' + escape(select_status),
            type: 'get',
            success: function (data) {
                var villes = data;
                if (villes == undefined) {
                    villes = 'Veuillez selectionner un pays'
                }
                console.log(villes);
                $("#ville_id").html('');
                $("#ville_id").append(
                    '<option value="" selected disabled> Sélectionner</option>'

                );

                villes.forEach((element) => {
                    $("#ville_id").append(
                        '<option value="' + element.id + '">  ' + element.nom + ' </option>'
                    );

                });
            },
            error: function (data) {
                console.log(data);

            },
        });

    }

</script>
<?php $__env->stopSection(); ?>
<?php /**PATH D:\switch_maker\war_crimes\resources\views/pages/backoffice/administrateur/utilisateurs/form.blade.php ENDPATH**/ ?>