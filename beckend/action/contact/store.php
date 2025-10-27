<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $email = escapeString($_POST['email']);
    $phone = escapeString($_POST['phone']);

    // Insert data ke database
    $qInsert = "INSERT INTO contacts(email, phone) 
    VALUES('$email', '$phone')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
        <script>
        alert('Data berhasil ditambah');
        window.location.href = '../../pages/contact/index.php';
        </script>
        ";
    } else {
        $error = mysqli_error($connect);
        echo "
        <script>
        alert('Data gagal ditambah: $error');
        window.location.href = '../../pages/contact/create.php';
        </script>
        ";
    }
}
?>