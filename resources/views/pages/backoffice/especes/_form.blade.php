
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="nom">Nom <strong class="text-danger">*</strong> </label>
                                    <input type="text" class="form-control" name="nom" placeholder="Dénomination" id="nom"  value="{{old('nom') ?? $espece->nom }}" required>
                                    @error('nom')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="famille">Famille <strong class="text-danger">*</strong></label>
                                    <input class="form-control"  name="famille" placeholder="Téléphone" type="text"  value="{{old('famille') ?? $espece->famille}}" required>
                                    @error('famille')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="form-label" for="organisation">Ordres <strong class="text-danger">*</strong></label>
                        <select name="ordre_id" id="ordre_id" class="form-control custom-select select2">
                            <option value="{{Route::currentRouteName() == 'especes.edit' ? $espece->ordre->id : '' }}" selected >{{Route::currentRouteName() == 'especes.edit' ? ucfirst($espece->ordre->nom) : 'Sélectionner' }}</option>
                            @foreach ($ordres as $ordre)
                        <option value="{{$ordre->id}}">{{$ordre->nom}}</option>
                            @endforeach
                        </select>
                        @error('ordre_id')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
               
                   
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="nom_scientifique">Nom scientifique <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" placeholder="Nom scientifique" name="nom_scientifique" placeholder="nom_scientifiqueidude" id="nom_scientifique"  value="{{old('nom_scientifique') ?? $espece->nom_scientifique}}" required>
                        @error('nom_scientifique')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
               
                <div class="form-group">
                    <label class="form-label" for="organisation">Type d'espece <strong class="text-danger">*</strong></label>
                    <select name="type" id="type" class="form-control custom-select select2">
                        <option value="{{Route::currentRouteName() == 'especes.edit' ? $espece->type : '' }}" selected >{{Route::currentRouteName() == 'especes.edit' ? ucfirst( $espece->type) : 'Sélectionner' }}</option>
                        <option value="espece animale">Espece Animale</option>
                        <option value="espece vegetale">Espece Végétale</option> 
                    </select>
                    @error('type')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>            
                <div class="col-md-12 ">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Veuillez ajouter un logo  <strong class="text-danger">*</strong></h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" id="logo" data-max-file-size="1M" name="photo" accept="" />
                            @error('photo')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
				</div>
            </div>
        <div class="modal-footer">
            <a href="{{ route('especes.index') }}" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"> <span>
                    <i class="fe fe-save"></i>
                </span> {{ $btnAction }}</button>
        </div>
