        <div class="card">
            <div class="card-head"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="designation">Désignation<strong class="text-danger">*</strong> </label>
                            <input type="text" class="form-control" name="nom" placeholder="Désignation" id="nom"  value="{{old('nom') ?? $api->nom }}" required>
                            @error('nom')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="fournisseur">Fournisseur<strong class="text-danger">*</strong> </label>
                            <input type="text" class="form-control" name="fournisseur" placeholder="Fournisseur" id="fournisseur"  value="{{old('fournisseur') ?? $api->fournisseur }}" required>
                            @error('fournisseur')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label class="form-label" for="api_key">Clé Api<strong class="text-danger"></strong> </label>
                                <input type="text" class="form-control" name="api_key" placeholder="Désignation" id="api_key"  value="{{old('api_key') ?? $api->api_key }}">
                                @error('api_key')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="organisation">Menu parent <strong class="text-danger">*</strong></label>
                                <select name="menu_id" id="menu_id" class="form-control custom-select select2" required>
                                    <option value="{{Route::currentRouteName() == 'apis.edit' ? $api->menu_id : '' }}" {{Route::currentRouteName() == 'apis.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'apis.edit' ? ucfirst($api->menu->nom) : 'Sélectionner' }}</option>
                                    @foreach ($menus as $menu)
                                <option value="{{$menu->id}}">{{ucFirst($menu->nom)}}</option>
                                    @endforeach
                                </select>
                                @error('menu_id')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label class="form-label" for="fournisseur">URL<strong class="text-danger"></strong> </label>
                            <input type="text" class="form-control" name="url" placeholder="url" id="url"  value="{{old('url') ?? $api->url }}" required>
                            @error('url')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="desription">Description<strong class="text-danger">*</strong></label>
                            <textarea class="form-control" placeholder="description" rows="9" name="description" id="description"  >{{old('description') ?? $api->description}}</textarea>
                            @error('description')
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
            <a href="{{ route('apis.index') }}" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"> <span>
                    <i class="fe fe-save"></i>
                </span> {{ $btnAction }}</button>
        </div>
        
