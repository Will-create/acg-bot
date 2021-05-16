
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="nom">Nom de l'Opérateur<strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"  value="{{old('nom')?? $operateur->nom}}">
                        @error('nom')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
					<div class="form-group">
                        <label class="form-label" for="iso_pays">Code ISO 3  du pays<strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" name="iso_pays" placeholder="Code ISO dy pays" id="iso_pays"  value="{{old('iso_pays') ?? $operateur->iso_pays}}">
                        @error('iso_pays')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label class="form-label" for="nom">Pays<strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="pays" placeholder="Pays" id="pays"  value="{{old('pays')?? $operateur->pays}}">
                        @error('pays')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
                    <br>
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Veuillez ajouter le logo de l'Opérateur</h3>
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
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="{{ route('pays.index') }}" class="btn btn-dark"> <i class="fa fa-times"
                aria-hidden="true"></i>
            Annuler </a>
        <button type="submit" class="btn btn-primary"> <span>
                <i class="fe fe-save"></i>
            </span> {{ $btnAction }}</button>
    </div>


