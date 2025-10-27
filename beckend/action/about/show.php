<?php
include '../../app.php';


if (empty($_GET['id'])) {
    echo "<script>
        alert('Tidak Bisa Memilih Id ini');
        window.location.href='../../pages/about/index.php';
    </script>";
    exit; // stop eksekusi
}

$id = (int) $_GET['id']; // amanin id ke integer

$qSelect = "SELECT * FROM abouts WHERE id = $id LIMIT 1";
$result  = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$school = mysqli_fetch_object($result); // <-- samakan dengan yang dipakai di detaile.php

if (!$school) {
    echo "<script>
        alert('Data tidak ditemukan');
        window.location.href='../../pages/about/index.php';
    </script>";
    exit;
}
