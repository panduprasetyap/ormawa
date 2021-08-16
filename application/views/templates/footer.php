   <!-- Footer -->
   <footer class="footer pt-0">
     <div class="row align-items-center justify-content-lg-between">
       <div class="col-lg-12">
         <div class="copyright text-center  text-lg-left  text-muted">
           &copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">Ormawa Mail</a>
         </div>
       </div>
     </div>
   </footer>
   </div>
   </div>
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Siap Untuk Keluar?</h5>
           <button class="close" type="button" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
           </button>
         </div>
         <div class="modal-body">Tekan "Logout" jika anda ingin keluar.</div>
         <div class="modal-footer">
           <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
           <a class="btn btn-danger" href="<?= base_url('Auth/logout') ?>">
             <span class="btn--inner-icon">
               <i class="ni ni-button-power"></i></span>
             <span class="btn-inner--text">Logout</span>
           </a>
         </div>
       </div>
     </div>
   </div>
   <!-- Argon Scripts -->
   <!-- Core -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="<?= base_url('assets/'); ?>vendor/jquery/dist/jquery.min.js"></script>

   <script src="<?= base_url('assets/'); ?>vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <script src="<?= base_url('assets/'); ?>vendor/js-cookie/js.cookie.js"></script>
   <script src="<?= base_url('assets/'); ?>vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
   <script src="<?= base_url('assets/'); ?>vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
   <!-- Optional JS -->
   <script src="<?= base_url('assets/'); ?>vendor/chart.js/dist/Chart.min.js"></script>
   <script src="<?= base_url('assets/'); ?>vendor/chart.js/dist/Chart.extension.js"></script>
   <!-- Argon JS -->
   <script src="<?= base_url('assets/'); ?>js/argon.js?v=1.2.0"></script>
 
   <script src="<?= base_url('assets/'); ?>js/sweetalert/sweetalert2.all.min.js"></script>
   <script src="<?= base_url('assets/'); ?>js/main.js"></script>
   <script>
     $(document).ready(function() { // Ketika halaman selesai di load
       $('#form-bulan-tahun').hide(); // Sebagai default kita sembunyikan form 
       $('#form-tahun').hide();
       $('#filter').change(function() { // Ketika user memilih filter
         if ($(this).val() == '1') { // Jika filter 
           $('#form-bulan-tahun').show(); // hide tanggal
           $('#form-tahun').hide();
         } else {
           $('#form-bulan-tahun').hide();
           $('#form-tahun').show();
         }
         $('#form-bulan-tahun input').val(''); // Clear data 
       })
     })
   </script>
   <script>
     $(document).ready(function() {
       $('.form-univ').hide();
       $('.form-fakultas').hide();
       $('.form-prodi').hide();
       $('.filterKirim').change(function() {
         if ($(this).val() == '1') {
           $('.form-univ').show();
           $('.form-fakultas').hide();
           $('.form-prodi').hide();
           $('.form-univ-select').attr('disabled', false);
           $('.form-fakulatas-select').attr('disabled', true);
           $('.form-prodi-select').attr('disabled', true);
         } else if ($(this).val() == '2') {
           $('.form-fakultas').show();
           $('.form-univ').hide();
           $('.form-prodi').hide();
           $('.form-fakulatas-select').attr('disabled', false);
           $('.form-univ-select').attr('disabled', true);
           $('.form-prodi-select').attr('disabled', true);
         } else {
           $('.form-fakultas').hide();
           $('.form-univ').hide();
           $('.form-prodi').show();
           $('.form-prodi-select').attr('disabled', false);
           $('.form-univ-select').attr('disabled', true);
           $('.form-fakultas-select').attr('disabled', true);
         }
         $('.form-univ input, .form-fakultas select, .form-prodi select').val(''); // Clear data 
       })
     })
   </script>

   </body>

   </html>