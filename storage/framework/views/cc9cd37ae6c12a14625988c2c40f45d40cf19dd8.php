<div>
    <div class="row">
        <?php echo $__env->make('partials._notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <br>
    <form wire:submit.prevent="submit">
        <input type="hidden"  wire:model="crime_id" value="5" >
        <div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>   Auteur  <span class="text-danger">*</span></label>
            <select wire:model="auteur" name="auteur"  class="form-control custom-select select2">
            <option value=""> Choisissez un auteur</option>
            <?php $__empty_1 = true; $__currentLoopData = $crime->auteurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auteur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <option value="<?php echo e($auteur->id); ?>"> <?php echo e($auteur->nom. ' '. $auteur->prenom); ?> </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                Aucun auteur dans ce crime
            <?php endif; ?>
            </select>
            <?php $__errorArgs = ['auteur'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>   Mode de règlement  <span class="text-danger">*</span></label>
            <select wire:model="reglement" name="reglement"  class="form-control custom-select select2">
            <option value="" selected> Choisissez</option>
            <?php $__empty_1 = true; $__currentLoopData = $modeReglements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modeReglement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <option value="<?php echo e($modeReglement->id); ?>"> <?php echo e($modeReglement->mode); ?> </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                Aucun mode de règlemnt disponible
            <?php endif; ?>
            </select>
            <?php $__errorArgs = ['reglement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>
    </div>
</div>

   <div class="row">
    <div class="col-md-6 <?php if(!$displaySuite): ?> d-none <?php endif; ?>">
        <div class=" ">
            <label>   Suite  <span class="text-danger">*</span></label>
                <select class="js-example-basic-singl form-control select-lg custom-select" wire:model="suite"  style="width: 100%" id="mySelect2">
                    
                <?php $__empty_1 = true; $__currentLoopData = $suites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <option value="<?php echo e($suite->id); ?>"> <?php echo e($suite->decision); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                Aucune suite disponible
                <?php endif; ?>
                  </select>
                  <?php $__errorArgs = ['suite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>
    </div>
    <div class="col-md-6 <?php if(!$displayAmende): ?> d-none <?php endif; ?>" >
        <div class="form-group">
            <label>   Amende  <span class="text-danger">*</span></label>
               <input type="number" name="amende" id="" wire:model="amende" class="form-control">
                  <?php $__errorArgs = ['amende'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>
    </div>
   </div>
    <div class="row" style="margin-top: 28px">

            <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</form>
<div wire:loading wire:target="submit">
    <div id="loader" class="">
        <div class="loader"></div>
      </div>
</div>
</div>
<?php /**PATH D:\Switch Maker\criminalite\resources\views/livewire/reglement.blade.php ENDPATH**/ ?>