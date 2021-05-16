
<div class="row m-5">
    <form wire:submit.prevent="submit" class="row justify-content-center"  style="width: 100%">
            <div class="form-group" style="width: 100%">
                <textarea wire:model.lazy="contenu_sortie" rows="8" type="text" class="form-control" name="contenu_sortie"
                    placeholder="Contenu de sortie" id="commentaire"
                ></textarea>
                        @error('contenu_sortie')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        <input type="hidden" wire:model="sms_id" name="message_id" value="{{$sms->id}}">
        <button class="btn btn-primary" type="submit"> <i class="fa fa-download" aria-hidden="true"></i> Sauvegarder</button>
        
    </form>
</div>
