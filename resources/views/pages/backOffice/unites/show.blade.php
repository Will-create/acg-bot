@extends('layouts.master4')
@section('content')  
<div class="page-header">
    <div>
    <h1 class="page-title">{{$unite->designation}}</h1>
        
    </div>
    <div class="ml-auto pageheader-btn">
        
    
            <span>
                <i class="fa fa-location"></i>
            </span> {{$unite->pays->nom}}
       
    </div>
</div>
<!-- ROW-5 -->
<!-- ROW-2 -->
<div class="row" style="height: auto">
    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-3 mb-10" >
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Photo de Couverture</h3>
            </div>
            <div class="card-body">
            <img src="{{asset('storage').'/'.$unite->photo_couverture}}" style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Logo</h3>
            </div>
            <div class="card-body">
            <img src="{{asset('storage').'/'.$unite->logo}}" style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 col-sm-12 col-xl-9" >
        <div class="card overflow-hidden"  >
            <div class="card-header" >
                <h3 class="card-title">Localisation</h3>
            </div>
            <div class="card-body">
                
            <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2755.259420560401!2d-1.4908392951184721!3d12.398619078278948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2ebfa8b6c328fb%3A0x29de408f0ea86fc0!2sParc%20Bangr%20Weogo!5e0!3m2!1sfr!2sbf!4v1604034470503!5m2!1sfr!2sbf" width="800" height="510" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- ROW-2 END -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12" >
    <div class="card">
        <div class="card-body">
            <div id="profile-log-switch">
                <div class="media-heading text-primary">
                    <h5><strong>Details</strong></h5>
                </div>
                <div class="table-responsive ">
                    <table class="table row table-borderless">
                        <tbody class="col-lg-12 col-xl-6 p-0">
                            <tr>
                            <td><strong>Designation:</strong> {{$unite->designation}}</td>
                            </tr>
                            <tr>
                            <td><strong>Type d'unite :</strong> {{$unite->type->nom}}</td>
                            </tr>
                            <tr>
                            <td><strong>Pays : </strong> {{$unite->pays->nom}}</td>
                            </tr>
                            <tr>
                            <td><strong>Ville: </strong> {{$unite->ville->nom}}</td>
                            </tr>
                        </tbody>
                        <tbody class="col-lg-12 col-xl-6 p-0">
                            <tr>
                            <td><strong>Adresse: </strong> {{$unite->adresse}}</td>
                            </tr>
                            <tr>
                                <td><strong>Téléphone: </strong>{{$unite->tel}}</td>
                            </tr>
                            <tr>
                            <td><strong>Responsable: </strong> {{$unite->responsable->nom}}</td>
                            </tr>
                            <tr>
                            <td><a href="{{route('unites.edit',['unite'=>$unite->uuid])}}" class="btn btn-primary">Modifier cette Unite</a></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
   </div>
</div>

    
@endsection