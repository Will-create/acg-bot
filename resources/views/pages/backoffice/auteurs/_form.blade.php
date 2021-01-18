        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="nom">Nom <strong class="text-danger">*</strong>
                                    </label>
                                    <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"
                                        value="{{old('nom') ?? $auteur->nom }}" required>
                                    @error('nom')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="prenom">Prénom <strong
                                            class="text-danger">*</strong></label>
                                    <input class="form-control" name="prenom" placeholder="Prénom" type="text"
                                        value="{{old('prenom') ?? $auteur->prenom}}" required>
                                    @error('prenom')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="genre">Qualité<strong
                                            class="text-danger">*</strong></label>
                                    <select name="type" id="genre" class="form-control custom-select select2">
                                        <option
                                            value="{{Route::currentRouteName() == 'crime_auteurs.show' ? ($auteur->type) : '' }}"
                                            {{Route::currentRouteName() == 'crime_auteurs.show' ? '' : 'disabled' }}
                                            selected>
                                            {{Route::currentRouteName() == 'crime_auteurs.show' ? ucFirst($auteur->type) : 'Sélectionner' }}
                                        </option>
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="nationalite">Nationalité <strong
                                    class="text-danger">*</strong> </label>
                            <input type="text" class="form-control" name="nationalite" placeholder="Nationalité"
                                id="nationalite" value="{{old('nationalite') ?? $auteur->nationalite }}" required>
                            @error('nationalite')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="form-label" for="date_naiss">Date de Naissance <strong
                                    class="text-danger">*</strong> </label>
                            <input type="date" class="form-control" name="date_naiss" placeholder="Date de naissance"
                                id="date_naiss" value="{{old('date_naiss') ?? $auteur->date_naiss }}" required max="{{date('Y-m-d')}}">
                            @error('date_naiss')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="form-label" for="genre">Genre <strong class="text-danger">*</strong></label>
                            <select name="genre" id="genre" class="form-control custom-select select2" required>
                                <option
                                    value="{{Route::currentRouteName() == 'crime_auteurs.show' ? $auteur->genre : '' }}"
                                    {{Route::currentRouteName() == 'crime_auteurs.show' ? '' : 'disabled' }} selected>
                                    {{Route::currentRouteName() == 'crime_auteurs.show' ? ucFirst($auteur->genre) : 'Sélectionner' }}
                                </option>
                                <option value="masculin">Masculin</option>
                                <option value="feminin">Feminin</option>
                            </select>
                            @error('genre')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>


                    {{-- <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="pays">Pays<strong class="text-danger">*</strong></label>
                                    <select name="pays_id" id="pays_id" class="form-control custom-select select2">
                                        <option  value="{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->pays->id : '' }}"
                    {{Route::currentRouteName() == 'crime_auteurs.edit' ? '' : 'disabled' }} selected
                    >{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->pays->nom : 'Sélectionner' }}
                    </option>
                    @foreach ($pays as $p)
                    <option value="{{$p->id}}"><span class="red-text">{{$p->nom}}</span></option>
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
                        <option
                            value="{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->localite->id : '' }}"
                            {{Route::currentRouteName() == 'crime_auteurs.edit' ? '' : 'disabled' }} selected>
                            {{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->localite->nom  : 'Sélectionner' }}
                        </option>
                        @foreach ($localites as $localite)
                        <option value="{{$localite->id}}"> <span class="red-text">{{$localite->nom}}</span></option>
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
        </div> --}}
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="travail">Profession <strong class="text-danger"></strong></label>
                        <input class="form-control" name="travail" placeholder="Profession" type="text"
                            value="{{old('travail') ?? $auteur->travail}}">
                        @error('travail')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="revenue">Revenue Mensuel en XOF <strong class="text-danger"></strong></label>
                        <input class="form-control" name="revenue" placeholder="Revenue Mensuel" type="text"
                            value="{{old('revenue') ?? $auteur->revenue}}">
                        @error('revenue')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
