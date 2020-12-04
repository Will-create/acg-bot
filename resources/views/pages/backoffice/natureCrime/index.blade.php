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
        <h1 class="page-title">Liste des types de crime</h1>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Type de crime</li>
        </ol>
    </div>

</div>
<!-- PAGE-HEADER END -->
@endsection
@section('content')

<!-- ROW-1 OPEN -->
<div id="loader" class="d-none">
    <div class="loader"></div>
  </div>
<div id="crimenature">

<div class="row">

    <div class="col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des types de crime</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
                        <thead>
                            <tr>
                                <th class="wd-15p">Désignation</th>
                                {{-- <th class="wd-15p">Description</th> --}}
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($naturesCrimes as $naturesCrime)

                            <tr>
                                <td>{{ucfirst($naturesCrime->nom)}}</td>
                                {{-- <td>{{ucfirst($naturesCrime->description)}}</td> --}}
                                {{-- <td>
                                    </a>
                                    <button class="btn btn-warning text-left btn-sm" data-toggle="modal"
                                        data-target="#largeModalDisplay{{$naturesCrime->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <div id="largeModalDisplay{{$naturesCrime->id}}" class="modal">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header pd-x-20">
                                                    <h6 class="modal-title text-center"> <strong> {{ucfirst($naturesCrime->nom)}} </strong>
                                                    </h6>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body pd-20">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <form
                                                                action="{{route('nature_crimes.update', $naturesCrime)}}"
                                                                method="post">
                                                                @csrf
                                                                @method('patch')
                                                                <input type="hidden" name="naturesCrime_id"
                                                                    value="{{$naturesCrime->id}}">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="designation">Désignation</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="nom"
                                                                                        placeholder="Désignation"
                                                                                        id="designation"
                                                                                        value="{{ucfirst($naturesCrime->nom)}}">
                                                                                    @error('nom')
                                                                                    <span class="helper-text red-text">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror
                                                                                </div>


                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="description">Description</label>
                                                                                    <textarea class="form-control"
                                                                                        name="description"
                                                                                        id="description" rows="4"
                                                                                        placeholder="Dites quelque chose sur ce moyen de paiement">{{$naturesCrime->description}}</textarea>

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
                                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                                        <span>
                                                                            <i class="fe fe-save"></i>
                                                                        </span> Mettre à jour</button>
                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        data-dismiss="modal">
                                                                        <span>
                                                                            <i class="fa fa-close"></i>

                                                                        </span>Fermer</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- MODAL DIALOG -->
                                    </div>


                                <button type="button" class="btn btn-danger btn-sm deletebuton" data-url="{{route('nature_crimes.destroy', $naturesCrime->id)}}" data-toggle="modal"
                                        data-target="#exampleModalDelete{{$naturesCrime->id}}"><i
                                            class="fa fa-trash"></i></button>


                                </td> --}}
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4">
        <form method="GET" id="post_crime">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="designation">Désignation</label>
                                <input type="text" class="form-control" name="nom" placeholder="Nature"
                                    id="nature" value="{{old('nature')}}" required>
                                @error('nom')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="4"
                                    placeholder=" Decrivez brièvement cet type  "></textarea>
                                @error('description')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" id="submit4" class="btn btn-primary"> <span>
                                    <i class="fe fe-save"></i>
                                </span> Enregistrer</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
<!-- ROW-1 CLOSED -->




<!-- LARGE MODAL -->
<div id="largeModalAddUser" class="modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title text-center">Ajouter un naturesCrime </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <div class="row">
                    <div class="col-md-12">



                    </div>
                </div>
            </div><!-- modal-body -->
            {{-- <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div> --}}
        </div>
    </div><!-- MODAL DIALOG -->
</div>
<!-- LARGE MODAL CLOSED -->

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


@endsection

@push('ajax_crud')
{{-- <script src="{{asset('js/jquery19.js')}}"></script> --}}
<script src="{{asset('js/sweetalert.js')}}"></script>

<script src="{{asset('js/ajax.js')}}"></script>
<script>
    $('.deletebuton').click( function () {
        var item = $(this);
        swal({
    title: "Confimer",
    text: " Voullez-vous supprimer cet enregistrement ? ",
    icon: "warning",
    buttons: ["Annuler", "Supprimer"],
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
        $('#loader').show();
      $.ajax({
          url: item.attr('data-url'),
          method: 'DELETE',
          data: { "_token": "{{ csrf_token() }}" },
          success: function (response) {
            item.parent().parent().hide();
            var url = '/nature_crimes';
          location.href = url;
            swal({
            position: 'center',
            icon: 'success',
            title: 'La donnée  a supprimée avec succès',
            button: false,
            timer: 2500
          })
           $('#loader').hide();
          },
          error: function(err){
              console.log('----------------------------error-------------------------');
              console.log(err);
              item.parent().parent().hide();
              var url = '/nature_crimes';
          location.href = url;
              swal({
            position: 'center',
            icon: 'success',
            title: 'La donnéé  a supprimée avec succès',
            button: false,
            timer: 2500
          })
          $('#loader').hide();
          }
        });
    }

    else {
    swal({
        position: 'center',
        icon: 'info',
        title: 'Suppression annulée',
        button:false,
        timer: 1500

    });
  }
  });
    })
</script>
@endpush
