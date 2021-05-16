@extends('layouts.master4')

@section('content')
@include('partials._notification')
            <div class="row">
              <div class="col-xl-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-1">
                      <div class="col">
                        <p style="color: #808080!important;" class="mb-1">Utilisateur{{count($utilisateurs) > 0 ? 's' : ''}}</p>
                        <h3 class="mb-0 number-font">{{count($utilisateurs)}}</h3>
                      </div>
                      <div class="col-auto mb-0">
                        <div class="dash-icon text-orange">
                                      <i class="mdi mdi-account-multiple "  ></i>
      
                        </div>
                      </div>
                    </div>
                    {{-- <span class="fs-12 text-muted"> <strong>2.6%</strong><i class="mdi mdi-arrow-up"></i> <span class="text-muted fs-12 ml-0 mt-1">than last week</span></span> --}}
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-1">
                      <div class="col">
                        <p style="color: #808080!important;" class="mb-1">Total APIs</p>
                                      <h3 class="mb-0 number-font">52</h3>
                      </div>
                      <div class="col-auto mb-0">
                        <div class="dash-icon text-secondary1">
                          <i class="bx bxs-wallet"></i>
                        </div>
                      </div>
                    </div>
                    {{-- <span class="fs-12 text-muted"> <strong>23</strong><i class="mdi mdi-arrow-down"></i> <span class="text-muted fs-12 ml-0 mt-1">Ajoutés ce mois</span></span> --}}
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-1">
                      <div class="col">
                        <p style="color: #808080!important;" class="mb-1">Total SMS</p>
                        <h3 class="mb-0 number-font">45655</h3>
                      </div>
                      <div class="col-auto mb-0">
                        <div class="dash-icon text-secondary">
                                              <i class="fa fa-skull-crossbones"></i>
                        </div>
                      </div>
                    </div>
                    {{-- <span class="fs-12 text-muted"> <strong>0.15%</strong><i class="mdi mdi-arrow-down"></i> <span class="text-muted fs-12 ml-0 mt-1">Signalés ce mois</span></span> --}}
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-1">
                      <div class="col">
                                      <p style="color: #808080!important;" class="mb-1">SMS revoqués </p>
                        <h3 class="mb-0 number-font">454</h3>
                      </div>
                      <div class="col-auto mb-0">
                        <div class="dash-icon text-warning">
                          <i class="bx bxs-credit-card-front"></i>
                        </div>
                      </div>
                    </div>
                    {{-- <span class="fs-12 text-muted"> <strong>1.05%</strong><i class="mdi mdi-arrow-up"></i> <span class="text-muted fs-12 ml-0 mt-1">than last week</span></span> --}}
                  </div>
                </div>
              </div>
            </div>
                  <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                          <div class="card">
                              <div class="card-body">
                                  <div class="wideget-user text-center">
                                      <div class="wideget-user-desc">
                                          <div class="wideget-user-img">
                                              <img class="" src="{{asset('storage/'. Auth::user()->profile_photo_path)}}" alt="img">
                                          </div>
                                          <div class="user-wrap">
                                          <h4 class="mb-1">{{Auth::user()->nom. ' '. Auth::user()->prenom}}</h4>
                                          <h6 class=" mb-4"> <i class="fa fa-envelope"> </i> {{Auth::user()->email}} </h6>
                                          <h6 class="text-muted mb-4">{{Auth::user()->role->designation}}</h6>
                                          <a href="{{route('profil')}}" class="btn btn-primary mt-1 mb-1 btn-sm"> <i class="zmdi zmdi-eye text-white"></i> Voir le profil</a>
      
      
                                          {{-- <a href="http://localhost:5000/utilisateurs/9fb2ae90-f991-46c2-a03e-037039442b45/edit" class="btn btn-primary mt-1 mb-1 btn-sm"> <i class="zmdi zmdi-edit text-white"></i>  Editer le profile </a> --}}
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
      
                      </div>
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <div class="card">
                  <div class="card-header d-spaece-around">
                                  <h3 class="card-title">Liste des agents</h3>
                                 <a href="{{route('utilisateurs.index')}}" class="btn btn-sm btn-primary"> Tous les agents </a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                                      @if (count($utilisateurs)  > 0)
                                      <table class="table table-bordered table-hover text-nowrap mb-0">
                        <thead>
                          <tr>
                            <th>Nom complet</th>
                            <th>tel</th>
                            <th>Statut</th>
                          </tr>
                        </thead>
                        <tbody>
                                             @forelse ($utilisateurs as $coordonateur)
                          <tr>
                            {{-- <td>
                              <img src="http://localhost:5003/assets/images/users/3.jpg" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
                              {{$coordonateur->pay->nom}}
                            </td> --}}
                                              <td>{{$coordonateur->nom. ' '. $coordonateur->prenom}}</td>
                                              <td>{{$coordonateur->tel}}</td>
                            <td>
                              <button type="button" class="badge {{$coordonateur->actif ? 'badge-success':'badge-danger'}} ">{{$coordonateur->actif ? 'Ativé':'Désactivé'}}</button>
                            </td>
                          </tr>
                                              @empty
                                              aucune donné
                                             @endforelse
                        </tbody>
                      </table>
                                      @else
                      Aucun agent pour votre pays
                                      @endif
      
                    </div>
                  </div>
                </div>
              </div>
      
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

{{-- <script src="{{asset('js/ajax.js')}}"></script> --}}
<script>
    $('.handleAcount').click( function () {
        var item = $(this);
        var url = item.attr('data-url');
        var clocation = item.attr('data-clocation');
         var status = item.attr('data-status');// item.data('status')

        swal({
    title: "Confirmer",
    text: " Voullez-vous "+status+" le compte  cet utilisateur ? ",
    icon:  status == 'Désactiver' ? "warning" : "success",
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
