<?php
// Langkah 2.3: Tombol Favorit (aksi_favorit.php)
include("../databases/koneksi.php");
// Pastikan user telah login (lihat langkah 2.1)
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect user ke halaman login jika belum login
    header('Location: login.php');
    exit();
}

// Ambil id dari session untuk identifikasi user yang sedang login
$id = $_SESSION['id'];

// Ambil ID postingan dari parameter URL menggunakan $_GET['id']
$post_id = $_GET['id'];


$queryCheckFavorite = "SELECT * FROM favorit WHERE id_user = $id AND id_post = $post_id";
$resultCheckFavorite = mysqli_query($koneksi, $queryCheckFavorite);
if (mysqli_num_rows($resultCheckFavorite) > 0) {
    // The combination of user_id and post_id already exists, don't insert again
    echo "
    <script>
        alert('Post Sudah Berada di Favorit!');
        document.location.href = 'home.php';
    </script>
";
} else {
    // Insert the new favorite post into the favorit table
    $queryInsertFavorite = "INSERT INTO favorit VALUES ('', '$id', '$post_id')";
    if (mysqli_query($koneksi, $queryInsertFavorite)) {
        echo "
        <script>
            alert('Berhasil Menambahkan Post ke Favorit!');
            document.location.href = 'favorit.php';
        </script>
    ";
    } else {
        echo "
        <script>
            alert('Gagal Menambahkan Post ke Favorit!');
            document.location.href = 'home.php';
        </script>
    ";
    }
}
