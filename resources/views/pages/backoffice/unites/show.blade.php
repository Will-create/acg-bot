@extends('layouts.masterCarte')
@section('page-header')
                <!-- PAGE-HEADER -->
                @include('partials._notification')

				<div class="page-header">
					<div>
                    <h1 class="page-title">Details d'unité de lois </h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('unites.index')}}">Unités</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span>{{$unite->designation}}</li>

						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('unites.index')}}"  >  <span>
                            <i class="fe fe-list"></i>
                        </span>
                        Toutes les unités</a>


                    </button>

					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')
<!-- ROW-2 END -->

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12" >
    <div class="card">
        <div class="card-body">
            <div id="profile-log-switch">
                <div class="media-heading text-dark">
                    <h5><strong>{{ucfirst($unite->designation)}}</strong></h5>
                </div>
                <div class="table-responsive ">
                    <table class="table row table-borderless table-sm">
                        <tbody class="col-lg-12 col-xl-6 p-2 ">
                            <tr>
                            <td><strong>Type d'unite : </strong><a  data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails" class="text-dark" href="{{route('type_unites.show',$unite->type->uuid)}}">{{ucfirst($unite->type->nom)}}</a></td>
                            </tr>
                            <tr>
                            <td><strong>Pays : </strong> <a  data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails" class="text-dark" href="{{route('pays.show',$unite->pays->uuid)}}">{{$unite->pays->nom}}</a></td>
                            </tr>
                            <tr>
                            <td><strong>Localité : </strong><a  data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails" class="text-dark" href="{{route('localites.show',$unite->localite->uuid)}}">{{$unite->localite->nom}}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Administratutelle : </strong> {{ucfirst($unite->administration_tutelle)}}</td>
                             </tr>
                        </tbody>
                        <tbody class="col-lg-12 col-xl-6 p-0">
                            <tr>
                            <td><strong>Adresse : </strong> {{$unite->adresse}}</td>
                            </tr>
                            <tr>
                                <td><strong>Téléphone : </strong>{{$unite->tel}}</td>
                            </tr>
                            <tr>
                                <td><strong>Téléphone 2: </strong>{{$unite->tel2}}</td>
                            </tr>
                            <tr>
                            <td><strong>Responsable : </strong> <a  data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails" class="text-dark" href="{{route('utilisateurs.show',$unite->responsable->uuid)}}">{{ucfirst($unite->responsable->nom)}} {{ucfirst($unite->responsable->prenom)}}</a> </td>
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
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12" >
    <div class="card">
        <div class="card-body">
            <div id="profile-log-switch">
                <div class="media-heading text-dark">
                    <h5><strong>Les agents de cette unité</strong></h5>
                </div>
                <div class="table-responsive ">
                    <table class="table row table-borderless table-sm">
                        
                        <tbody class="col-lg-12 col-xl-6 p-0">
                            @php
                                $i=1;
                            @endphp
                            <tr>
                            <td><strong class="pl-2" >Responsable : </strong> <a  data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails" class="text-dark" href="{{route('utilisateurs.show',$unite->responsable->uuid)}}">{{ucfirst($unite->responsable->nom)}} {{ucfirst($unite->responsable->prenom)}}</a> </td>
                            </tr>
                            @foreach ($agents as $agent)
                                <tr>
                                <td><strong class="pl-2">{{$i++}}</strong> <a  data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails" class="text-dark" href="{{route('utilisateurs.show',$agent->uuid)}}">{{ucfirst($agent->nom)}} {{ucfirst($agent->prenom)}}, {{formatel($agent->tel)}}</a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
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

<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6 mb-4">
        <a href="{{ route('unites.index') }}" class="btn btn-dark"> <span>
                <i class="fe fe-close"></i>
            </span><i class="fa fa-times"></i> Retour</a>

        <a href="{{ route('unites.edit', $unite->uuid) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i> Modifier</a>
        <button type="button" class="btn btn-danger  mb-1" data-toggle="modal"
            data-target="#exampleModalDelete{{ $unite->id }}"><i class="fa fa-trash"></i> Supprimer</button>
    </div>
</div>
<div class="modal" id="exampleModalDelete{{ $unite->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalDelete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalDelete">Suppression de {{ $unite->designation }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Etes-vous sûr de bien vouloir supprimer cette unité ?
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('unites.destroy', $unite->uuid) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ">
                        <i class="fa fa-trash"></i>
                        <span>Confirmer</span>
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
        macarte = L.map('map').setView([lon, lat], 6);
        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            // Il est toujours bien de laisser le lien vers la source des données
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">UICN</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(macarte);
        var marker = L.marker([lon,lat]).addTo(macarte);
    }
    window.onload = function(){
// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
initMap();
    };
</script>


@endsection
