<?php
session_start();

if (!isset($_SESSION['admin'])) {
  echo '<script language="javascript">alert("Anda harus Login Sebagai Admin!"); document.location="../index.php";</script>';
}

include ('head.php');
include ('css.php');
include ('navigasi.php');
include ('../function/admin_fungsi.php');
?>
<?php
//panggil fungsi untuk untuk memilih data lalu jumlah banyak data pada tabel berita
$post = jumlah_post();
$user = jumlah_user();


?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row justify-content-center">
          <div class="col-xl-5 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100 ">
                <div class="card-body">
                  <div class="ml-4 mt-2">
                    <i class="fa fa-edit fa-5x"></i>
                 
                 <div class="float-right mr-4 mt-3"style="font-size: 25px;"><?php echo $post ?> </div>
                 <div class="col-xs-9 text-right mr-4">
                    <!-- <div class="huge "></div> -->
                    <div style="font-size: 25px;">Post</div>
                </div>
                </div>
                </div>
                <a class="card-footer text-white clearfix " href="postingan.php">
                  <span class="float-left ml-4">View Details</span>
                  <span class="float-right mr-5"><i class="fa fa-arrow-circle-right" style="font-size: 25px;"></i></span>
                </a>
              </div>
            </div>
 <!-- Icon Cards-->
          <div class="col-xl-5 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="ml-4 mt-2">
                    <i class="fa fa-user-circle fa-5x"></i>
                 
                 <div class="float-right mr-4 mt-3"style="font-size: 25px;"><?php echo $user ?> </div>
                 <div class="col-xs-9 text-right mr-4 mt-1">
                    <!-- <div class="huge"></div> -->
                    <div style="font-size: 25px;">User</div>
                </div>
                </div>
                </div>
                <a class="card-footer text-white clearfix" href="pengguna.php">
                  <span class="float-left ml-4">View Details</span>
                  <span class="float-right mr-5"><i class="fa fa-arrow-circle-right" style="font-size: 25px;"></i></span>
                </a>
              </div>
            </div>

          <?php include('footer.php');?>
