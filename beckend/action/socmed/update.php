<?php
include_once '../../app.php';

// Validasi parameter
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo "
    <script>
        alert('ID tidak valid');
        window.location.href='../../pages/socmed/index.php';
    </script>
    ";
    exit;
}

if (isset($_POST['tombol'])) {
    $id = escapeString($_POST['id']);
    $title = escapeString($_POST['title']);
    $icon = escapeString($_POST['icon']);
    $link_url = escapeString($_POST['link_url']);

    $qUpdate = "UPDATE social_media SET title='$title', icon='$icon', link_url='$link_url' WHERE id='$id'";
    $result = mysqli_query($connect, $qUpdate);
    
    if ($result) {
        echo "
        <script>
            alert('Data berhasil diubah');
            window.location.href='../../pages/socmed/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah: " . mysqli_error($connect) . "');
            window.location.href='../../pages/socmed/edit.php?id=$id';
        </script>
        ";
    }
}
?>