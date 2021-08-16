<div class="card">
  <!-- Card header -->
  <!-- <?= print_r($akses_surat); ?> -->
  <div class="card-header border-0">
    <div class="row mt-3">
      <div class="col md-6">
        <div class="card">
          <div class="card-header">
            Detail Surat Penjadwalan
          </div>
          <div class="card-body">
            <form action="<?= base_url('penjadwalan/konfirmasi/' . $akses_surat['id_akses_surat']); ?>" method="post">
              <input type="hidden" class="form-control" id="akses_surat" name="akses_surat" value="<?= $akses_surat['id_akses_surat']; ?>" readonly>
              <input type="hidden" class="form-control" id="id_pengirim" name="id_pengirim" value="<?= $akses_surat['id_user_pengirim']; ?>" readonly>
              <input type="hidden" class="form-control" id="tgl_pelaksanaan" name="tgl_pelaksanaan" value="<?= $akses_surat['tgl_konfirmasi']; ?>" readonly>
              <i class="fas fa-h3"></i>Tanggal Pelaksanaan :</h3>
              <p class="card-text"><?= $surat['tgl_pelaksanaan']; ?></p>
              <i class="fas fa-h3"></i>Jam :</h3>
              <p class="card-text"><?= $surat['jam']; ?></p>
              <i class="fas fa-h3"></i>Keterangan :</h3>
              <p class="card-text"><?= $surat['keterangan']; ?></p>
              <iframe id="file_surat" name="file_surat" src="<?= base_url('assets/file/') . $surat['file_surat']; ?>" style="width:900px; height:500px;" frameborder="0"></iframe> </p>
              <button class="btn btn-primary" type="submit" name="konfirmasi">
                <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                <span class="btn-inner--text">Kirim Konfirmasi</span>
              </button>
              <a href="<?= base_url(); ?>penjadwalan" class="btn btn-danger"><span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                <span class="btn-inner--text">Kembali</span>
              </a>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>