
<div class="mb-3">
    <p class="text-bold">Le nombre de caractères est : {{strlen($sms->contenu_entree)}} lettres</p>
    </div>
<div class="row m-5">
    
    <form wire:submit.prevent="submit" class="row justify-content-center"  style="width: 100%" >
            <div class="form-group" style="width: 100%">
                <textarea  rows="4" type="text" class="form-control" name="contenu_sortie"
                     id="commentaire"
                >{{$sms->contenu_entree}}</textarea>
                        @error('contenu_sortie')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        <input type="hidden" wire:model="sms_id" name="message_id" value="{{$sms->id}}">
        <button class="btn btn-primary" type="submit"> <i class="fa fa-check" aria-hidden="true"></i> Valider</button>
        
    </form>
</div>
