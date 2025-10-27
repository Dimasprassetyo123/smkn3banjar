<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $id = escapeString($_POST['id']);
    $category = escapeString($_POST['category']);
    $text = escapeString($_POST['text']);

    // Update data
    $qUpdate = "UPDATE visi_misions SET 
                category = '$category', 
                text = '$text' 
                WHERE id = '$id'";

    if (mysqli_query($connect, $qUpdate)) {
        echo "
        <script>
            alert('Data berhasil diupdate');
            window.location.href='../../pages/visimisi/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diupdate: " . mysqli_error($connect) . "');
            window.location.href='../../pages/visimisi/edit.php?id=$id';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Akses tidak valid');
        window.location.href='../../pages/visimisi/index.php';
    </script>
    ";
}
?>