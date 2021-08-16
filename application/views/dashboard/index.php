<div class="header d-flex align-items-top pt-4" style="min-height: 500px; background-image: url(<?= base_url('assets') ?>/img/theme/profile-covernew.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8">
    </span>
    <!-- Header container -->
    <div class="container-fluid ">
        <div class="flash-datauser" data-flashdata="<?= $this->session->flashdata('flashUser'); ?>"></div>
        <?php if ($this->session->flashdata('flashUser')) : ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total User</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $jumlah_user ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-single-02"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                            <span class="text-nowrap">Total Pengguna Omail</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Surat Masuk</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $total_surat_masuk ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="ni ni-email-83"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                            <span class="text-nowrap">Total Surat Masuk Anda</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Surat Keluar</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $total_surat_keluar ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="ni ni-email-83"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                            <span class="text-nowrap">Total Surat Keluar Anda</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jadwal</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $jumlah_jadwal ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                    <i class="ni ni-calendar-grid-58"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                            <span class="text-nowrap">Total Jadwal Surat Anda</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-10 col-md-12">
                    <h1 class="display-4 text-white">Halo! <?= $user_nama['nama']; ?></h1>
                    <p class="text-white mt-0 mb-4">Selamat datang di Ormawa Mail, Kita memiliki akses Kirim Surat, Jadwal Surat dan Laporan Surat</p>
                </div>
            </div>
        </div>
        <?php if ($nextjadwal) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-text"><strong>Next Jadwal</strong> dari <?= $nextjadwal['nama']; ?> Perihal <?= $nextjadwal['keterangan']; ?>
                    <br>
                    Yang akan Dilaksanakan Pada Tanggal <?= $nextjadwal['tgl_pelaksanaan']; ?> Jam <?= $nextjadwal['jam']; ?>
                </span>
                <br>
                <br>
                <a class="badge-md badge-pill badge-secondary mt-1 mb-0 ml-5" href="<?= base_url('assets/file/') . $nextjadwal['file_surat']; ?>" target="_blank">Lihat File</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php else : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-text"><strong>Next Jadwal -</strong>
                    <br>
                    <b>Kosong</b>
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    </div>

</div>
<div class="container-fluid mt--4">
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="<?= base_url('assets'); ?>/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="<?= base_url('assets/img/profile/') . $user_nama['foto']; ?>" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">

                    </div>
                </div>
                <br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center ml-4">
                                <a href="<?= base_url(); ?>dashboard/edit/<?= $user_nama['id_user']; ?>" class="btn btn-sm btn-warning  mr-4 ">
                                    <span class="btn--inner-icon">
                                        <i class="ni ni-settings"></i></span>
                                    <span class="btn-inner--text">Edit Profil</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3">
                            <?= $user_nama['nama']; ?><span class="font-weight-light"></span>
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i> <?= $user_nama['email']; ?>
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>Universitas Muhammadiyah Magelang
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Data User Ormawa </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">















                        <div>
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="no">No</th>
                                        <th scope="col" class="sort" data-sort="name">User</th>
                                        <th scope="col" class="sort" data-sort="budget">Nama User</th>
                                        <th scope="col" class="sort" data-sort="status">Email</th>
                                    </tr>
                                </thead>

                                <?php
                                $no = 1;
                                foreach ($user as $u) : ?>
                                    <tbody class="list">
                                        <tr>
                                            <th scope="row">
                                                <div class="media-body">
                                                    <?php echo ++$start ?>
                                                </div>
                                            </th>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">

                                                        <img alt="Image placeholder" src="<?= base_url('assets/img/profile/') . $u['foto']; ?>">

                                                    </a>
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm"><?= $u['nama'] ?></span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="budget">
                                                <?= $u['username'] ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <?= $u['email'] ?>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?= $this->pagination->create_links(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>