<div>
    <div class="row">
        <?php echo $__env->make('partials._notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <br>
    <form wire:submit.prevent="submit">

<div class="row">

    <div class="col-md-5">
        <div class="form-group">
            <label>   Règne  <span class="text-danger">*</span></label>
            <select wire:model="regne" name="regne"  class="form-control custom-select select2">
            <option value=""> Choisissez un règne</option>
            <option value="animal"> Animal</option>
            <option value="végétal"> Végétal</option>
            </select>
        </div>
    </div>
    <input type="hidden"  wire:model="crime_id" value="5" >
    <?php $__errorArgs = ['crime_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <div class="col-md-5">
        <div>
            <label>   Espèce  <span class="text-danger">*</span></label>
                <select class="js-example-basic-singl form-control select-lg custom-select" wire:model="espece"  style="width: 100%" id="mySelect2">
                    <option value="" selected > Séléctionnez une espèce</option>
                <?php $__empty_1 = true; $__currentLoopData = $especes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $espece): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <option value="<?php echo e($espece->id); ?>"> <?php echo e($espece->nom); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                Aucune espèce
                <?php endif; ?>
                  </select>
                  <?php $__errorArgs = ['espece'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>
    </div>
    <div class="col-md-2" style="margin-top: 28px">

            <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</div>
</form>
<div wire:loading wire:target="submit">
    <div id="loader" class="">
        <div class="loader"></div>
      </div>
</div>
<?php echo $__env->make('livewire.crime-espece', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/livewire/regne-espece.blade.php ENDPATH**/ ?>