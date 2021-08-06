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
						<h1 class="page-title">Liste des utilisateurs</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Mise à jour du mot de passe</li>
						</ol>
					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-">
            <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title text-lighten">Mise à jour du mot de passe</h4><hr>
            <p class="card-text">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="d-flex justify-content-center">
                        
                        <img  src="{{asset('assets/LOGO ACG.png')}}" style="max-width: 45vh; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                        <br><br>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <form action="{{route('change_password')}}" method="post">
                @csrf
                @method('patch')

                <div class=" row form-group">
                    <label class=" col-md-12 col-form-label text-md-left">Votre mot de passe actuel</label>
                    <input type="password"  class ="col-md-12 form-control" name="current_password" id="" required>
                    @if($errors->has('current_password'))
                        <small class="col-md-12 help-block text-danger text-center">
                            {{ $errors->first('current_password') }}
                        </small>
                    @endif
                </div>

                <div class="row form-group">
                    <label class= "col-md-12 col-form-label text-md-left" >Nouveau mot de passe </label>
                    <input type="password" class="col-md-12 form-control"  name="new_password" id="" required>
                    @if($errors->has('new_password'))
                        <small class="col-md-12 help-block text-danger text-center">
                            {{ $errors->first('new_password') }}
                        </small>
                    @endif
                </div>

                <div class="row form-group">
                    <label class="col-md-12 col-form-label text-md-left">  Confirmation mot de passe </label>
                    <input type="password" name="new_password_confirmation" class="col-md-12 form-control" required>
                    @if($errors->has('new_password_confirmation'))
                        <small class="help-block text-danger text-center">
                            {{ $errors->first('new_password_confirmation') }}
                        </small>
                    @endif
                </div>
                <br>
                <a class="btn btn-primary float-left" href="{{route('accueil')}}">Annuler</a>
                <button type="submit" class="btn btn-outline-danger float-right"> Changer Mot de passe</button>
                    </form>
          </div>
        </div>
    </div>
    <div class="col-md-4"> <br>
    </div>
</div>
</div>
<br>
<script>
$(".alert").alert();
</script>

@endsection
