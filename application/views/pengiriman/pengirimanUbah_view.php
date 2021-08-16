<div class="card">
  <!-- Card header -->
  <div class="card-header border-0">
    <div class="alert alert-warning" role="alert">
      <span class="alert-icon mb-2"><i class="ni ni-settings"></i></span>
      <span class="alert-text">
        <h3 class="mt-1 mb-0 text-white">Ubah Surat</h3>
        <h6 class="heading-small text-muted mb-0 text-white">Ubah Surat pada Form dibawah ini</h6>
      </span>
    </div>

    <div class="row mt-3">
      <div class="col md-6">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-4">Form Ubah Surat</h3>
            <?= form_open_multipart('pengiriman/ubah/' . $surat['id_surat']); ?>
            <div class="pl-lg-4">
              <div class="row">
                <input type="hidden" name="id_surat" value="<?= $surat['id_surat']; ?>">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-jenis">Jenis Surat</label>
                    <select class="form-control" id="id_status_surat" name="id_status_surat">

                      <?php foreach ($status_surat as $st) : ?>
                        <option value="<?= $st['id_status_surat']; ?>"><?= $st['nama_status_surat']; ?> </option>
                      <?php endforeach; ?>

                    </select>
                    <small class="form-text text-danger"><?= form_error('id_status_surat'); ?></small>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-nomor">No Surat</label>
                    <input type="text" id="no_surat" name="no_surat" class="form-control" value="<?= $surat['no_surat']; ?>">
                    <small class="form-text text-danger"><?= form_error('no_surat'); ?></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="example-date-input" class="form-control-label">Tanggal Pelaksanaan</label>
                    <input class="form-control" type="date" value="<?= $surat['tgl_pelaksanaan']; ?>" id=" tgl_pelaksanaan" name="tgl_pelaksanaan">
                    <small class="form-text text-danger"><?= form_error('tgl_pelaksanaan'); ?></small>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="example-time-input" class="form-control-label">Jam</label>
                    <input class="form-control" type="time" value="<?= $surat['jam']; ?>" id="jam" name="jam">
                    <small class="form-text text-danger"><?= form_error('jam'); ?></small>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Keterangan</label>
                    <textarea rows="4" class="form-control" id="keterangan" name="keterangan"><?= $surat['keterangan']; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">
                  <div class="alert alert-default" role="alert">
                    <strong>Nama File : </strong><?= $surat['file_surat']; ?>
                  </div>
                </div>
                <div class="col-sm-7">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file_surat" name="file_surat" value="<?= base_url('assets/file/') . $surat['file_surat']; ?>">
                    <label class="custom-file-label" for="image">Pilih File</label>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-2">
                <button class="btn btn-icon btn-success" type="submit" name="ubah">
                  <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                  <span class="btn-inner--text">Ubah</span>
              </div>
              <div class="col-lg-2">
                <a href="<?= base_url(); ?>pengiriman" class="btn btn-danger"><span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                  <span class="btn-inner--text">Kembali</span>
                </a>
              </div>
            </div>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>