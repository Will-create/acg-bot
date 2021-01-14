<div>
    <ul class="demo-accordion accordionjs m-0" data-active-index="false">

        <li class="@if(Session::has('section')  &&  (session('section') == "commentaire")) acc_active @endif {{$section}}" >
                        <div class="{{$head}}">
                            <h3>Commentaires</h3>
                            <span class="nom_item_par_collapse badge badge-danger"> {{count($commentaires)}} </span>
                        </div>
                        <div class="{{$content}}">
                            @include('partials._notify',['nom'  => 'commentaire'])
                            <br>
                            @if ($commentaires->count() < 1)
                            <span class="">Aucun commentaire n'est disponible pour le moment</span>
                            @else
                                    <div id="{{$idAccordion}}">
                                    @foreach($commentaires as $commentaire )
                                    <div class="">
                                            <div style=" background: none;
                                            padding: 0rem 0.5rem;" class="row justify-content-center" id="heading{{$commentaire->id}}">
                                                
                                                <span  style="width:30px; height:30px;position: absolute; left:2px;" class="{{$commentaire->auteur->id == Auth()->user()->id ? 'badge badge-success rounded-circle' : '' }} row justify-content-center align-items-center m-0"> <small>{{$commentaire->auteur->id == Auth()->user()->id ? 'moi' : '' }}</small> </span>
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$commentaire->id}}" aria-expanded="true" aria-controls="collapse{{$commentaire->id}}">
                                                    
                                                    <a href="{{ route('utilisateurs.show', $commentaire->auteur->uuid) }}" data-toggle="tooltip" data-placement="top" title="{{$commentaire->auteur->nom}} {{$commentaire->auteur->prenom}}({{$commentaire->auteur->role->designation}})">
                                                        <div><img   src="{{asset( $commentaire->auteur->profile_photo_path)}}" alt="user" height="40" width="50" class="rounded-circle"></div>
                                                    </a>
                                                <span class="float-right text-dark">
                                                    {{ ucfirst(substr($commentaire->commentaire, 0,28)) }}... 
                                                </span>
                                                </button>
                                            </div>
                                    <div id="collapse{{$commentaire->id}}" class="collapse" aria-labelledby="heading{{$commentaire->id}}" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="d-flex flex-row comment-row m-t-0">
                                                
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
                                
                                    <hr>
                                    @endforeach
                                </div>
                            @endif
                                
                        </div>
        </li>
    
    </ul>
</div>
