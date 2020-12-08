
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="nom">Nom<strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"  value="{{old('nom')?? $pays->nom}}">
                        @error('nom')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
					<div class="form-group">
                        <label class="form-label" for="codeiso3_pays_origine">Code ISO 3 <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" name="codeiso3_pays_origine" placeholder="Code ISO" id="codeiso3_pays_origine"  value="{{old('codeiso3_pays_origine') ?? $pays->codeiso3_pays_origine}}">
                        @error('codeiso3_pays_origine')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 ">
                    <br>
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Veuillez ajouter le drapeau du pays <strong class="text-danger">*</strong></h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" id="icone" data-max-file-size="1M" name="icone" accept="image/*" />
                            @error('icone')
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


