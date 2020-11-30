@extends('layouts.masterCarte')
@section('page-header')
                <!-- PAGE-HEADER -->
                @include('partials._notification')

				<div class="page-header">
					<div>
                    <h1 class="page-title">{{$unite->designation}}</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Unités</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('unites.index')}}"  >  <span>
                            <i class="fe fe-plus"></i>
                        </span>
                        Toutes les unités</a>


                    </button>

					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')

<!-- ROW-2 -->
<div class="row" style="height: auto">
    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-3 mb-10" >
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Photo de Couverture</h3>
            </div>
            <div class="card-body">
            <img src="{{ asset('storage').'/'.$unite->photo_couverture}}" style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Logo</h3>
            </div>
            <div class="card-body">
            <img src="{{ asset('storage').'/'.$unite->logo}}" style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 col-sm-12 col-xl-9" >
        <div class="card overflow-hidden"  >
            <div class="card-header" >
                <h3 class="card-title">Localisation</h3>
            </div>
            <div class="card-body">
                
            <div id="map"></div>
            </div>
        </div>
    </div>
</div>
<!-- ROW-2 END -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12" >
    <div class="card">
        <div class="card-body">
            <div id="profile-log-switch">
                <div class="media-heading text-primary">
                    <h5><strong>Details</strong></h5>
                </div>
                <div class="table-responsive ">
                    <table class="table row table-borderless">
                        <tbody class="col-lg-12 col-xl-6 p-0">
                            <tr>
                            <td><strong>Designation:</strong> {{$unite->designation}}</td>
                            </tr>
                            <tr>
                            <td><strong>Type d'unite :</strong> {{$unite->type->nom}}</td>
                            </tr>
                            <tr>
                            <td><strong>Pays : </strong> {{$unite->pays->nom}}</td>
                            </tr>
                            <tr>
                            <td><strong>Ville: </strong> {{$unite->localite->nom}}</td>
                            </tr>
                        </tbody>
                        <tbody class="col-lg-12 col-xl-6 p-0">
                            <tr>
                            <td><strong>Adresse: </strong> {{$unite->adresse}}</td>
                            </tr>
                            <tr>
                                <td><strong>Téléphone: </strong>{{$unite->tel}}</td>
                            </tr>
                            <tr>
                            <td><strong>Responsable: </strong> {{$unite->responsable->nom}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>

<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6 mb-4">
     <button type="button" class="btn btn-danger  mb-1" data-toggle="modal" data-target="#exampleModalDelete{{$unite->id}}"><i class="fa fa-trash"></i> Supprimer cette unité</button>

     <a href="{{route('unites.edit',$unite->uuid)}}" class="btn btn-primary">
         Modifier cette unité</a>

 <a href="{{ URL::previous() }}" class="btn btn-primary"> <span>
         <i class="fe fe-close"></i>
     </span> Retour</a>

    </div>
</div>

<div class="modal" id="exampleModalDelete{{$unite->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDelete" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
 <div class="modal-header">
     <h5 class="modal-title" id="exampleModalDelete">Suppression de l'unité</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
     </button>
 </div>
 <div class="modal-body">
     <p>  Voullez-vous supprimer cette unité ?
     </p>
 </div>
 <div class="modal-footer">
     <form action="{{route('unites.destroy', $unite->uuid)}}" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger ">
             <i class="fa fa-trash"></i>
         <span>Confirmer la suppression</span>
         </button>
         <button type="reset" class="btn btn-success" data-dismiss="modal">
             <i class="fa fa-times"></i>
                         <span>Annuler</span>
         </button>
         </form>

        
 </div>
</div>
</div>
</div> 

<input id="long" type="hidden" value="{{$unite->long}}">
<input id="lat" type="hidden" value="{{$unite->lat}}">

<script type="text/javascript">
    // On initialise la latitude et la longitude de Paris (centre de la carte)
    var lat =parseFloat(document.getElementById('lat').value) ;
    var lon =parseFloat(document.getElementById('long').value);

    var macarte = null;
    // Fonction d'initialisation de la carte
    function initMap() {
        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
        macarte = L.map('map').setView([lat, lon], 9);
        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            // Il est toujours bien de laisser le lien vers la source des données
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(macarte);
        var marker = L.marker([lat, lon]).addTo(macarte);
    }
    window.onload = function(){
// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
initMap(); 
    };
</script>
    

@endsection
