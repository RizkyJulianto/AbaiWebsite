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
include('../function/admin_fungsi.php');
$query = "SELECT * FROM login WHERE level = 1";
$sql = mysqli_query($koneksi, $query);
$no = 1;

?>

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Pengguna</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i>
        Data Pengguna
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Jam Login</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <?php while ($result = mysqli_fetch_assoc($sql)) : ?>
            <tbody>
            <tr>
              <th scope="row"><?= $no++ ?></th>
              <td><?= $result['username'] ?></td>
              <td><?= $result['email'] ?></td>
              <td><?= $result['jam_login'] ?></td>
              <?php if($result['status'] == "Berhasil") {?>
                <td><h6 class="text-success"><?= $result['status'] ?></h6></td>
              <?php }else if($result['status'] == "Gagal") {?>
                <td><h6 class="text-danger"><?= $result['status'] ?></h6></td>
              <?php } ?>
              <td>
                <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $result['id'] ?>" name="hapus">
                  <i class="fa fa-trash"></i>
                </button>
              </td>
            </tr>
            </tbody>
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
                    <div class="modal-body">Akun Ini Akan Dihapus</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <a class="btn btn-primary" href="../function/proses.php?hapusakun=<?= $result['id'] ?>">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </table>
        </div>
      </div>
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