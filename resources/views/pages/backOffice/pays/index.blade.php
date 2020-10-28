@extends('layouts.master4')
@section('content')
            <div class="page-header">
			
				<div class="ml-auto pageheader-btn">
                <a href="{{route('pays.create')}}" class="btn btn-secondary btn-icon text-white">
						<span>
							<i class="fe fe-plus"></i>
						</span> Ajouter un pays
					</a>
				</div>
			</div>


			<!-- ROW-5 -->
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Liste des Pays</h3>
						</div>
						
							
                            @foreach ($pays as $pay)
                            <div class="list-group-item d-flex  align-items-center border-left-0 border-right-0">
								<div class="mr-2">
                                <span class="avatar avatar-md brround cover-image" data-image-src="{{$pay->icone}}"></span>
								</div>
								<div class="">
                                <div class="font-weight-semibold">{{$pay->nom}}</div>
									<small class="text-muted">
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm btn-default">View</a>
								</div>
							</div>
                                
                            @endforeach

							
							
						
					</div>
				</div><!-- COL END -->
				
			</div>

    
@endsection