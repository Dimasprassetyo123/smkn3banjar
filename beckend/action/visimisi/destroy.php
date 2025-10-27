<?php
include '../../app.php';
include './show.php';

// Hapus data dari database
$qDelete = "DELETE FROM visi_misions WHERE id = '$id'";
$resultDelete = mysqli_query($connect, $qDelete);

// Cek apakah data berhasil dihapus atau tidak
if ($resultDelete) {
    echo "
    <script>
        alert('Data berhasil dihapus');
        window.location.href='../../pages/visimisi/index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus: " . mysqli_error($connect) . "');
        window.location.href='../../pages/visimisi/index.php';
    </script>
    ";
}
?>