<?php
include('../databases/koneksi.php');
session_start();
if (session_status() === PHP_SESSION_ACTIVE) {
    // Check if a session variable is set
    if (isset($_SESSION['user'])) {
        // Session variable is set, retrieve its value
        $username = $_SESSION['user'];
        $sql = "SELECT * FROM login WHERE username = '$username'";
        $query = mysqli_query($koneksi, $sql);
        $result = mysqli_fetch_assoc($query);
    }
}
$hash = decryptData($result['password'], "abaibujangrpl");
function decryptData($data, $key)
{
    $data = base64_decode($data);
    $ivSize = openssl_cipher_iv_length('AES-256-CBC');
    $iv = substr($data, 0, $ivSize);
    $encrypted = substr($data, $ivSize);
    return openssl_decrypt($encrypted, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>ABAI | Edit user</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../images/asset/IconABAITrans.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;0,700;1,700&family=Lato:wght@300;400&family=Poppins:ital,wght@0,400;0,500;0,700;0,900;1,100&family=Volkhov:ital@1&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesoeet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<style>
    body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .file-input-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }

    .file-input-wrapper button {
        display: inline-block;
        padding: 10px 15px;
        background-color: #f26522;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .close {
        background-color: transparent;
        border: 0;
        font-size: 30px;
        cursor: pointer;
        position: absolute;
        right: 25px;
        top: 15px;
        border-radius: 70%;
        transition: all 0.2s ease-in;
    }
    .close:hover {
        opacity: 0.10;
        background-color: lightgray;
    }

    .show-hide {
        position: absolute;
        right: 30px;
        bottom: 21%;
    }
    .show-hide i {
        font-size: 20px;
        color: #3e0d0d;
        cursor: pointer;
    }
    #hide1 {
        display: none;
    }
</style>

<body>

    <div style="text-align: center;">Ubah Profile
    <button class="close"><a href="home.php">&times; </a></button>
</div>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <hr class="mt-0 mb-3">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-3 mb-xl-0">
                    <div class="card-header text-center ">Foto Profil</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="../images/profile/<?= $result['gambar'] ?>" width="175" height="236">
                        <!-- Profile picture help block-->
                        <div class="small font-bold text-muted mb-4">JPG or PNG Tidak lebih dari 5 MB</div>
                        <!-- Profile picture upload button-->
                        <div class="file-input-wrapper">
                            <form action="../function/proses.php" method="post" enctype="multipart/form-data">
                                <input type="file" id="image" name="gambar">
                                <button type="button">Upload Gambar Baru</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-3">
                    <div class="card-header">Detail Akun</div>
                    <div class="card-body">
                            <!-- Form Group (username)-->
                            <div class="mb-2">
                                <input type="hidden" value="<?= $result['id'] ?>" name="id">
                                <label class="small mb-1" for="inputUsername">Username </label>
                                <input class="form-control" id="inputUsername" type="text" value="<?= $result['username'] ?>" name="username">
                            </div>
                            <div class="mb-2">
                                <label class="small mb-1" for="inputUsername">Email</label>
                                <input class="form-control" id="inputUsername" type="text" value="<?= $result['email'] ?>" name="email">
                            </div>
                            <div class="mb-2">
                                <label class="small mb-1" for="inputUsername">Password</label>
                                <input class="form-control" id="myPassword" type="password" value="<?= $hash ?>" placeholder="Ubah Password" name="password">
                                <span class="show-hide" onclick="myFunction()">
                                    <i id="hide1" class="fa fa-eye"></i>
                                    <i id="hide2" class="fa fa-eye-slash"></i>
                                </span>  
                            </div>
                            <!-- Form Row-->
                    </div>
                    <!-- Save changes button-->
                    <button class="btn" type="submit" style="background-color: #f26522; color: white;" name="edit_user" id="edit-user-button">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<script>
    function myFunction(){
       
        var x = document.getElementById("myPassword");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");

        if(x.type === 'password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        }else{
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
    

</script>
</body>
</html>