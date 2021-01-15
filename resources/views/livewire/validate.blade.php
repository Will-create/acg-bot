<div>
    @if ($crime->valide == 0)
    <div class="form-group">
        <div class="form-label">Valide</div>
        <label class="custom-switch">
            <input type="checkbox" wire:click="toggler"  name="custom-switch-checkbox" class="custom-switch-input">
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description"></span>
        </label>
    </div>
    
    @else
    <div class="form-group">
        <div class="form-label">Valide</div>
        <label class="custom-switch">
            <input type="checkbox" checked wire:click="toggler"  name="custom-switch-checkbox" class="custom-switch-input">
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description"></span>
        </label>
    </div>
    @endif
    <div>
        <div wire:loading wire:target="toggler">
           <h4 class="text-success">Traitement en cours...</h4>
       </div>
     </div>
</div>
