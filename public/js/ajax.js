$(document).ready(function () {
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'uuid':null
            }
    });
//Save data into database
$('body').on('click', '#submit1', function (event) {
    event.preventDefault()
    var _token = $("#_token").val();
    document.querySelector('#smartwizard').classList.add('d-none');
    document.querySelector('#loader').classList.remove('d-none');
    var fd = $('#form_setp_1').serialize();
    console.log('console')
    console.log(fd)
    $.ajax({
    url: '/crimes',
      type: "POST",
      data:fd,
    //   dataType: 'json',
      success: function (data) {
        console.log('uuid:')
         var uuid2 = document.querySelector('#uuid2').value = data;
         console.log(uuid2)
          document.querySelector('#loader').classList.add('d-none');
          document.querySelector('#smartwizard').classList.remove('d-none');
          var url = '/crimes/create#step-2';
          location.href = url;
           swal({
            position: 'center',
            icon: 'success',
            title: 'Informations sauvegardées avec succès ',
            button: false,
            timer: 2500
          })
      },
      error: function (data) {
        console.log(data);
    //   $('#form_setp_1').trigger("reset");
    document.querySelector('#loader').classList.add('d-none');
    document.querySelector('#smartwizard').classList.remove('d-none');
      swal({
       position: 'center',
       icon: 'error',
       title: 'Une erreur s\'est produite, Veullez réessayer',
       button: false,
       timer: 2500
     })
    }
  });
});
$('body').on('click', '#submit4', function (event) {
    event.preventDefault()
    var _token = $("#_token").val();
    document.querySelector('#crimenature').classList.add('d-none');
    document.querySelector('#loader').classList.remove('d-none');
    var fd = $('#post_crime').serialize();
    console.log('')
    console.log(fd)
    $.ajax({
    url: '/nature_crimes',
      type: "POST",
      data:fd,
    //   dataType: 'json',
      success: function (data) {
          document.querySelector('#loader').classList.add('d-none');
          document.querySelector('#crimenature').classList.remove('d-none');
          var url = '/nature_crimes';
          location.href = url;
           swal({
            position: 'center',
            icon: 'success',
            title: 'Informations sauvegardées avec succès ',
            button: false,
            timer: 2500
          })
      },
      error: function (data) {
    document.querySelector('#loader').classList.add('d-none');
    document.querySelector('#crimenature').classList.remove('d-none');
      swal({
       position: 'center',
       icon: 'error',
       title: 'Une erreur s\'est produite, Veullez réessayer',
       button: false,
       timer: 2500
     })
    }
  });
});
$('body').on('click', '#submit2', function (event) {
    event.preventDefault()
    var _token = $("#_token").val();
     document.querySelector('#smartwizard').classList.add('d-none');
    document.querySelector('#loader').classList.remove('d-none');
    var fd = $('#form_setp_2').serialize();
    console.log(fd)
    $.ajax({
    url: '/crimes',
      type: "POST",
      data:fd,
    //   dataType: 'json',
      success: function (data) {
          console.log(data)
          var uuid3 = document.querySelector('#uuid3').value = data;
          console.log(uuid3)
        document.querySelector('#loader').classList.add('d-none');
      document.querySelector('#smartwizard').classList.remove('d-none');
          var url = '/crimes/create#step-3';
          location.href = url;
           swal({
            position: 'center',
            icon: 'success',
            title: 'Informations sauvegardées avec succès ',
            button: false,
            timer: 2500
          })
      },
      error: function (data) {
        document.querySelector('#loader').classList.add('d-none');
         document.querySelector('#smartwizard').classList.remove('d-none');
        console.log(data.responseJSON);
      swal({
       position: 'center',
       icon: 'error',
       title: 'Une erreur s\'est produite, Veullez réessayer',
       button: false,
       timer: 2500
     })
    }
  });
});
$('body').on('click', '#submit3', function (event) {
    event.preventDefault()
    var _token = $("#_token").val();
    // var nom_complet = $("#nom_complet").val();
    // var email = $("#email").val();
    var fd = $('#form_setp_3').serialize();
    console.log(fd)
    $.ajax({
    url: '/crimes',
      type: "POST",
      data:fd,
    //   dataType: 'json',
      success: function (data) {
          console.log(data)
          var url = '/crimes';
          location.href = url;
           swal({
            position: 'center',
            icon: 'success',
            title: 'Informations sauvegardées avec succès ',
            button: false,
            timer: 2500
          })
      },
      error: function (data) {
        console.log(data.responseJSON);
      swal({
       position: 'center',
       icon: 'error',
       title: 'Une erreur s\'est produite, Veullez réessayer',
       button: false,
       timer: 2500
     })
    }
  });
});

});

