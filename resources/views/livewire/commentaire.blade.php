
  
                            <div class="row m-5">
                                <form wire:submit.prevent="submit" class="row justify-content-center" >
                                        <div class="form-group">
                                            <textarea wire:model.lazy="commentaire" rows="2" type="text" class="form-control" name="commentaire"
                                                placeholder="Commentaire" id="commentaire"
                                            ></textarea>
                                                    @error('commentaire')
                                                <span class="helper-text red-text">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    <input type="hidden" wire:model="crime_id" name="crime_id" value="{{$crime->id}}">
                                    <button class="btn btn-primary" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</button> 
                                </form>
                        </div>
                            {{-- <div class="row m-5" >
                                <form wire:submit.prevent="submit"  style="width: 100%">
                                            <div class="form-group">
                                                <textarea wire:model.lazy="commentaire" rows="2" type="text" class="form-control" name="commentaire"
                                                    placeholder="Commentaire" id="commentaire"
                                                    style="width: 100%"
                                                    ></textarea>
                                                        @error('commentaire')
                                                    <span class="helper-text red-text">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                        </div>
                                    <input type="hidden" wire:model="crime_id" name="crime_id" value="{{$crime->id}}">
                                    <div class="text-right">
                                        <button class="btn btn-primary" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Envoyer</button>
                                    </div>
                                    <br>
                                </form>
                            </div> --}}
                        

    