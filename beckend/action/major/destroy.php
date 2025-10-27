<?php
include '../../app.php';
include './show.php';
// Ambil data untuk mendapatkan nama file gambar
$qSelect = "SELECT majors_image FROM majors WHERE id = '$id'";
$resultSelect = mysqli_query($connect, $qSelect);
$data = mysqli_fetch_assoc($resultSelect);

// Hapus data dari database
$qDelete = "DELETE FROM majors WHERE id = '$id'";
$resultDelete = mysqli_query($connect, $qDelete);

// Cek apakah data berhasil dihapus atau tidak
if ($resultDelete) {
    // Hapus file gambar jika ada
    if ($data && file_exists($storages . $data['majors_image'])) {
        unlink($storages . $data['majors_image']);
    }
    
    echo "
    <script>
        alert('Data berhasil dihapus');
        window.location.href='../../pages/major/index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus: " . mysqli_error($connect) . "');
        window.location.href='../../pages/major/index.php';
    </script>
    ";
}
?>