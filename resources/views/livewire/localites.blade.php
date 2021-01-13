<div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
                <thead>
                    <tr>
                        <th class="wd-15p">Nom</th>

                        <th class="wd-30p">Pays</th>

                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($localites as $localite)
                    <tr>
                        <td> <a class="text-dark" href="{{route('localites.show', $localite->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{ucfirst($localite->nom)}} </a></td>
                        <td> <a class="text-dark" href="{{route('localites.show', $localite->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{ $localite->pay->nom}}</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
