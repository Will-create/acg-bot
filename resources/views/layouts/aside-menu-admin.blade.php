				<!--APP-SIDEBAR-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
				    <div class="side-header">
                        <a class="header-brand1" href="{{route('accueil')}}">
                            <img src="{{ asset('assets/logo3.png') }}" class="header-brand-img" alt="">
                    </a>
				    </div>
				    <ul class="side-menu">
                        <li>
                            <h3 class="couleur-logo" >{{Auth::user()->role->designation}}</h3>
                        </li>
				        <li class="slide">
                        <a class="side-menu__item" data-toggle=" " href="{{route('accueil')}}">
                                <i class="mdi mdi-apps aide-icon"></i>
                                {{-- <span class="iconify" data-icon="fa:home"></span> --}}
				                <span class="side-menu__label">Tableau de board</span>
				            </a>
                        </li>
                        @if (Auth::user()->role->id == 1 )
                        <li class="slide">
                            <a style="color: #808080!important;" class="side-menu__item" data-toggle="slide" href="#">
				                <i class="mdi mdi-account-multiple aide-icon"></i>
                                <span class="side-menu__label">Utilisateurs</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a style="color: #808080!important;" class="slide-item" href="{{route('utilisateurs.index')}}"><span>Tous les
                                    Utilisateurs</span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{route('utilisateurs.create')}}"><span>Ajouter un Utilisateur </span></a></li>
                                <li class="slide">
                                    <a style="color: #808080!important;" class="side-menu__item" data-toggle=" " href="{{route('roles.index')}}">
                                            <i class="mdi mdi-hubspot aide-icon"></i>
                                            <span class="side-menu__label">Rôles</span>
                                        </a>
                                        <ul class="slide-menu">
                                            <li><a style="color: #808080!important;" class="slide-item" href="{{route('roles.index')}}"><span>Liste</span></a></li>
                                            {{-- <li><a class="slide-item" href="{{route('roles.create')}}"><span>Nouveau </span></a></li> --}}
                                        </ul>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="slide">
                            <a style="color: #808080!important;" class="side-menu__item" data-toggle="slide" href="#">
				                <i class="mdi mdi-account-multiple aide-icon"></i>
                                <span class="side-menu__label">Type de menus</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a style="color: #808080!important;" class="slide-item" href="{{route('type_menus.index')}}"><span>Tous les
                                    Types de menus</span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{route('type_menus.create')}}"><span>Ajouter un Type de menu </span></a></li>

                            </ul>
                        </li> --}}
                        <li class="slide">
                            <a style="color: #808080!important;" class="side-menu__item" data-toggle="slide" href="#">
                                <span class="side-menu__label">Rubriques</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a style="color: #808080!important;" class="slide-item" href="{{route('menus.index')}}"><span>Toutes les
                                    rubriques</span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{route('menus.create')}}"><span>Ajouter une rubrique </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a style="color: #808080!important;" class="side-menu__item" data-toggle="slide" href="#">
                                <span class="side-menu__label">APIs</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a style="color: #808080!important;" class="slide-item" href="{{route('apis.index')}}"><span>Toutes les
                                    APIs</span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{route('apis.create')}}"><span>Ajouter une API </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a style="color: #808080!important;" class="side-menu__item" data-toggle="slide" href="{{route('servicefoot.index')}}">
				                <i class="bi bi-globe"></i>
                                <span class="side-menu__label">Service Foot</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a style="color: #808080!important;" class="slide-item" href="{{url('/competitions')}}"><span>Listes des competition</span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{url('/ajout')}}"><span>Ajouter une competition</span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{url('/servicefoot')}}"><span>Les competition en direct</span></a></li>
                            </ul>
                        </li>

                        <!--<li class="slide">
                            <a style="color: #808080!important;"  class="side-menu__item" data-toggle="slide" href="#">
                                <span class="side-menu__label">Commentaires</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a style="color: #808080!important;" class="slide-item" href="{{route('commentaires.index')}}"><span>Tous les
                                commentaires</span></a></li>
                            </ul>
                        </li>-->
                        <li>
                        @endif

                            <h3 class="couleur-logo" >Opérateurs</h3>
                        {{--  <li class="slide">
                            <a style="color: #808080!important;" class="side-menu__item" data-toggle="slide" href="{{route('servicefoot.index')}}">
				                <i class="bi bi-globe"></i>
                                <span class="side-menu__label">Service Foot</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a style="color: #808080!important;" class="slide-item" href="{{url('/servicefoot')}}"><span>Voir tous les messages</span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{url('/coupedumonde')}}"><span>Coupe du monde </span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{url('/liguechampion')}}"><span>Ligue des champignons</span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{url('/europaligue')}}"><span>Europa ligue</span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{url('/euro')}}"><span>Euro</span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{url('/copa')}}"><span>Copa </span></a></li>
                                <li><a style="color: #808080!important;" class="slide-item" href="{{url('/can')}}"><span>CAN</span></a></li>
                            </ul>
                        </li>  --}}
                        </li>
                            @php
                                $opera= operateurs();
                            @endphp
                              @foreach ($opera as $operateur)
                                    @php
                                    $menus= fonctions($operateur['nom']);
                                    @endphp
                              <li class="slide">
                                  <a style="color: #808080!important;" class="side-menu__item" data-toggle="slide" href="#">
                                  <span class="side-menu__label">{{$operateur['nom']}}</span><i class="angle fa fa-angle-right"></i>
                                  </a>
                                  <ul class="slide-menu">
                                    @if (count($menus)>0)
                                        @foreach ($menus as $menu)
                                        @if (!$menu->cache)
                                        <li class="slide">
                                            <a style="color: #808080!important;" class="side-menu__item" data-toggle="slide" href="#">
                                            <span class="side-menu__label">{{$menu->nom}}</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                              @if (count($menu->sousmenus)>0)
                                                  @foreach ($menu->sousmenus as $sm)
                                                  @if (!$sm->cache)
                                                  <li><a style="color: #808080!important;" class="slide-item" href="{{route('menus.show',['menu' => $sm->uuid, 'slug' => $sm->pseudo])}}"><span>{{$sm->nom}}</span></a></li>
                                                  @endif
                                                  @endforeach
                                              @endif
                                            </ul>
                                        </li>
                                        @endif
                                        @endforeach
                                    @endif
                                  </ul>
                              </li>

                              @endforeach
                        {{-- <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-message aide-icon"  ></i>
                                <span class="side-menu__label">Commentaires</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{route('commentaires.index')}}"><span>Tous les commentaires</span></a></li>
                                <li><a class="slide-item" href="{{route('commentaires.filter')}}"><span>Les commentaires par crime</span></a></li>
                                <li><a class="slide-item" href="{{route('commentaires.create')}}"><span>Nouveau commentaire</span></a></li>
                            </ul>
                        </li> --}}

                    </ul>
                    <br><br><br><br>
                </aside>
