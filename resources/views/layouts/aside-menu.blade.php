<!--APP-SIDEBAR-->
                <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                <aside class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="">
                                <img src="{{ asset('assets/logo.jpeg') }}" class="header-brand-img" alt="">
                        </a><!-- LOGO -->
                    </div>
                    <ul class="side-menu">
                        <li>
                            <span class="couleur-logo" >{{Auth::user()->role->designation}}</span>
                        </li>
                        <li class="slide">
                        <a class="side-menu__item"  href="">
                            <i class="mdi mdi-home aide-icon"  ></i>
                                <span class="side-menu__label">Tableau de board</span>
                            </a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-account-multiple aide-icon"  ></i>
                                <span class="side-menu__label">Clients</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href=""><span>Tous les clients</span></a></li>
                            <li><a class="slide-item" href=""><span>Ajouter un client </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item"  href="">
                                <i class="mdi mdi-account-multiple-outline aide-icon"  ></i>
                                <span class="side-menu__label">Bénéficiaires</span>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href=""><span>Les bénéficaires</span></a></li>
                            <li><a class="slide-item" href=""><span>Ajouter un bénéficaire </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item"  href="">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Campagnes</span>
                            </a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item"  href="">
                                <i class="zmdi zmdi-balance aide-icon" style="padding-right: 26px;"></i>
                                <span class="side-menu__label">Dépôts</span>
                            </a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item"  href="">
                                <i class="zmdi zmdi-money aide-icon" style="padding-right: 26px;"></i>
                                <span class="side-menu__label">Transactions</span>
                            </a>
                        </li>
                        <li>
                            <span class="couleur-logo" >Configurations</span>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item"  href="">
                                <i class="mdi mdi-wallet aide-icon" style="padding-right: 26px;"></i>
                                <span class="side-menu__label">Moyens de paiment</span>
                            </a>
                        </li>
                    </ul>
                </aside>
                <!--/APP-SIDEBAR-->











