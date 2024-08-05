<?php
//Database function and session
include('../databases/koneksi.php');

//function tampilkan data
function select($data)
{
    //panggil koneksi
    global $koneksi;

    $result = mysqli_query($koneksi, $data);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// function tambah, edit, hapus postingan
function tambah_data($data, $files)
{
    global $koneksi;

    $nama = $data['nama'];
    $link_url = $data['link_url'];

    $split = explode('.', $files['gambar']['name']);
    $split = strtolower(end($split));
    $ekstensi = $split;

    $gambar = uniqid();
    $gambar .= '.';
    $gambar .= $split;
    // cek apakah data sudah pernah diinput atau belum
    $sql_check = "SELECT * FROM post WHERE nama = '$nama'";
    $check = mysqli_query($koneksi, $sql_check);
    if (mysqli_num_rows($check) == 0) {
        $deskripsi = $data['deskripsi'];
        $kategori = $data['kategori'];

        $dir = "../images/post/";
        $tmpFile = $files['gambar']['tmp_name'];

        move_uploaded_file($tmpFile, $dir . $gambar);

        $query = "INSERT INTO post VALUES('', '$nama', '$link_url', '$gambar', '$deskripsi','$kategori')";
        $sql = mysqli_query($koneksi, $query);
    } else {
        return false;
    }

    return true;
}


function ubah_data($data, $files)
{
    global $koneksi;

    $id = $data['id'];
    $nama = $data['nama'];
    $link_url = $data['link_url'];
    $deskripsi = $data['deskripsi'];
    $kategori = $data['kategori'];

    // mengambil nama gambar dari database
    $queryShow = "SELECT * FROM post WHERE id = '$id'";
    $sqlShow = mysqli_query($koneksi, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $gambar = $result['gambar'];

    // jika gambar baru diupload
    if ($files['gambar_edit']['name'] != "") {
        $split = explode('.', $files['gambar_edit']['name']);
        $ekstensi = $split[count($split) - 1];
        $gambar = md5(uniqid()) . '.' . $ekstensi;
        $file_path = "../images/post/" . $result['gambar'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        move_uploaded_file($files['gambar_edit']['tmp_name'], "../images/post/" . $gambar);
    }

    $query = "UPDATE post SET nama='$nama', link_url='$link_url', deskripsi='$deskripsi', kategori='$kategori', gambar='$gambar' WHERE id ='$id'";
    $sql = mysqli_query($koneksi, $query);

    return true;
}


function hapus_data($data)
{
    global $koneksi;

    $id = $data['hapus'];

    $queryShow = "SELECT * FROM post WHERE id = '$id'";
    $sqlShow = mysqli_query($koneksi, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("../images/post/" . $result['gambar']);

    $query = "DELETE FROM post WHERE id = '$id'";
    $sql = mysqli_query($koneksi, $query);
    echo mysqli_error($koneksi);

    return true;
}



// akun user 
// buat akun
function buat_akun($data)
{
    global $koneksi;
    $pass = $data['password'];
    $conf = $data['conf_pass'];
    $key = "abaibujangrpl";
    // Fungsi untuk mengenkripsi data menggunakan AES
    // cek sama atau tidak passwordnya
    if ($pass === $conf) {
        $username = $data['nama'];
        $email = $data['email'];
        $password = encryptData($data['password'], $key);
        // $jam_login = date('Y-m-d H:i:s');
        $sql = "INSERT INTO login VALUES ('', '$username', '$email', '$password', 1, 'Berhasil', NOW(), 'default.png')";
        // var_dump($sql);
        // die;
        $result = mysqli_query($koneksi, $sql);
    }
    return true;
}

// masuk akun
function masuk_akun($data)
{
    global $koneksi;
    $username = mysqli_real_escape_string($koneksi, $data['username']);
    $password = mysqli_real_escape_string($koneksi, $data['password']);

    // Query the database for the user with the given username
    $query = "SELECT * FROM login WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    // Fungsi untuk mendeskripsi data yang telah dienkripsi menggunakan AES
    function decryptData($data, $key){
    $data = base64_decode($data);
    $ivSize = openssl_cipher_iv_length('AES-256-CBC');
    $iv = substr($data, 0, $ivSize);
    $encrypted = substr($data, $ivSize);
    return openssl_decrypt($encrypted, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    }


    // Check if the user was found
    if (mysqli_num_rows($result) > 0) {
        // Get the user data
        $user = mysqli_fetch_assoc($result);
        $pass = decryptData($user['password'], "abaibujangrpl");
        // Verify the password
        if ($password === $pass) {
            // Password is correct, create a session
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            if ($user['level'] == 1) {
                $_SESSION['user'] = $username;
            } else if ($user['level'] == 2) {
                $_SESSION['admin'] = $username;
            }
            // var_dump($_SESSION);
            // die;
            return $_SESSION;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// hapus akun
function hapus_akun($data)
{
    global $koneksi;
    $id = $data['hapusakun'];
    $queryShow = "SELECT * FROM login WHERE id = '$id'";
    $sqlShow = mysqli_query($koneksi, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);
    if ($result['gambar'] != 'default.png') {
        unlink("../images/post/" . $result['gambar']);
    }
    $query = "DELETE FROM login WHERE id = '$id'";
    $sql = mysqli_query($koneksi, $query);
    echo mysqli_error($koneksi);
    return true;
}

// searching
function cari($keyword)
{
    global $koneksi;
    $query = "SELECT * FROM post WHERE nama LIKE '%$keyword%' OR 
    deskripsi LIKE '%$keyword$'";
    $result = mysqli_query($koneksi, $query);
    return select($query);
}


function filter($keyword)
{
    global $koneksi;

    // Filter keyword agar aman dari SQL Injection
    $keyword = mysqli_real_escape_string($koneksi, $keyword);

    // Query untuk mencari data yang mengandung keyword pada kolom nama atau deskripsi
    $sql = "SELECT * FROM post WHERE nama LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%'";

    // Eksekusi query dan ambil hasilnya
    $result = mysqli_query($koneksi, $sql);

    // Jika query sukses dan ada data yang ditemukan, kembalikan data dalam bentuk array asosiatif
    if ($result && mysqli_num_rows($result) > 0) {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    } else {
        return false;
    }
}




// menampilkan jumlah postingan
function jumlah_post()
{
    global $koneksi;
    // Execute MySQL query to get count of data
    $sql = "SELECT COUNT(*) as count FROM post";
    $result = mysqli_query($koneksi, $sql);

    // Check if query was successful
    if (!$result) {
        die("Error executing query: " . mysqli_error($koneksi));
    }

    // Get the count of data from the query result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    // // Close MySQL connection
    // mysqli_close($koneksi);

    // Return the count of data
    return $count;
}

// manampilkan jumlah user
function jumlah_user()
{
    global $koneksi;
    // Execute MySQL query to get count of data
    $sql = "SELECT COUNT(*) as count FROM login WHERE level = 1";
    $result = mysqli_query($koneksi, $sql);
    // Check if query was successful
    if (!$result) {
        var_dump($result);
        die;
        die("Error executing query: " . mysqli_error($koneksi));
    }

    // Get the count of data from the query result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];


    // Close MySQL connection
    mysqli_close($koneksi);

    // Return the count of data
    return $count;
}

function edit_user($data, $files)
{
    global $koneksi;
    $id = $data['id'];
    $username = $data['username'];
    $email = $data['email'];
    $password = encryptData($data['password'], "abaibujangrpl");
    

    // mengambil nama gambar dari database
    $queryShow = "SELECT * FROM login WHERE id = '$id'";
    $sqlShow = mysqli_query($koneksi, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $gambar = $result['gambar'];

    // jika gambar baru diupload
    if ($files['gambar']['name'] != "") {
        $split = explode('.', $files['gambar']['name']);
        $ekstensi = $split[count($split) - 1];
        $gambar = md5(uniqid()) . '.' . $ekstensi;
        $file_path = "../images/profile/" . $result['gambar'];
        if (file_exists($file_path) != 'default.png') {
            unlink($file_path);
        }
        move_uploaded_file($files['gambar']['tmp_name'], "../images/profile/" . $gambar);
    }

    $query = "UPDATE login SET username='$username', email='$email', password='$password', gambar='$gambar' WHERE id ='$id'";
    $sql = mysqli_query($koneksi, $query);
    session_start();
    unset($_SESSION['user']);
    $_SESSION['user'] = $username;

    return $_SESSION;
}

// passowrd encrypt and decrypt
function encryptData($data, $key)
{
    $ivSize = openssl_cipher_iv_length('AES-256-CBC');
    $iv = openssl_random_pseudo_bytes($ivSize);
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $encrypted);
}

