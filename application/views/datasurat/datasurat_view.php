<!-- Header -->
<div class="header bg-bluenew pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Data Surat</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>datasurat/">Data Surat</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
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
          <h3 class="mb-0">Data Surat</h3>
          <br>
          <div class="row icon-examples">
            <div class="col-lg-6 mb-2">
              <div class="card text-white bg-danger">
                <img class="card-img-top" src="" alt="">

                <div class="card-body">
                  <h1 class="card-title text-white">Data Surat Masuk</h1>
                  <p class="card-text">
                    Berisi Data Surat Masuk sesuai data surat masuk anda
                  </p>
                  <a href="<?= base_url(); ?>datasurat/view_SuratMasuk" class="btn btn-success btn-lg">
                    <span class="btn-inner--icon">
                      <i class="ni ni-email-83"></i></span>
                    <span class="btn-inner--text">Surat Masuk</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-2">
              <div class="card text-white bg-default">
                <img class="card-img-top" src="" alt="">

                <div class="card-body">
                  <h1 class="card-title text-white">Data Surat Keluar</h1>
                  <p class="card-text">
                    Berisi Data Surat Keluar sesuai data surat keluar anda
                  </p>
                  <a href="<?= base_url(); ?>datasurat/view_SuratKeluar" class="btn btn-primary btn-lg">
                    <span class="btn-inner--icon">
                      <i class="ni ni-email-83"></i></span>
                    <span class="btn-inner--text">Surat Keluar</span>
                  </a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Tabel -->

  </div>