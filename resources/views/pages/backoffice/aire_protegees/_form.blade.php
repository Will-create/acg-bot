        <div class="card">
            <div class="card-head">

            </div>
                    <div class="card-body">
                        <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label" for="libelle">Libellé<strong class="text-danger">*</strong> </label>
                                 <input type="text" class="form-control" name="libelle" placeholder="Libellé" id="libelle"  value="{{old('libelle') ?? $aire->libelle }}">
                                 @error('libelle')
                                 <span class="helper-text red-text">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label" for="tel">Téléphone <strong class="text-danger">*</strong></label>
                                 <input class="form-control"  name="tel" placeholder="Téléphone" type="text"  value="{{old('tel') ?? $aire->tel}}">
                                 @error('tel')
                                 <span class="helper-text red-text">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label" for="organisation">Pays <strong class="text-danger">*</strong></label>
                                 <select name="pays_id" id="pays_id" class="form-control custom-select select2">
                                     <option value="{{Route::currentRouteName() == 'aire_protegees.edit' ? $aire->pays->id : '' }}" selected >{{Route::currentRouteName() == 'aire_protegees.edit' ? $aire->pays->nom : 'Sélectionner' }}</option>
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
                                     <label class="form-label" for="map">Carte<strong class="text-danger">*</strong> </label>
                                     <input type="text" class="form-control" placeholder="Lien Google map" name="map"  value="{{old('map') ?? $aire->map}}">
                                         @error('map')
                                             <span class="helper-text red-text">
                                             <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                 </div>
                                 
                                 
                                 <div class="form-group">
                                     <label class="form-label" for="code_wdpa_aire">Code WDPA<strong class="text-danger">*</strong> </label>
                                     <input type="text" class="form-control" placeholder="Code WDPA" name="code_wdpa_aire"  id="code_wdpa_aire"  value="{{old('code_wdpa_aire') ?? $aire->code_wdpa_aire}}">
                                         @error('code_wdpa_aire')
                                             <span class="helper-text red-text">
                                             <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                 </div>
                         </div>
                         <div class="col-md-6">
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="adresse">Adresse complete<strong class="text-danger">*</strong></label>
                                    <textarea class="form-control" placeholder="Adresse" rows="5" name="adresse" id="adresse" >{{old('adresse') ?? $aire->adresse}}</textarea>
                                        @error('adresse')
                                        <span class="helper-text red-text">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label class="form-label" for="libelle">Nom Responsable<strong class="text-danger">*</strong> </label>
                                        <input type="text" class="form-control" name="nom_responsable" placeholder="Nom du responsable" id="libelle"  value="{{old('nom_responsable') ?? ucfirst($aire->nom_responsable) }}">
                                        @error('nom_responsable')
                                        <span class="helper-text red-text">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="libelle">Prenom Responsable<strong class="text-danger">*</strong> </label>
                                        <input type="text" class="form-control" name="prenom_responsable" placeholder="Prenom du responsable" id="prenom_responsable"  value="{{old('prenom_responsable') ?? ucfirst($aire->prenom_responsable) }}">
                                        @error('prenom_responsable')
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
       
       <div class="row">
           <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0 card-title">Veuillez ajouter un logo  <strong class="text-danger">*</strong></h3>
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
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0 card-title">Veuillez insérer une image de couverture <strong class="text-danger">*</strong></h3>
            </div>
            <div class="card-body">
                <input type="file" class="dropify" id="image_couverture" data-max-file-size="1M" name="image_couverture" accept="image/*" />
                @error('image_couverture')
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
        </div>
           </div>
       </div>
       <div class="modal-footer">
        <a href="{{ route('aire_protegees.index') }}" class="btn btn-dark"> <i class="fa fa-times"
                aria-hidden="true"></i>
            Annuler </a>
        <button type="submit" class="btn btn-primary"> <span>
                <i class="fe fe-save"></i>
            </span> {{ $btnAction }}</button>
        </div>