<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $description = escapeString($_POST['description']);

    $storages = "../../../storages/gallerie/";

    // Handle image upload
    $imageNew = "";
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $imageNew = time() . "." . $imageExt;
        
        // Daftar ekstensi yang diizinkan
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (in_array($imageExt, $allowedExtensions)) {
            // Pindahkan file ke storage
            if (move_uploaded_file($imageTmp, $storages . $imageNew)) {
                // File berhasil diupload
            } else {
                echo "
                <script>
                alert('Gagal mengupload gambar');
                window.location.href = '../../pages/gallerie/create.php';
                </script>
                ";
                exit;
            }
        } else {
            echo "
            <script>
            alert('Format file tidak didukung. Gunakan JPG, JPEG, PNG, GIF, atau WEBP');
            window.location.href = '../../pages/gallerie/create.php';
            </script>
            ";
            exit;
        }
    } else {
        echo "
        <script>
        alert('Harap pilih gambar');
        window.location.href = '../../pages/gallerie/create.php';
        </script>
        ";
        exit;
    }

    // Insert data ke database
    $qInsert = "INSERT INTO galleries(description, image) 
    VALUES('$description', '$imageNew')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
        <script>
        alert('Data berhasil ditambah');
        window.location.href = '../../pages/gallerie/index.php';
        </script>
        ";
    } else {
        // Hapus file yang sudah diupload jika query gagal
        if (file_exists($storages . $imageNew)) {
            unlink($storages . $imageNew);
        }
        
        $error = mysqli_error($connect);
        echo "
        <script>
        alert('Data gagal ditambah: $error');
        window.location.href = '../../pages/gallerie/create.php';
        </script>
        ";
    }
}
?>