				<!--APP-SIDEBAR-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
				    <div class="side-header">
                        <a class="header-brand1" href="{{route('accueil')}}">
                            <img src="{{ asset('assets/logo.png') }}" class="header-brand-img" alt="">
                    </a>
				    </div>
				    <ul class="side-menu">
                        <li>
                            <h3>{{Auth::user()->role->designation}}</h3>
                        </li>
				        <li class="slide">
                        <a class="side-menu__item" data-toggle=" " href="{{route('accueil')}}">
				                <i class="mdi mdi-home aide-icon"></i>
				                <span class="side-menu__label">Tableau de board</span>
				            </a>
				        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
				                <i class="mdi mdi-account-multiple aide-icon"></i>
                                <span class="side-menu__label">Utilisateurs</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{route('utilisateurs.index')}}"><span>Tous les
                                    Utilisateurs</span></a></li>
                                <li><a class="slide-item" href="{{route('utilisateurs.create')}}"><span>Ajouter un Utilisateur </span></a></li>
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-scale-balance aide-icon"  ></i>
                                <span class="side-menu__label">Unités</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{route('unites.index')}}"><span>Toutes les unités</span></a></li>
                                <li><a class="slide-item" href="{{route('unites.filter',1)}}"><span>Unités par pays</span></a></li>
                                <li><a class="slide-item" href="{{route('unites.create')}}"><span>Nouveau </span></a></li>
                            </ul>
                        </li>


                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                        
                               
                                <i class="mdi mdi-rss aide-icon"  ></i>

                                <span class="side-menu__label">Espèces</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{route('especes.index')}}"><span>Toutes les espèces</span></a></li>
                                <li><a class="slide-item" href="{{route('especes.create')}}"><span>Ajouter une espèces</span></a></li>
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Crimes</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href="{{route('crimes.index')}}"><span>Tous les crimes</span></a></li>
                            <li><a class="slide-item" href="{{route('crimes.create')}}"><span>Nouveau </span></a></li>
                            </ul>
                        </li>
                         <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Types de Crime</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href="{{route('type_crimes.index')}}"><span>Tous les types de crime</span></a></li>
                            <li><a class="slide-item" href="{{route('type_crimes.create')}}"><span>Nouveau </span></a></li>
                            </ul>
                        </li> 
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Types d'unité</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href="{{route('type_unites.index')}}"><span>Tous les types d'unité</span></a></li>
                            <li><a class="slide-item" href="{{route('type_unites.create')}}"><span>Nouveau </span></a></li>
                            </ul>
                        </li> 




                        <li>
                            <h3>Configurations</h3>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">gestion des Natures des crimes</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href="{{route('nature_crimes.index')}}"><span>Nature des crimes</span></a></li>
                                <li><a class="slide-item" href="#"><span>Nouveau </span></a></li>
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item" data-toggle=" " href="{{route('roles.index')}}">
                                    <i class="mdi mdi-rss aide-icon aide-icon"></i>
                                    <span class="side-menu__label">Rôles</span>
                                </a>
                            </li>
                        {{-- <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Gestion des Roles</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{route('roles.index')}}"><span>Roles</span></a></li>
                                <li><a class="slide-item" href="{{route('roles.create')}}"><span>Nouveau </span></a></li>
                            </ul>
                        </li> --}}
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Gestion des Confiscations</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{route('confiscations.index')}}"><span>Toutes les confiscations</span></a></li>
                                <li><a class="slide-item" href="{{route('confiscations.create')}}"><span>Nouvelle confiscation</span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Gestion des Pays</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{route('pays.index')}}"><span>Tous les pays</span></a></li>
                                <li><a class="slide-item" href="{{route('pays.create')}}"><span>Nouveau </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Gestion des localités</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{route('localites.index')}}"><span>Toutes les localités</span></a></li>
                                <li><a class="slide-item" href="{{route('localites.filter',1)}}"><span>Localité par pays</span></a></li>
                                <li><a class="slide-item" href="{{route('localites.create')}}"><span>Nouveau </span></a></li>
                            </ul>
                        </li>

                    </ul>
                    <br><br><br><br>
                </aside>










