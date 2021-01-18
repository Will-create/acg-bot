<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>   Règne  <span class="text-danger">*</span></label>
            <select wire:model="regne" name="regne"  class="form-control custom-select select2">
            <option value=""> Choisissez un règne</option>
            <option value="animal"> Animal</option>
            <option value="végétal"> Végétal</option>
            </select>
        </div>
    </div>
    <div class="col-md-6    ">
        <div class="form-group">
            <label>   Espèce  <span class="text-danger">*</span></label>
            <select name="espece"  class="form-control custom-select select2" >
                <option value="" selected disabled> Séléctionnez un espèce</option>
                <?php $__empty_1 = true; $__currentLoopData = $especes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $espece): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <option value="<?php echo e($espece->id); ?>"> <?php echo e($espece->nom); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                Aucune espèce
                <?php endif; ?>
            </select>
        </div>
    </div>

</div>
<?php /**PATH D:\switch_maker\war_crimes\resources\views/livewire/crime.blade.php ENDPATH**/ ?>