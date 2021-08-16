<div class="card">
  <!-- Card header -->
  <div class="card-header border-0">
    <div class="alert alert-info" role="alert">
      <span class="alert-icon mb-2"><i class="ni ni-folder-17"></i></span>
      <span class="alert-text">
        <h3 class="mt-1 mb-0 text-white">Detail Surat</h3>
        <h6 class="heading-small text-muted mb-0 text-white">Detail Surat pada Form dibawah ini</h6>
      </span>
    </div>
    <div class="row mt-3">
      <div class="col md-6">

        <div class="card">
          <div class="card-header">
            Detail Surat
          </div>
          <div class="card-body">
            <h5 class="card-tittle"><?= $surat['id_status_surat']; ?></h5>
            <p class="card-subtitle mb-2 text-muted"><?= $surat['no_surat']; ?></p>
            <p class="card-text"><?= $surat['tgl_pelaksanaan']; ?></p>
            <p class="card-text"><?= $surat['jam']; ?></p>
            <p class="card-text"><?= $surat['keterangan']; ?></p>
            <p> <iframe src="<?= base_url('assets/file/') . $surat['file_surat']; ?>" style="width:700px; height:500px;" frameborder="0"></iframe> </p>

            <a href="<?= base_url(); ?>pengiriman" class="btn btn-danger"><span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
              <span class="btn-inner--text">Kembali</span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>