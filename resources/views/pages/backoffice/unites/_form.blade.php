
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="designation">Dénomination <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="designation" placeholder="Dénomination" id="designation"  value="{{old('designation') ?? $unite->designation }}" required>
                        @error('designation')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="tel">Téléphone <strong class="text-danger">*</strong></label>
                                    <input class="form-control"  name="tel" placeholder="Téléphone" type="text"  value="{{old('tel') ?? $unite->tel}}" required>
                                    @error('tel')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                           <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="tel">Téléphone 2 <strong class="text-danger">*</strong></label>
                                <input class="form-control" placeholder="Téléphone"  name="tel2" type="text"  value="{{old('tel2')?? $unite->tel2}}">
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
                        <select name="pays_id" id="pays_id" class="form-control custom-select select2">
                            <option value="{{Route::currentRouteName() == 'unites.edit' ? $unite->pays->id : '' }}" selected >{{Route::currentRouteName() == 'unites.edit' ? $unite->pays->nom : 'Sélectionner' }}</option>
                            @foreach ($pays as $pay)
                        <option value="{{$pay->id}}">{{$pay->nom}}</option>
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
                            <option value="{{Route::currentRouteName() == 'unites.edit' ? $unite->localite->id : '' }}" selected >{{Route::currentRouteName() == 'unites.edit' ? $unite->localite->nom.'______('.$unite->localite->pay->nom.')'  : 'Sélectionner' }}</option>
                            @foreach ($localites as $localite)
                        <option value="{{$localite->id}}">{{$localite->nom}}______ ({{$localite->pay->nom}})</option>
                            @endforeach
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
                                <input type="text" class="form-control" placeholder="Longitude" name="long" placeholder="Longitude" id="long"  value="{{old('long') ?? $unite->long}}" required>
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
                                <input type="text" class="form-control" placeholder="Latitude" name="lat" placeholder="Latidude" id="lat"  value="{{old('lat') ?? $unite->lat}}" required>
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
                            <option value="{{Route::currentRouteName() == 'unites.edit' ? $unite->type->id : '' }}" selected >{{Route::currentRouteName() == 'unites.edit' ? $unite->type->nom : 'Sélectionner' }}</option>

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
                    <div class="form-group">
                        <label class="form-label" for="administration_tutelle">Administration tutelle <strong class="text-danger">*</strong></label>
                        <input class="form-control" placeholder="Administration tutelle"  name="administration_tutelle" type="text"  value="{{old('administration_tutelle') ?? $unite->administration_tutelle}}" required>
                        @error('administration_tutelle')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="organisation">Responsables <strong class="text-danger">*</strong></label>
                        <select name="responsable_id" id="responsable_id" class="form-control custom-select select2">
                            <option value="{{Route::currentRouteName() == 'unites.edit' ? $unite->responsable->id : '' }}" selected >{{Route::currentRouteName() == 'unites.edit' ? $unite->responsable->nom  : 'Sélectionner' }}</option>

                            @foreach ($responsables as $responsable)
                        <option value="{{$responsable->id}}">{{$responsable->nom}} //
                            {{$responsable->pay->nom}} //
                            {{$responsable->role->designation}}//</option>
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
                        <textarea class="form-control" placeholder="Adresse" rows="6" name="adresse" id="adresse"  required>{{old('adresse') ?? $unite->adresse}}</textarea>
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
                            <h3 class="mb-0 card-title">Veuillez ajouter un logo  <strong class="text-danger">*</strong></h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" id="logo" data-max-file-size="1M" name="logo" accept="" />
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
                            <h3 class="mb-0 card-title">Veuillez insérer une photo de couverture <strong class="text-danger">*</strong></h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" id="photo_couverture" data-max-file-size="1M" name="photo_couverture" accept="" />
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
        <div class="modal-footer">
            <a href="{{ route('unites.index') }}" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"> <span>
                    <i class="fe fe-save"></i>
                </span> {{ $btnAction }}</button>

        </div>
