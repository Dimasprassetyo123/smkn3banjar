<?php
include '../../app.php';
// Validasi parameter ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak valid');
        window.location.href='../../pages/headmaster/index.php';
    </script>
    ";
    exit;
}

$id = escapeString($_GET['id']);
$storages = "../../storages/kepalaSekolah/";

// Ambil data untuk mendapatkan nama file gambar
$qSelect = "SELECT headmasters_photo FROM headmasters WHERE id = '$id'";
$resultSelect = mysqli_query($connect, $qSelect);
$data = mysqli_fetch_assoc($resultSelect);
?>