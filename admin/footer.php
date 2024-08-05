  </div>
  <!-- /.container-fluid -->
</main>
  <!-- Sticky Footer -->
  <!-- Terima kasih  untuk tidak menghapus copyright -->
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © ABAI 2023</span>
      </div>
    </div>
  </footer>

  </div>
  <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik "Oke" di bawah jika Anda ingin keluar dari halaman admin ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="logout.php">Oke</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Edit Modal
<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel">
                                 <div class="modal-dialog " role="document">
                                    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Postingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="" method="post" enctype="multipart/form-data">
        <div class="row justify-content-between text-left">
  <div class="form-group col-sm-6 flex-column d-flex">
    <label class="form-control-label"for="nama">Nama AI</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama AI" required>
  </div>
  <div class="form-group col-sm-6 flex-column d-flex">
    <label class="form-control-label " for="link_url">URL</label>
    <input type="text" class="form-control" id="link_url" name="link_url" placeholder="Masukkan URL AI" required>
  </div>
</div>
<div class="form-group col-md-15">
    <label for="deskripsi">Deskripsi</label>
    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi" required></textarea>
  </div>
  <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                    <label for="gambar">Gambar</label>  
                      <input class="form-control" type="file" id="gambar" name="gambar">
                        <img src="gambar/80x80.png" id="preview" class="img-thumbnail">
                    </div>
                </div>
            </div>

  <div class="form-group">
    <label for="kategori">Kategori</label>
    <select class="form-control" id="kategori" name="kategori">
            <option selected></option>    
            <option value="populer">Populer</option>
        </select>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <input type="submit" name="aksi" value="simpan" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>
</div> -->
<!-- sidebar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <script src="../js/sidebar.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../properties/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script type="text/javascript" src="../plugins/ckeditor2/ckeditor.js"></script>
  <script src="../properties/vendor/chart.js/Chart.min.js"></script>
  <script src="../properties/vendor/datatables/jquery.dataTables.js"></script>
  <script src="../properties/vendor/datatables/dataTables.bootstrap4.js"></script>
  <script>
    $(document).ready(function() {
      $('#dataTables-example').DataTable({
        responsive: true
      });
    });
    // $(".nav-item .nav-link ").on("click", function() {
    //   $(".nav-item").find(".active").removeClass("active");
    //   $(this).addClass("active");
    // });
  </script>
  <!-- Custom scripts for all pages-->
  <script src="../js/admin.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../properties/js/demo/chart-area-demo.js"></script>
  <script src="../properties/js/demo/chart-bar-demo.js"></script>
  <script src="../properties/js/demo/chart-pie-demo.js"></script>

  </body>

  </html>