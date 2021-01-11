@extends('layouts.master4')
@section('css')
        <!-- FORN WIZARD CSS -->
		<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard_theme_arrows.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard_theme_circles.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard_theme_dots.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/plugins/forn-wizard/css/demo.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('assets/plugins/multipleselect/multiple-select.css')}}">
		<link href="{{URL::asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />
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
                    <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
                    </ol>
                </div>
                <div class="ml-auto pageheader-btn">
                <a class="btn btn-primary" href="{{route('especes.create')}}">  <span>
                        <i class="fe fe-plus"></i>
                    </span>
                   Enregistrer un crime</a>
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
                <dl class="dl-crime">
                    <strong class="text-center">{{$crime->type->nom}}</strong> <br>
                    <dt>Date d'appréhension :</dt>
                    <dd> {{formatDate($crime->date_apprehension)}}
                    </dd>
                    <dt>Localité d'appréhension :</dt>
                    <dd> {{ucFirst($crime->service_investigateur->designation)}}</dd>
                    <dt>Service investigateur :</dt>
                    <dd>
                        {{ucFirst($crime->localite_aprrehension)}}
                    </dd>
                    <dt>Espèce impliquées :</dt>
                    <dd>
                        {{ucFirst($crime->localite_aprrehension)}}
                    </dd>
                </dl>
            </div>
        </div>
        <div class:="tab-content">
            <div class="tab-pane" id="tab-51">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('commentaires.store')}}" method="post">
                            @csrf
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="pour">Destinataire <strong class="text-danger">*</strong></label>
                                        <select name="pour" id="pour" class="form-control custom-select select2">
                                            <option  value="{{Route::currentRouteName() == 'commentaires.edit' ? $commentaire->pour : '' }}" {{Route::currentRouteName() == 'commentaires.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'commentaires.edit' ? $commentaire->destinataire->nom.'  '.$commentaire->destinataire->prenom.' ('.$commentaire->destinataire->role->designation.') ' : 'Sélectionner' }}</option>
                                            @foreach ($destinataires as $destinataire) 
                                            <option  value="{{$destinataire->id}}"> <span class="red-text">{{$destinataire->nom}} {{$destinataire->prenom}} ({{$destinataire->role->designation}})
                                                @endforeach
                                            </select>
                                            @error('pour')
                                            <span class="helper-text red-text">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        
                                        <textarea rows="2" type="text" class="form-control" name="commentaire"
                                            placeholder="Commentaire" id="commentaire"
                                            required></textarea>
                                                @error('commentaire')
                                            <span class="helper-text red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
    
                            </div>
                            <input type="hidden" name="crime_id" value="{{$crime->id}}">
                            <div class="text-right">
                                <button class="btn btn-primary" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</button> 
                            </div>
                            <br>
                        </form>
                        <br>
                        @if ($commentaires->count() < 1)
                        <h3 class="page-title">Commentaires (0) </h3>
                        <span class="">Aucun commentaire n'est disponible pour le moment</span>
                        @else
                              <h3 class="page-title">Commentaires ({{$commentaires->count()}}) </h3>
                              <div id="accordion">
                               @foreach($commentaires as $commentaire)
                               <div class="card">
                                <div class="card-header" id="heading{{$commentaire->id}}">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$commentaire->id}}" aria-expanded="true" aria-controls="collapse{{$commentaire->id}}">
                                      <span class="m-b-15 d-block text-dark">{{ ucfirst(substr($commentaire->commentaire, 0,28)) }}... </span>
                                    </button>
                                  </h5>
                                </div>
                                <div id="collapse{{$commentaire->id}}" class="collapse" aria-labelledby="heading{{$commentaire->id}}" data-parent="#accordion">
                                  <div class="card-body">
                                      <div class="d-flex flex-row comment-row m-t-0">
                                          <a class="text-dark" href="{{ route('utilisateurs.show', $commentaire->auteur->uuid) }}" data-toggle="tooltip" data-placement="top" title="{{$commentaire->auteur->nom}} {{$commentaire->auteur->prenom}}({{$commentaire->auteur->role->designation}})">
                                              <div class="p-2"><img   src="{{asset( $commentaire->auteur->profile_photo_path)}}" alt="user" height="40" width="50" class="rounded-circle"></div>
                                          </a> <br>
                                          <div class="comment-text w-100">
                                              <div class="comment-footer">
                                                    <span class="m-b-15 d-block" style="background-color: rgb(241, 255, 251); border-radius:.5em; padding:1.5em; text-align:center;">{{ ucfirst($commentaire->commentaire)  }} 
                                                    </span> 
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <br><br> <span class="text-muted float-right">{{$commentaire->created_at->format(' d M Y h:i:s')}}</span> 
                                    </a><a class="text-dark" href="{{route('utilisateurs.show', $commentaire->destinataire->uuid)}}">Pour: {{$commentaire->destinataire->nom}} {{$commentaire->destinataire->prenom}}({{$commentaire->destinataire->role->designation}})
                                  </div>
                                </div>
                              </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Détails</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="card-body">
                                <ul class="demo-accordion accordionjs m-0">
                                    <li>
                                        <div>
                                            <h3>Especes</h3>
                                        </div>
                                        <div>
                                            @livewire('regne-espece', ['crime'  => $crime])
                                             <br>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h3>Auteurs du crimes</h3>
                                        </div>

                                        <div>
                                            <div class="text-right">
                                                <a href="{{route('crime_auteurs.create', ['crime' => $crime->uuid])}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
                                            </div>
                                            <br>
                                            @include('pages.backoffice.auteurs.crimeAuteu', ['crime'  => $crime])
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h3>Specimens confisqués</h3>
                                        </div>
                                        <div>
                                            <div class="text-right">
                                                <a href="{{route('confiscations.create', ['crime' => $crime->uuid])}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
                                            </div>
                                          @include('pages.backoffice.confiscations.crimeConfiscation',['crime' => $crime])
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h3>Armes matérielles</h3>
                                        </div>
                                        <div>

                                            <div>
                                        {{-- @include('partials._notification') --}}

                                                <div class="text-right">
                                                    <a href="{{route('crime.armes.create', ['crime' => $crime])}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
                                                </div>
                                                <br>
                                                @include('pages.backoffice.armes.listearme', ['armes' => $armes])
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h3>Réglements</h3>
                                        </div>
                                        <div>
                                            <!-- Your text here. For this demo, the content is generated automatically. -->
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div><!-- COL-END -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
        <!-- INTERNAL FORN WIZARD JS-->
        <script src="{{URL::asset('assets/plugins/accordion/accordion.min.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/accordion/accordion.js')}}"></script>

		<script src="{{URL::asset('assets/plugins/formwizard/jquery.smartWizard.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/formwizard/fromwizard.js')}}"></script>

		<!-- INTERNAL ACCORDION-WIZARD FORM JS -->
		<script src="{{URL::asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js')}}"></script>


        <script src="{{URL::asset('assets/js/advancedform.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/multipleselect/multiple-select.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/multipleselect/multi-select.js')}}"></script>


@endsection


@push('ajax_crud')
{{-- <script src="{{asset('js/jquery19.js')}}"></script> --}}
<script src="{{asset('js/sweetalert.js')}}"></script>
<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="{{asset('js/ajax.js')}}"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    $('#mySelect2').select2('data');
    $('#mySelect2').find(':selected');

    $('.js-example-basic-confiscation').select2();
    // $('#mySelect2confiscation').select2('data');
    // $('#mySelect2confiscation').find(':selected');

});
        window.addEventListener('contentChanged', event => {
            $('.js-example-basic-single').select2();
        });
</script>
@endpush

@push('livewirescript')
@livewireScripts
@endpush
