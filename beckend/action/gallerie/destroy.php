<?php
include '../../app.php';

// Validasi parameter ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak valid');
        window.location.href='../../pages/gallerie/index.php';
    </script>
    ";
    exit;
}

$id = escapeString($_GET['id']);
$storages = "../../storages/gallerie/";

// Ambil data untuk mendapatkan nama file gambar
$qSelect = "SELECT image FROM galleries WHERE id = '$id'";
$resultSelect = mysqli_query($connect, $qSelect);
$data = mysqli_fetch_assoc($resultSelect);

// Hapus data dari database
$qDelete = "DELETE FROM galleries WHERE id = '$id'";
$resultDelete = mysqli_query($connect, $qDelete);

// Cek apakah data berhasil dihapus atau tidak
if ($resultDelete) {
    // Hapus file gambar jika ada
    if ($data && file_exists($storages . $data['image'])) {
        unlink($storages . $data['image']);
    }
    
    echo "
    <script>
        alert('Data berhasil dihapus');
        window.location.href='../../pages/gallerie/index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus: " . mysqli_error($connect) . "');
        window.location.href='../../pages/gallerie/index.php';
    </script>
    ";
}
?>