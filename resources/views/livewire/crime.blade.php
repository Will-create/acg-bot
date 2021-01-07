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
                @forelse ($especes as $espece)
            <option value="{{$espece->id}}"> {{$espece->nom}}</option>
                @empty
                Aucune espèce
                @endforelse
            </select>
        </div>
    </div>

</div>
