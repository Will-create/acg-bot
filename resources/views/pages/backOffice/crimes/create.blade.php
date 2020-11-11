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
                    <h1 class="page-title">df</h1>
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
							<div id="smartwizard">
								<ul>
									<li><a href="#step-1">Informations générales</a></li>
									<li><a href="#step-2">Information sur le produit</a></li>
									<li><a href="#step-3">Information sur le trafiquant</a></li>
								</ul>
								<div>
									<div id="step-1" class="">
                                    <form action="{{route('crimes.store')}}" method="POST">
                                        @csrf
                                            <div class="row">
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
                                            <div class="div">
                                            <a href="{{}}" class="btn btn-primary"> Suivant</a>
                                                <button type="submit" class="btn btn-primary"> Suivant</button>

                                            </div>
										</form>
									</div>

									<div id="step-2" class="">
										 <form action="" method="post">
                                             <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="quantite"> Pays d'origine du produit <span class="text-danger">*</span> </label>
                                                    <select name="" id="" class="form-control select2">
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
                                                    <label for="quantite"> Pays de destination du produit <span class="text-danger">*</span> </label>
                                                    <select name="" id="" class="form-control select2">
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
                                                    <select name="" id="" class="form-control select2">
                                                        <option value="" disabled selected> Sélectionnez</option>
                                                        @forelse ($unites as $unite_origine)
                                                    <option value="{{$unite_origine->id}}">{{$unite_origine->nom}}</option>
                                                        @empty
                                                        Aucun pays
                                                        @endforelse
                                                    </select>
                                                    </div>
                                             </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="quantite">Date d’abattage/capture <span class="text-danger">*</span> </label>
                                                    <input type="date" name="" id="" class="form-control">
                                             </div>
                                             </div>
                                             </div>

                                             <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="quantite"> Gestion des saisis <span class="text-danger">*</span> </label>
                                                    <select name="" id="" class="form-control select2">
                                                        <option value="" disabled selected> Sélectionnez</option>
                                                        <option value="detruit"> Détruit</option>
                                                        <option value="stocke"> Stocké</option>
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

                                             <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="quantite"> Pénalité <span class="text-danger">*</span> </label>
                                                    <select name="" id="" class="form-control select2">
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
                                         </form>
                                    </div>
                                    <div id="step-3" class="">
										<form>
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
