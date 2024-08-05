<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

include('../databases/koneksi.php');

$id = $_SESSION['id'];
$post_id = $_GET['id'];

// Buat query DELETE untuk menghapus data dari tabel favorit
$queryDeleteFavorite = "DELETE FROM favorit WHERE id_user = $id AND id_post = $post_id";

// Eksekusi query DELETE
if (mysqli_query($koneksi, $queryDeleteFavorite)) {
    // Hapus berhasil, tampilkan pesan alert menggunakan JavaScript
    echo "
    <script>
        alert('Post Berhasil diHapus dari Favorit!');
        document.location.href = 'favorit.php';
    </script>
";
} else {
    // Hapus gagal, tampilkan pesan error jika diperlukan
    echo "
    <script>
        alert('Post Gagal diHapus dari Favorit!');
        document.location.href = 'favorit.php';
    </script>
";}


?>
