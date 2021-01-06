        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                 
                            <div class="form-group">
                                <label class="form-label" for="pour">Destinataire <strong class="text-danger">*</strong></label>
                                <select name="pour" id="pour" class="form-control custom-select select2">
                                    <option  value="{{Route::currentRouteName() == 'commentaires.edit' ? $commentaire->pour : '' }}" {{Route::currentRouteName() == 'commentaires.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'commentaires.edit' ? $commentaire->destinataire->nom.'  '.$commentaire->destinataire->prenom.' ('.$commentaire->destinataire->role->designation.') ' : 'Sélectionner' }}</option>
                                    @foreach ($destinataires as $destinataire) 
                                    <option  value="{{$destinataire->id}}"> <span class="red-text">{{$destinataire->nom}} {{$destinataire->prenom}} ({{$destinataire->role->designation}})
                                        @endforeach
                                    </select>
                                    @error('pour')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="organisation">Crime <strong class="text-danger">*</strong></label>
                                <select name="crime_id" id="crime_id" class="form-control custom-select select2">
                                    <option  value="{{Route::currentRouteName() == 'commentaires.edit' ? $commentaire->crime_id : '' }}" {{Route::currentRouteName() == 'commentaires.edit' ? '' : 'disabled' }} selected >{{Route::currentRouteName() == 'commentaires.edit' ? $commentaire->crime->localite_apprehension  : 'Sélectionner' }}</option>
                                    @foreach ($crimes as $crime)
                                    <option  value="{{$crime->id}}"> <span class="red-text">{{ strtoupper($crime->uuid)}}  
                                        
                                        @endforeach
                                    </select>
                                    @error('crime_id')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                           
                </div>
               <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="commentaire">Commentaire <strong
                        class="text-danger">*</strong>
                         </label>
                            <textarea rows="5" type="text" class="form-control" name="commentaire"
                                placeholder="commentaire" id="commentaire"
                                required>{{ old('commentaire') ?? $commentaire->commentaire }}</textarea>
                                 @error('commentaire')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
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
