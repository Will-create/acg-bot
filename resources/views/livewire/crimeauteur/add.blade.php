<div>
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="nom">Nom <strong class="text-danger">*</strong> </label>
                                <input type="text" class="form-control" name="nom" placeholder="Libellé" id="nom"  value="{{old('nom') ?? $auteur->nom }}" required>
                                @error('nom')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="prenom">Prenom<strong class="text-danger">*</strong></label>
                                <input class="form-control"  name="prenom" placeholder="Réference" type="text"  value="{{old('prenom') ?? $auteur->prenom}}" required>
                                @error('prenom')
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
                                <label class="form-label" for="genre">Genre<strong class="text-danger">*</strong></label>
                                <select name="genre" id="genre" class="form-control custom-select select2">
                                    <option  value="{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->genre : '' }}" {{Route::currentRouteName() == 'crime_auteurs.edit' ? '' : 'disabled' }} selected>{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->genre : 'Sélectionner' }}</option>
                                   <option value="homme">Homme</option>
                                   <option value="femme">Femme</option>
                                    </select>
                                    @error('genre')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                        </div>

                        <div class="col-md-6">

                                <div class="form-group">
                                    <label class="form-label" for="date_naiss">Date de Naissance <strong class="text-danger">*</strong> </label>
                                    <input type="date" class="form-control" name="date_naiss" placeholder="Date de naissance" id="date_naiss"  value="{{old('date_naiss') ?? $auteur->date_naiss }}" required>
                                    @error('date_naiss')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="pays">Pays<strong class="text-danger">*</strong></label>
                                <select name="pays_id" id="pays_id" class="form-control custom-select select2">
                                    <option  value="{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->pays->id : '' }}" {{Route::currentRouteName() == 'crime_auteurs.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->pays->nom : 'Sélectionner' }}</option>
                                    @foreach ($pays as $p)
                                    <option  value="{{$p->id}}"><span class="red-text">{{$p->nom}}</span></option>
                                        @endforeach
                                    </select>
                                    @error('pays_id')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="organisation">Localité<strong class="text-danger">*</strong></label>
                                <select name="localite_id" id="localite_id" class="form-control custom-select select2">
                                    <option  value="{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->localite->id : '' }}" {{Route::currentRouteName() == 'crime_auteurs.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->localite->nom  : 'Sélectionner' }}</option>
                                    @foreach ($localites as $localite)
                                    <option  value="{{$localite->id}}"> <span class="red-text">{{$localite->nom}}</span></option>
                                        @endforeach
                                    </select>
                                    @error('localite_id')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="adresse">Adresse<strong class="text-danger">*</strong> </label>
                                <input type="text" class="form-control" name="adresse" placeholder="Adresse" id="adresse"  value="{{old('adresse') ?? $auteur->adresse }}" required>
                                @error('adresse')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="revenue">Revenue<strong class="text-danger">*</strong></label>
                                <input class="form-control"  name="revenue" placeholder="Réference" type="text"  value="{{old('revenue') ?? $auteur->revenue}}" required>
                                @error('revenue')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="nationalite">Nationalité<strong class="text-danger">*</strong> </label>
                                <input type="text" class="form-control" name="nationalite" placeholder="nationalite" id="nationalite"  value="{{old('nationalite') ?? $auteur->nationalite }}" required>
                                @error('nationalite')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="travail">Travail<strong class="text-danger">*</strong></label>
                                <input class="form-control"  name="travail" placeholder="Réference" type="text"  value="{{old('travail') ?? $auteur->travail}}" required>
                                @error('travail')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group">
                                 <label for="">Voyageur internationnal? </label>
                                 <label for="voyageur_international">
                                     <input  type="radio" checked name="voyageur_international" value="voyageur_international" id="voyageur_international">
                                     Non
                                 </label>
                                 <label for="passport">
                                     <input  type="radio" value="passport" name="voyageur_international" id="passport">
                                    OUi
                                  </div>
                                </div>
                                @error('voyageur_international')
                                 <span class="helper-text red-text">
                                 <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group">
                                 <label for="">Education ?</label>
                                 <label for="cnib">
                                     <input  type="radio" checked name="education" value="cnib" id="cnib">
                                     Non
                                 </label>
                                 <label for="passport">
                                     <input  type="radio" value="passport" name="education" id="passport">
                                    OUi
                                  </div>
                                </div>
                                @error('education')
                                 <span class="helper-text red-text">
                                 <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-6">
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
                                <label class="form-label" for="genre">Type de crime<strong class="text-danger">*</strong></label>
                                <select name="genre" id="genre" class="form-control custom-select select2">
                                    <option  value="{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->type : '' }}" {{Route::currentRouteName() == 'crime_auteurs.edit' ? '' : 'disabled' }} selected>{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->type : 'Sélectionner' }}</option>
                                <option value="auteur">Auteur</option>
                                <option value="complice">Complice</option>
                                    </select>
                                    @error('type')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>


               <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="affaire_judiciaire">Affaire judiciaire<strong
                        class="text-danger">*</strong>
                         </label>
                            <textarea rows="5" type="text" class="form-control" name="affaire_judiciaire"
                                placeholder="affaire_judiciaire" id="affaire_judiciaire"
                                required>{{ old('affaire_judiciaire') ?? $auteur->affaire_judiciaire }}</textarea>
                                 @error('affaire_judiciaire')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                                </div>
               </div>
            </div>

        <div class="modal-footer">
            <a href="{{ route('crime_auteurs.index') }}" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"><span>
                    <i class="fe fe-save"></i>
                </span> {{ $btnAction }}</button>
        </div>
    </div>
    </div>

    @include('livewire.crimeauteur.list')
</div>
