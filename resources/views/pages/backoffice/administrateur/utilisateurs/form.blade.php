<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="nom">Nom <strong class="text-danger">*</strong> </label>
                    <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"
                        value="{{old('nom') ?? $utilisateur->nom}}" required>
                    @error('nom')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">Email <strong class="text-danger">*</strong></label>
                    <input type="email" class="form-control" name="email" placeholder="Email" id="email"
                        value="{{old('email') ?? $utilisateur->email}}" required>
                    @error('email')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="pays_id">Pays <strong class="text-danger">*</strong></label>
                <select name="pay_id" id="pays_id" class="form-control custom-select select2" onchange="show_ville();">
                    @if ($utilisateur->pay)
                    <option value="{{$utilisateur->pay->id}}" selected> {{$utilisateur->pay->nom}}</option>
                    @endif
                        @if (Auth::user()->role->designation == 'Chef d’Unitpé' || Auth::user()->role->designation ==
                        'Coordonnateur National')
                        <option value="{{Auth::user()->pay->id}}" selected> {{Auth::user()->pay->nom}}</option>
                        <input type="hidden" id="selected_pays" value="{{route('ville_by_country', Auth::user()->pay->id)}}">
                        @else
                        @if (!$utilisateur->pay)
                        <option value="" selected disabled> Sélectionner</option>

                        @endif
                        @foreach ($pays as $pay)
                        <option value="{{$pay->id}}">{{$pay->nom}}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('organisation')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @if (Auth::user()->role->designation == 'Coordonnateur National' ||  Auth::user()->role->designation == 'Chef d’Unité')
                    <div class="form-group">
                        <label class="form-label" for="organisation">Role <strong class="text-danger">*</strong></label>
                        <select name="role_id" id="" class="form-control custom-select select2">
                            @if (Auth::user()->role->designation == 'Chef d’Unité' || Auth::user()->role->designation ==
                            'Coordonnateur Régional' || Auth::user()->role->designation == 'Coordonnateur National')
                            <option value="{{$roles->id}}" selected> {{$roles->designation}}</option>
                            @else
                            <option value="" selected disabled> Sélectionner</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->designation}}</option>
                            @endforeach
                            @endif
                        </select>
                        @error('organisation')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                @endif

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="prenom">Prénom <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" id="prenom"
                        value="{{old('prenom') ?? $utilisateur->prenom}}" required>
                    @error('prenom')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group w-100 form-group">
                    <label class="form-label" for="tel">Téléphone <strong class="text-danger">*</strong></label>
                    <input class="form-control phone" id="phone" name="tel" type="tel" value="{{old('tel') ?? $utilisateur->tel}}" required
                        width="100%">
                    @error('tel')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="organisation">Localité <strong
                            class="text-danger">*</strong></label>
                    <select name="localite_id" id="ville_id" class="form-control custom-select select2">
                        @if ($utilisateur->localite)
                    <option value="{{$utilisateur->localite}}" selected > {{$utilisateur->localite->nom}}</option>
                        @else
                        <option value="" selected disabled> Sélectionner</option>

                        @endif
                    </select>
                    @error('localite_id')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            @if (Auth::user()->role->designation != 'Administrateur Général' && Auth::user()->role->designation !=
            'Coordonnateur Régional' )
            <div class="form-group">
                <label class="form-label" for="organisation">Unité <strong class="text-danger">*</strong></label>
                <select name="unite_id" id="" class="form-control custom-select select2">
                    <option value="" selected disabled> Sélectionner</option>

                    @foreach ($unites as $unite)
                    <option value="{{$unite->id}}" @if ($utilisateur->unite_id && $utilisateur->unite_id == $unite->id )
selected
                    @endif >
                    {{$unite->designation}}</option>
                    @endforeach
                </select>
                @error('organisation')
                <span class="helper-text red-text">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @endif

    </div>
     <div class="col-md-12">
        @if (Auth::user()->role->designation != 'Coordonnateur National' && Auth::user()->role->designation != 'Chef d’Unité')
        <div class="form-group">
            <label class="form-label" for="organisation">Role <strong class="text-danger">*</strong></label>
            <select name="role_id" id="" class="form-control custom-select select2">
                @switch(Auth::user()->role->designation)
                @case('Administrateur Général')
                @if ($utilisateur->role && ($utilisateur->role->designation == "Agent d’une Unité" || $utilisateur->role->designation == "Chef d’Unité"))
                 <option value="{{$utilisateur->role->id}}" selected> {{$utilisateur->role->designation}} </option>
                 @else
                 <option value="" selected disabled> Sélectionner</option>
                @foreach ($roles as $role)
                <option value="{{$role->id}}" @if($utilisateur->role && $utilisateur->role->id == $role->id) selected @endif>{{$role->designation}}</option>
                @endforeach
                @endif
                    @break

                @case('Coordonnateur Régional')
                <option value="{{$roles->id}}"> {{$roles->designation}}</option>
                @break
                @case('Coordonnateur National')
                <option value="{{$roles->id}}"> {{$roles->designation}}</option>
                @break
                @case('Chef d’Unité')
                <option value="{{$roles->id}}"> {{$roles->designation}}</option>
                @break

                @default
                    Default case...
            @endswitch


{{--
                @if (Auth::user()->role->designation != 'Administrateur Général')
                <option value="{{$roles->id}}" selected> {{$roles->designation}}</option>
                @else
                @if (!$utilisateur->role)
                @endif

                @endif
                @endif --}}
            </select>

            @error('organisation')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
    @endif
    </div>

        <div class="col-md-12 ">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0 card-title">Photo de profil</h3>
                </div>
                <div class="card-body">
                    <input type="file" class="dropify" data-max-file-size="1M" name="profile_photo_path"
                        accept=".png, .JPEG, ." />
                    @error('profile_photo_path')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@section('js')
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>

<!-- INTERNALPRISM JS -->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
<!-- INTERNAL TELEPHONE JS -->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
<script>
    $.get(
        $('#selected_pays').val(),
        function(villes){
            try{
                villes.forEach((element) => {
                    $("#ville_id").append(
                        '<option value="' + element.id + '">  ' + element.nom + ' </option>'
                    );
                });
            }
            catch(err){ console.log(err); }
        }
    );

    function show_ville() {
        var select_status = $('#pays_id').val();

        $.ajax({
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url: '/pays/ville/' + escape(select_status),
            type: 'get',
            success: function (data) {
                var villes = data;
                if (villes == undefined) {
                    villes = 'Veuillez selectionner un pays'
                }
                console.log(villes);
                $("#ville_id").html('');
                $("#ville_id").append(
                    '<option value="" selected disabled> Sélectionner</option>'

                );

                villes.forEach((element) => {
                    $("#ville_id").append(
                        '<option value="' + element.id + '">  ' + element.nom + ' </option>'
                    );

                });
            },
            error: function (data) {
                console.log(data);

            },
        });

    }

</script>
@stop
