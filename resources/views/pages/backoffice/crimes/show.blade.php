@extends('layouts.master4')
@section('css')
    <!-- FORN WIZARD CSS -->
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/formwizard/smart_wizard.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/formwizard/smart_wizard_theme_arrows.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/formwizard/smart_wizard_theme_circles.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/formwizard/smart_wizard_theme_dots.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/forn-wizard/css/demo.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/selectize.default.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css') }}">
    <link href="{{ URL::asset('assets/plugins/accordion/accordion.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@push('livewire')
    @livewireStyles
@endpush
@section('page-header')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title"></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('accueil') }}">Accueil</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('crimes.index') }}"> Crimes </a></li>
                <li class="breadcrumb-item active" aria-current="page">Détails crime</li>
            </ol>
        </div>
        <div class="ml-auto pageheader-btn">
            <a class="btn btn-primary" href="{{ route('crimes.index') }}"> <span>
                    <i class="fe fe-list"></i>
                </span>
                Liste des crimes</a>
            </button>

        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informations générales</h3>
                </div>
                <div class="card-body">
                    @include('partials._notify',['nom' => 'general'])
                    <dl class="dl-crime">
                        <strong class="text-center">{{ $crime->type ? ucfirst($crime->type->nom)  : '' }}</strong> <br>
                        <dt>Date d'appréhension :</dt>
                        <dd> {{ formatDate($crime->date_apprehension) }}
                        </dd>
                        <dt>Localité d'appréhension :</dt>
                        <dd>
                            {{ ucFirst($crime->paysApprehension->nom) }}/{{ ucFirst($crime->localite ? $crime->localite_apprehension : $crime->localite_apprehension) }}
                        </dd>
                        <dt>Service investigateur :</dt>
                        <dd>
                            {{ ucFirst($crime->service_investigateur->designation ?? $crime->service_investigateur->designation) }}
                        </dd>
                    </dl>
                </div>
            </div>
            <div class:="tab-content">
                <div class="tab-pane" id="tab-51">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Commentaires</h3>
                        </div>
                        <div class="card-body">
                            @livewire('comment',['crime' => $crime,'commentaires' => $commentaires])
                            @livewire('commentaire',['crime' => $crime,'commentaires' => $commentaires])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $crimeEspeces = \App\Models\CrimeEspece::latest()
                ->where('crime_id', $crime->id)
                ->get();
        @endphp
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Détails</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <ul class="demo-accordion accordionjs m-0" data-active-index="false">
                                    <li class="@if (Session::has('section') &&
                                        session('section')=='espece' ) acc_active @endif">
                                        <div>
                                            <h3>Especes </h3>
                                            <span class="nom_item_par_collapse badge badge-danger">
                                                {{ count($crimeEspeces) }} </span>
                                        </div>
                                        <div>
                                            @include('partials._notify',['nom' => 'espece'])

                                            @livewire('regne-espece', ['crime' => $crime])
                                            <br>
                                            <div class="log"></div>
                                        </div>
                                    </li>
                                    <li class="@if (Session::has('section') &&
                                        session('section')=='auteur' ) acc_active @endif">
                                        <div>
                                            <h3>Auteurs et complices</h3>
                                            <span class="nom_item_par_collapse badge badge-danger">
                                                {{ count($crime->auteurs) }} </span>
                                        </div>
                                        <div>
                                            @include('partials._notify',['nom' => 'auteur'])
                                            <div class="text-right">
                                                @if (Auth::user()->role->designation == 'Chef d’Unité' || Auth::user()->role->designation == 'Agent d’une Unité')
                                                    <a href="{{ route('crime_auteurs.create', ['crime' => $crime->uuid]) }}"
                                                        class="btn btn-primary"> <i class="fa fa-plus"
                                                            aria-hidden="true"></i> Ajouter</a>
                                                @endif
                                            </div>
                                            <br>
                                            @if (count($crime->auteurs) > 0)
                                                @include('pages.backoffice.auteurs.crimeAuteu', ['crime' => $crime])
                                            @else
                                                <small class="text-danger">Aucun auteur Ajouter</small>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="@if (Session::has('section') &&
                                        session('section')=='confiscation' ) acc_active @endif">
                                        <div>
                                            <h3>Specimens confisqués</h3>
                                            <span class="nom_item_par_collapse badge badge-danger">
                                                {{ count($crime->confiscations) }} </span>
                                        </div>
                                        <div>
                                            @include('partials._notify',['nom' => 'confiscation'])
                                            <div class="text-right">
                                                @if (Auth::user()->role->designation == 'Chef d’Unité' || Auth::user()->role->designation == 'Agent d’une Unité')
                                                    <a href="{{ route('confiscations.create', ['crime' => $crime->uuid]) }}"
                                                        class="btn btn-primary"> <i class="fa fa-plus"
                                                            aria-hidden="true"></i> Ajouter</a>
                                                @endif
                                            </div>
                                            <br>
                                            @if (count($crime->confiscations) > 0)
                                                @include('pages.backoffice.confiscations.crimeConfiscation')
                                            @else
                                                <small class="text-danger"> Aucun speciemen confisqué</small>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="@if (Session::has('section') &&
                                        session('section')=='arme' ) acc_active @endif">
                                        <div>
                                            <h3>Armes / matériels</h3>
                                            <span class="nom_item_par_collapse badge badge-danger">
                                                {{ count($crime->armes) }} </span>
                                        </div>
                                        <div>
                                            <div>
                                                @include('partials._notify',['nom' => 'arme'])
                                                <div class="text-right">
                                                    @if (Auth::user()->role->designation == 'Chef d’Unité' || Auth::user()->role->designation == 'Agent d’une Unité')
                                                        <a href="{{ route('crime.armes.create', ['crime' => $crime]) }}"
                                                            class="btn btn-primary"> <i class="fa fa-plus"
                                                                aria-hidden="true"></i> Ajouter</a>
                                                    @endif
                                                </div>
                                                <br>
                                                @include('pages.backoffice.armes.listearme', ['armes' => $armes])
                                            </div>
                                        </div>
                                    </li>
                                    <li class="@if (Session::has('section') &&
                                        session('section')=='reglement' ) acc_active @endif">
                                        <div>
                                            {{-- &&  (session('section') == "reglement") --}}
                                            <h3>Réglements</h3>
                                            <span class="nom_item_par_collapse badge badge-danger">
                                                {{ count($crime->reglement) }} </span>
                                        </div>
                                        <div>
                                            {{-- @livewire('reglement', ['crime'  => $crime, 'modeReglements'  => $modeReglements, 'suites'  => $suites]) --}}
                                            @include('partials._notify',['nom' => 'reglement'])
                                            <div class="text-right">
                                                @if (count($crime->auteurs) > 0)
                                                    @if (Auth::user()->role->designation == 'Chef d’Unité' || Auth::user()->role->designation == 'Agent d’une Unité')
                                                        <a href="{{ route('crime_reglements.create', ['crime' => $crime->uuid]) }}"
                                                            class="btn btn-primary"> <i class="fa fa-plus"
                                                                aria-hidden="true"></i> Ajouter</a>
                                                    @endif
                                                    <br>
                                                @else
                                                    <small class="text-danger">
                                                        Veuillez d'abord ajouter les auteurs du crimes
                                                    </small>
                                                @endif
                                            </div>
                                            @if (count($crime->reglement) > 0)
                                                @include('pages.backoffice.regelements.list')
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h3>Localisation</h3>
                                        </div>
                                        <div>
                                            <div class="text-right">
                                                @if ($crime->longitude != '')
                                                    <div id="map"></div>
                                                @else
                                                    <small class="text-danger">
                                                        Aucune localisation disponible
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                    <li class="@if (Session::has('section') &&
                                        session('section')=='images' ) acc_active @endif">
                                        <div>
                                            {{-- &&  (session('section') == "reglement") --}}
                                            <h3>Images du crime</h3>
                                            @livewire('count-image',['crime' => $crime ])

                                        </div>
                                        @livewire('image',['crime' => $crime ])
                                    </li>
                                </ul>
                            </div>
                        </div><!-- COL-END -->
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Options de la publication</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if (Auth::user()->role->designation == 'Coordonnateur Régional' || Auth::user()->role->designation == 'Coordonnateur National')
                            <div class="col-md-6">
                                @livewire('veto',['crime' => $crime])
                            </div>
                        @endif
                        @if (Auth::user()->role->designation == 'Chef d’Unité' || Auth::user()->role->designation == 'Agent d’une Unité')
                            <div class="col-md-6">
                                @livewire('validate',['crime' => $crime])
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3 mb-4">
            <a href="{{ route('crimes.index') }}" class="btn btn-dark"> <span>
                    <i class="fe fe-close"></i>
                </span><i class="fa fa-times"></i> Retour</a>
            <a href="{{ route('crimes.edit', $crime->uuid) }}" class="btn btn-primary">
                <i class="fa fa-edit"></i> Modifier</a>

            <button type="button" class="btn btn-danger  mb-1 p-3" data-toggle="modal"
                data-target="#exampleModalDelete{{ $crime->id }}"><i class="fa fa-trash"></i></button>
        </div>
    </div>
    <div class="modal" id="exampleModalDelete{{ $crime->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalDelete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalDelete">Suppression de {{ $crime->nom }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Etes-vous sûr de bien vouloir supprimer ce ?
                    </p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('crimes.destroy', $crime->uuid) }}" method="POST">
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
@endsection
@section('js')
    <!-- INTERNAL FORN WIZARD JS-->
    <script src="{{ URL::asset('assets/plugins/accordion/accordion.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/accordion/accordion.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/formwizard/jquery.smartWizard.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/formwizard/fromwizard.js') }}"></script>
    <!-- INTERNAL ACCORDION-WIZARD FORM JS -->
    <script src="{{ URL::asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/advancedform.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
    
    <script src="{{ URL::asset('assets/plugins/multipleselect/multi-select.js') }}"></script>
