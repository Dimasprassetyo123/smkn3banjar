<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $majors_name = escapeString($_POST['majors_name']);
    $majors_description = escapeString($_POST['majors_description']);
    $head = escapeString($_POST['head']); // Diperbaiki: sekarang sesuai dengan form

    $imageOld = $_FILES['majors_image']['tmp_name'];
    $imageNew = time() . ".png";

    $storages = "../../../storages/jurusan/";

    if (!is_dir($storages)) {
        mkdir($storages, 0777, true);
    }

    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO majors (id, majors_name, majors_description, majors_image, head) 
            VALUES(NULL, '$majors_name', '$majors_description', '$imageNew', '$head')";

        
        if (mysqli_query($connect, $qInsert)) {
            echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href='../../pages/major/index.php';
                </script>    
            ";
        } else {
            echo "Query error: " . mysqli_error($connect);
        }
    } else {
        echo "
            <script>
                alert('Upload gambar gagal!');
                window.location.href='../../pages/major/create.php';
            </script> 
        ";
    }
}
?>