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

@endsection
@push('livewire')
@livewireStyles
@endpush
@section('page-header')
			<!-- PAGE-HEADER -->
			<div class="page-header">
                <div>
                    <h1 class="page-title">Crime</h1>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
                    </ol>
                </div>
                <div class="ml-auto pageheader-btn">
                <a class="btn btn-primary" href="{{route('crimes.index')}}">  <span>
                        <i class="fe fe-plus"></i>
                    </span>
                   Tous les crimes</a>
                </button>

                </div>
            </div>
@endsection
@section('content')
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							{{-- <h3 class="card-title">Default Form Wizard</h3> --}}
						</div>
						<div class="card-body">
                            <div id="loader" class="d-none">
                                <div class="loader"></div>
                              </div>
                                <div >
                                {{-- <livewire:crime/> --}}
                                <div>
                                    <div id="smartwizard" class="">
                                        <form method="POST"   id="form_setp_1">
                                            @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>   Type de crime  <span class="text-danger">*</span></label>
                                                    <select name="type_id"  class="form-control custom-select select2">
                                                        <option value="" selected disabled> Séléctionnez un type de crime</option>
                                                        @forelse ($typeCrimes as $typeCrime)
                                                    <option value="{{$typeCrime->id}}"> {{$typeCrime->nom}}</option>
                                                        @empty
                                                        Aucun pays disponible
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- @livewire('crime') --}}

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>   Date d'apprehension  <span class="text-danger">*</span></label>
                                                    <input type="date" name="date_apprehension"  class="form-control">
                                                </div>
                                            </div>

                                                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Localité d'aprrehension <span class="text-danger">*</span></label>
                                                    <input type="text" name="localite_apprehension"  class="form-control" placeholder="Ex Ouagadougou">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Longitude  <span class="text-danger"></span></label>
                                                    <input type="text" name="longitude" id="longitude" class="form-control" placeholder=" Ex. 12.336770681743598">
                                                    <div class="row ml-1">
                                                        <a href="https://www.google.com/maps" target="_blank">Trouver une position</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Latitude <span class="text-danger"></span></label>
                                                    <input type="text" name="latitude" id="latitude" class="form-control" placeholder=" Ex. -1.510282283797802">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                               <div class="form-group">
                                               <label for="pays_origine_produit"> Pays d'origine du produit <span class="text-danger">*</span> </label>
                                               <select name="pays_origine_produit"  class="form-control select2">
                                                   <option value="" disabled selected> Sélectionnez</option>
                                                   @forelse ($pays as $pays_origine)
                                               <option value="{{$pays_origine->id}}">{{$pays_origine->nom}}</option>
                                                   @empty
                                                   Aucun pays
                                                   @endforelse
                                               </select>
                                               </div>
                                        </div>
                                            <div class="col-md-6">
                                               <div class="form-group">
                                               <label for="pays_destination"> Pays de destination du produit <span class="text-danger">*</span> </label>
                                               <select name="pays_destination"  class="form-control select2">
                                                   <option value="" disabled selected> Sélectionnez</option>
                                                   @forelse ($pays as $pays_destination)
                                               <option value="{{$pays_destination->id}}">{{$pays_destination->nom}}</option>
                                                   @empty
                                                   Aucun pays
                                                   @endforelse
                                               </select>
                                               </div>
                                        </div>
                                        </div>
                                        <div class="text-right">
                                    <button type="submit" class="btn btn-primary" id="submit1">Poursuivre</button>

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>

@endsection
@section('js')
		<!-- INTERNAL FORN WIZARD JS-->
		<script src="{{URL::asset('assets/plugins/formwizard/jquery.smartWizard.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/formwizard/fromwizard.js')}}"></script>
		<!-- INTERNAL ACCORDION-WIZARD FORM JS -->
		<script src="{{URL::asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js')}}"></script>
        <!--INTERNAL  ADVANCED FORM JS -->
        	<!--INTERNAL  FORMELEMENTS JS -->
		{{-- <script src="{{URL::asset('assets/js/form-elements.js')}}"></script> --}}
		{{-- <script src="{{URL::asset('assets/js/select2.js')}}"></script> --}}
        <script src="{{URL::asset('assets/js/advancedform.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/multipleselect/multiple-select.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/multipleselect/multi-select.js')}}"></script>

@endsection


@push('ajax_crud')
{{-- <script src="{{asset('js/jquery19.js')}}"></script> --}}
<script src="{{asset('js/sweetalert.js')}}"></script>
<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

<script src="{{asset('js/ajax.js')}}"></script>




@endpush

@push('livewirescript')
@livewireScripts
@endpush
