<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $id = escapeString($_POST['id']);
    $title = escapeString($_POST['title']);
    $content = escapeString($_POST['content']);
    $currentImage = escapeString($_POST['current_image']);
    
    $storages = "../../../storages/blog/";
    $imageNew = $currentImage; // Default gunakan gambar lama

    // Handle image upload jika ada file baru
    if (!empty($_FILES['image']['name'])) {
        // Hapus gambar lama jika ada
        if (!empty($currentImage) && file_exists($storages . $currentImage)) {
            unlink($storages . $currentImage);
        }
        
        // Upload gambar baru
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . ".png";
        
        if (!move_uploaded_file($imageOld, $storages . $imageNew)) {
            echo "
            <script>
            alert('Gagal mengupload gambar');
            window.location.href = '../../pages/blog/edit.php?id=$id';
            </script>
            ";
            exit;
        }
    }

    // Update data
    $qUpdate = "UPDATE blogs SET title = '$title', content = '$content', image = '$imageNew' WHERE id = '$id'";
    
    if (mysqli_query($connect, $qUpdate)) {
        echo "
        <script>
        alert('Data berhasil diupdate');
        window.location.href = '../../pages/blog/index.php';
        </script>
        ";
    } else {
        $error = mysqli_error($connect);
        echo "
        <script>
        alert('Data gagal diupdate: $error');
        window.location.href = '../../pages/blog/edit.php?id=$id';
        </script>
        ";
    }
}
?>