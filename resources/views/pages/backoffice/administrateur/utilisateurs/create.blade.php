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
        <h1 class="page-title">Liste des agents </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$titrePage}}</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <a class="btn btn-primary" href="{{route('utilisateurs.index')}}"> <span>
                <i class="fe fe-list"></i>
            </span>
            Les agents</a>
        </button>

    </div>
</div>
<!-- PAGE-HEADER END -->
@endsection
@section('content')
<form action="{{route('utilisateurs.store')}}" method="post" enctype="multipart/form-data">
    @csrf
   @include('pages.backoffice.administrateur.utilisateurs.form',['roles'=> $roles])
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span>
                <i class="fe fe-save"></i>
            </span> Enregistrer</button>

    </div>
</form>
@stop
