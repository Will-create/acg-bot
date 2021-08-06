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
				<div class="col-12">
						<div class="card-header">
							{{-- <h3 class="card-title">Default Form Wizard</h3> --}}
						</div>
						<div class="card-body">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card">
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

						</div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Recent Orders</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover text-nowrap mb-0">
									<thead>
										<tr>
											<th>Customer</th>
											<th>Invoice ID</th>
											<th>Category</th>
											<th>Date</th>
											<th>Price</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<img src="http://localhost:3000/assets/images/users/3.jpg" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Vashti Riccio
											</td>
											<td>#89345</td>
											<td>Sport Shooes</td>
											<td>07-02-2020</td>
											<td class="font-weight-semibold fs-15">$893</td>
											<td>
												<a href="#" class="badge badge-danger">Pending</a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="http://localhost:3000/assets/images/users/4.jpg" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Harriett Lauver
											</td>
											<td>#39281</td>
											<td>T-Shirt</td>
											<td>12-01-2020</td>
											<td class="font-weight-semibold fs-15">$254</td>
											<td>
												<a href="#" class="badge badge-primary">Delivered</a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="http://localhost:3000/assets/images/users/5.jpg" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Darci Faw
											</td>
											<td>#35825</td>
											<td>Hand Bag</td>
											<td>15-01-2020</td>
											<td class="font-weight-semibold fs-15">$352</td>
											<td>
												<a href="#" class="badge badge-primary">Delivered</a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="http://localhost:3000/assets/images/users/6.jpg" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Jamie Norville
											</td>
											<td>#62391</td>
											<td>Lather Watch</td>
											<td>10-01-2020</td>
											<td class="font-weight-semibold fs-15">$643</td>
											<td>
												<a href="#" class="badge badge-danger">Pending</a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="http://localhost:3000/assets/images/users/7.jpg" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Danae Kaba
											</td>
											<td>#92481</td>
											<td>Laptop</td>
											<td>07-01-2020</td>
											<td class="font-weight-semibold fs-15">$392</td>
											<td>
												<a href="#" class="badge badge-primary">Completed</a>
											</td>
										</tr>
										<tr>
											<td>
												<img src="http://localhost:3000/assets/images/users/8.jpg" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
												Jeromy Tricarico
											</td>
											<td>#29381</td>
											<td>Office Chair</td>
											<td>31-02-2020</td>
											<td class="font-weight-semibold fs-15">$295</td>
											<td>
												<a href="#" class="badge badge-danger">Pending</a>
											</td>
										</tr>
									</tbody>
								</table>
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
