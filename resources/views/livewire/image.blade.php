<div>
    {{-- @livewire('reglement', ['crime'  => $crime, 'modeReglements'  => $modeReglements, 'suites'  => $suites]) --}}
    @include('partials._notify',['nom'  => 'images'])
    @livewire('crime-image',['crime'  => $crime]) 
    @if (count($images) < 1)
    <span class="text-danger">Aucune image disponible</span>
    @else
    <div class="crime-gallerie">
        @foreach ($images as $key => $img)
        <hr>
        <figure onmousemove="hover('crime-rideau{{$key}}')"  style="cursor:pointer;"  class="crime-figure">
            <img class="crime-image" src="{{URL::asset('storage').'/'.$img->chemin}}" alt="" />
            <figcaption class="crime-figcaption text-muted p-3">Ajouté le {{formatDate($img->created_at) }}<small  wire:click="declencheur({{$img->id}})" class="crime-small text-danger text-muted float-right">SUPPRIMER</small></figcaption>
          </figure>
          @endforeach
        </div>
    @endif
<script type="text/javascript">
        document.addEventListener('declencherSuppression', orderId => {
          console.log(orderId.detail.id);
            Swal.fire({
                title: 'Etes vous sûre?',
                text: 'L\'image sera supprimée définitivement',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: 'var(--danger)',
                cancelButtonColor: 'var(--success',
                confirmButtonText: 'Supprimer!',
                cancelButtonText: 'Annuler!'
            }).then((result) => {
		//if user clicks on delete
                if (result.value) {
		     // calling destroy method to delete
                    @this.call('supprimer',orderId.detail.id)
		    // success response
                    responseAlert({title: session('images'), type: 'success'});
                } else {
                    responseAlert({
                        title: 'Opération annulée!',
                        type: 'success'
                    });
                }
            });
        });
</script>
</div>