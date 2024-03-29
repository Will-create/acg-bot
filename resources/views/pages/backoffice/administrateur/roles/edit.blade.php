
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
                @include('partials._notification')
				<div class="page-header">
					<div>
						<h1 class="page-title">Liste des Rôles</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Modifier le Rôle</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('roles.index')}}"  >  <span>
                            <i class="fe fe-list"></i>
                        </span>
                        Tous les Rôles</a>
                    </button>

					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')

<form action="{{route('roles.update',$role->uuid)}}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="designation">Designation <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="designation" placeholder="Nom" id="designation"  value="{{$role->designation}}" required>
                        @error('designation')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="designation">Description <strong class="text-danger">*</strong> </label>
                        <textarea name="description" id="" cols="30" class="form-control" placeholder="description" id="description"  rows="5"> {{$role->description}} </textarea>
                        {{-- <input type="text" class="form-control" name="description" placeholder="description" id="description"  value="{{$role->description}}" required> --}}
                        @error('description')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>





            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span>
            <i class="fe fe-save"></i>
        </span> Modifier</button>

    </div>
</form>
@stop
@section('js')
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>

    <!-- INTERNALPRISM JS -->
    <script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
        <!-- INTERNAL TELEPHONE JS -->
    <script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
@stop



