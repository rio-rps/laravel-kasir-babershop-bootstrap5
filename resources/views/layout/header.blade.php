<div class="main-header side-header sticky nav nav-item">
    <div class="container-fluid main-container ">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="index.html" class="header-logo">
                    <img src="{{ asset('/') }}img/brand/logo.png" class="logo-1" alt="logo">
                    <img src="{{ asset('/') }}img/brand/logo-white.png" class="dark-logo-1" alt="logo">
                </a>
            </div>
            <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                <a class="open-toggle" href="javascript:void(0);"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="javascript:void(0);"><i class="header-icons fe fe-x"></i></a>
            </div>
            <div class="main-header-center ms-3 d-sm-none d-md-none d-lg-block">
                <input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
            </div>
        </div>
        <div class="main-header-right">
            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fe fe-more-vertical "></span>
            </button>
            <div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="nav nav-item  navbar-nav-right ms-auto">
                        <li class="nav-item full-screen fullscreen-button">
                            <a class="new nav-link full-screen-link" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize">
                                    <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                    </path>
                                </svg></a>
                        </li>
                        <li class="dropdown main-profile-menu nav nav-item nav-link">
                            <a class="profile-user d-flex" href=""><img alt="" src="{{ asset('/') }}img/faces/6.jpg"></a>
                            <div class="dropdown-menu">
                                <div class="main-header-profile bg-primary p-3">
                                    <div class="d-flex wd-100p">
                                        <div class="main-img-user"><img alt="" src="{{ asset('/') }}img/faces/6.jpg" class="">
                                        </div>
                                        <div class="ms-3 my-auto">
                                            <h6>{{ Auth::user()->name }}</h6><span>Premium Member</span>
                                        </div>
                                    </div>
                                </div>
                                <a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
                                <a class="dropdown-item" href=""><i class="bx bx-cog"></i> Edit
                                    Profile</a>
                                <a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i>
                                    Account Settings</a>
                                <a class="dropdown-item" href="{{ url('logout') }}"><i class="bx bx-log-out"></i>
                                    Sign Out</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>