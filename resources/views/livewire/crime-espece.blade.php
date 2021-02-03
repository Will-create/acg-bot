<div>

@php
    $i = 1;
@endphp
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap mb-0">
            <thead>
                <tr>
                    <th>Ordre</th>
                    <th>Désignation</th>
                    <th>Date d'ajout</th>
   @if (Auth::user()->role->designation == "Chef d’Unité" || Auth::user()->role->designation == "Agent d’une Unité")

                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($crimeEspeces as $crimeEspece)
                <tr>
                    <td>{{$i++}}</td>
                    <td>
                        @if ($crimeEspece->espece->photo)
                        <a  class="text-dark" href="{{route('especes.show', $crimeEspece->espece )}}">
                        <img src="{{asset('storage/' . $crimeEspece->espece->photo)}}" alt="{{$crimeEspece->espece->nom}}" class="brround  avatar-sm w-32 mr-2">
                        {{$crimeEspece->espece->nom}}
                    </a>
                        @else
                        <a class="text-dark"  href="{{route('especes.show', $crimeEspece->espece )}}">
                        <img src="{{asset('espece_animal/4.jpeg')}}" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
                        {{$crimeEspece->espece->nom}}
                        </a>
                        @endif
                    </td>
                    <a class="text-dark"  href="{{route('especes.show', $crimeEspece->espece )}}">

                    <td>{{formatDate($crimeEspece->created_at)}}</td>
                    </a>
   @if (Auth::user()->role->designation == "Chef d’Unité" || Auth::user()->role->designation == "Agent d’une Unité")
                    <td>
                        <button style="border: unset!important;" wire:click="delete({{$crimeEspece->id}})"> <i class="fa fa-trash text-danger"></i> </button>
                    </td>
                    @endif
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div wire:loading wire:target="delete">
        <div id="loading" class="">
            <div class="loading"></div>
          </div>
    </div>
    </div>
