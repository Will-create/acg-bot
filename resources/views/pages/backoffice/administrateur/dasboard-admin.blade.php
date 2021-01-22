@extends('layouts.master4')

@section('content')
@include('partials._notification')


            <iframe src="http://localhost:5601/app/dashboards#/view/10aa9a50-5748-11eb-9f9a-016191b0374e?embed=true&_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-15m,to:now))&_a=(description:'',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:''),timeRestore:!f,title:'Dashboard%20crime',viewMode:view)&hide-filter-bar=true" style="width: 80vw;height:110vh"></iframe>
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
