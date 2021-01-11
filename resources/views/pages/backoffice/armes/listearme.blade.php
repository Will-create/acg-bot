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
                    <th>Remarques</th>
                    <th>Date ajout</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($armes as $arme)
                <tr>
                    <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{$i++}} </a></td>
                    {{-- <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > <div class="col-auto"><span class="avatar brround avatar-md d-block cover-image" data-image-src="{{asset('storage').'/'.$arme->photo}}"></span></div> </a></td> --}}
                    <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{ ucfirst($arme->libelle) }} </a></td>
                    <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{ ucfirst($arme->reference)}} </a></td>
                    {{-- <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >{{$arme->nom_scientifique}}</a></td> --}}
                    <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{substr($arme->remarques, 0, 60) }} </a></td>
                    <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{formatDate($arme->created_at) }} </a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<!-- TABLE WRAPPER -->
