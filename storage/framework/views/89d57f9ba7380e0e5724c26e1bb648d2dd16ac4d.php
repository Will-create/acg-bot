<div class="row">
    <?php if($crime->valide == 0): ?>
    <div class="form-group float-right">
        <div class="form-label">Valide</div>
        <label class="custom-switch">
            <input type="checkbox" wire:click="toggler"  name="custom-switch-checkbox" class="custom-switch-input">
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description"></span>
        </label>
    </div>
    
    <?php else: ?>
    <div class="form-group float-right">
        <div class="form-label">Valide</div>
        <label class="custom-switch">
            <input type="checkbox" checked wire:click="toggler"  name="custom-switch-checkbox" class="custom-switch-input">
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description"></span>
        </label>
    </div>
   
    <?php endif; ?>
    <div class="row">
        <div class="float-right" wire:loading wire:target="toggler">
           <h4 class="text-success">Traitement en cours...</h4>
       </div>
     </div>
</div>
<?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/livewire/validate.blade.php ENDPATH**/ ?>