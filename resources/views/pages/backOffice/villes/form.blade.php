
@extends('layouts.master4')
@section('content')
<div class="page-header pl-3">
    <div>
    <h1 class="page-title">Créer une nouvelle unité{{$unite->designation}}</h1>
        
    </div>
    <div class="ml-auto pageheader-btn">
        
    
            <span>
                <i class="fa fa-location"></i>
            </span>
       
    </div>


			<!-- ROW-5 -->
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
						<div class="card-header">
							<h3 class="mb-0 card-title">Nouvelle Unité</h3>
						</div>
						<div class="card-body">
							
						<form action="{{route('unites.store')}}" method="post" enctype="multipart/form-data">
									@csrf
									{{method_field('POST')}}
									<div class="row">
										<div class="col-md-6">
								
											<div class="form-group">
												<label class="form-label text-muted">Désignation</label>
												<input type="text"  name="designation" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}"  value="{{ old('designation') }}" autofocus >
												@if ($errors->has('designation'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('designation') }}</strong>
															</span>
													@endif
												
											</div>
											
											
											
											
										
											
											<div class="form-group">
												<label class="form-label text-muted">Pays</label>
												<select name="pays_id" class="form-control {{ $errors->has('pays_id') ? ' is-invalid' : '' }}" >
													<option class="text-muted">Sélectionner un Pays</option>
													
												   @foreach($pays as $pay)
											
													<option class="text-muted" value={{$pay->id}}>
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



