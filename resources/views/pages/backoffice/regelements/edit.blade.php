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
                    <h1 class="page-title">Règlement de crime</h1>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
                    </ol>
                </div>
                <div class="ml-auto pageheader-btn">
                <a class="btn btn-primary" href="{{route('crimes.show', $crimeTypeReglement->crime->uuid)}}">  <span>
                        <i class="fe fe-plus"></i>
                    </span>
                   Revenir au crime</a>
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
                            <div>
                                <div class="row">
                                    @include('partials._notification')
                                </div>
                                <br>
                                <form method="POST" action="{{route('crime_reglements.update', $crimeTypeReglement)}}">
                                    @csrf
                                    @method('patch')
                                    <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>   Auteur  <span class="text-danger">*</span></label>
                                        <select   name="auteur"  class="form-control custom-select select2">
                                        <option value="{{$crimeTypeReglement->auteur->id}}"> {{$crimeTypeReglement->auteur->nom. ' '. $crimeTypeReglement->auteur->nom }}</option>
                                        @forelse ($crimeTypeReglement->crime->auteurs as $auteur)
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
                                        <select   name="reglement"  class="form-control custom-select select2">
                                            <option value="{{$crimeTypeReglement->mode->id}}"> {{$crimeTypeReglement->mode->mode }}</option>
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
                                <div class="col-md-6">
                                    <div class=" ">
                                        <label>   Suite  <span class="text-danger">*</span></label>
                                            <select class="js-example-basic-singl form-control select-lg custom-select"  style="width: 100%" id="mySelect2">
                                                <option value="{{  $crimeTypeReglement->suite ? $crimeTypeReglement->suite->id : '' }}"> {{$crimeTypeReglement->suite ? $crimeTypeReglement->suite->decision: '' }}</option>
                                                @forelse ($suites as $suite)
                                        <option value="{{$suite->id}}"> {{$suite->decision}}</option>
                                            @empty
                                            Aucune suite disponible
                                            @endforelse
                                              </select>
                                              @error('suite') <span class="error text-danger">{{ $message }}</span> @enderror

                                    </div>
                                </div>
                                <div class="col-md-6" >
                                    <div class="form-group">
                                        <label>   Amende  <span class="text-danger">*</span></label>
                                           <input type="number" name="amende" id="" class="form-control" value="{{$crimeTypeReglement->amende}}">
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
