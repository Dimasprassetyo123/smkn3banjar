<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $icon = escapeString($_POST['icon']);
    $title = escapeString($_POST['title']);
    $link_url = escapeString($_POST['link_url']);

    // PERBAIKAN: Tentukan nilai untuk field id atau biarkan NULL jika auto increment
    $qInsert = "INSERT INTO social_media (id, icon, title, link_url) VALUES(NULL, '$icon', '$title', '$link_url')";
    
    if (mysqli_query($connect, $qInsert)) {
        echo "<script>alert('Data berhasil ditambahkan');
        \n window.location.href = '../../pages/socmed/index.php';\n </script>\n ";
    } else {
        echo "<script>alert('Data gagal ditambah: " . mysqli_error($connect) . "'); 
        window.location.href = '../../pages/socmed/create.php';</script>";
    }
}
?>