<div>


        @if ($sms->malitel == true)
        <div class="form-group">
            <div class="form-label">Envoyé</div>
            <label class="custom-switch">
                <input type="checkbox" checked disabled wire:click="toggler"  name="custom-switch-checkbox" class="custom-switch-input">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"></span>
            </label>
        </div>

        @else
        <div class="form-group">
            <div class="form-label">Envoyer</div>
            <label class="custom-switch">
                <input type="checkbox" wire:click="toggler" name="custom-switch-checkbox" class="custom-switch-input">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"></span>
            </label>
        </div>

        @endif
        <div class="row">
            <div wire:loading wire:target="toggler">
               <h4 class="text-success">Traitement...</h4>
           </div>
         </div>
</div>
