
@extends('layouts.master4')
@section('css')
        <!-- INTERNAL SELECT2 CSS -->
		<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
		<!-- INTERNAL  DATA TABLE CSS-->
		<link href="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
        <link href="{{URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
          <!-- INTERNAL PRISM CSS -->
          <link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
          	<!-- INTERNAL TELEPHONE CSS-->
		<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.css')}}">
@endsection
@section('page-header')
                <!-- PAGE-HEADER -->
				<div class="page-header">
					<div>
						<h1 class="page-title">Liste des crimes </h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">crime environnemental</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    </button>
					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')
@include('partials._notification')
@include('partials._notification')
<!-- ROW-1 OPEN -->
<div class="row">
    {{-- <div class="col-md-6">
        <iframe src="http://localhost:5601/app/dashboards#/create?embed=true&_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-15m,to:now))&_a=(description:'',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),panels:!((embeddableConfig:(title:'Nombre%20de%20crime%20par%20pays'),gridData:(h:15,i:e15a6015-5ed9-4ed5-b621-45c7ac804a4f,w:24,x:0,y:0),id:'89cdd4e0-5745-11eb-9f9a-016191b0374e',panelIndex:e15a6015-5ed9-4ed5-b621-45c7ac804a4f,title:'Nombre%20de%20crime%20par%20pays',type:visualization,version:'7.9.3')),query:(language:kuery,query:''),timeRestore:!f,title:'',viewMode:edit)" height="600" width="800"></iframe>
    </div> --}}
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des Crimes</h3>
            </div>
            @php
                $i = 1;
            @endphp
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
                        <thead>
                            <tr>
                                <th class="wd-15p">Ordre</th>
                                
                                <th class="wd-15p">Pays d'appréhension</th>
                                <th class="wd-15p">Nombre d'espèces impliquées</th>
                                <th class="wd-15p">Règlement</th>
                                <th class="wd-15p">Confiscation</th>
                                <th class="wd-15p" >Service investigateur</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($crimes as $crime)
                            @php
                        $crimeEspeces =  \App\Models\CrimeEspece::latest()->where('crime_id', $crime->id)->get()
                            @endphp
                            <tr>
                                <td>{{$i++}}</td>
                                <td> <a class="text-dark" href="{{route('crimes.show', $crime->uuid)}}"> {{$crime->paysApprehension ? ucfirst($crime->paysApprehension->nom) : ''}} </a></td>
                                <td> <a class="text-dark" href="{{route('crimes.show', $crime->uuid)}}"> {{count($crimeEspeces)}} </a></td>
                                <td> <a class="text-dark" href="{{route('crimes.show', $crime->uuid)}}"> {{ $crime->reglement  ? count($crime->reglement)  :''}}</a></td>
                                <td> <a class="text-dark" href="{{route('crimes.show', $crime->uuid)}}"> {{ $crime->confiscations  ? count($crime->confiscations)  :''}}</a></td>
                                <td> <a class="text-dark" href="{{route('crimes.show', $crime->uuid)}}"> {{$crime->service_investigateur ?  $crime->service_investigateur->designation  :''}}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- TABLE WRAPPER -->
        </div>
        <!-- SECTION WRAPPER -->
    </div>
</div>
@endsection
@section('js')
     <!-- INTERNAL  DATA TABLE JS-->
    <script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/datatable.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
    <!-- INTERNALPRISM JS -->
    <script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
        <!-- INTERNAL TELEPHONE JS -->
    <script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
    <script type="text/javascript">
    var modal = document.getElementById('largeModalAddUser');
        @if (count($errors) > 0)
            $('#largeModalAddUser').modal('show');
            modal.classList.add("show");
        @endif
        </script>
@endsection
