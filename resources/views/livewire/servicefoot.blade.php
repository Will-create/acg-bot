<div>
    @if ($competition->caches == true)
        <div class="form-group">
            <div class="form-label">Décocher pour afficher dans la liste</div>
            <label class="custom-switch">
                <input type="checkbox" checked wire:click="toggler"  name="custom-switch-checkbox" class="custom-switch-input">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"></span>
            </label>
        </div>
        @else
        <div class="form-group">
            <div class="form-label">Cocher pour cacher dans la liste</div>
            <label class="custom-switch">
                <input type="checkbox" wire:click="toggler" name="custom-switch-checkbox" class="custom-switch-input">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"></span>
            </label>
        </div>
        @endif
</div>
