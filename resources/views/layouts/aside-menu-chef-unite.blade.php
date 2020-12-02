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
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Unités</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{route('unites.index')}}"><span>Toutes les unités</span></a></li>
                                <li><a class="slide-item" href="{{route('unites.create')}}"><span>Nouveau </span></a></li>
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Espèce Animal</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="#"><span>Les espèce Animal</span></a></li>
                                <li><a class="slide-item" href="#"><span>Ajouter un espèce animal </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Espèce végétal</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="#"><span>Tous les espèces</span></a></li>
                                <li><a class="slide-item" href="#"><span>Ajouter un espèce végétal </span></a></li>
                            </ul>
                        </li>




                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Crimes</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="#"><span>Tous les crimes</span></a></li>
                                <li><a class="slide-item" href="#"><span>Nouveau </span></a></li>
                            </ul>
                        </li>
                    </ul>
                </aside>
				    </ul>
				</aside>
				<!--/APP-SIDEBAR-->
