<!--APP-SIDEBAR-->
                <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                <aside class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="">
                                <img src="{{ asset('assets/images/logo_yelli.png') }}" class="header-brand-img" alt="">
                        </a><!-- LOGO -->
                    </div>
                    <ul class="side-menu">
                        <li class="slide">
                        <a class="side-menu__item"  href="">
                            <i class="mdi mdi-home aide-icon"  ></i>
                                <span class="side-menu__label">Tableau de board</span>
                            </a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-account-multiple aide-icon"  ></i>
                                <span class="side-menu__label">Utilisateurs</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href=""><span>Tous les Utilisateurs</span></a></li>
                            <li><a class="slide-item" href=""><span>Ajouter un Utilisateur </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item"  href="">
                                <i class="mdi mdi-account-multiple-outline aide-icon"  ></i>
                                <span class="side-menu__label">Espaces Environnementaux</span>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href=""><span> Les Espaces Environnementaux</span></a></li>
                            <li><a class="slide-item" href=""><span>Ajouter un espace </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item"  href="">
                                <i class="mdi mdi-account-multiple-outline aide-icon"  ></i>
                                <span class="side-menu__label">Espèce Animal</span>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href=""><span> Les espèce Animal</span></a></li>
                            <li><a class="slide-item" href=""><span>Ajouter un espèce animal </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item"  href="">
                                <i class="mdi mdi-account-multiple-outline aide-icon"  ></i>
                                <span class="side-menu__label">Espèce végétal</span>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href=""><span> Tous les espèces</span></a></li>
                            <li><a class="slide-item" href=""><span>Ajouter un espèce végétal </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item"  href="">
                                <i class="mdi mdi-account-multiple-outline aide-icon"  ></i>
                                <span class="side-menu__label">Nature des crimes</span>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href=""><span> Nature des crimes</span></a></li>
                            <li><a class="slide-item" href=""><span>Nouveau </span></a></li>
                            </ul>
                        </li>


                        <li class="slide">
                            <a class="side-menu__item"  href="">
                                <i class="zmdi zmdi-money aide-icon" style="padding-right: 26px;"></i>
                                <span class="side-menu__label">Crimes</span>
                            </a>
                        </li>
                        <li class="slide">
                        <a class="side-menu__item"  href="{{route('unites.index')}}">
                                <i class="zmdi zmdi-money aide-icon" style="padding-right: 26px;"></i>
                                <span class="side-menu__label">Unités</span>
                            </a>
                        </li>
                        <li>
                            <h3>Configurations</h3>
                        </li>
                    </ul>
                </aside>
                <!--/APP-SIDEBAR-->











