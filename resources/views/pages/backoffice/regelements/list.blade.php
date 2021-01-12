        @php
    @endphp
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Mode</th>
                        <th>Decision de justice</th>
                        <th>Amende</th>
                        <th>Date d'ajout</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crime->reglement as $reglement)
                    <tr>
                        <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('crime_reglements.edit', $reglement)}}">
                            {{$reglement->mode->mode}}
                        </a>
                        </td>
                        @if ($reglement->mode->mode == "Poursuite judiciaire")
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('crime_reglements.edit', $reglement)}}">
                            {{ $reglement->suite}}
                            </a>
                        </td>
                        @endif
                        @if ( $reglement->suite &&  $reglement->suite->decision == "Condamnation du prévenu à une amende" || $reglement->mode->mode == "Transaction forestière")
                        <td>
                            <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('crime_reglements.edit', $reglement)}}">
                                {{ ($reglement->amende)}}
                        </td>
                        @endif
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('crime_reglements.edit', $reglement)}}">
                            {{formatDate($reglement->created_at)}}
                        </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

