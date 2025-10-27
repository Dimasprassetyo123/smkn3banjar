<?php
include '../../app.php';
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href='../../pages/visimisi/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];
?>