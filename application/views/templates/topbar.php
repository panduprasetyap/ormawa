<div class="main-content" id="panel">
  <!-- Topnav -->
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-bluenew border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Search form -->
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center ml-auto">
        <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-9 sidenav-toggler sidenav-toggler-dark mr-9" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <div class="topbar-divider d-none d-sm-block"></div>
         <ul class="navbar-nav align-items-center  ml-auto ml-md-0">
          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?= base_url('assets/img/profile/') . $user['foto']; ?>">
                </span>
                <div class="media-body  ml-3  d-none d-lg-block">
                  <span class="mr-2 d-none d-lg-inline fw-bolder text-gray-600 small"><b><?= $user['nama']; ?></b></span>
                </div>
              </div>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?= base_url(); ?>dashboard/edit/<?= $user['id_user']; ?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                My Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </nav>