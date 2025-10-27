<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $category = escapeString($_POST['category']);
    $text = escapeString($_POST['text']);

    $qInsert = "INSERT INTO visi_misions (id, category, text) 
        VALUES(NULL, '$category', '$text')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
            <script>
                alert('Data Berhasil Ditambah');
                window.location.href='../../pages/visimisi/index.php';
            </script>    
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambah: " . mysqli_error($connect) . "');
                window.location.href='../../pages/visimisi/create.php';
            </script> 
        ";
    }
}
?>