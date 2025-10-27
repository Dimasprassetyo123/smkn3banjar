<?php
include '../../app.php';

if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href='../../pages/headmaster/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];

// Ambil data lama untuk mendapatkan nama file foto sebelumnya
$qSelect = "SELECT headmasters_photo FROM headmasters WHERE id = '$id'";
$resultSelect = mysqli_query($connect, $qSelect);
$oldData = mysqli_fetch_object($resultSelect);

if (isset($_POST['tombol'])) {
    $headmasters_name = escapeString($_POST['headmasters_name']);
    $headmasters_description = escapeString($_POST['headmasters_description']);

    // Gunakan foto lama sebagai default
    $headmasters_photoNew = $oldData->headmasters_photo;
    $storages = "../../../storages/kepalaSekolah/";

    // Kalau ada upload foto baru
    if (!empty($_FILES['headmasters_photo']['tmp_name'])) {
        $headmasters_photoOld = $_FILES['headmasters_photo']['tmp_name'];
        $headmasters_photoNew = time() . ".png";

        // Hapus foto lama jika ada dan bukan foto default
        if (!empty($oldData->headmasters_photo) && file_exists($storages . $oldData->headmasters_photo)) {
            unlink($storages . $oldData->headmasters_photo);
        }

        move_uploaded_file($headmasters_photoOld, $storages . $headmasters_photoNew);
    }

    $qUpdate = "UPDATE headmasters 
                SET headmasters_photo='$headmasters_photoNew',  
                    headmasters_name='$headmasters_name', 
                    headmasters_description='$headmasters_description'  
                WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));

    if ($result) {
        echo "
            <script>
                alert('Data berhasil diubah');
                window.location.href='../../pages/headmaster/index.php';
            </script>
        ";
    } else {
        echo "Query error: " . mysqli_error($connect);
    }
}
