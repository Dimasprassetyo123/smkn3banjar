<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $title = escapeString($_POST['title']);
    $description = escapeString($_POST['description']);

    $storages = "../../../storages/pengumuman/";

    // Handle image upload
    $imageNew = "";
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $imageNew = time() . "." . $imageExt;
        
        // Daftar ekstensi yang diizinkan
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        // Validasi ekstensi file
        if (!in_array($imageExt, $allowedExtensions)) {
            echo "
            <script>
            alert('Format file tidak didukung. Gunakan JPG, JPEG, PNG, GIF, atau WEBP');
            window.location.href = '../../pages/pengumuman/create.php';
            </script>
            ";
            exit;
        }
        
        // Buat folder jika belum ada
        if (!is_dir($storages)) {
            mkdir($storages, 0777, true);
        }
        
        // Pindahkan file
        if (move_uploaded_file($imageTmp, $storages . $imageNew)) {
            // File berhasil diupload
        } else {
            echo "
            <script>
            alert('Gagal mengupload gambar!');
            window.location.href = '../../pages/pengumuman/create.php';
            </script>
            ";
            exit;
        }
    } else {
        echo "
        <script>
        alert('Gambar harus diupload!');
        window.location.href = '../../pages/pengumuman/create.php';
        </script>
        ";
        exit;
    }

    // PERBAIKAN: Sesuaikan nama kolom dengan struktur database
    // Jika database menggunakan announcements_title dan announcements_description
    $qInsert = "INSERT INTO announcements (announcements_title, announcements_description, announcements_image) 
                VALUES('$title', '$description', '$imageNew')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
        <script>
        alert('Data berhasil ditambah');
        window.location.href = '../../pages/pengumuman/index.php';
        </script>
        ";
    } else {
        $error = mysqli_error($connect);
        echo "
        <script>
        alert('Data gagal ditambah: $error');
        window.location.href = '../../pages/pengumuman/create.php';
        </script>
        ";
    }
}
?>