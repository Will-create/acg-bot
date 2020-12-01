
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="designation">Nom <strong class="text-danger">*</strong> </label>
                            <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"  value="{{old('nom') ?? $localite->nom}}" required>
                            @error('nom')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="organisation">Pays <strong class="text-danger">*</strong></label>
                            <select name="pays_id" id="" class="form-control custom-select select2">
                                <option value="{{Route::currentRouteName() == 'localites.edit' ? $localite->pay->id : '' }}" selected >{{Route::currentRouteName() == 'localites.edit' ? $localite->pay->nom : 'Sélectionner' }}</option>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('localites.index') }}" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"> <span>
                    <i class="fe fe-save"></i>
                </span> {{ $btnAction }}</button>
        </div>