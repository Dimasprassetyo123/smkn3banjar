<?php
include '../../app.php';

if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href='../../pages/pengumuman/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];
$qSelect = "SELECT * FROM announcements WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$announcement = $result->fetch_object();
if (!$announcement) {
    die("Data tidak ditemukan");
}
?>