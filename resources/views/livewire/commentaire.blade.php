<div>

<<<<<<< HEAD
    <div class="card">
        <div class="card-body">
            <ul class="demo-accordion accordionjs m-0" data-active-index="false">
                <li class="@if(Session::has('section')  &&  (session('section') == "commentaire")) acc_active @endif">
                    <div>
                        <h3>Commentaires</h3>
                        <span class="nom_item_par_collapse badge badge-danger"> {{count($commentaires)}} </span>
                    </div>
                    <div>
                        @include('partials._notify',['nom'  => 'commentaire'])
                        <br>
                                            @if ($commentaires->count() < 1)
                                            <span class="">Aucun commentaire n'est disponible pour le moment</span>
                                            @else
                                                  <div id="accordion">
                                                   @foreach($commentaires as $commentaire)
                                                   <div class="card">
                                                            <div style="background: none;
                                                            padding: 0rem 0.5rem;" class="card-header" id="heading{{$commentaire->id}}">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$commentaire->id}}" aria-expanded="true" aria-controls="collapse{{$commentaire->id}}">
                                                                <span class="m-b-15 d-block text-dark">{{ ucfirst(substr($commentaire->commentaire, 0,28)) }}... </span>
                                                                </button>
                                                            </h5>
                                                            </div>
                                                    <div id="collapse{{$commentaire->id}}" class="collapse" aria-labelledby="heading{{$commentaire->id}}" data-parent="#accordion">
                                                      <div class="card-body">
                                                          <div class="d-flex flex-row comment-row m-t-0">
                                                              <a class="text-dark" href="{{ route('utilisateurs.show', $commentaire->auteur->uuid) }}" data-toggle="tooltip" data-placement="top" title="{{$commentaire->auteur->nom}} {{$commentaire->auteur->prenom}}({{$commentaire->auteur->role->designation}})">
                                                                  <div class="p-2"><img   src="{{asset( $commentaire->auteur->profile_photo_path)}}" alt="user" height="40" width="50" class="rounded-circle"></div>
                                                              </a> <br>
                                                              <div class="comment-text w-100">
                                                                  <div class="comment-footer">
                                                                        <span class="m-b-15 d-block" style="background-color: rgb(241, 255, 251); border-radius:.5em; padding:1.5em; text-align:center;"><a class="text-dark" href="{{route('commentaires.show',  $commentaire->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >{{ ucfirst($commentaire->commentaire)  }}</a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br><br> <span class="text-muted float-right">{{$commentaire->created_at->format(' d M Y h:i:s')}}</span>
                                                        </a>
                                                      </div>
                                                    </div>
                                                  </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="row m-5" >
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
                            </div>
                        </div>
=======
    <div class="row m-5">
        <form wire:submit.prevent="submit" >
            <div class="row">
                <div>
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
                </div>
            </div>
            <input type="hidden" wire:model="crime_id" name="crime_id" value="{{$crime->id}}">
            <div class="text-right">
                <button class="btn btn-primary" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</button> 
            </div>
            <br>
        </form>
    </div>
            
>>>>>>> 9ea9ea8a7a5591105f470cd3daa307b069f012ab
</div>
