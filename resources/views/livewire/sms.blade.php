
{{--  <div class="mb-3">
    <p class="text-bold">Le nombre de caractères est : {{strlen($sms->contenu_entree)}} lettres</p>
    </div>  --}}
<div class="row m-5 text-center">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <form wire:submit.prevent="submit" class="row justify-content-center"  style="width: 100%" >
            <div class="row">
                <div class="col-9">
                    <div class="d-flex">
                        <div class="form-group" style="width: 100%">
                            <textarea  value="<?php echo $sms->contenu_entree; ?>" rows="3" cols="60" type="text" class="form-control" name="contenu_sortie"
                                 id="exampleFormControlTextarea1" placeholder="Saisissez ou modifez"></textarea>
                                    @error('contenu_sortie')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-2">
                            <input type="hidden" wire:model="sms_id" name="message_id" value="{{$sms->id}}">
                            <button onclick="envoyer()" id="exampleFormControlTextarea1" class="btn button1" type="submit"> <i class="fa fa-check" aria-hidden="true"></i> Valider</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    </div>
    <div class="col-md-1"></div>
</div>
<script type="text/javascript">
    function desactiver() {
      var bouton = document.getElementById('exampleFormControlTextarea1'); 
      bouton.disabled = "disabled";
      bouton.value="Envoi...";
    }

    function edit(contenu){
                var textarea = document.getElementById('exampleFormControlTextarea1');
                textarea.value = contenu;
            };
 </script>
