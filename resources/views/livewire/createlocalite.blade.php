<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Open Form
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
