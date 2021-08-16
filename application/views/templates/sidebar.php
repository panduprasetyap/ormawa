<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <div class="text-primary"><img src="<?= base_url('assets/img/brand/logo.png'); ?>"></div>
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>dashboard">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>pengiriman">
              <i class="ni ni-curved-next text-orange"></i>
              <span class="nav-link-text">Pengiriman Surat</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>datasurat">
              <i class="ni ni-email-83 text-primary"></i>
              <span class="nav-link-text">Data Surat</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>penjadwalan">
              <i class="ni ni-calendar-grid-58 text-yellow"></i>
              <span class="nav-link-text">Jadwal</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>laporan">
              <i class="ni ni-ruler-pencil text-success"></i>
              <span class="nav-link-text">Laporan</span>
            </a>
          </li> -->
          <li class="nav-item dropdown d-sm-block">
            <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-ruler-pencil text-success"></i>
              <span class="nav-link-text">Laporan</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
              <a class="dropdown-item ml-2" href="<?= base_url(); ?>laporan"><i class="ni ni-folder-17 text-success"></i>
                <span class="nav-link-text">Laporan Surat Masuk</span></a>
              <a class="dropdown-item ml-2" href="<?= base_url(); ?>laporan/indexkeluar"><i class="ni ni-folder-17 text-success"></i>
                <span class="nav-link-text">Laporan Surat keluar</span></a>
            </div>
          </li>

          <!-- Divider -->
          <hr class="my-3">
          <!---logged out-->

        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
              <i class=" ni ni-bold-left text-danger"></i>
              <span>Logout</span></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
</div>