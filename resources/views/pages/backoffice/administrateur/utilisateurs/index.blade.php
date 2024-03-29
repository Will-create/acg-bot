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
						<h1 class="page-title">{{$titrePage}}</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">utilisateurs</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('utilisateurs.create')}}"  >  <span>
                            <i class="fe fe-plus"></i>
                        </span>
                        Ajouter un agent</a>
                    </button>
					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')


				<!-- ROW-1 OPEN -->
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Liste des agents</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
								@if (count($utilisateurs) > 0)
                                <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Nom</th>
                                            <th class="wd-15p">Prénom</th>
                                            <th class="wd-20p">Email</th>
                                            <th class="wd-20p">Role</th>
                                            <th class="wd-15p">Téléphone</th>
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($utilisateurs as $utilisateur)
                                        <tr>
                                            <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails de l'utilisateur" href="{{route('utilisateurs.show', $utilisateur)}}"> {{$utilisateur->nom}} </a></td>
                                            <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails de l'utilisateur" href="{{route('utilisateurs.show', $utilisateur)}}">{{$utilisateur->prenom}} </a></td>
                                            <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails de l'utilisateur" href="{{route('utilisateurs.show', $utilisateur)}}">{{$utilisateur->email}} </a></td>
                                            <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails de l'utilisateur" href="{{route('utilisateurs.show', $utilisateur)}}">{{$utilisateur->role->designation}} </a></td>
                   <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails de l'utilisateur" href="{{route('utilisateurs.show', $utilisateur)}}">{{$utilisateur->tel}} </a></td>
                                            {{-- <td>
                                                <a href="{{route('gerer-utilisateur', $utilisateur)}}" class="badge {{$utilisateur->actif ? 'badge-success':'badge-danger'}}" title="{{$utilisateur->actif ? 'Cliquer pour désactiver':'CLiquer pour activer'}}">{{$utilisateur->actif ? 'Ativé':'Désactivé'}}  </a>
                                                <button type="button" class="badge handleAcount {{$utilisateur->actif ?  'badge-success':'badge-danger'}}" data-toggle="tooltip" data-placement="top" title="{{$utilisateur->actif ? 'Cliquer pour désactiver':'Cliquer pour activer'}}" data-status="{{$utilisateur->actif ? 'Désactiver':'Activer'}}"   data-url="{{route('gerer-utilisateur', $utilisateur)}}" data-toggle="modal" data-clocation="{{url()->current()}}"
                                                     style="border:none">  {{$utilisateur->actif ? 'Ativé':'Désactivé'}}</button>
                                                <a href="{{route('gerer-utilisateur', $utilisateur)}}" class="badge {{$utilisateur->actif ? 'badge-success':'badge-danger'}}" data-toggle="tooltip" data-placement="top" title="{{$utilisateur->actif ? 'Cliquer pour désactiver':'Cliquer pour activer'}}">{{$utilisateur->actif ? 'Ativé':'Désactivé'}}  </a>
                                            </td> --}}
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @else
<div class="text-center">
    <span>Aucun agent ajouté</span>
</div>
                                @endif
								</div>
							</div>
							<!-- TABLE WRAPPER -->
						</div>
						<!-- SECTION WRAPPER -->
					</div>
				</div>
			 {{-- @include('pages.backOffice.administrateur.utilisateurs._modelCreationUtilisateur') --}}
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
    // var modal = document.getElementById('largeModalAddUser');
    //     @if (count($errors) > 0)
    //         $('#largeModalAddUser').modal('show');
    //         modal.classList.add("show");
    //     @endif
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
        </script>



@endsection
@push('ajax_crud')
<script src="{{asset('js/sweetalert.js')}}"></script>

{{-- <script src="{{asset('js/ajax.js')}}"></script> --}}
<script>
    $('.handleAcount').click( function () {
        var item = $(this);
        var url = item.attr('data-url');
        var clocation = item.attr('data-clocation');
         var status = item.attr('data-status');// item.data('status')

        swal({
    title: "Confirmation",
    text: " Voullez-vous "+status+" le compte  cet utilisateur ? ",
    // icon:  status == 'Désactiver' ? "warning" : "success",
    buttons: {
        confirm: {
          text: status,
          value: true,
          visible: true,
          className: "btn-sm",
          closeModal: true
        },
        cancel: {
          text: "Annuler",
          value: false,
          visible: true,
          className: "btn-sm",
          closeModal: true,
        }
      },
    dangerMode: status == 'Désactiver' ? true : false,
  })
  .then((willDelete) => {
    if (willDelete) {
        $('#loader').show();
      $.ajax({
          url: item.attr('data-url'),
           data: { "_token": "{{ csrf_token() }}" },
          success: function (response) {
            // item.parent().parent().hide();
           location.href = clocation;
            swal({
            position: 'center',
            icon: 'success',
            title: 'Succès',
            text: 'Traitement effectué',
            button: false,
            timer: 2500
          })
           $('#loader').hide();
          },
          error: function(err){
              console.log('----------------------------error-------------------------');
              console.log(err);
              item.parent().parent().hide();
              location.href = clocation;
              swal({
            position: 'center',
            icon: 'error',
            title: 'Echec',
            title: 'Opération échouée',
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
        title: 'Info',
        text: 'Opération annulée',
        button:false,
        timer: 1500

    });
  }
  });
    })
</script>
@endpush
