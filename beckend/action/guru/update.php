<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $id = escapeString($_POST['id']);
    $teachers_name = escapeString($_POST['teachers_name']);
    $teachers_major = escapeString($_POST['teachers_major']);
    $jk = escapeString($_POST['jk']); // TAMBAHAN: Field JK
    $current_image = escapeString($_POST['current_image']);

    $storages = "../../../storages/guru/";

    // Cek apakah ada file gambar baru yang diupload
    if (!empty($_FILES['teachers_photo']['name'])) {
        $teachers_photoOld = $_FILES['teachers_photo']['tmp_name'];
        $teachers_photoNew = time() . ".png";

        // Upload gambar baru
        if (move_uploaded_file($teachers_photoOld, $storages . $teachers_photoNew)) {
            // Hapus gambar lama jika ada
            if (!empty($current_image) && file_exists($storages . $current_image)) {
                unlink($storages . $current_image);
            }
            $photo_value = "'$teachers_photoNew'";
        } else {
            echo "
            <script>
                alert('Upload gambar gagal!');
                window.location.href='../../pages/guru/edit.php?id=$id';
            </script>
            ";
            exit;
        }
    } else {
        // Gunakan gambar lama
        $photo_value = "'$current_image'";
    }

    // TAMBAHAN: Menambahkan field jk ke query update
    $qUpdate = "UPDATE teachers SET 
                teachers_name = '$teachers_name', 
                teachers_major = '$teachers_major', 
                jk = '$jk',
                teachers_photo = $photo_value 
                WHERE id = '$id'";

    if (mysqli_query($connect, $qUpdate)) {
        echo "
        <script>
            alert('Data berhasil diupdate');
            window.location.href='../../pages/guru/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diupdate: " . mysqli_error($connect) . "');
            window.location.href='../../pages/guru/edit.php?id=$id';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Akses tidak valid');
        window.location.href='../../pages/guru/index.php';
    </script>
    ";
}
?>