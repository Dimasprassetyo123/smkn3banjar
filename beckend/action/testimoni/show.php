<?php
include '../../app.php';
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href='../../pages/testimoni/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];

// Ambil data untuk mendapatkan nama file gambar
$qSelect = "SELECT image FROM testimonials WHERE id = '$id'";
$resultSelect = mysqli_query($connect, $qSelect);
$data = mysqli_fetch_assoc($resultSelect);

?>