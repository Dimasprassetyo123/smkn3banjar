<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $headmasters_name = escapeString($_POST['headmasters_name']);
    $headmasters_description = escapeString($_POST['headmasters_description']);

    $headmasters_photoOld = $_FILES['headmasters_photo']['tmp_name'];
    $headmasters_photoNew = time() . ".png";

    $storages = "../../../storages/kepalaSekolah/";

    if (!is_dir($storages)) {
        mkdir($storages, 0777, true);
    }

    if (move_uploaded_file($headmasters_photoOld, $storages . $headmasters_photoNew)) {
        $qInsert = "INSERT INTO headmasters (id, headmasters_name, headmasters_description, headmasters_photo) 
            VALUES(NULL, '$headmasters_name', '$headmasters_description', '$headmasters_photoNew')";

        if (mysqli_query($connect, $qInsert)) {
            echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href='../../pages/headmaster/index.php';
                </script>    
            ";
        } else {
            echo "Query error: " . mysqli_error($connect);
        }
    } else {
        echo "
            <script>
                alert('Upload gambar gagal!');
                window.location.href='../../pages/headmaster/create.php';
            </script> 
        ";
    }
}
?>
