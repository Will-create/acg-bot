
        @php
        $i = 1;
    @endphp
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Ordre</th>
                        <th>Désignation</th>
                        <th>Quantité/Nombre</th>
                        <th>Conditions</th>
                        <th>Date d'ajout</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crime->confiscations as $confiscation)
                    <tr>
                        <td>{{$i++}}</td>
                        <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('confiscations.show', $confiscation)}}">
                            {{$confiscation->designation}}
                        </a>
                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('confiscations.show', $confiscation)}}">
                            {{ $confiscation->nombre ? $confiscation->nombre : $confiscation->quanite}}
                            </a>
                        </td>
                        <td>
                            <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('confiscations.show', $confiscation)}}">
                                {{$confiscation->condition}}
                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('confiscations.show', $confiscation)}}">
                            {{formatDate($confiscation->created_at)}}
                        </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

