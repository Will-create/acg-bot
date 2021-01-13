
        @php
        $i = 1;
    @endphp
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Ordre</th>
                        <th>Désignation</th>
                        <th>Poids/Nombre</th>
                        <th>Conditions</th>
                        <th>Date d'ajout</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crime->confiscations as $confiscation)
                    <tr>
                        <td>{{$i++}}</td>
                        <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('confiscations.edit', $confiscation)}}">
                            {{$confiscation->designation}}
                        </a>
                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('confiscations.edit', $confiscation)}}">
                            {{ $confiscation->nombre ? $confiscation->nombre : $confiscation->poids}}
                            </a>
                        </td>
                        <td>
                            <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('confiscations.edit', $confiscation)}}">
                                {{ ($confiscation->condition)}}
                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('confiscations.edit', $confiscation)}}">
                            {{formatDate($confiscation->created_at)}}
                        </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

