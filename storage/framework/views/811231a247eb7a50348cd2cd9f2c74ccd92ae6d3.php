<div>


        <?php if($crime->veto == 0): ?>
        <div class="form-group">
            <div class="form-label">Emettre un véto</div>
            <label class="custom-switch">
                <input type="checkbox" wire:click="toggler"  name="custom-switch-checkbox" class="custom-switch-input">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"></span>
            </label>
        </div>

        <?php else: ?>
        <div class="form-group">
            <div class="form-label">Emettre un véto</div>
            <label class="custom-switch">
                <input type="checkbox" checked wire:click="toggler"  name="custom-switch-checkbox" class="custom-switch-input">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"></span>
            </label>
        </div>

        <?php endif; ?>
        <div class="row">
            <div wire:loading wire:target="toggler">
               <h4 class="text-success">Traitement en cours...</h4>
           </div>
         </div>
</div>
<?php /**PATH D:\switch_maker\war_crimes\resources\views/livewire/veto.blade.php ENDPATH**/ ?>