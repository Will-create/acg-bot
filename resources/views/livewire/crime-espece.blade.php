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
                </tr>
            </thead>
            <tbody>
                @foreach ($crimeEspeces as $crimeEspece)
                <tr>
                    <td>{{$i++}}</td>
                    <td>

                        @if ($crimeEspece->espece->photo)
                        <img src="{{asset('storage/' . $crimeEspece->espece->photo)}}" alt="{{$crimeEspece->espece->nom}}" class="brround  avatar-sm w-32 mr-2">
                        {{$crimeEspece->espece->nom}}
                        @else
                        <img src="{{asset('espece_animal/4.jpeg')}}" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
                        {{$crimeEspece->espece->nom}}
                        @endif
                    </td>
                    <td>{{formatDate($crimeEspece->created_at)}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    </div>
