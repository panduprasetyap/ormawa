<div class="card">
  <!-- Card header -->
  <div class="card-header border-0">
    <h3 class="mb-0">Edit Profile User Ormawa</h3>
    <h6 class="heading-small text-muted mb-4">Edit User pada Form dibawah ini</h6>
    <div class="row mt-3">
      <div class="col md-6">
        <div class="card">
          <!-- Card header -->


          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



            <div class="row">
              <div class="col-lg-8">

                <?= form_open_multipart('dashboard/edit/' . $user_nama['id_user']); ?>

                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user_nama['email']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-2 col-form-label">Full Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user_nama['nama']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">Picture</div>
                  <div class="col-sm-10">
                    <div class="row">
                      <div class="col-sm-3">
                        <img src="<?= base_url('assets/img/profile/') . $user_nama['foto'] ?>" class="img-thumbnail">
                      </div>
                      <div class="col-sm-9">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="foto" name="foto">
                          <label class="custom-file-label" for="foto">Pilih File</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row justify-content-start">
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-success">
                      <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Edit</span>
                    </button>
                  </div>
                  <div class="col-sm-3">
                    <a href="<?= base_url(); ?>dashboard" class="btn btn-danger"><span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                      <span class="btn-inner--text">Kembali</span>
                    </a>
                  </div>
                </div>






                </form>



              </div>
            </div>




          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->




      </div>
    </div>
  </div>
</div>
</div>
</div>