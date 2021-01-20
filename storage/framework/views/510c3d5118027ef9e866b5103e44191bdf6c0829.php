				<!--APP-SIDEBAR-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
				    <div class="side-header">
                        <a class="header-brand1" href="<?php echo e(route('accueil')); ?>">
                            <img src="<?php echo e(asset('assets/logo.jpeg')); ?>" class="header-brand-img" alt="">
                    </a>
				    </div>
				    <ul class="side-menu">
                        <li class="bg-primary text-white">
                            <h3 class="text-white"><?php echo e(Auth::user()->role->designation); ?></h3>
                        </li>
				        <li class="slide">
                        <a class="side-menu__item" data-toggle=" " href="<?php echo e(route('accueil')); ?>">
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
                                <li><a class="slide-item" href="<?php echo e(route('utilisateurs.index')); ?>"><span>Tous les
                                    Utilisateurs</span></a></li>
                                <li><a class="slide-item" href="<?php echo e(route('utilisateurs.create')); ?>"><span>Ajouter un Utilisateur </span></a></li>
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Unités</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo e(route('unites.index')); ?>"><span>Toutes les unités</span></a></li>
                                <li><a class="slide-item" href="<?php echo e(route('unites.create')); ?>"><span>Nouveau </span></a></li>
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">


                                <i class="mdi mdi-barley aide-icon"  ></i>

                                <span class="side-menu__label">Espèces</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo e(route('especes.index')); ?>"><span>Toutes les espèces</span></a></li>
                                <li><a class="slide-item" href="<?php echo e(route('especes.regne.show', ['regne' => 'animal'])); ?>"><span>Les espèces animales</span></a></li>
                                <li><a class="slide-item" href="<?php echo e(route('especes.regne.show', ['regne' => 'vegetal'])); ?>"><span>Les espèces végétales</span></a></li>
                                

                                
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Crimes</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href="<?php echo e(route('crimes.index')); ?>"><span>Tous les crimes</span></a></li>
                                
                            </ul>
                        </li>
                    </ul>
                </aside>
				    </ul>
				</aside>
				<!--/APP-SIDEBAR-->
<?php /**PATH D:\switch_maker\war_crimes\resources\views/layouts/aside-menu-coodonnateur-national.blade.php ENDPATH**/ ?>