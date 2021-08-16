<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <title><?= $title; ?></title>
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('assets/'); ?>img/brand/faviconnew.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />

  <!-- Page plugins -->

  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/calender.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/stylenew.css" type="text/css">

</head>

<body>

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
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>laporan">
                <i class="ni ni-ruler-pencil text-success"></i>
                <span class="nav-link-text">Laporan</span>
              </a>
            </li>
            <!-- Divider -->
            <hr class="my-3">
            <!---logged out-->
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

  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-bluenew border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!-- Navbar links -->
          <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?= base_url('assets/img/profile/') . $user['foto']; ?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                  </div>
                </div>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
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

    <!-- Header -->
    <div class="header bg-bluenew pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-7 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Penjadwalan Surat</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url(); ?>penjadwalan/">Penjadwalan</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Kalender Penjadwalan</h3>
              <br>
              <br>
              <div class="col-sm-12">
                <div id="container">
                  <div id="body">
                    <?php echo $surat; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3 ml-4"> <a href="<?= base_url(); ?>penjadwalan" class="btn btn-danger ml-4"><span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                  <span class="btn-inner--text">Kembali</span>
                </a> </div>
              <br>
              <br>
              <br>
            </div>
            <!-- Tabel -->




            <!-- Footer -->
            <footer class="footer pt-0">
              <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-12">
                  <div class="copyright text-center  text-lg-left  text-muted">
                    &copy; 2021 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Ormawa Mail</a>
                  </div>
                </div>
              </div>
            </footer>
          </div>
        </div>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Siap Untuk Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Tekan "Logout" jika anda ingin keluar.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('Auth/logout') ?>">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Argon Scripts -->
        <!-- Core -->

        <script src="<?= base_url('assets/'); ?>vendor/jquery/dist/jquery.min.js"></script>

        <script src="<?= base_url('assets/'); ?>vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendor/js-cookie/js.cookie.js"></script>
        <script src="<?= base_url('assets/'); ?>vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <!-- Optional JS -->
        <script src="<?= base_url('assets/'); ?>vendor/chart.js/dist/Chart.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendor/chart.js/dist/Chart.extension.js"></script>
        <!-- Argon JS -->
        <script src="<?= base_url('assets/'); ?>js/argon.js?v=1.2.0"></script>

        <script>
          $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
          });
        </script>


</body>

</html>