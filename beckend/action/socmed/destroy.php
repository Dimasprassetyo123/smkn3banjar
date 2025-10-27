<?php
include '../../app.php';
include './show.php'; 

// Hapus data socmed
$qDelete = "DELETE FROM social_media WHERE id='$id'";
$result = mysqli_query($connect, $qDelete);

if($result) {
    echo "<script>
    alert('Data berhasil dihapus');
    window.location.href = '../../pages/socmed/index.php';
    </script>";
} else {
    echo "<script>
    alert('Data gagal dihapus: " . mysqli_error($connect) . "');
    window.location.href = '../../pages/socmed/index.php';
    </script>";
}
?>