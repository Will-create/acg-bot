@extends('layouts.master4')
@section('css')
<link href="{{URL::asset('assets/plugins/tabs/tabs.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/accordion/accordion.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="/css/servicefoot.css">
<link rel="stylesheet" href="/css/servicefoot.css">
<style>
    .scrollss{
        overflow: scroll;
        width: auto;
        height: 430px;
    }
    .chats{
        width: 70%;
        height: auto;
    }
</style>
@endsection
@push('livewire')
@livewireStyles
@endpush
@section('page-header')
                <!-- PAGE-HEADER -->
                @include('partials._notification')
				<div class="page-header">
					<div>
                    <h1 class="page-title">@if ($menu->type_menu_id == 1)Details de rubrique @else Details d 'application @endif</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('menus.index')}}">{{$menu->operateur}}</a></li>
                            @if ($menu->type_menu_id == 2)
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('menus.show',$parent->uuid)}}">{{$parent->nom}}</a></li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span>{{$menu->nom}}</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                   @if (Auth::user()->role->id == 1 )

                    <a class="btn btn-primary" href="{{route('menus.index')}}"  >  <span>
                            <i class="fe fe-list"></i>
                        </span>
                        Tous les menus</a>
                        @else
                        <a href="{{ route('menus.index') }}" class="btn btn-primary"> <span>
                            <i class="fe fe-close"></i>
                        </span><i class="fa fa-times"></i> Retour</a>

                    @endif
					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection

@section('content')
<!-- ROW-2 END -->
<div class="row">
    @if (Auth::user()->role->id == 1 )
    <div class="col-md-4" >
    <div class="card">
        <div class="card-body">
            <div id="profile-log-switch">
                <div class="media-heading text-dark">
                    <h5><strong>{{ucfirst($menu->nom)}}</strong></h5>
                </div>
                <div class="table-responsive ">
                    <table class="table row table-borderless table-sm">
                        <tbody class="col-lg-12 col-xl-6 p-2">
                            <tr>
                            <td><strong>Type: </strong><a  data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails" class="text-dark" href="{{route('type_menus.show',$menu->type->uuid)}}">{{ucfirst($menu->type->nom)}}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Pseudo: </strong>{{$menu->pseudo ? $menu->pseudo : ''}}</td>
                                </tr>
                            <tr>
                                <td><strong>Automate: </strong>{{$automate ? $automate['nom'] : ''}}</td>
                                </tr>
                            {{-- <tr>
                                <td><strong>Rubriques : </strong> {{ucfirst($menu->parent($menu->uuid) ?  'Oui' : 'Non' )}} @if ($menu->parent($menu->uuid)) <a  data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails" class="text-dark" href="{{route('menus.show',$menu->parent($menu->uuid)->uuid)}}">Voir</a>@endif</td>
                             </tr> --}}
                             <tr>
                                 <td><strong>DESCRIPTION : </strong> {{ucfirst($menu->description)}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            @livewire('cache',['menu' => $menu])
        </div>
    </div>
   </div>
   @endif
<div class="{{ Auth::user()->role->id == 1 ? 'col-md-8' : 'col-md-12' }}">
   <div class="card">
       <div class="card-body">
           @if ($menu->type_menu_id == 1)
               <div id="profile-log-switch">
                   <div class="media-heading text-dark">
                       <h5><strong>Listes des applications de cette rubrique</strong></h5>
                   </div>
                   <div class="table-responsive ">
                       <table class="table row table-borderless table-sm">
                           <tbody class="col-lg-12 col-xl-6 p-0">
                               @php
                                   $i=1;
                               @endphp
                               @foreach ($sousmenus as $sm)
                                   <tr>
                                   <td><strong class="pl-2">{{$i++}}</strong> <a  data-toggle="tooltip" data-placement="right" title="Cliquer pour afficher les détails" class="text-dark" href="{{route('menus.show',$sm->uuid)}}">{{ucfirst($sm->nom)}}</a></td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
               @else
               <div id="profile-log-switch">
                   <div class="row">
                       <div class="col-md-4"></div>
                       <div class="col-md-4">

                            <div class="card">

                                <div class="card-body wideget-user-contact">
                                    <img src="{{asset('images').'/'.operateur_logo($menu->operateur)}}"
                                        style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                                    <div class="clearfix"></div>


                                </div>
                                <br>



                            </div>
                            <div class="media-heading text-dark">
                                <h5><strong>Contenus disponibles aujourd'hui</strong></h5>
                            </div>
                       </div>
                       <div class="col-md-4"></div>
                   </div>
                   <div class="row">
				@if(count($todays) > 0)

                        <div class="scrollss bg-light ">
                            <div class="">
                               <div class="">
                                <div class="chats rounded m-3">
									@foreach ($todays as $sms)
                                        @include('pages.backoffice.apis.element', ['sms' => $sms, 'api' => $sms->api ])
                                    @endforeach

                                </div>
                               </div>
                            </div>
                        </div>
					@endif

                        <div>



								<div class="row m-5 text-center">
									<div class="col-md-1"></div>
									<div class="col-md-10">
											<div class="row">
									            <div style="border: 1px solid red;width:100%;height:60px; border-radius:5px;" id="screen" ></div>

												<div>
													<div class="d-flex">
														<div class="form-group" style="width: 100%">
															<textarea  value="" rows="3" cols="60" type="text" class="form-control" name="contenu_sortie"
																 id="exampleFormControlTextarea1" placeholder="Saisissez ou modifez"></textarea>
														</div>

															<button onclick="diffuser()" id="exampleFormControlTextarea1" class="btn button1" > <i class="fa fa-check" aria-hidden="true"></i> Diffuser</button>
													</div>
												</div>
											</div>
									</div>
									<div class="col-md-1"></div>
								</div>
								<script type="text/javascript">
									function desactiver() {
									  var bouton = document.getElementById('exampleFormControlTextarea1');
									  bouton.disabled = "disabled";
									  bouton.value="Envoi...";
									}

									function edit(contenu){
												var textarea = document.getElementById('exampleFormControlTextarea1');
												textarea.value = contenu;
											};
									function diffuser(){
												var content = document.getElementById('exampleFormControlTextarea1').value;
												document.getElementById('screen').innerHTML = content;
											};
								 </script>

                        </div>
                    </div>

                </div>
           @endif
       </div>
   </div>
</div>
</div>
@if (Auth::user()->role->id == 1 )

<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6 mb-4">
        <a href="{{ route('menus.index') }}" class="btn btn-dark"> <span>
                <i class="fe fe-close"></i> </span><i class="fa fa-times"></i> Retour</a>
        <a href="{{ route('menus.edit', $menu->uuid) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i> Modifier</a>
        <button type="button" class="btn btn-danger  mb-1" data-toggle="modal"
            data-target="#exampleModalDelete{{ $menu->id }}"><i class="fa fa-trash"></i></button>


    </div>
</div>
@endif
<div class="modal" id="exampleModalDelete{{ $menu->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalDelete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalDelete">Suppression de {{ $menu->designation }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Etes-vous sûr de bien vouloir supprimer ce Menu ?
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('menus.destroy', $menu->uuid) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ">
                        <i class="fa fa-trash"></i>
                        <span>Confirmer</span>
                    </button>
                    <button type="reset" class="btn btn-success" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        <span>Annuler</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="{{URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
<script src="{{URL::asset('assets/plugins/tabs/tab-content.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/accordion/accordion.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/accordion/accordion.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js') }}"></script>
@endsection
@endsection
@push('livewirescript')
@livewireScripts
@endpush