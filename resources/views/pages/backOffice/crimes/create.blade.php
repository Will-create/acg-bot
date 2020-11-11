@extends('layouts.master4')
@section('css')
		<!-- FORN WIZARD CSS -->
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard_theme_arrows.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard_theme_circles.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/formwizard/smart_wizard_theme_dots.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/forn-wizard/css/demo.css')}}" rel="stylesheet">
@endsection
@section('page-header')
			<!-- PAGE-HEADER -->
			<div class="page-header">
                <div>
                    <h1 class="page-title">Nouveau crime</h1>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Espèces Animales</li>
                    </ol>
                </div>
                <div class="ml-auto pageheader-btn">
                <a class="btn btn-primary" href="{{route('espece_animales.create')}}">  <span>
                        <i class="fe fe-plus"></i>
                    </span>
                    Ajouter une Espèces Animale</a>


                </button>

                </div>
            </div>
@endsection
@section('content')
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Default Form Wizard</h3>
						</div>
						<div class="card-body">
                            <div id="loader" class="d-none">
                                <div class="loader"></div>
                              </div>
							<div id="smartwizard">
								<ul>
									<li><a href="#step-1">Informations générales</a></li>
									<li><a href="#step-2">Information sur le produit</a></li>
									<li><a href="#step-3">Information sur le trafiquant</a></li>
								</ul>
								<div>
									<div id="step-1" class="">
                                    <form  method="POST" id="form_setp_1">

                                        @csrf
                                        <input type="hidden" name="step" value="1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>   Pays d'appréhension  <span class="text-danger">*</span></label>
                                                        <select name="pays_appréhension" id="" class="form-control custom-select select2">
                                                            <option value="" selected disabled> Séléctionnez un pays</option>
                                                            @forelse ($pays as $pays_apprehension)
                                                        <option value="{{$pays_apprehension->id}}"> {{$pays_apprehension->nom}}</option>
                                                            @empty
                                                            Aucun pays disponible
                                                            @endforelse
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>  Code ISO3 du pays appréhension  <span class="text-danger">*</span></label>
                                                        <input type="text" name="codeiso3_pays_apprehension" id="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>  Services Investigateurs  <span class="text-danger">*</span></label>
                                                        <select name="espece" id="" class="form-control custom-select select2">
                                                            <option value="unite"  selected> Mon unité</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>  Espèce trafiquée  <span class="text-danger">*</span></label>
                                                        <select name="espece" id="" class="form-control custom-select select2">
                                                            <option value="" disabled selected> Sélectionnez</option>
                                                          <option value="animal">Espèce animale</option>
                                                          <option value="vegetal">Espèce végétale</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>   Date d'apprehension  <span class="text-danger">*</span></label>
                                                        <input type="date" name="date_apprehension" id="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Localité d'aprrehension <span class="text-danger">*</span></label>
                                                        <input type="text" name="localite_aprrehension" id="" class="form-control">
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
                                                <button type="submit" id="submit1" class="btn btn-primary"> Suivant</button>

                                            </div>
										</form>
									</div>

									<div id="step-2" class="">
                                        <form  method="POST" id="form_setp_2">
                                            @csrf
                                        <input type="hidden" name="step" value="2">

                                             <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="pays_origine_produit"> Pays d'origine du produit <span class="text-danger">*</span> </label>
                                                    <select name="pays_origine_produit" id="" class="form-control select2">
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
                                                    <select name="pays_destination" id="" class="form-control select2">
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
                                                    <select name="unite_id" id="" class="form-control select2">
                                                        <option value="" disabled selected> Sélectionnez</option>
                                                        @forelse ($unites as $unite_origine)
                                                    <option value="{{$unite_origine->id}}">{{$unite_origine->designation}}</option>
                                                        @empty
                                                        Aucun pays
                                                        @endforelse
                                                    </select>
                                                    </div>
                                             </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="date_abattage">Date d’abattage/capture <span class="text-danger">*</span> </label>
                                                    <input type="date" name="date_abattage" id="" class="form-control">
                                             </div>
                                             </div>
                                             </div>

                                             <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="quantite"> Gestion des saisis <span class="text-danger">*</span> </label>
                                                    <select name="" id="" class="form-control select2">

                                                        <option value="crime_type_reglement" disabled selected> Sélectionnez</option>
                                                        @foreach ($crime_type_reglements as $crime_type_reglement)
                                                        <option value="{{$crime_type_reglement->type}}"> {{$crime_type_reglement->type}}</option>

                                                        @endforeach
                                                    </select>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="quantite"> Gestion des saisis <span class="text-danger">*</span> </label>
                                                    <select name="crime_type_suite" id="" class="form-control select2">

                                                        <option value="" disabled selected> Sélectionnez</option>
                                                        @foreach ($crime_type_reglements as $crime_type_suite)
                                                        <option value="{{$crime_type_suite->suite }}"> {{$crime_type_suite->suite }}</option>

                                                        @endforeach
                                                    </select>
                                                    </div>
                                                 </div>

                                             </div>

                                             <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="penalite"> Pénalité <span class="text-danger">*</span> </label>
                                                    <select name="form" id="" class="form-control select2">
                                                        <option value="" disabled selected> Sélectionnez</option>
                                                        <option value="amende"> Amende</option>
                                                        <option value="emprisonnement"> Emprisonnement</option>
                                                    </select>
                                                    </div>
                                             </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="quantite">Arme légère à petit calibre utilisée<span class="text-danger">*</span> </label>
                                                    <input type="text" name="" id="" class="form-control">
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

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nom <span class="text-danger">*</span> </label>
                                                        <input type="text" class="form-control" name="nom" id="inputtext3" placeholder="Nom du trafiquant">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Prenom <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="prenom" id="inputtext3" placeholder="Nom du trafiquant">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Sexe <span class="text-danger">*</span></label>
                                                        <select name="genre" id="" class="form-control select2">
                                                            <option value="maxculin"> Maxculin </option>
                                                            <option value="feminin"> Feminin </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Age <span class="text-danger">*</span> </label>
                                                        <input type="text" class="form-control" name="age" id="inputtext3" placeholder="Nom du trafiquant">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nationalité <span class="text-danger">*</span> </label>
                                                        <input type="text" class="form-control" name="nationalite"   placeholder="Nationalité du trafiquant">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> <span class="text-danger"></span> </label>
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                Education
                                                                <div class="material-switch pull-right">
                                                                    <input id="someSwitchOptionPrimary" name="someSwitchOption001" type="checkbox">
                                                                    <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> <span class="text-danger"></span> </label>

                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                Voyageur international
                                                                <div class="material-switch pull-right">
                                                                    <input id="someSwitchOptionSuccess" name="voyageur_international" type="checkbox">
                                                                    <label for="someSwitchOptionSuccess" class="label-primary"></label>
                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Revenue <span class="text-danger">*</span> </label>
                                                        <input type="number" class="form-control" name="Revenue"   placeholder="Nationalité du trafiquant">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Nombre de complice <span class="text-danger">*</span> </label>
                                                        <input type="number" name="" id="" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Intention <span class="text-danger">*</span> </label>
                                                        <select name="" id="" class="form-control select2">
                                                            <option value="" disabled selected> Sélectionnez</option>
                                                            <option value="" > Prêt à abondonner </option>
                                                            <option value=""> mordu du braconnage ou du trafic</option>
                                                        </select>
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

@endsection
@section('js')
		<!-- INTERNAL FORN WIZARD JS-->
		<script src="{{URL::asset('assets/plugins/formwizard/jquery.smartWizard.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/formwizard/fromwizard.js')}}"></script>

		<!-- INTERNAL ACCORDION-WIZARD FORM JS -->
		<script src="{{URL::asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js')}}"></script>

		<!--INTERNAL  ADVANCED FORM JS -->
		<script src="{{URL::asset('assets/js/advancedform.js')}}"></script>
@endsection


@push('ajax_crud')
{{-- <script src="{{asset('js/jquery19.js')}}"></script> --}}
<script src="{{asset('js/sweetalert.js')}}"></script>

<script src="{{asset('js/ajax.js')}}"></script>
@endpush
