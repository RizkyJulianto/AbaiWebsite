<?php
include ('../databases/koneksi.php');

$id = $_GET['id'];
$query = mysqli_query($koneksi,"DELETE FROM post WHERE id = '$id'");

if($query){
    echo "<script>
					alert('Hapus data sukses!');
					document.location = 'postingan.php'; 
		    </script>";
}else{
    echo "<script>
					alert('Hapus data gagal!');
					document.location = 'postingan.php';
			</script>";
}
?>