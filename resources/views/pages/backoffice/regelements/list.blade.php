        @php
    @endphp
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Mode</th>
                        <th>Decision de justice</th>
                        <th>Amende en XOF</th>
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
                        <td>
                            @if ($reglement->mode->mode == "Poursuite judiciaire")
                             <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('crime_reglements.edit', $reglement)}}">
                            {{ $reglement->suite->decision}}
                            </a>
                            @else
                            Non applicable
                            @endif
                        </td>
                        <td>
                            @if ( $reglement->suite &&  $reglement->suite->decision == "Condamnation du prévenu à une amende" || $reglement->mode->mode == "Transaction forestière")
                            <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('crime_reglements.edit', $reglement)}}">
                                {{ formatMontant($reglement->amende)}}
                                @else
                                Non applicable
                                @endif
                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('crime_reglements.edit', $reglement)}}">
                            {{formatDate($reglement->created_at)}}
                        </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

