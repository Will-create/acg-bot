    @php
    $i = 1;
    @endphp
    <div class="table-responsive">
        <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
            <thead>
                <tr>
                    <th class="wd-15p">Ordre</th>
                    <th class="wd-15p">Libellé</th>
                    <th class="wd-15p">Réference</th>
                    <th>origine</th>
                    <th>Date ajout</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($armes as $arme)
                <tr>
                    <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" > {{$i++}} </a></td>
                    <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" > {{ ucfirst($arme->libelle) }} </a></td>
                    <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" > {{ ucfirst($arme->reference ? $arme->reference : 'Non renseigné')}} </a></td>
                    {{-- <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" >{{$arme->nom_scientifique}}</a></td> --}}
                    <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" > {{ ($arme->origin ? $arme->origine : ' Non renseigné') }} </a></td>
                    <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" > {{formatDate($arme->created_at) }} </a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<!-- TABLE WRAPPER -->
