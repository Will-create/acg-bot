        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="designation">Designation <strong
                                    class="text-danger">*</strong>
                            </label>
                            <input type="text" class="form-control" name="nom" placeholder="Designation" id="nom"
                                value="{{ old('nom') ?? $type->nom }}" required>
                            @error('nom')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="designation">Description <strong
                                    class="text-danger">*</strong>
                            </label>
                            <textarea rows="4" type="text" class="form-control" name="description"
                                placeholder="Description" id="description"
                                required>{{ old('description') ?? $type->description }}</textarea>
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
            <a href="{{ route('type_unites.index') }}" class="btn btn-dark"> <i class="fa fa-times"
                    aria-hidden="true"></i>
                Annuler </a>
            <button type="submit" class="btn btn-primary"> <span>
                    <i class="fe fe-save"></i>
                </span> {{ $btnAction }}</button>
        </div>