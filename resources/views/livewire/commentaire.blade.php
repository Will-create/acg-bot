<div>
    <form action="{{ route('commentaires.store')}}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-12">
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
            <div class="col-md-12">
                <div class="form-group">
                    
                    <textarea rows="2" type="text" class="form-control" name="commentaire"
                        placeholder="Commentaire" id="commentaire"
                        required></textarea>
                            @error('commentaire')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        
        </div>
        <input type="hidden" name="crime_id" value="{{$crime->id}}">
        <div class="text-right">
            <button class="btn btn-primary" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</button> 
        </div>
        <br>
    </form>
</div>
