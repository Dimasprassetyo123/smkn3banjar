<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $id = escapeString($_POST['id']);
    $name = escapeString($_POST['name']);
    $status = escapeString($_POST['status']);
    $massage = escapeString($_POST['massage']);
    $rating = escapeString(($_POST['rating']));
    $current_image = escapeString($_POST['current_image']);

    $storages = "../../../storages/testimoni/";

    // Cek apakah ada file gambar baru yang diupload
    if (!empty($_FILES['image']['name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . ".png";

        // Upload gambar baru
        if (move_uploaded_file($imageOld, $storages . $imageNew)) {
            // Hapus gambar lama jika ada
            if (!empty($current_image) && file_exists($storages . $current_image)) {
                unlink($storages . $current_image);
            }
            $photo_value = "'$imageNew'";
        } else {
            echo "
            <script>
                alert('Upload gambar gagal!');
                window.location.href='../../pages/testimoni/edit.php?id=$id';
            </script>
            ";
            exit;
        }
    } else {
        // Gunakan gambar lama
        $photo_value = "'$current_image'";
    }

    // Update data
    $qUpdate = "UPDATE testimonials SET 
                name = '$name', 
                status = '$status', 
                massage = '$massage', 
                rating = '$rating', 
                image = $photo_value 
                WHERE id = '$id'";

    if (mysqli_query($connect, $qUpdate)) {
        echo "
        <script>
            alert('Data berhasil diupdate');
            window.location.href='../../pages/testimoni/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diupdate: " . addslashes(mysqli_error($connect)) . "');
            window.location.href='../../pages/testimoni/edit.php?id=$id';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Akses tidak valid');
        window.location.href='../../pages/testimoni/index.php';
    </script>
    ";
}
?>