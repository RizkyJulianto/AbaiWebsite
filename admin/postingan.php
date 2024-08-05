<?php
session_start();

if (!isset($_SESSION['admin'])) {
  echo '<script language="javascript">alert("Anda harus Login Sebagai Admin!"); document.location="../index.php";</script>';
}
//Include properties
include('head.php');
include('css.php');
include('navigasi.php');
?>
<?php
//Database function and session
include('../databases/koneksi.php');
include('../function/proses.php');
$query = "SELECT * FROM post";
$sql = mysqli_query($koneksi, $query);
$no = 0;

?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Postingan</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i>
        Data Postingan
      </div>
      <div class="entri-baru mt-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Postingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="../function/proses.php" method="post" enctype="multipart/form-data">
                  <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex">
                      <label class="form-control-label" for="nama">Nama AI</label>
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
                        <div id="msg"></div>
                        <input type="file" name="gambar" id="file" class="file-name-tambah form-control">
                        <div class="input-group my-3">
                          <div class="input-group-append">
                          </div>
                        </div>
                        <!-- <img src="gambar/80x80.png" class=" preview img-thumbnail"> -->
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori">
                      <option value=""></option>
                      <option value="Populer">Populer</option>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <input type="submit" name="aksi" value="Simpan" class="btn btn-primary">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <section class="">
        <div class="container">
          <div class="row gy-3 my-3">
            <?php
            while ($result = mysqli_fetch_assoc($sql)) {
            ?>

              <div class="col-sm-6 col-md-4 col-lg-4 mb-4" style="display: flex; flex-wrap: wrap;">
                <div class="card ">
                  <img class="card-img-top" src="../images/post/<?php echo $result['gambar']; ?>" height="200px">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo ++$no; ?> . <?php echo $result['nama']; ?></h5>
                    <p class="card-text" style=" overflow: hidden; text-overflow: ellipsis;"><?php echo (strlen($result["deskripsi"]) > 150 ? substr($result["deskripsi"], 0, 150) . '...' : $result["deskripsi"]); ?></p>

                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubahModal<?= $result['id'] ?>" name="aksi" onclick="gambar(<?= $result['id'] ?>)"><i class="fa fa-edit"></i></button>
                      <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $result['id'] ?>" name="hapus"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal edit -->
              <div class="modal fade" id="ubahModal<?= $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog " role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah Postingan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="../function/proses.php" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <input type="hidden" name="id" value="<?= $result['id'] ?>">
                            <label class="form-control-label" for="nama">Nama AI</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $result['nama'] ?>">
                          </div>
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label " for="link_url">URL</label>
                            <input type="text" class="form-control" id="link_url" name="link_url" value="<?= $result['link_url'] ?>">
                          </div>
                        </div>
                        <div class="form-group col-md-15">
                          <label for="deskripsi">Deskripsi</label>
                          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?= $result['deskripsi'] ?></textarea>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input type="file" name="gambar_edit" id="file-edit" class="file-name-edit form-control">
                              <div class="input-group my-3">
                                <div class="input-group-append">
                                </div>
                              </div>
                              <!-- <img src="../images/post/<?= $result['gambar'] ?>" class="preview_gambar<?= $result['id'] ?> img-thumbnail"> -->
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="kategori">Kategori</label>
                          <select class="form-control" id="kategori" name="kategori">
                            <option value="<?= $result['kategori'] ?>"><?= $result['kategori'] ?></option>
                            <option value="default">Default Value</option>
                            <option value="Populer">Populer</option>
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" name="aksi" value="Ubah" class="btn btn-primary">Ubah</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Hapus Modal-->
              <div class="modal fade" id="hapusModal<?= $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Menghapus?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Postingan Ini Akan Dihapus</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <a class="btn btn-primary" href="../function/proses.php?hapus=<?= $result['id'] ?>">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>

      </section>

      <div class="card-footer small text-muted"> <a href="#"><i class="fa fa-calendar"></i> <?php
                                                                                            $Today = date('y:m:d');
                                                                                            $new = date('l, F d, Y', strtotime($Today));
                                                                                            echo $new; ?></a>
      </div>
    </div>

    <p class="small text-center text-muted my-5">
      <!--<em>More table examples coming soon...</em>-->
    </p>
    <?php include('footer.php'); ?>

    <style>

    </style>
    <script src="js/jquery-3.4.1.js"></script>
    <script>
      function konfirmasi() {
        konfirmasi = confirm("Apakah anda yakin ingin menghapus gambar ini?")
        document.writeln(konfirmasi)
      }

      $(document).on("click", ".pilih_gambar", function() {
        var file = $(this).parents().find("#file");
        file.trigger("click");
      });

      $("#file").change(function(e) {
        var fileName = e.target.files[0].name;
        $(this).siblings(".file-name-tambah").val(fileName);

        var preview = $(this).siblings(".preview");
        var reader = new FileReader();
        reader.onload = function(e) {
          preview.attr("src", e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
      });

      $(document).on("click", ".pilih_gambar_2", function() {
        var file = $(this).parents().find("#file-edit");
        file.trigger("click");
      });

      function gambar(id) {
        console.log(id);
        return id;
      }
      $("#file-edit").change(function(e) {
        console.log(e.target.files[0]); //mengecek apakah file sudah terbaca atau tidak
        var fileName = e.target.files[0].name;
        $(this).siblings(".file-name-edit").val(fileName);


        var preview_gambar = $(this).siblings(".preview_gambar" + gambar);
        var reader = new FileReader();
        reader.onload = function(e) {
          preview_gambar.attr("src", e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
      });
    </script>
    <?php
    $alert = htmlspecialchars($_GET['alert'] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $allowed_array = array('warning');
    if ($alert == 'warning' && in_array($alert, $allowed_array)) {
    ?>
      <div class="alert alert-danger" role="alert">
        data gagal diinput karena salah format atau sama!
      </div>
    <?php } ?>