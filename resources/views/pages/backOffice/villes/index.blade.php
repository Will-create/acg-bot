@extends('layouts.master4')
@section('content')
<div class="page-header pl-3">
    <div>
    <h1 class="page-title">Liste des villes {{$unite->designation}}</h1>
        
    </div>
    <div class="ml-auto pageheader-btn">
        
    
            <span>
                <i class="fa fa-location"></i>
            </span>
       
    </div>

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
		</div>
		<div class="col-lg-8 col-md-12 col-sm-12 col-xl-9" >
			<div class="card overflow-hidden"  >
				<div class="card-header" >
					<h3 class="card-title">Localisation</h3>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table card-table border table-vcenter text-nowrap align-items-center">
							<thead class="">
								<tr>
									<th>Nom</th>
								
									
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($unites as $unite)
								<tr>
									<td>
										
										<a href="" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">{{$unite->designation}}</a>
											<br>
										
									</td>
								   <td>{{$unite->type}}</td>
								   <td class="font-weight-semibold fs-15">{{$unite->adresse}}</td>
								
									<td>
										<div class="row">
											<a data-toggle="tooltip" data-original-title="Voir" class="btn btn-sm btn-default m-1 mb-xl-0" href="{{route('unites.show',['unite'=>$unite->uuid])}}"><i class="fa fa-eye"></i></a>


										<a data-toggle="tooltip" data-original-title="Modifier" class="btn btn-sm btn-default m-1 mb-xl-0" href="{{route('unites.edit',['unite'=>$unite->uuid])}}"><i class="fa fa-pencil"></i></a>


										
										<form action="{{route('unites.destroy',['unite'=>$unite->uuid])}}" method="post">
										@csrf
										{{method_field('DELETE')}}
										    
									       
											<button data-toggle="tooltip" data-original-title="Supprimer" class="btn btn-sm btn-default m-1 mb-xl-0"  type="submit"><i class="fa fa-trash-o"></i></button>
										</form>
										</div>
									
									</td>
								</tr>
									
								@endforeach
								
							</tbody>
						</table>
					</div>
					
				
				</div>
			</div>
		</div>
	</div>
	<!-- ROW-2 END -->
				
			</div>

    
@endsection