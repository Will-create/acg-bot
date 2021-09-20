@extends('layouts.master4')
@section('css')
<link rel="stylesheet" href="/css/servicefoot.css">
<style>
    .scrollss{
        overflow: scroll; 
        width: auto;
        height: 265px;
    }
</style>
@endsection
@push('livewire')
@livewireStyles
@endpush
@section('page-header')
                <!-- PAGE-HEADER -->
                @include('partials._notification')
                    <div class="container">
                        <div class="page-header">
                            <div>
                            <h1 class="page-title text-dark">Competition en direct</h1>
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{route('servicefoot.index')}}">ServiceFoot</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span>Compétition en directe</li>
                                </ol>
                            </div>
                        </div>
                    </div>
				<!-- PAGE-HEADER END -->
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                            <h2> Matchs Aujourd'hui</h2> <hr>

				        @livewire('match-today')
                            
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
@push('livewirescript')
@livewireScripts
@endpush
