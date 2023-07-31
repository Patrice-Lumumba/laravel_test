<nav class="navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search..." aria-label="Search" aria-describedby="">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow d-sm-none">
            <a href="#" class="nav-link dropdown-toggle" id="searchDropdown" role="button" aria-haspopup="true" data-toggle="dropdown">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form action="" class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search..." aria-label="Search" aria-describedby="">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a href="#" class="nav-link dropdown-toggle" id="alertsDropdown" role="button" aria-haspopup="true" data-toggle="dropdown">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
            </a>

            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <div class="dropdown-header">

                </div>
            </div>
        </li>

        <li class="nav-item dropdown no-arrow">
            <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" >
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    Patrice <br>
                    <small>Admin</small>
                </span>
                <img src="https://picsum.photos/1920/1080?random=1" alt="image aléatoire">
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a href="/profile" class="dropdown-item">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400">
                        Profile
                    </i>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="" class="dropdown-item">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                </a>
            </div>

        </li>

    </ul>

</nav>
