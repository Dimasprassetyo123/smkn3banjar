<?php
include '../../app.php';
// include './show.php'; // DIHAPUS karena tidak diperlukan dan bisa menyebabkan error

// Validasi parameter ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak valid');
        window.location.href='../../pages/pengumuman/index.php';
    </script>
    ";
    exit;
}

$id = escapeString($_GET['id']);
$storages = "../../../storages/pengumuman/";

// Ambil data untuk mendapatkan nama file gambar
$qSelect = "SELECT announcements_image FROM announcements WHERE id = '$id'";
$resultSelect = mysqli_query($connect, $qSelect);

if (!$resultSelect) {
    echo "
    <script>
        alert('Error mengambil data: " . mysqli_error($connect) . "');
        window.location.href='../../pages/pengumuman/index.php';
    </script>
    ";
    exit;
}

$data = mysqli_fetch_assoc($resultSelect);

// Hapus data dari database
$qDelete = "DELETE FROM announcements WHERE id = '$id'";
$resultDelete = mysqli_query($connect, $qDelete);

// Cek apakah data berhasil dihapus atau tidak
if ($resultDelete) {
    $affectedRows = mysqli_affected_rows($connect);

    if ($affectedRows > 0) {
        // Hapus file gambar jika ada
        if ($data && !empty($data['announcements_image']) && file_exists($storages . $data['announcements_image'])) {
            unlink($storages . $data['announcements_image']);
        }

        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location.href='../../pages/pengumuman/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data tidak ditemukan atau sudah dihapus');
            window.location.href='../../pages/pengumuman/index.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Data gagal dihapus: " . mysqli_error($connect) . "');
        window.location.href='../../pages/pengumuman/index.php';
    </script>
    ";
}
?>