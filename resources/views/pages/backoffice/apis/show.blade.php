@extends('layouts.master4')
@section('css')
<link href="{{URL::asset('assets/plugins/tabs/tabs.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/accordion/accordion.css') }}" rel="stylesheet" />

@endsection
@push('livewire')
    @livewireStyles
@endpush
@section('page-header')
                <!-- PAGE-HEADER -->
                @include('partials._notification')

				<div class="page-header">
					<div>
                    <h1 class="page-title">Details d'une Api</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('apis.index')}}">Apis</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span>{{$api->nom}}</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('apis.index')}}"  >  <span>
                            <i class="fe fe-list"></i>
                        </span>
                        Toutes Apis</a>
                    </button>
					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')
<!-- ROW-2 END -->
<div class="row">
    <div class="col-md-4" >
    <div class="card">
        <div class="card-body">
            <div id="profile-log-switch">
                <div class="media-heading text-dark">
                    <h5><strong>{{ucfirst($api->nom)}}</strong></h5>
                </div>
                <div class="table-responsive ">
                    <table class="table row table-borderless table-sm">
                        <tbody class="col-lg-12 col-xl-6 p-2">
                            <tr>
                            <td><strong>Fournisseur : </strong><a class="text-danger" href="{{$api->lien_doc}}">{{ucfirst($api->fournisseur)}}</a></td>
                            </tr>
                            @php
                            @endphp
                            <tr>
                                <td><strong>Gratuit : </strong> {{$api->gratuit == false ?  'Oui' : 'Non' }} </td>
                             </tr>
                             <tr>
                                <td><strong>Api key : </strong> {{$api->api_key ??  'Pas de clé api'}} </td>
                             </tr>
                             <tr>
                                <td><strong>Route : </strong> {{$api->url ?? 'Pas de lien' }} <a class="text-primary" target="_blank" href="{{$api->url}}">Tester</a></td>
                             </tr>
                             <tr>
                                <td><strong>Route de liaison : </strong> {{$api->url_envoie ?? 'Pas de lien' }} </td>
                             </tr>
                             <tr>
                                 <td><strong>DESCRIPTION : </strong> {{ucfirst($api->description)}}</td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>
   <div class="col-md-8" >
   <div class="card">
       <div class="card-body">
          
               <div id="profile-log-switch">
                   <div class="media-heading text-dark">
                       <h5><strong>Les sms provenants de cette Api</strong></h5>
                   </div>
                   <div class="table-responsive ">
                       <table class="table row table-borderless table-sm">
                           <tbody class="col-lg-12 col-xl-12 p-2">
                               @php
                                   $i=1;
                               @endphp
                                <div class="row"> 
                                    <div class="panel panel-primary">
                                        <div class="tab_wrapper first_tab ">
                                            <ul class="tab_list">
                                                <li class="active">Moov Africa</li>
                                                <li>Telecel</li>
                                                <li>Malitel</li>
                                                <li>Moov Bénin</li>
                                            </ul>
                                            <div class="content_wrapper">
                                                <div class="tab_content active">
                                                    @foreach ($api->sms as $sms)
                                                        @if ($sms->destination == 'moov')
                                                        @include('pages.backoffice.apis.element', ['sms' => $sms, 'api' => $api ])
                                                        @endif

                                                   @endforeach
                                                </div>
        
                                                <div class="tab_content">
                                                    @foreach ($api->sms as $sms)
                                                        @if ($sms->destination == 'telecel')
                                                        
                                                        @include('pages.backoffice.apis.element', ['sms' => $sms, 'api' => $api ])
                                                        
                                                        @endif

                                                   @endforeach
                                                </div>
        
                                                <div class="tab_content">
                                                    @foreach ($api->sms as $sms)
                                                        @if ($sms->destination == 'malitel')
                                                        @include('pages.backoffice.apis.element', ['sms' => $sms, 'api' => $api ])
                                                        
                                                        @endif

                                                   @endforeach
                                                </div>
        
                                                <div class="tab_content">
                                                    @foreach ($api->sms as $sms)
                                                        @if ($sms->destination == 'benin')
                                                        @include('pages.backoffice.apis.element', ['sms' => $sms, 'api' => $api ])
                                                        
                                                        
                                                        @endif

                                                   @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                            
                                    </div>
                                </div>
            </div>
                           </tbody>
                       </table>
                   </div>
    </div>
       </div>
   </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6 mb-4">
        <a href="{{ route('apis.index') }}" class="btn btn-dark"> <span>
                <i class="fe fe-close"></i>
            </span><i class="fa fa-times"></i> Retour</a>
        <a href="{{ route('apis.edit', $api->uuid) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i> Modifier</a>
        <button type="button" class="btn btn-danger  mb-1" data-toggle="modal"
            data-target="#exampleModalDelete{{ $api->id }}"><i class="fa fa-trash"></i></button>
    </div>
</div>
<div class="modal" id="exampleModalDelete{{ $api->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalDelete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalDelete">Suppression de {{ $api->designation }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Etes-vous sûr de bien vouloir supprimer cette Api ?
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('apis.destroy', $api->uuid) }}" method="POST">
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
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
<script src="{{URL::asset('assets/plugins/tabs/tab-content.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/accordion/accordion.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/accordion/accordion.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js') }}"></script>
@endsection
@push('livewirescript')
@livewireScripts
@endpush