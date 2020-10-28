@extends('layouts.master4')
@section('content')
            <div class="page-header">
                <div>
                    <h1 class="page-title">Liste des Unités</h1>
                    
                </div>
                <div class="ml-auto pageheader-btn">
                    
                <a href="{{route('unites.create')}}" class="btn btn-secondary btn-icon text-white">
                        <span>
                            <i class="fe fe-plus"></i>
                        </span> Ajouter une Unité
                    </a>
                </div>
            </div>
<!-- ROW-5 -->
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Top Selling Products</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table card-table border table-vcenter text-nowrap align-items-center">
									<thead class="">
										<tr>
											<th>Unité/pays</th>
											<th>Type</th>
											<th>Adresse</th>
											<th>Responsable</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($unites as $unite)
                                        <tr>
											<td>
												<img src="{{asset('storage').'/'.$unite->logo}}" alt="img" class="h-7 w-7">
												<p class="d-inline-block align-middle mb-0 ml-1">
                                                <a href="" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">{{$unite->designation}}</a>
													<br>
                                                <span class="text-muted fs-13">
                                                    
                                                </span>
												</p>
											</td>
                                           <td>{{$unite->type}}</td>
                                           <td class="font-weight-semibold fs-15">{{$unite->adresse}}</td>
                                        <td><span class="badge badge-danger-light badge-md"></span></td>
											<td>
                                            <a class="btn btn-sm btn-success" href="{{route('unites.show',['unite'=>$unite->uuid])}}">Voir</a>


                                                <a class="btn btn-sm btn-warning" href="{{route('unites.update',['unite'=>$unite->uuid])}}">Modifier</a>


                                                
                                                <form action="{{route('unites.destroy',['unite'=>$unite->uuid])}}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                            
                                                    <input class="btn btn-sm btn-danger"  type="submit" value="Supprimer">
                                                </form>
											</td>
										</tr>
                                            
                                        @endforeach
										
                    				</tbody>
								</table>
							</div>
						</div>
					</div>
				</div><!-- COL END -->
				
			</div>



    
@endsection