<?php
include_once '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $school_name        = escapeString($_POST['school_name']);
    $school_tagline     = escapeString($_POST['school_tagline']);
    $school_description = escapeString($_POST['school_description']);
    $since              = escapeString($_POST['since']);
    $alamat             = escapeString($_POST['alamat']);

    $logoNew   = $school->school_logo;
    $bannerNew = $school->school_banner;
    $storages  = "../../../storages/about/";

    // Handle logo upload
    if (!empty($_FILES['school_logo']['tmp_name'])) {
        $logoOld = $_FILES['school_logo']['tmp_name'];
        $logoNew = time() . "_logo.png";

        // Hapus logo lama jika ada
        if (!empty($school->school_logo) && file_exists($storages . $school->school_logo)) {
            unlink($storages . $school->school_logo);
        }

        // Simpan logo baru
        move_uploaded_file($logoOld, $storages . $logoNew);
    }

    // Handle banner upload
    if (!empty($_FILES['school_banner']['tmp_name'])) {
        $bannerOld = $_FILES['school_banner']['tmp_name'];
        $bannerNew = time() . "_banner.png";

        // Hapus banner lama jika ada
        if (!empty($school->school_banner) && file_exists($storages . $school->school_banner)) {
            unlink($storages . $school->school_banner);
        }

        // Simpan banner baru
        move_uploaded_file($bannerOld, $storages . $bannerNew);
    }

    // Update data sesuai id
    $qUpdate = "UPDATE abouts SET 
                school_name        = '$school_name',
                school_logo        = '$logoNew',
                school_banner      = '$bannerNew',
                school_tagline     = '$school_tagline',
                school_description = '$school_description',
                since              = '$since',
                alamat             = '$alamat'
                WHERE id = '$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));

    if ($result) {
        echo "
        <script>
            alert('Data Berhasil Diedit');
            window.location.href = '../../pages/about/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Diedit');
            window.location.href = '../../pages/about/edit.php?id=$id';
        </script>
        ";
    }
}
?>
