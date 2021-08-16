<!-- Header -->
<div class="header bg-bluenew pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Laporan Surat</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>laporan/">Laporan Surat</a></li>
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
          <h3 class="mb-0">Data Surat</h3>
          <br>
          <div class="row">
            <!-- Surat Masuk -->
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body ">
                  <h5 class="card-title">Laporan Surat Keluar</h5>
                  <p class="card-text">Laporan Surat Keluar berisi laporan surat keluar per Tahun</p>
                  <form action="" method="get">
                    <select name="filterkeluar" id="filter" class="form-control">
                      <option value="">Pilih</option>
                      <option value="1">Filter per bulan dan tahun</option>
                      <option value="2">Filter per tahun</option>
                    </select>
                    <br>
                    <div id="form-bulan-tahun">
                      <div class="row">
                        <div class="col-lg-6">
                          <select name="bulan" class="form-control">
                            <option value="">Pilih</option>
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
                        </div>
                        <div class="col-lg-6">
                          <select name="tahun" class="form-control">
                            <?php
                            $mulai = date('Y') - 5;
                            for ($i = $mulai; $i < $mulai + 10; $i++) {
                              $sel = $i == date('Y') ? ' selected="selected"' : '';
                              echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div id="form-tahun">
                      <div class="row">
                        <div class="col-lg-6">
                          <select name="tahun" class="form-control">
                            <?php
                            $mulai = date('Y') - 5;
                            for ($i = $mulai; $i < $mulai + 10; $i++) {
                              $sel = $i == date('Y') ? ' selected="selected"' : '';
                              echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">
                      <span class="btn-inner--icon"><i class="ni ni-folder-17"></i></span>
                      <span class="btn-inner--text">Show Data</span>
                    </button>
                    <a href="<?php echo base_url(); ?>/laporan" class="btn btn-danger">
                      <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                      <span class="btn-inner--text">Reset Filter</span>
                    </a>
                  </form>
                </div>
              </div>
            </div>

          </div>
          <br>

          <div class="col">
            <!-- <button type="button" class="btn btn-success" onclick="printJS({
              printable: 'printJS-form',
              type: 'html', 
              targetStyles: ['*'],
              style: ['@page { size: A4; margin: 30px;} body {margin: 0;} table {width: 100%; border-collapse: collapse; text-align:left} td {border: 1px solid black;}  th {border: 1px solid black;}'],  targetStyles: ['*']})">
              <span class="btn-inner--icon"><i class="ni ni-folder-17"></i></span>
              <span class="btn-inner--text">Print File</span>
            </button> -->

            <div class="card">
              <!-- id="printJS-form -->
              <!-- <div class="card" class=".table-print"> -->
              <div class="row">
                <div class="col-lg-3 m-4">
                  <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
                      <span class="btn-inner--text">Export Data</span>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="<?php echo $url_cetak; ?>" target="_blank">Export PDF</a>
                      <a class="dropdown-item" href="<?= $url_excel; ?>">Export Excel</a>
                    </div>
                  </div>

                </div>
              </div>

              <!-- <button id="button-print">CETAK PDF</button><br /><br /> -->
              <form>
                <h2 class="mb-2 ml-4"><?php echo $ket; ?></h2>
              </form>
              <table class="table align-items-center" id="printJS-form">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="budget">Jenis Surat</th>
                    <th scope="col" class="sort" data-sort="status">No Surat</th>
                    <th scope="col" class="sort" data-sort="completion">Tanggal Pelaksanaan</th>
                    <th scope="col" class="sort" data-sort="completion">Jam</th>
                    <th scope="col" class="sort" data-sort="completion">Keterangan</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php $i = 1; ?>
                  <?php foreach ($surat as $sm) : ?>
                    <tr>
                      <th scope="row">
                        <?= $i; ?>
                      </th>
                      <td class="media-body">
                        <?= $sm['nama_status_surat']; ?>
                      </td>
                      <td>
                        <div>
                          <?= $sm['no_surat']; ?>
                        </div>
                      <td>
                        <div>
                          <?= $sm['tgl_pelaksanaan']; ?>
                        </div>
                      </td>
                      <td>
                        <div>
                          <?= $sm['jam']; ?>
                        </div>
                      </td>
                      <td>
                        <div class="wraptext">
                          <?= $sm['keterangan']; ?>
                        </div>
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
    <!-- Tabel -->

  </div>