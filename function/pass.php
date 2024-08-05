<?php
// Fungsi untuk mengenkripsi data menggunakan AES
function encryptData($data, $key)
{
    $ivSize = openssl_cipher_iv_length('AES-256-CBC');
    $iv = openssl_random_pseudo_bytes($ivSize);
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $encrypted);
}

// Fungsi untuk mendeskripsi data yang telah dienkripsi menggunakan AES
function decryptData($data, $key)
{
    $data = base64_decode($data);
    $ivSize = openssl_cipher_iv_length('AES-256-CBC');
    $iv = substr($data, 0, $ivSize);
    $encrypted = substr($data, $ivSize);
    return openssl_decrypt($encrypted, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
}

// Contoh penggunaan
$secretKey = 'abaibujangrpl'; // Ganti dengan kunci rahasia Anda sendiri (32 karakter untuk AES-256)
$plainText = 'adminbiasa_1?';

// Enkripsi
$encryptedText = encryptData($plainText, $secretKey);
echo "Teks terenkripsi: $encryptedText <br>";

// Deskripsi
$decryptedText = decryptData($encryptedText, $secretKey);
echo "Teks terdeskripsi: $decryptedText <br>";
?>
