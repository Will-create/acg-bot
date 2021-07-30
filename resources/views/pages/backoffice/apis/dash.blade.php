@extends('layouts.master4')

@section('content')
@include('partials._notification')
            <div class="row">
              @php
                  $couleurs = ['warning','secondary','primary'];
              @endphp
              @foreach ($apis as $api)
              <div class="col-xl-4 col-sm-6">
              <a style="color: #808080!important;" href="{{route('apis.show',$api->uuid)}}">
                  <div class="card">
                      <div class="card-body">
                        <div class="row mb-1">
                          <div class="col">
                          <p class="mb-1">{{$api->nom}}</p>
                           <small class="mb-0 number-font"> <b>{{$api->fournisseur}}</b></small>
                          </div>
                          <div class="col-auto mb-0">
                          <div class="dash-icon text-secondary">
                              <span class="nom_item_par_collapse badge badge-danger">
                                  {{count($api->sms)}} </span>
                              
                            </div>
                          </div>
                        </div>
                        {{-- <span class="fs-12 text-muted"> <strong>1.05%</strong><i class="mdi mdi-arrow-up"></i> <span class="text-muted fs-12 ml-0 mt-1">than last week</span></span> --}}
                      </div>
                    </div>
                </a>
              </div>
              @endforeach
            </div>
                 
@endsection
@section('js')
		<!-- INTERNAL CHARTJS CHART JS -->
		<script src="{{URL::asset('assets/plugins/chart/Chart.bundle.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/chart/utils.js')}}"></script>
		<!-- INTERNAL PIETY CHART JS -->
		<script src="{{URL::asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>
		<!-- INTERNAL APEXCHART JS -->
		{{-- <script src="{{URL::asset('assets/js/apexcharts.js')}}"></script> --}}
		<!--INTERNAL  INDEX JS -->
		{{-- <script src="{{URL::asset('assets/js/index1.js')}}"></script> --}}
@endsection
@push('ajax_crud')
<script src="{{asset('js/sweetalert.js')}}"></script>

@endpush
