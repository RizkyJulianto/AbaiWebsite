<?php
  $server = "localhost";
  $user = "root";
  $pass = "";
  $database = "traf";

  $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
  mysqli_select_db($koneksi, $database);
?>
