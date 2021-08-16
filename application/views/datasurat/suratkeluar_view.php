<div class="row">
  <div class="col-md-4">
    <form action="<?= base_url('datasurat/view_SuratKeluar') ?>" method="POST">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Surat Masuk" name="keyword" autocomplete="off" autofocus>
        <div class="input-group-append">
          <input class="btn btn-outline-primary" type="submit" name="submitkeluar"></input>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="table-responsive">
        <div>
          <h5>Result : <?= $total_rows; ?></h5>
          <table class="table align-items-center">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">No</th>
                <th scope="col" class="sort" data-sort="budget">Jenis Surat</th>
                <th scope="col" class="sort" data-sort="status">No Surat</th>
                <th scope="col" class="sort" data-sort="completion">Tanggal Pelaksanaan</th>
                <th scope="col" class="sort" data-sort="completion">Jam</th>
                <th scope="col" class="sort" data-sort="completion">Keterangan</th>
                <th scope="col" class="sort" data-sort="completion">Detail</th>
              </tr>
            </thead>
            <tbody class="list">
              <?php if (empty($suratkeluar)) : ?>
                <tr>
                  <td colspan="9">
                    <div class="alert alert-danger" role="alert">
                      <strong>Data</strong> Not Found
                    </div>
                  </td>
                </tr>
              <?php endif; ?>
              <?php foreach ($suratkeluar as $sk) : ?>
                <tr>
                  <th scope="row">
                    <?= ++$start; ?>
                  </th>
                  <td class="media-body">
                    <?= $sk['nama_status_surat']; ?>
                  </td>
                  <td>
                    <div>
                      <?= $sk['no_surat']; ?>
                    </div>
                  <td>
                    <div>
                      <?= $sk['tgl_pelaksanaan']; ?>
                    </div>
                  </td>
                  <td>
                    <div>
                      <?= $sk['jam']; ?>
                    </div>
                  </td>
                  <td>
                    <div class="wraptext">
                      <?= $sk['keterangan']; ?>
                    </div>
                  </td>
                  <td>
                    <a href="<?= base_url('assets/file/') . $sk['file_surat']; ?>" target="_blank"><?= $sk['file_surat']; ?></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?= $this->pagination->create_links(); ?>
        </div>
      </div>
    </div>
  </div>
</div>