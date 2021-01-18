				<!--APP-SIDEBAR-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
				    <div class="side-header">
                        <a class="header-brand1" href="<?php echo e(route('accueil')); ?>">
                            <img src="<?php echo e(asset('assets/logo.jpeg')); ?>" class="header-brand-img" alt="">
                    </a>
				    </div>
				    <ul class="side-menu">
                        <li>
                            <h3><?php echo e(Auth::user()->role->designation); ?></h3>
                        </li>
				        <li class="slide">
                        <a class="side-menu__item" data-toggle=" " href="<?php echo e(route('accueil')); ?>">
				                <i class="mdi mdi-home aide-icon"></i>
				                <span class="side-menu__label">Tableau de board</span>
				            </a>

				        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Espèce Animal</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo e(route('especes.regne.show', ['regne' => 'animal'])); ?>"><span>Les espèce Animal</span></a></li>
                                <li><a class="slide-item" href="<?php echo e(route('especes.create', ['regne' => 'animal'])); ?>"><span>Ajouter un espèce animal </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Espèce végétal</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo e(route('especes.regne.show', ['regne' => 'vegetal'])); ?>"><span>Tous les espèces</span></a></li>
                                <li><a class="slide-item" href="<?php echo e(route('especes.create', ['regne' => 'vegetal'])); ?>"><span>Ajouter un espèce végétal </span></a></li>
                            </ul>
                        </li>




                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Crimes</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                            <li><a class="slide-item" href="<?php echo e(route('crimes.index')); ?>"><span>Tous les crimes</span></a></li>
                            <li><a class="slide-item" href="<?php echo e(route('crimes.create')); ?>"><span>Nouveau </span></a></li>
                            </ul>
                        </li>




                        <li>
                            <h3>Configurations</h3>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Nature des crimes</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="#"><span>Nature des crimes</span></a></li>
                                <li><a class="slide-item" href="#"><span>Nouveau </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Roles</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="#"><span>Roles</span></a></li>
                                <li><a class="slide-item" href="#"><span>Nouveau </span></a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="mdi mdi-rss aide-icon"  ></i>
                                <span class="side-menu__label">Pays</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="#"><span>Tous les pays</span></a></li>
                                <li><a class="slide-item" href="#"><span>Nouveau </span></a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </aside>










				    </ul>
				</aside>
				<!--/APP-SIDEBAR-->
<?php /**PATH D:\switch_maker\war_crimes\resources\views/layouts/aside-menu-agent-unite.blade.php ENDPATH**/ ?>