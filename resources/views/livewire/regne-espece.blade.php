<div>
    <div class="row">
    </div>
    <br>
   {{-- @if (Auth::user()->role->designation == "Chef d’Unité" || Auth::user()->role->designation == "Agent d’une Unité") --}}
   <form wire:submit.prevent="submit">

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>   Règne  <span class="text-danger">*</span></label>
                <select wire:model="regne" name="regne" onchange="refreshSelect2('#mySelect2');"  class="form-control custom-select select2">
                <option value=""> Choisissez un règne</option>
                <option value="animal"> Animal</option>
                <option value="végétal"> Végétal</option>
                </select>
            </div>
        </div>
        <input type="hidden"  wire:model="crime_id" value="5" >
        @error('crime_id') <span class="error">{{ $message }}</span> @enderror
        <div class="col-md-5">
            <div>
                <label>   Espèce  <span class="text-danger">*</span></label>
                    <select onload="refreshSelect2('#mySelect2');" class="js-example-basic-singl form-control select-lg custom-select"  wire:model="espece"  style="width: 100%" id="mySelect2">
                        <option value="" selected > Séléctionnez une espèce</option>
                    @forelse ($especes as $espece)
                <option  onclic="selectedSelect2({{$espece->id}})" class="selection"  value="{{$espece->id}}"> {{$espece->nom}}</option>
                    @empty
                    Aucune espèce
                    @endforelse
                      </select>
                      @error('espece') <span class="error text-danger">{{ $message }}</span> @enderror

            </div>
        </div>
        <div class="col-md-2" style="margin-top: 28px">

                <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </div>
    </form>
    <script>
  // turn the element to select2 select style
        function refreshSelect2(id) {
                   setTimeout(function (){
                   $(id).select2();
                   },250)
               }
        function selectedSelect2(id){
            alert(id);
            console.log(id);
           return $("#mySelect2").val(id);
     }
    </script>
   {{-- @endif --}}
<div wire:loading wire:target="submit">
    <div id="loading" class="">
        <div class="loading"></div>
      </div>
</div>

@include('livewire.crime-espece')
</div>
