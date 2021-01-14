<div>
    <div class="row">
        @include('partials._notification')
    </div>
    <br>
    <form wire:submit.prevent="submit">
        <input type="hidden"  wire:model="crime_id" value="5" >
        <div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>   Auteur  <span class="text-danger">*</span></label>
            <select wire:model="auteur" name="auteur"  class="form-control custom-select select2">
            <option value=""> Choisissez un auteur</option>
            @forelse ($crime->auteurs as $auteur)
            <option value="{{$auteur->id}}"> {{$auteur->nom. ' '. $auteur->prenom}} </option>
            @empty
                Aucun auteur dans ce crime
            @endforelse
            </select>
            @error('auteur') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>   Mode de règlement  <span class="text-danger">*</span></label>
            <select wire:model="reglement" name="reglement"  class="form-control custom-select select2">
            <option value="" selected> Choisissez</option>
            @forelse ($modeReglements as $modeReglement)
            <option value="{{$modeReglement->id}}"> {{$modeReglement->mode}} </option>
            @empty
                Aucun mode de règlemnt disponible
            @endforelse
            </select>
            @error('reglement') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
    </div>
</div>

   <div class="row">
    <div class="col-md-6 @if(!$displaySuite) d-none @endif">
        <div class=" ">
            <label>   Suite  <span class="text-danger">*</span></label>
                <select class="js-example-basic-singl form-control select-lg custom-select" wire:model="suite"  style="width: 100%" id="mySelect2">
                    {{-- <option value="" selected disabled > Séléctionnez</option> --}}
                @forelse ($suites as $suite)
            <option value="{{$suite->id}}"> {{$suite->decision}}</option>
                @empty
                Aucune suite disponible
                @endforelse
                  </select>
                  @error('suite') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
    </div>
    <div class="col-md-6 @if(!$displayAmende) d-none @endif" >
        <div class="form-group">
            <label>   Amende  <span class="text-danger">*</span></label>
               <input type="number" name="amende" id="" wire:model="amende" class="form-control" min="0">
                  @error('amende') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
    </div>
   </div>
    <div class="row" style="margin-top: 28px">

            <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</form>
<div wire:loading wire:target="submit">
    <div id="loader" class="">
        <div class="loader"></div>
      </div>
</div>
</div>
