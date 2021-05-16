        <div class="card">
            <div class="card-head"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="designation">Désignation<strong class="text-danger">*</strong> </label>
                            <input type="text" class="form-control" name="nom" placeholder="Désignation" id="nom"  value="{{old('nom') ?? $menu->nom }}" required>
                            @error('nom')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="organisation">Parent (Facultatif) <strong class="text-danger"></strong></label>
                            <select name="parent_id" id="parent_id" class="form-control custom-select select2">
                                <option value="" selected disabled> Selectionner </option>
                                @foreach ($parents as $parent)
                                <option value="{{$parent->id}}">{{ucFirst($parent->nom)}}</option>
                                @endforeach
                                {{-- <option value="{{Route::currentRouteName() == 'menus.edit' ? $menu->localite->id : '' }}" {{Route::currentRouteName() == 'menus.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'menu.edit' ? $menu->localite->nom.', ('.$menu->localite->pay->nom.')'  : 'Sélectionner' }}</option> --}}
                            </select>
                            @error('parent_id')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="automate_id">Automate<strong class="text-danger"></strong></label>
                            <select name="automate_id" id="automate_id" class="form-control custom-select select2">
                                <option value="" selected disabled> Selectionner </option>
                                @foreach ($automates as $automate)
                                <option value="{{$automate['id']}}">{{$automate['nom']}}</option>
                                @endforeach
                                {{-- <option value="{{Route::currentRouteName() == 'menus.edit' ? $menu->localite->id : '' }}" {{Route::currentRouteName() == 'menus.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'menu.edit' ? $menu->localite->nom.', ('.$menu->localite->pay->nom.')'  : 'Sélectionner' }}</option> --}}
                            </select>
                            @error('automate_id')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="organisation">Type<strong class="text-danger">*</strong></label>
                            <select name="type_menu_id" id="type_menu_id" class="form-control custom-select select2" required>
                                <option value="{{Route::currentRouteName() == 'menus.edit' ? $menu->type->id : '' }}" {{Route::currentRouteName() == 'menus.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'menus.edit' ? ucfirst($menu->type->nom) : 'Sélectionner' }}</option>
                                @foreach ($types as $type)
                            <option value="{{$type->id}}">{{ucFirst($type->nom)}}</option>
                                @endforeach
                            </select>
                            @error('type_menu_id')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="desription">Description<strong class="text-danger">*</strong></label>
                            <textarea class="form-control" placeholder="description" rows="6" name="description" id="description"  >{{old('description') ?? $menu->description}}</textarea>
                            @error('description')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('menus.index') }}" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"> <span>
                    <i class="fe fe-save"></i>
                </span> {{ $btnAction }}</button>
        </div>
        
