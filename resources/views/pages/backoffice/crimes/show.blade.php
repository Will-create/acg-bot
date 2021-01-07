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
                                          @include('pages.backoffice.confiscations.crimeConfiscation')
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h3>Armes matérielles</h3>
                                        </div>
                                        <div>
                                            <!-- Your text here. For this demo, the content is generated automatically. -->
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
