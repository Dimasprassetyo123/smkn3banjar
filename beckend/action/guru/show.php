<?php
include '../../app.php';
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href='../../pages/guru/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];
$qSelect = "SELECT * FROM teachers WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$teachers = $result->fetch_object();
if (!$teachers) {
    die("Data tidak ditemukan");
}
?>
