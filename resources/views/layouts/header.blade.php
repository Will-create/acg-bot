<!-- App-Header -->
                <div class="app-header header">
                    <div class="container-fluid">
                        <div class="d-flex">
                            <a class="header-brand d-md-none" href="{{url('/' . $page='index')}}">
                                <img src="{{URL::asset('assets/images/brand/logo-3.png')}}" class="header-brand-img mobile-icon" alt="logo">
                                <img src="{{URL::asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo mobile-logo" alt="logo">
                            </a>
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M21 11.01L3 11v2h18zM3 16h12v2H3zM21 6H3v2.01L21 8z" /></svg>
                            </a><!-- sidebar-toggle-->
                            <div class="header-search d-none d-md-flex">
                                <form class="form-inline">
                                    <div class="search-element">
                                        <input type="search" class="form-control header-search" placeholder="Rechercher" aria-label="Search" tabindex="1">
                                        <button class="btn btn-primary-color" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" /></svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex ml-auto header-right-icons header-search-icon">
                                <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="navbar-toggler-icon">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" /></svg>
                                </button>
                                <div class="dropdown d-none d-lg-flex">
                                    <a class="nav-link icon full-screen-link nav-link-bg">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="fullscreen-button">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <circle cx="12" cy="12" opacity=".3" r="3" />
                                            <path d="M7 12c0 2.76 2.24 5 5 5s5-2.24 5-5-2.24-5-5-5-5 2.24-5 5zm8 0c0 1.65-1.35 3-3 3s-3-1.35-3-3 1.35-3 3-3 3 1.35 3 3zM3 19c0 1.1.9 2 2 2h4v-2H5v-4H3v4zM3 5v4h2V5h4V3H5c-1.1 0-2 .9-2 2zm18 0c0-1.1-.9-2-2-2h-4v2h4v4h2V5zm-2 14h-4v2h4c1.1 0 2-.9 2-2v-4h-2v4z" /></svg>
                                    </a>
                                </div><!-- FULL-SCREEN -->
                                <div class="dropdown profile-1">
                                    <a href="#" data-toggle="dropdown" class="nav-link pl-2 pr-2  leading-none d-flex">
                                        <span>
                                            <img src="{{URL::asset('assets/images/users/10.jpg')}}" alt="profile-user" class="avatar  mr-xl-3 profile-user brround cover-image">
                                        </span>
                                        <div class="text-center mt-1 d-none d-xl-block">
                                            <h6 class="text-dark mb-0 fs-13 font-weight-semibold">{{Auth::user()->nom. ' ' .Auth::user()->prenom}}</h6>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        {{-- <a class="dropdown-item" href="#">
                                            <i class="dropdown-icon mdi mdi-account-outline"></i> Profil
                                        </a> --}}
                                        <a  class="dropdown-item"  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            <i class="dropdown-icon mdi  mdi-logout-variant"></i>
                                            Déconnexion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </div>
                                </div>
                             <!-- SIDE-MENU -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- responsive-navbar -->