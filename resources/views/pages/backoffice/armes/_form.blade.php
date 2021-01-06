        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="libelle">Libéllé <strong class="text-danger">*</strong> </label>
                                    <input type="text" class="form-control" name="libelle" placeholder="Libellé" id="libelle"  value="{{old('libelle') ?? $arme->libelle }}" required>
                                    @error('libelle')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="reference">Réference <strong class="text-danger">*</strong></label>
                                    <input class="form-control"  name="reference" placeholder="Réference" type="text"  value="{{old('reference') ?? $arme->reference}}" required>
                                    @error('reference')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="organisation">Crime <strong class="text-danger">*</strong></label>
                            <select name="crime_id" id="crime_id" class="form-control custom-select select2">
                                <option  value="{{Route::currentRouteName() == 'armes.edit' ? $arme->crime->id : '' }}" {{Route::currentRouteName() == 'armes.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'armes.edit' ? $arme->crime->localite_apprehension  : 'Sélectionner' }}</option>
                                @foreach ($crimes as $crime)
                                <option  value="{{$crime->id}}"> <span class="red-text">{{strtoupper($crime->uuid)}}  
                                    
                                    @endforeach
                                </select>
                                @error('crime_id')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="remarques">Remarques <strong
                                class="text-danger">*</strong>
                                 </label>
                                    <textarea rows="5" type="text" class="form-control" name="remarques"
                                        placeholder="Remarques" id="remarques"
                                        required>{{ old('remarques') ?? $arme->remarques }}</textarea>
                                         @error('remarques')
                                        <span class="helper-text red-text">
                                            <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                        </div>
            
                </div>
                <div class="col-md-12 ">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Photo de l'arme <strong class="text-danger">*</strong></h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" id="photo" data-max-file-size="1M" name="photo" accept="image/*"/>
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
            <button type="submit" class="btn btn-primary"><span>
                    <i class="fe fe-save"></i>
                </span> {{ $btnAction }}</button>
        </div>
    </div>