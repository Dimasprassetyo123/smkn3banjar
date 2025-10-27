<?php
include '../../app.php';

// Ambil id dari parameter GET
$id = $_GET['id'] ?? null;

if ($id) {
    // hapus data
    $qDelete = "DELETE FROM messages WHERE id = '$id'";
    $result = mysqli_query($connect, $qDelete);

    if ($result) {
        echo "
            <script>
                alert('Data berhasil dihapus');
                window.location.href='../../pages/message/index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus');
                window.location.href='../../pages/message/index.php';
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href='../../pages/message/index.php';
        </script>
    ";
}