<input type="hidden" name="crimeUiid" value="{{$crimeUuid}}">

            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="form-group">
                            <label for="">Voyageur internationnal : </label>
                            <label for="voyageur_international">
                                <input type="radio" @if(!$auteur->voyageur_international || $auteur->voyageur_international == 0)  checked @endif name="voyageur_international" value="0"
                                    id="voyageur_international">
                                Non
                            </label>
                            <label for="passport">
                                <input type="radio" @if($auteur->voyageur_international && $auteur->voyageur_international == 1)  checked @endif name="voyageur_international" id="passport" value="1" >
                                Oui
                        </div>
                    </div>
                    @error('voyageur_international')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="form-group">
                            <label for="">Education :</label>
                            <label for="cnib">
                                <input type="radio"  @if(!$auteur->education || $auteur->education == 0) checked @endif   name="education" id="cnib" value="0">
                                Non
                            </label>
                            <label for="passport">
                                <input type="radio" @if($auteur->education && $auteur->education == 1) checked @endif name="education" value="1">
                                Oui
                        </div>
                    </div>
                    @error('education')
                    <span class="helper-text red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-">
                    <div class="row">
                        <div class="form-group">
                            <label for="">En lien avec le terrorisme :</label>
                            <label for="terrorisme">
                                <input type="radio"  @if(!$auteur->terrorisme || $auteur->terrorisme == 0) checked @endif   name="terrorisme" id="cnib" value="0">
                                Non
                            </label>
                            <label for="passport">
                                <input type="radio" @if($auteur->terrorisme && $auteur->terrorisme == 1) checked @endif name="terrorisme" value="1">
                                Oui
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
        {{-- <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="organisation">Crime <strong class="text-danger">*</strong></label>
                                    <select name="crime_id" id="crime_id" class="form-control custom-select select2">
                                        <option  value="{{Route::currentRouteName() == 'armes.edit' ? $arme->crime->id : '' }}"
        {{Route::currentRouteName() == 'armes.edit' ? '' : 'disabled' }} selected
        >{{Route::currentRouteName() == 'armes.edit' ? $arme->crime->localite_apprehension  : 'Sélectionner' }}</option>
        @foreach ($crimes as $crime)
        <option value="{{$crime->id}}"> <span class="red-text">{{strtoupper($crime->uuid)}}

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
                        <label class="form-label" for="genre">Type de crime<strong
                                class="text-danger">*</strong></label>
                        <select name="genre" id="genre" class="form-control custom-select select2">
                            <option value="{{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->type : '' }}"
                                {{Route::currentRouteName() == 'crime_auteurs.edit' ? '' : 'disabled' }} selected>
                                {{Route::currentRouteName() == 'crime_auteurs.edit' ? $auteur->type : 'Sélectionner' }}
                            </option>
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
                </div> --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="adresse">Adresse complète ( adresse, ville, pays ) <strong class="text-danger">*</strong> </label>
                        </label>
                        <textarea rows="5" type="text" class="form-control" name="adresse"
                            placeholder="Précédents judiciaires" id="adresse"
                            >{{ old('adresse') ?? $auteur->adresse }}</textarea>
                            @error('adresse')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="affaire_judiciaire">Précédents judiciaires<strong
                                    class="text-danger"></strong>
                            </label>
                            <textarea rows="5" type="text" class="form-control" name="affaire_judiciaire"
                                placeholder="Précédents judiciaires" id="affaire_judiciaire"
                                >{{ old('affaire_judiciaire') ?? $auteur->affaire_judiciaire }}</textarea>
                            @error('affaire_judiciaire')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>


                    <a href="{{ route('crimes.show', $auteur->crime ? $auteur->crime->uuid : $crimeUuid) }}" onclick="cibleur('auteur')" class="btn btn-dark"> <i class="fa fa-times"
                            aria-hidden="true"></i>
                        Annuler </a>
                    <button type="submit" class="btn btn-primary"><span>
                            <i class="fe fe-save"></i>
                        </span> {{ $btnAction }}</button>


                </div>
                </div>
