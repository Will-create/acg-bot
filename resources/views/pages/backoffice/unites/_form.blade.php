        <div class="card">
            <div class="card-head"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="designation">Dénomination <strong class="text-danger">*</strong> </label>
                            <input type="text" class="form-control" name="designation" placeholder="Dénomination" id="designation"  value="{{old('designation') ?? $unite->designation }}" >
                            @error('designation')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label " for="tel">Téléphone <strong class="text-danger">*</strong></label>
                                        <input class="form-control phone"  name="tel" placeholder="Téléphone" type="text"  value="{{old('tel') ?? $unite->tel}}" >
                                        @error('tel')
                                        <span class="helper-text red-text">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                               <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="tel">Téléphone 2</label>
                                    <input class="form-control phone" placeholder="Téléphone"  name="tel2" type="text"  value="{{old('tel2')?? $unite->tel2}}">
                                    @error('tel2')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                               </div>
                            </div>
                        <div class="form-group">
                            <label class="form-label" for="organisation">Pays <strong class="text-danger">*</strong></label>
                            <select onchange="lier(this.value)" id="select"  name="pays_id" id="pays_id" class="form-control custom-select select2">
                                <option  value="{{Route::currentRouteName() == 'unites.edit' ? $unite->pays->id : '' }}" {{Route::currentRouteName() == 'unites.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'unites.edit' ? $unite->pays->nom : 'Sélectionner' }}</option>
                                @foreach ($pays as $pay)
                            <option  id="{{$pay->id}}" value="{{$pay->id}}">{{$pay->nom}}</option>
                                @endforeach
                            </select>
                            @error('pays_id')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="organisation">Localite <strong class="text-danger">*</strong></label>
                            <select name="localite_id" id="localite_id" class="form-control custom-select select2">
                                <option value="{{Route::currentRouteName() == 'unites.edit' ? $unite->localite->id : '' }}" {{Route::currentRouteName() == 'unites.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'unites.edit' ? $unite->localite->nom.'______('.$unite->localite->pay->nom.')'  : 'Sélectionner' }}</option>
                                
                            </select>
                            @error('localite_id')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="long">Longitude <strong class="text-danger">*</strong> </label>
                                    <input type="text" class="form-control" placeholder="Longitude" name="long" placeholder="Longitude" id="long"  value="{{old('long') ?? $unite->long}}" >
                                    @error('long')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="lat">Latitude <strong class="text-danger">*</strong> </label>
                                    <input type="text" class="form-control" placeholder="Latitude" name="lat" placeholder="Latidude" id="lat"  value="{{old('lat') ?? $unite->lat}}" >
                                    @error('lat')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="organisation">Type <strong class="text-danger">*</strong></label>
                            <select name="type_unite_id" id="type_unite_id" class="form-control custom-select select2">
                                <option value="{{Route::currentRouteName() == 'unites.edit' ? $unite->type->id : '' }}" {{Route::currentRouteName() == 'unites.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'unites.edit' ? $unite->type->nom : 'Sélectionner' }}</option>
                                @foreach ($types as $type)
                            <option value="{{$type->id}}">{{ucFirst($type->nom)}}</option>
                                @endforeach
                            </select>
                            @error('type_unite_id')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                       <div class="row"> 
                       <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="form-label" for="administration_tutelle">Administration tutelle</label>
                            <input class="form-control" placeholder="Administration tutelle"  name="administration_tutelle" type="text"  value="{{old('administration_tutelle') ?? $unite->administration_tutelle}}" >
                            @error('administration_tutelle')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="organisation">Responsables <strong class="text-danger">*</strong></label>
                            <select name="responsable_id" id="responsable_id" class="form-control custom-select select2">
                                <option  value="{{Route::currentRouteName() == 'unites.edit' ? $unite->responsable->id : '' }}" {{Route::currentRouteName() == 'unites.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'unites.edit' ? $unite->responsable->nom  : 'Sélectionner' }}</option>
                                @foreach ($responsables as $responsable)
                            <option  value="{{$responsable->id}}"> <span class="red-text">Nom:</span> {{$responsable->nom}} {{$responsable->prenom}} Pays:   
                                {{$responsable->pay->nom}} Role:
                                {{$responsable->role->designation}}</option>
                                @endforeach
                            </select>
                            @error('responsable_id')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="form-label" for="adresse">Adresse complete <strong class="text-danger">*</strong></label>
                            <textarea class="form-control" placeholder="Adresse" rows="6" name="adresse" id="adresse"  >{{old('adresse') ?? $unite->adresse}}</textarea>
                            @error('adresse')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card shadow">
                            <div class="card-header">
                                <h3 class="mb-0 card-title">Veuillez ajouter un logo </h3>
                            </div>
                            <div class="card-body">
                                <input type="file" class="dropify" id="logo" data-max-file-size="1M" name="logo" accept="image/*" />
                                @error('logo')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card shadow">
                            <div class="card-header">
                                <h3 class="mb-0 card-title">Veuillez insérer une photo de couverture </h3>
                            </div>
                            <div class="card-body">
                                <input type="file" class="dropify" id="photo_couverture" data-max-file-size="1M" name="photo_couverture" accept="image/*" />
                                @error('photo_couverture')
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
        
        <div class="modal-footer">
            <a href="{{ route('unites.index') }}" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"> <span>
                    <i class="fe fe-save"></i>
                </span> {{ $btnAction }}</button>
        </div>
        <script>
            var listlocalite = document.getElementById('localite_id');									
            function lier(id){
                 axios.get('/localites/api/filtreur/'+id).then(function(data){
                    data.data.localites.map(function(loc){
                    listlocalite.innerHTML += '<option value="' + loc.id + '">  ' + loc.nom + ' </option>';
                })
            })
            }
    </script>