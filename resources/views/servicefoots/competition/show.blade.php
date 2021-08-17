@extends('layouts.master4')
@section('css')
<link rel="stylesheet" href="/css/servicefoot.css">
<style>
    .hauteur{
        height: auto;
    }
</style>
@endsection
@push('livewire')
@livewireStyles
@endpush
@section('page-header')
                <!-- PAGE-HEADER -->
                @include('partials._notification')
                    <div class="container">
                        <div class="page-header">
                            <div>
                            <h1 class="page-title text-dark">Details de compétition</h1>
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span>Servicefoot</li>
                                    <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span>Competition</li>
                                </ol>
                            </div>
                            <div class="ml-auto pageheader-btn">
                                @if (Auth::user()->role->id == 1 )
                                {{-- <a class="btn btn-primary" href="{{route('competitions.create')}}"  >  <span>
                                    <i class="fe fe-plus"></i>
                                </span>
                                Ajouter une compétition</a> --}}
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"> <i class="fe fe-plus"></i> Ajouter une date</button>
                                    @else
                                    <a href="{{ route('menus.index') }}" class="btn btn-primary"> <span>
                                        <i class="fe fe-close"></i>
                                    </span><i class="fa fa-times"></i> Retour</a>           
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une date</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="{{ route('date.store') }}" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Date de début:</label>
                                                <input type="date" name="date_debut" placeholder="Date du début d'une competition" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Date de fin:</label>
                                                <input type="date" name="date_fin" placeholder="Date de la fin d'une competition" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="competition_id" value="{{$competition->id}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="competition_uuid" value="{{$competition->uuid}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Retour</button>
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')
    <div class="row">
    @if (Auth::user()->role->id == 1 )
        <div class="col-md-4">
            <div class="card hauteur">
                <div class="card-body">
                    <h4 class="text-dark">{{$competition -> competition}}</h4>
                    <p>Fédération: {{$competition -> federation}}</p>
                    <p class="text-dark">Description de la compétition:</p>
                    <small>{{$competition -> description}}</small>
                    <div class="mt-5">
                        @livewire('servicefoot',['competition' => $competition])
                    </div>
                </div>
            </div>
        </div>
   @endif
        <div class="col-md-8">
            <div class="card hauteur">
                <div class="card-body">
                    <h3 class="text-center text-dark">ServiceFoot</h3>
                    <h3 class="text-center">Dates des prochaines Editions</h3>
                   @foreach ($dates as $date)
                   <h5 class="text-center">Du {{$date->date_debut}}------au------{{$date->date_fin}}</h5>
                   @endforeach
                </div>
            </div>
        </div>
    </div>


    @if (Auth::user()->role->id == 1 )
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 mb-4">
            <div class="row">
                <div class="d-flex">
                    <div class="col-md-4 mr-5">
                        <a href="{{ route('competitions.index') }}" class="btn btn-dark"> <span>
                            <i class="fe fe-close"></i> </span><i class="fa fa-times"></i> Retour</a>
                    </div>
                    {{--  <div class="col-md-4 mr-5">
                        <a href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"> <i class="fe fe-plus"></i>  <i class="fa fa-edit"></i> Modifier</a>
                    </div>  --}}
                    <div class="col-md-4">
                        <button type="button" class="btn btn-danger  mb-1" data-toggle="modal"
                        data-target="#exampleModalDelete"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="modal" id="exampleModalDelete" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalDelete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalDelete">Suppression de {{ $competition-> competition }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Etes-vous sûr de bien vouloir supprimer cette Compétition ?
                    </p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash"></i>
                            <span>Confirmer</span>
                        </button>
                        <button type="reset" class="btn btn-success" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                            <span>Annuler</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
     <!-- INTERNAL  DATA TABLE JS-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
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
@push('livewirescript')
@livewireScripts
@endpush