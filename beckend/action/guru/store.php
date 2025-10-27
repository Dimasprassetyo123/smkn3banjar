<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $teachers_name = escapeString($_POST['teachers_name']);
    $teachers_major = escapeString($_POST['teachers_major']);
    $jk = escapeString($_POST['jk']); // TAMBAHAN: Field JK

    $teachers_photoOld = $_FILES['teachers_photo']['tmp_name'];
    $teachers_photoNew = time() . ".png";

    $storages = "../../../storages/guru/";

    if (!is_dir($storages)) {
        mkdir($storages, 0777, true);
    }

    if (move_uploaded_file($teachers_photoOld, $storages . $teachers_photoNew)) {
        // TAMBAHAN: Menambahkan field jk ke query
        $qInsert = "INSERT INTO teachers (id, teachers_name, teachers_major, teachers_photo, jk) 
            VALUES(NULL, '$teachers_name', '$teachers_major', '$teachers_photoNew', '$jk')";

        if (mysqli_query($connect, $qInsert)) {
            echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href='../../pages/guru/index.php';
                </script>    
            ";
        } else {
            echo "Query error: " . mysqli_error($connect);
        }
    } else {
        echo "
            <script>
                alert('Upload gambar gagal!');
                window.location.href='../../pages/guru/create.php';
            </script> 
        ";
    }
}
?>