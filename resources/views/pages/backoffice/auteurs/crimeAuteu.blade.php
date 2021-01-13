
        @php
        $i = 1;
    @endphp
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Ordre</th>
                        <th>Nom  et prénom</th>
                        <th>Qualité</th>
                        <th>Date d'ajout</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crime->auteurs as $auteur)
                    <tr>
                        <td>{{$i++}}</td>
                        <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('crime_auteurs.show', $auteur)}}">
                            {{ucFirst($auteur->nom) . ' '. ucFirst($auteur->prenom)}}
                        </a>
                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('crime_auteurs.show', $auteur)}}">

                            {{ucFirst($auteur->type)}}
                            </a>
                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="{{route('crime_auteurs.show', $auteur)}}">

                            {{formatDate($auteur->created_at)}}
                        </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        