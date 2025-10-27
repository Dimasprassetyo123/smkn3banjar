<?php
include '../../app.php';
include './show.php';
// Ambil data untuk mendapatkan nama file gambar
$qSelect = "SELECT teachers_photo FROM teachers WHERE id = '$id'"; // Diperbaiki: menghapus tab yang tidak perlu
$resultSelect = mysqli_query($connect, $qSelect);
$data = mysqli_fetch_assoc($resultSelect);

// Hapus data dari database
$qDelete = "DELETE FROM teachers WHERE id = '$id'";
$resultDelete = mysqli_query($connect, $qDelete);

// Cek apakah data berhasil dihapus atau tidak
if ($resultDelete) {
    // Hapus file gambar jika ada
    $storages = "../../../storages/guru/"; // Diperbaiki: menambahkan definisi path
    if ($data && file_exists($storages . $data['teachers_photo'])) { // Diperbaiki: menghapus tab yang tidak perlu
        unlink($storages . $data['teachers_photo']);
    }

    echo "
    <script>
        alert('Data berhasil dihapus');
        window.location.href='../../pages/guru/index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus: " . mysqli_error($connect) . "');
        window.location.href='../../pages/guru/index.php';
    </script>
    ";
}