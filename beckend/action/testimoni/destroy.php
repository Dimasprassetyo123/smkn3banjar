<?php
include '../../app.php';
include './show.php';

// Hapus data dari database
$qDelete = "DELETE FROM testimonials WHERE id = '$id'";
$resultDelete = mysqli_query($connect, $qDelete);

// Cek apakah data berhasil dihapus atau tidak
if ($resultDelete) {
    // Hapus file gambar jika ada
    $storages = "../../../storages/testimoni/";
    if ($data && file_exists($storages . $data['image'])) {
        unlink($storages . $data['image']);
    }

    echo "
    <script>
        alert('Data berhasil dihapus');
        window.location.href='../../pages/testimoni/index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus: " . addslashes(mysqli_error($connect)) . "');
        window.location.href='../../pages/testimoni/index.php';
    </script>
    ";
}
?>