@extends('layouts.master4')
@section('content')
<div class="page-header pl-3">
    <div>
    <h1 class="page-title">Modifier les details de {{$unite->designation}}</h1>
        
    </div>
    <div class="ml-auto pageheader-btn">
        
    
            <span>
                <i class="fa fa-location"></i>
            </span>
       
    </div>
</div>
<div class="row">
    
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 card-title">Modifier une Unité</h3>
            </div>
            <div class="card-body">
                
            <form action="{{route('unites.update',['unite'=>$unite->uuid])}}" enctype="multipart/form-data" method="POST">
                        @csrf
                      @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                    
                                <div class="form-group">
                                    <label class="form-label text-muted">Désignation</label>
                                    <input type="text"  name="designation" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}"  value="{{ $unite->designation}}" autofocus >
                                    @if ($errors->has('designation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('designation') }}</strong>
                                                </span>
                                        @endif
                                    
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted">Type</label>
                                    <input type="text"  name="type" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}"  value="{{$unite->type}}">
                                    @if ($errors->has('type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('type') }}</strong>
                                                </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted">Téléphone</label>
                                    <input type="text"  name="tel" class="form-control {{ $errors->has('tel') ? ' is-invalid' : '' }}"  value="{{$unite->tel}}">
                                    @if ($errors->has('tel'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('tel') }}</strong>
                                                </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted">Adresse</label>
            
                                    <input type="text"  name="adresse" class="form-control {{ $errors->has('addresse') ? ' is-invalid' : '' }}"   value="{{ $unite->adresse}}">
                                    @if ($errors->has('adresse'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('adresse') }}</strong>
                                                </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted">Longitude</label>
            
                                    <input type="text"  name="long" class="form-control {{ $errors->has('long') ? ' is-invalid' : '' }}"   value="{{ $unite->long}}">
                                    @if ($errors->has('long'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('long') }}</strong>
                                                </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted">Latitude</label>
                                    
                                    <input type="text"  name="lat" class="form-control {{ $errors->has('lat') ? ' is-invalid' : '' }}"  value="{{ $unite->lat }}">
                                    @if ($errors->has('lat'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lat') }}</strong>
                                                </span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label text-muted">Responsable</label>
                                    <select name="responsable_id" class="form-control {{ $errors->has('responsable_id') ? ' is-invalid' : '' }}" >
                                        <option class="text-muted" >Sélectionner un Responsable</option>
                                        
                                       @foreach($responsables as $responsable)
                                
                                        <option {{$unite->responsable_id === $responsable->id ? 'selected' : ''}} class="text-muted"  value={{$responsable->id}}>
                                            <span class="avatar avatar-md brround cover-image" >{{$responsable->nom}}</span>
                                        </option>
                                        @endforeach
                                    </select>
                                        @if ($errors->has('responsable_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('responsable_id') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label text-muted">Pays</label>
                                    <select name="pays_id" class="form-control {{ $errors->has('pays_id') ? ' is-invalid' : '' }}" >
                                        <option class="text-muted">Sélectionner un Pays</option>
                                        
                                       @foreach($pays as $pay)
                                
                                        <option {{$unite->pays_id === $pay->id ? 'selected' : ''}} class="text-muted" value={{$pay->id}}>
                                            <span class="avatar avatar-md brround cover-image" data-image-src="{{$pay->icone}}">{{$pay->nom}}</span>
                                        </option>
                                        @endforeach
                                    </select>
                                        @if ($errors->has('pays_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pays_id') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted">Ville</label>
                                    <select name="ville_id" class="form-control {{ $errors->has('ville_id') ? ' is-invalid' : '' }}" >
                                        <option class="text-muted" >Sélectionner un Pays</option>
                                        
                                       @foreach($villes as $ville)
                                
                                        <option {{$unite->ville_id === $ville->id ? 'selected' : ''}} class="text-muted" value={{$ville->id}}>
                                            {{$ville->nom}}
                                        </option>
                                        @endforeach
                                    </select>
                                        @if ($errors->has('ville_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('ville_id') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                
                                
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="logo"  class="custom-file-input {{ $errors->has('logo') ? ' is-invalid': ' ' }}" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">Choisissez un logo</label>
                                        @if ($errors->has('logo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('logo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="photo_couverture"  class="custom-file-input {{ $errors->has('photo_couverture') ? ' is-invalid': ' ' }}" id="photoCustomFile">
                                        <label class="custom-file-label" for="photoCustomFile">Choisissez une photo de couverture</label>
                                        @if ($errors->has('photo_couverture'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('photo_couverture') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group float-right pt-6" >
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                                
                                
                            </div>

                        </div>
                        
                    

                    </form>
            
            
                    
                
            </div>
        </div>
    </div><!-- COL END -->
    
</div>



    
@endsection