@endsection
<input id="long" type="hidden" value="{{ $crime->longitude }}">
<input id="lat" type="hidden" value="{{ $crime->latitude }}">
@push('ajax_crud')
    <script type="text/javascript">
        // On initialise la latitude et la longitude de Paris (centre de la carte)
        var lat = parseFloat(document.getElementById('lat').value);
        var lon = parseFloat(document.getElementById('long').value);
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
            var marker = L.marker([lon, lat]).addTo(macarte);
        }
        window.onload = function() {
            // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
            initMap();
        };
    </script>
    {{-- <script src="{{asset('js/jquery19.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/selectize.js') }}"></script>
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script>
                $('#mySelect2').selectize({
                        sortField : 'text'
                    });
                    function refreshSelectize() {
                   setTimeout(function (){
                    $('#mySelect2').selectize({
                        sortField : 'text'
                    });
                   },250)
               }
               window.addEventListener('refreshSelectize', event => {
                   setTimeout(function (){
                    $('#mySelect2').selectize()[0].selectize.destroy();
                    $('#mySelect2').selectize({
                        sortField : 'text',
                        valueField: 'id',
                        labelField: 'famille',
                        searchField: 'famille',
                        options : event.detail.especes,
                        create : false,
                        onChange :function(value){
                            var select = document.getElementById('mySelect2');
					 $(".log").append("Value:" + select.value+ "   "+ $('#mySelect2').val() + "<br />");
                    $(".log").append("Text:" +$("#mySelect2 option:selected").text() + "<br />");
					}
                    })
                    var selection = $('#mySelect2').selectize()[0].selectize;
                    var items = selection.getValue();
                    console.log(items);
                   },250)
                })
        
    </script>
@endpush
@push('livewirescript')
@livewireScripts
@endpush