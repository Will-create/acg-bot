@extends('layouts.master4', ['titrePage' => $titrePage])
@section('css')
    <!-- INTERNAL SELECT2 CSS -->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <!-- INTERNAL  DATA TABLE CSS-->
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
    <!-- INTERNAL PRISM CSS -->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!-- INTERNAL TELEPHONE CSS-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.css') }}">
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    @include('partials._notification')
    <div class="page-header">
        <div>
            <h1 class="page-title"> {!! $titrePage !!} </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('accueil') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('competitions.index') }}">Compétiton</a></li>
                <li class="breadcrumb-item active" aria-current="page"> {{ $btnAction }}</li>
            </ol>
        </div>
        <div class="ml-auto pageheader-btn">
            <a class="btn btn-primary" href="{{ route('competitions.index') }}"> <span>
                    <i class="fe fe-list"></i>
                </span> Toutes les competition</a>
            </button>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un Compétition</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <form action="{{ route('competitions.store') }}" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Compétition:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Fédération:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
          <button type="button" class="btn btn-primary">Envoyer</button>
        </div>
      </div>
    </div>
  </div>
@stop
{{-- CODE JS DE FILTRAGE --}}
@section('js')
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <!-- INTERNALPRISM JS -->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!-- INTERNAL TELEPHONE JS -->
    <script src="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>
@stop
