<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $id = escapeString($_POST['id']);
    $announcements_title = escapeString($_POST['announcements_title']);
    $announcements_description = escapeString($_POST['announcements_description']);
    $currentImage = escapeString($_POST['current_image']);
    
    $storages = "../../../storages/pengumuman/";
    $announcements_imageNew = $currentImage; // Default gunakan gambar lama

    // Handle image upload jika ada file baru
    if (!empty($_FILES['announcements_image']['name'])) {
        $announcements_imageTmp = $_FILES['announcements_image']['tmp_name'];
        $announcements_imageName = $_FILES['announcements_image']['name'];
        $announcements_imageExt = pathinfo($announcements_imageName, PATHINFO_EXTENSION);
        $announcements_imageNew = time() . "." . $announcements_imageExt;
        
        // Daftar ekstensi yang diizinkan
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (in_array($announcements_imageExt, $allowedExtensions)) {
            // Hapus gambar lama jika ada
            if (!empty($currentImage) && file_exists($storages . $currentImage)) {
                unlink($storages . $currentImage);
            }
            
            // Upload gambar baru
            if (!move_uploaded_file($announcements_imageTmp, $storages . $announcements_imageNew)) {
                echo "
                <script>
                alert('Gagal mengupload gambar');
                window.location.href = '../../pages/pengumuman/edit.php?id=$id';
                </script>
                ";
                exit;
            }
        } else {
            echo "
            <script>
            alert('Format file tidak didukung. Gunakan JPG, JPEG, PNG, GIF, atau WEBP');
            window.location.href = '../../pages/pengumuman/edit.php?id=$id';
            </script>
            ";
            exit;
        }
    }

    // Update data
    $qUpdate = "UPDATE announcements SET announcements_title = '$announcements_title', announcements_description = '$announcements_description', 
                announcements_image = '$announcements_imageNew' WHERE id = '$id'";
    
    if (mysqli_query($connect, $qUpdate)) {
        echo "
        <script>
        alert('Data berhasil diupdate');
        window.location.href = '../../pages/pengumuman/index.php';
        </script>
        ";
    } else {
        // Jika update gagal, hapus gambar baru yang sudah diupload
        if ($announcements_imageNew != $currentImage && file_exists($storages . $announcements_imageNew)) {
            unlink($storages . $announcements_imageNew);
        }
        
        $error = mysqli_error($connect);
        echo "
        <script>
        alert('Data gagal diupdate: $error');
        window.location.href = '../../pages/pengumuman/edit.php?id=$id';
        </script>
        ";
    }
}
?>