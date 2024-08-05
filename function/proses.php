<?php
include('admin_fungsi.php');

if (isset($_POST["aksi"])) {
    if ($_POST["aksi"] == "Simpan") {
        // var_dump($_POST);
        // var_dump($_FILES);
        // die;
        $berhasil = tambah_data($_POST, $_FILES);

        if ($berhasil == true) {
            header("location: ../admin/postingan.php");
        } else {
            header('location: ../admin/postingan.php?alert=warning');
            exit();
        }
    } else if ($_POST['aksi'] == "Ubah") {
        // var_dump($_POST);
        // var_dump($_FILES);
        // die;
        $berhasil = ubah_data($_POST, $_FILES);

        if ($berhasil) {
            header("location: ../admin/postingan.php");
        } else {
            echo $berhasil;
        }
    }
}

if (isset($_GET['hapus'])) {
    $berhasil = hapus_data($_GET);
    if ($berhasil) {
        header("location: ../admin/postingan.php");
    } else {
        echo $berhasil;
    }
}

if (isset($_GET['hapusakun'])) {
    $berhasil = hapus_akun($_GET);
    if ($berhasil) {
        header("location: ../admin/pengguna.php");
    } else {
        echo $berhasil;
    }
}

if (isset($_POST['buat_akun']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $berhasil = buat_akun($_POST);
    if ($berhasil) {
        // jika berhasil
        header('location: ../index.php?show_login=true');
        exit;
    }
}

if (isset($_POST['masuk_akun']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $berhasil = masuk_akun($_POST);
    // var_dump($berhasil);
    // die;
    if (session_status() == PHP_SESSION_ACTIVE) {
        // jika user = 1, admin = 2
        if ($_SESSION['user']) {
            echo '<script language="javascript">alert("Selamat Datang ' . $_SESSION['username'] . '!"); document.location="../user/home.php";</script>';
            exit;
        } else if ($_SESSION['admin']) {
            header('location: ../admin/index.php');
            exit;
        } else {
            echo '<script>
                alert("Sandi salah. Silakan coba lagi.");
                document.location="../index.php";
        </script>
        ';
        }
    } else {
        // jika gagal
        echo "login gagal.";
    }
}

// edit user
if (isset($_POST['edit_user']) &&   $_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST);
    // var_dump($_FILES);
    // die;
    $berhasil = edit_user($_POST, $_FILES);
    if ($_SESSION['user']) {
        header('location: ../user/home.php?update=success');
    } else {
        echo "gagal update";
    }
}
