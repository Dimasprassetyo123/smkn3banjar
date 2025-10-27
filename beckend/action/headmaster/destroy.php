<?php
include '../../app.php';
include './show.php'; 

// Hapus data dari database
$qDelete = "DELETE FROM headmasters WHERE id = '$id'";
$resultDelete = mysqli_query($connect, $qDelete);

// Cek apakah data berhasil dihapus atau tidak
if ($resultDelete) {
    // Hapus file gambar jika ada
    if ($data && file_exists($storages . $data['headmasters_photo'])) {
        unlink($storages . $data['headmasters_photo']);
    }
    
    echo "
    <script>
        alert('Data berhasil dihapus');
        window.location.href='../../pages/headmaster/index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus: " . mysqli_error($connect) . "');
        window.location.href='../../pages/headmaster/index.php';
    </script>
    ";
}
?>