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
                    <h1 class="page-title">Liste des crimes</h1>
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
                                    <div id="smartwizard">
                                        <ul>
                                            <li><a href="#step-1">Informations générales</a></li>
                                            <li><a href="#step-2">Confiscations specimen</a></li>
                                            <li><a href="#step-3">Autres informations</a></li>
                                        </ul>
                                        <div>
                                            <div id="step-1" class="">
                                            <form  method="POST" id="form_setp_1">
                                                @csrf
                                                <input type="hidden" name="step" value="1">
                                                <input type="hidden" name="uuid">
                                                    <div class="row">
                                                        <div class="col-md-6">
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

                                                        @livewire('crime')

                                                        {{-- <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>   Pays d'appréhension  <span class="text-danger">*</span></label>
                                                                <select name="pays_apprehension"  class="form-control custom-select select2">
                                                                    <option value="" selected disabled> Séléctionnez un pays</option>
                                                                    @forelse ($pays as $pays_apprehension)
                                                                <option value="{{$pays_apprehension->id}}"> {{$pays_apprehension->nom}}</option>
                                                                    @empty
                                                                    Aucun pays disponible
                                                                    @endforelse
                                                                </select>
                                                            </div>
                                                        </div> --}}



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
                                                                <input type="text" name="localite_apprehension"  class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label> Longitude  <span class="text-danger"></span></label>
                                                                <input type="text" name="longitude" id="longitude" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label> Latitude <span class="text-danger"></span></label>
                                                                <input type="text" name="latitude" id="latitude" class="form-control" autocomplete="og">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-right">
                                                    <a href="{!! URL::previous() !!}" class="btn btn-info sw-btn-prev disabled"> Précedent</a>
                                                        <button type="submit" id="submt1" class="btn btn-primary"> Suivant</button>

                                                    </div>
                                                </form>
                                            </div>

                                            <div id="step-2" class="">
                                                <form  method="POST" id="form_setp_2">
                                                    @csrf
                                                <input type="hidden" name="step" value="2">
                                                <input id="uuid2" type="hidden" name="uuid">

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

                                                     <div class="row">
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label for="quantite"> Aires protégées d'origine du produits <span class="text-danger">*</span> </label>
                                                            <select name="aire_protegee_id"  class="form-control select2">
                                                                <option value="" disabled selected> Sélectionnez</option>
                                                                @forelse ($aires as $aire)
                                                            <option value="{{$aire->id}}">{{$aire->libelle}}</option>
                                                                @empty
                                                                Aucun pays
                                                                @endforelse
                                                            </select>
                                                            </div>
                                                     </div>
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label for="date_abattage">Date d’abattage/capture <span class="text-danger">*</span> </label>
                                                            <input type="date" name="date_abattage"  class="form-control">
                                                     </div>
                                                     </div>
                                                     </div>

                                                     <div class="row">
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label for="gestion_des_saisies"> Gestion des saisis <span class="text-danger">*</span> </label>
                                                            <select name="gestion_des_saisies"  class="form-control select2">

                                                                <option value="crime_type_reglement" disabled selected> Sélectionnez</option>
                                                                <option value="Détruit">Détruit</option>
                                                                <option value="Stocké">Stocké</option>
                                                             </select>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Conditions du produit</label>
                                                                <select multiple="multiple" class="multi-select" style="display: none;">
                                                                    <option value="1">poudre</option>
                                                                    <option value="2">feuille</option>
                                                                </select>
                                                                {{-- <div class="ms-parent multi-select" style="width: 79.45px;"><button type="button" class="ms-choice"><span class="">February, March, May</span><div class=""></div></button><div class="ms-drop bottom" style="display: none;"><ul style="max-height: 250px;"><li class="ms-select-all"><label><input type="checkbox" data-name="selectAll"> [Select all]</label></li><li class="" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="1"><span>January</span></label></li><li class="selected" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="2"><span>February</span></label></li><li class="selected" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="3"><span>March</span></label></li><li class="" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="4"><span>April</span></label></li><li class="selected" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="5"><span>May</span></label></li><li class="" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="6"><span>June</span></label></li><li class="" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="7"><span>July</span></label></li><li class="" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="8"><span>August</span></label></li><li class="" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="9"><span>September</span></label></li><li class="" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="10"><span>October</span></label></li><li class="" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="11"><span>November</span></label></li><li class="" style="false"><label class=""><input type="checkbox" data-name="selectItem" value="12"><span>December</span></label></li><li class="ms-no-results" style="display: none;">No matches found</li></ul></div></div> --}}
                                                            </div>
                                                         </div>

                                                     </div>


                                                   <div class="text-right">
                                                    <a href="{!! URL::previous() !!}" class="btn btn-info sw-btn-prev disabled"> Précedent</a>
                                                    <button type="submit" id="submit2" class="btn btn-primary"> Suivant</button>
                                                   </div>
                                                    </form>
                                                    </div>
                                            <div id="step-3" class="">
                                                <form  method="POST" id="form_setp_3">
                                                    @csrf
                                                <input type="hidden" name="step" value="3">
                                                <input type="hidden" name="uuid" id="uuid3" value="3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label for="lien_terrorisme"> Lien térrorisme <span class="text-danger">*</span> </label>
                                                            <select name="lien_terrorisme"  class="form-control select2">

                                                                <option value="" disabled selected> Sélectionnez</option>
                                                                <option value="1">Oui</option>
                                                                <option value="0">Non</option>
                                                             </select>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label for="veto"> Veto <span class="text-danger">*</span> </label>
                                                            <select name="veto"  class="form-control select2">

                                                                <option value="" disabled selected> Sélectionnez</option>
                                                                <option value="1">Oui</option>
                                                                <option value="0">Non</option>
                                                             </select>
                                                            </div>
                                                         </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Revenue <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" name="victime"   placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <a href="{!! URL::previous() !!}" class="btn btn-info sw-btn-prev disabled"> Précedent</a>
                                                        <button type="submit" id="submit3" class="btn btn-primary"> Suivant</button>
                                                       </div>
                                                </form>
                                            </div>
                                        </div>
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

{{-- <script>
    var $disabledResults = $(".js-example-disabled-results");
$disabledResults.select2();
</script> --}}


@endpush

@push('livewirescript')
@livewireScripts
@endpush
