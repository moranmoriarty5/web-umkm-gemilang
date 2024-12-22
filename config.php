<?php
// config.php (misalnya)
$servername = "localhost"; // atau 127.0.0.1
$username = "root"; // default username untuk MySQL di Laragon
$password = ""; // password kosong (default)
$dbname = "gemilang"; // nama database yang ingin Anda akses

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
