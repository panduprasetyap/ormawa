    <!-- Header -->
    <div class="header bg-bluenew pb-6">
      <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Pengiriman Surat</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url(); ?>pengiriman/">Pengiriman Surat</a></li>
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
              <h3 class="mb-0">Tambah Surat</h3>
              <h6 class="heading-small text-muted mb-4">Input Surat Sebelum Dikirimkan</h6>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                <span class="btn-inner--text">Tambah Data Surat</span>
              </button>
              <?= $this->session->flashdata('message'); ?>
              <!-- Modal -->
              <div class=" modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Input Data Surat</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <small class="text-danger pl-4">*Semua Kolom Wajib Diisi</small>
                      <?= form_open_multipart('pengiriman/tambah'); ?>
                      <div class="pl-lg-2">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-jenis">Jenis Surat</label>
                              <select class="form-control" id="id_status_surat" name="id_status_surat">
                                <?php foreach ($status_surat as $st) : ?>
                                  <option value="<?= $st['id_status_surat']; ?>"><?= $st['nama_status_surat']; ?></option>
                                <?php endforeach; ?>
                              </select>
                              <small class="form-text text-danger"><?= form_error('id_status_surat'); ?></small>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-nomor">No Surat</label>
                              <input type="text" id="no_surat" name="no_surat" class="form-control" placeholder="--/--/---/---/">
                              <small class="form-text text-danger"><?= form_error('no_surat'); ?></small>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="example-date-input" class="form-control-label">Tanggal Pelaksanaan</label>
                              <input class="form-control" type="date" value="2021-01-01" id="tgl_pelaksanaan" name="tgl_pelaksanaan">
                              <small class="form-text text-danger"><?= form_error('tgl_pelaksanaan'); ?></small>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="example-time-input" class="form-control-label">Jam</label>
                              <input class="form-control" type="time" value="10:30:00" id="jam" name="jam">
                              <small class="form-text text-danger"><?= form_error('jam'); ?></small>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label">Keterangan</label>
                              <textarea rows="4" class="form-control" placeholder="Isi Keterangan disini...." id="keterangan" name="keterangan"></textarea>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="file_surat" name="file_surat" lang="en">
                              <label class="custom-file-label" for="customFileLang">Select file</label>
                              <small class="form-text text-danger"><?= form_error('file_surat'); ?></small>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-lg-6">
                            <button class="btn btn-icon btn-success" type="submit" name="tambah">
                              <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                              <span class="btn-inner--text">Tambah</span>
                            </button>
                          </div>
                        </div>
                      </div>
                      <?= form_close(); ?>
                    </div>
                    <div class="modal-footer">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Tabel -->
      <div class="row">
        <div class="col">
          <div class="card">
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


            <div class="table-responsive">
              <table class="table align-items-center">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="budget">Jenis Surat</th>
                    <th scope="col" class="sort" data-sort="status">No Surat</th>
                    <th scope="col" class="sort" data-sort="status">Tanggal Pelaksanaan</th>
                    <th scope="col" class="sort" data-sort="completion">File</th>
                    <th scope="col" class="sort" data-sort="completion">Action</th>
                    <th scope="col" class="sort" data-sort="completion">Kirim</th>
                  </tr>
                </thead>
                <?php if (empty($surat_user)) : ?>
                  <tr>
                    <td colspan="9">
                      <div class="alert alert-danger" role="alert">
                        <strong>Data Surat</strong> Not Found
                      </div>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php
                $no = 1;
                foreach ($surat_user as $srt) : ?>
                  <tbody class="list">
                    <tr>
                      <td scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <?php echo $no++ ?>
                          </div>
                        </div>
                      </td>
                      <td class="media-body">
                        <?= $srt['nama_status_surat']; ?>
                      </td>
                      <td>
                        <div class="no">
                          <?= $srt['no_surat']; ?>
                        </div>
                      </td>
                      <td>
                        <div class="no">
                          <?= $srt['tgl_pelaksanaan']; ?>
                        </div>
                      <td>
                        <a href="<?= base_url('assets/file/') . $srt['file_surat']; ?>" target="_blank"><?= $srt['file_surat']; ?></a>
                      </td>
                      <td>
                        <a href="<?= base_url(); ?>pengiriman/hapus/<?= $srt['id_surat']; ?>" class="btn btn-danger btn-sm tombol-hapus">
                          <span class="btn--inner-icon">
                            <i class="ni ni-fat-remove"></i>
                          </span>
                          <span class="btn-inner--text">Hapus</span>
                        </a>
                        <a href="<?= base_url(); ?>pengiriman/ubah/<?= $srt['id_surat']; ?>" class="btn btn-warning btn-sm">
                          <span class="btn--inner-icon">
                            <i class="ni ni-settings"></i></span>
                          <span class="btn-inner--text">Edit</span>
                        </a>
                        <a href="<?= base_url(); ?>pengiriman/detail/<?= $srt['id_surat']; ?>" class="btn btn-info btn-sm">
                          <span class="btn--inner-icon">
                            <i class="ni ni-folder-17"></i></span>
                          <span class="btn-inner--text">Detail</span>
                        </a>
                      </td>
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#krimSuratModal<?= $srt['id_surat']; ?>">
                          <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                          <span class="btn-inner--text">Kirim Surat</span>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="krimSuratModal<?= $srt['id_surat']; ?>" tabindex="-1" role="dialog" aria-labelledby="krimSuratModalLabel<?= $srt['id_surat']; ?>" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="krimSuratModalLabel<?= $srt['id_surat']; ?>">Kirim Surat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="<?= base_url() . 'pengiriman/kirim'; ?>" method="post">
                                  <h5 class="text-danger pl-2"><i>Kirim Surat Sesuai Alamat Tujuan<i></h5>
                                  <div class="form-group">
                                    <input type="hidden" id="id_surat" name="id_surat" class="form-control" placeholder="ID Surat" value="<?= $srt['id_surat'];  ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tujuan Surat</label>
                                    <select class="form-control filterKirim" id="filterKirim" name="filterKirim">
                                      <option value="">--Tingkatan Pengirim--</option>
                                      <option value="1">Universitas</option>
                                      <option value="2">Fakultas</option>
                                      <option value="3">Program Studi</option>
                                    </select>
                                    <br>
                                    <div class="form-univ">
                                      <select class=" form-control form-univ-select" id="id_tujuan" name="id_tujuan">
                                        <option value="">--Ormawa Universitas--</option>
                                        <?php foreach ($useruniv as $uv) : ?>
                                          <option value="<?= $uv['id_user']; ?>"><?= $uv['nama']; ?> </option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                    <div class="form-fakultas">
                                      <select class=" form-control form-fakulatas-select" id="id_tujuan" name="id_tujuan">
                                        <option value="">--Ormawa Fakultas--</option>
                                        <?php foreach ($userfakultas as $uf) : ?>
                                          <option value="<?= $uf['id_user']; ?>"><?= $uf['nama']; ?> </option>
                                          <?php endforeach; ?>
                                      </select>
                                    </div>
                                    <div class="form-prodi">
                                      <select class=" form-control form-prodi-select" id="id_tujuan" name="id_tujuan">
                                        <option value="">--Ormawa Prodi--</option>
                                        <?php foreach ($userprodi as $up) : ?>
                                          <option value="<?= $up['id_user']; ?>"><?= $up['nama']; ?> </option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                  </div>

                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                  <button class="btn btn-primary" type="submit" name="kirim">
                                    <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                                    <span class="btn-inner--text">Kirim</span>
                                  </button>
                                </form>
                              </div>
                              <div class="modal-footer">

                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
              </table>

            </div>
          </div>
        </div>
      </div>