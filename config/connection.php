<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'compeny_profile';

    // Membuat koneksi database
  
$connect = mysqli_connect($hostname, $username, $password, $database);

// Cek koneksi
if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>