<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $status = escapeString($_POST['status']);
    $massage = escapeString($_POST['massage']);
    $rating = escapeString(($_POST['rating']));
    
    // Validasi panjang pesan (maksimal 255 karakter)
    if (strlen($massage) > 255) {
        echo "
            <script>
                alert('Pesan testimoni terlalu panjang. Maksimal 255 karakter.');
                window.history.back();
            </script> 
        ";
        exit;
    }

    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";

    $storages = "../../../storages/testimoni/";

    if (!is_dir($storages)) {
        mkdir($storages, 0777, true);
    }

    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO testimonials (name, status, massage, rating, image) 
            VALUES('$name', '$status', '$massage', '$rating', '$imageNew')";

        if (mysqli_query($connect, $qInsert)) {
            echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href='../../pages/testimoni/index.php';
                </script>    
            ";
        } else {
            echo "Query error: " . mysqli_error($connect);
        }
    } else {
        echo "
            <script>
                alert('Upload gambar gagal!');
                window.location.href='../../pages/testimoni/create.php';
            </script> 
        ";
    }
}
?>