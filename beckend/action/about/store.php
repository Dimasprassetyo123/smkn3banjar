<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $school_name = escapeString($_POST['school_name']);
    $school_tagline = escapeString($_POST['school_tagline']);
    $school_description = escapeString($_POST['school_description']);
    $since = escapeString($_POST['since']);
    $alamat = escapeString($_POST['alamat']);

    $storages = "../../../storages/about/";

    // Handle logo upload
    $logoNew = "";
    if (!empty($_FILES['school_logo']['tmp_name'])) {
        $logoOld = $_FILES['school_logo']['tmp_name'];
        $logoNew = time() . "_logo.png";
        move_uploaded_file($logoOld, $storages . $logoNew);
    }

    // Handle banner upload
    $bannerNew = "";
    if (!empty($_FILES['school_banner']['tmp_name'])) {
        $bannerOld = $_FILES['school_banner']['tmp_name'];
        $bannerNew = time() . "_banner.png";
        move_uploaded_file($bannerOld, $storages . $bannerNew);
    }

    $qInsert = "INSERT INTO abouts(school_name, school_logo, school_banner, school_tagline, school_description, since, alamat) 
    VALUES('$school_name', '$logoNew', '$bannerNew', '$school_tagline', '$school_description', '$since', '$alamat')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
        <script>
        alert('Data berhasil ditambah');
        window.location.href = '../../pages/about/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambah');
        window.location.href = '../../pages/about/create.php';
        </script>
        ";
    }
}
