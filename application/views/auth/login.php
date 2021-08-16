<!DOCTYPE html>
<html>

<head>
  <title><?= $title ?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('assets/'); ?>img/brand/faviconnew.png" type="image/png">
  <!-- Fonts -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/argon.css?v=1.2.0" type="text/css">
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/login.css" type="text/css">
</head>

<body class="bg-gradient-dark">
  <!-- Navbar -->
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-infonew py-4">
      <div class="container mb-8">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8 px-5">
              <img class="logo-login" src="<?= base_url('assets/img/brand/unimma.png'); ?>">
              <h1 class="text-white">Selamat Datang di Ormawa Mail</h1>
              <p class="text-lead text-white">Aplikasi Surat yang membantu <span class="text-uppercase"><b>Ormawa Unimma</b></span> dalam Penjadwalan Surat dan Pengiriman Surat</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-dark" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-1">
              <div class="text-muted text-center mt-2 mb-3"><small>Dibuat Oleh</small></div>
              <div class="btn-wrapper text-center">
                <img class="logo-form" src="<?= base_url('assets/img/brand/logo.png'); ?>">
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-4">
              <div class="text-center text-muted mb-4">
                <small>Login Sesuai Ormawa Anda</small>
              </div>
              <div class="alert">
                <?= $this->session->flashdata('message'); ?>
              </div>
              <form role="user" method="POST" action="<?= base_url('auth'); ?>">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" id="username" name="username" placeholder="Username" type="text">
                  </div>
                </div>
                <div class="mb-3"> <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?></div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="mb-3"> <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?></div>
                <div class="text-center">
                  <button type="submit" class="btn btn-bluenew my-4">Login</button>
                </div>
              </form>
            </div>
          </div>
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
  <!-- Argon JS -->
  <script src="<?= base_url('assets/'); ?>js/argon.js?v=1.2.0"></script>
</body>

</html>