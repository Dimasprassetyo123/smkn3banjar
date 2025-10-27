<?php
include '../../app.php';

if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href='../../pages/major/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];

// Ambil data lama untuk mendapatkan nama file foto sebelumnya
$qSelect = "SELECT majors_image FROM majors WHERE id = '$id'";
$resultSelect = mysqli_query($connect, $qSelect);
$oldData = mysqli_fetch_object($resultSelect);

if (isset($_POST['tombol'])) {
    $majors_name = escapeString($_POST['majors_name']);
    $majors_description = escapeString($_POST['majors_description']);
    $head = escapeString($_POST['head']);

    // Gunakan foto lama sebagai default
    $majors_imageNew = $oldData->majors_image;
    $storages = "../../../storages/jurusan/";

    // Kalau ada upload foto baru
    if (!empty($_FILES['majors_image']['tmp_name'])) {
        $majors_imageOld = $_FILES['majors_image']['tmp_name'];
        $majors_imageNew = time() . ".png";

        // Hapus foto lama jika ada dan bukan foto default
        if (!empty($oldData->majors_image) && file_exists($storages . $oldData->majors_image)) {
            unlink($storages . $oldData->majors_image);
        }

        move_uploaded_file($majors_imageOld, $storages . $majors_imageNew);
    }

    $qUpdate = "UPDATE majors 
                SET majors_image='$majors_imageNew',  
                    majors_name='$majors_name', 
                    majors_description='$majors_description',
                    head='$head'  
                WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));

    if ($result) {
        echo "
            <script>
                alert('Data berhasil diubah');
                window.location.href='../../pages/major/index.php';
            </script>
        ";
    } else {
        echo "Query error: " . mysqli_error($connect);
    }
}
?>