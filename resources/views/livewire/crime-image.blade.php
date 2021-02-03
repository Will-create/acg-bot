<div>

    <div class="row m-5">
        <form wire:submit.prevent="submit" enctype="multipart/form-data" class="row justify-content-center"  style="width: 100%">
                        <input type="file"wire:model="photos"   name="photos" accept="image/*" multiple/>
                        @error('photos')
                    
                    @enderror
            <input type="hidden" wire:model="crime_id" name="crime_id" value="{{$crime->id}}">
            <input type="hidden" name="nbrphotos" onchange="document.getElementById('screen').innerHTML=this.value" value="{{$nbrphotos}}">

            <button @if (count($photos) < 1) disabled @endif class="btn btn-primary" wire:click="submit" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</button>
        </form>
        <div wire:loading wire:target="submit">
            <h4 class="text-success">Chargement...</h4>
        </div>
    </div>
</div>
