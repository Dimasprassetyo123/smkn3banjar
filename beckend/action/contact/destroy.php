<?php
include '../../app.php';

// Validasi parameter ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak valid');
        window.location.href='../../pages/contact/index.php';
    </script>
    ";
    exit;
}

$id = escapeString($_GET['id']);

// Hapus data dari database
$qDelete = "DELETE FROM contacts WHERE id = '$id'";
$resultDelete = mysqli_query($connect, $qDelete);

// Cek apakah data berhasil dihapus atau tidak
if ($resultDelete) {
    echo "
    <script>
        alert('Data berhasil dihapus');
        window.location.href='../../pages/contact/index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus: " . mysqli_error($connect) . "');
        window.location.href='../../pages/contact/index.php';
    </script>
    ";
}
?>