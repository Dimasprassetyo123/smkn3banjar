<?php
include '../../app.php';
// Validasi parameter ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak valid');
        window.location.href='../../pages/socmed/index.php';
    </script>
    ";
    exit;
}

$id = escapeString($_GET['id']);

?>