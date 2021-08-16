<!-- Header -->
<div class="header bg-bluenew pb-6">
  <div class="container-fluid">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flashkirim'); ?>"></div>
        <?php if ($this->session->flashdata('flashkirim')) : ?>
        <?php endif; ?>
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Pejadwalan Surat</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>penjadwalan/">Penjadwalan Surat</a></li>
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
          <h3 class="mb-0">Penjadwalan</h3>
          <br>
          <a href="<?= base_url(); ?>penjadwalan/viewKalender/" class="btn btn-success btn-lg">
            <span class="btn--inner-icon">
              <i class="ni ni-calendar-grid-58"></i></span>
            <span class="btn-inner--text"> Lihat Jadwal di Kalender</span>
          </a>
          <br>
          <br>
          <form action="" method="POST">
            <div class="row mb-1 ml-3">
              <div class="col-sm-12 mt-2">
                <h4>Cari</h4>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <select name="bulan" class="form-control">
                    <option value="">Filter Bulan</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <button type="submit" name="submit" class="btn btn-warning">
                  <span class="btn-inner--icon"><i class="ni ni-zoom-split-in"></i></span>
                </button>
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="table-responsive">
                  <div>
                    <table class="table align-items-center">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" class="sort" data-sort="name">Prioritas</th>
                          <th scope="col" class="sort" data-sort="budget">Jenis Surat</th>
                          <th scope="col" class="sort" data-sort="budget">Pengirim</th>
                          <th scope="col" class="sort" data-sort="status">No Surat</th>
                          <th scope="col" class="sort" data-sort="completion">Tanggal Pelaksanaan</th>
                          <th scope="col" class="sort" data-sort="completion">Jam</th>
                          <th scope="col" class="sort" data-sort="completion">Keterangan</th>
                          <th scope="col" class="sort" data-sort="completion">Detail</th>
                          <th scope="col" class="sort" data-sort="completion">Aksi</th>
                        </tr>
                      </thead>
                      <?php if (empty($jadwal_surat)) : ?>
                        <tr>
                          <td colspan="9">
                            <div class="alert alert-danger" role="alert">
                              <strong>Belum Ada Jadwal Surat</strong> Pada Bulan Ini
                            </div>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <tbody class="list">
                        <?php $i = 1; ?>
                        <?php foreach ($jadwal_surat as $js) : ?>
                          <tr>
                            <th scope="row">
                              <?= $i; ?>
                            </th>
                            <td class="media-body">
                              <?= $js['nama_status_surat']; ?>
                            </td>
                            <td>
                              <div>
                                <?= $js['nama']; ?>
                              </div>
                            </td>
                            <td>
                              <div>
                                <?= $js['no_surat']; ?>
                              </div>
                            </td>
                            <td>
                              <div>
                                <?= $js['tgl_pelaksanaan']; ?>
                              </div>
                            </td>
                            <td>
                              <div>
                                <?= $js['jam']; ?>
                              </div>
                            </td>
                            <td>
                              <div class="wraptext">
                                <?= $js['keterangan']; ?>
                              </div>
                            </td>
                            <td>
                              <a href="<?= base_url('assets/file/') . $js['file_surat']; ?>" target="_blank"><?= $js['file_surat']; ?></a>
                            </td>
                            <td>
                              <?php if (empty($js['tgl_konfirmasi']) || $js['tgl_konfirmasi'] == '0000-00-00') { ?>
                                <a class="badge badge-info badge-lg" href="<?= base_url(); ?>penjadwalan/detailakses/<?= $js['id_akses_surat']; ?>">
                                  <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                                  <span class=" btn-inner--text">Konfirmasi ?</span>
                                <?php } else { ?>
                                  <span class="badge badge-success badge-lg">
                                    <i class="ni ni-check-bold"></i>
                                    Terkonfirmasi</span>
                                <?php } ?>
                            </td>
                          </tr>
                          <?php $i++ ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="col">
            <div class="card">

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Tabel -->

  </div>