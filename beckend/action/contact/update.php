<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $id = escapeString($_POST['id']);
    $email = escapeString($_POST['email']);
    $phone = escapeString($_POST['phone']);
    
    // Update data
    $qUpdate = "UPDATE contacts SET email = '$email', phone = '$phone' WHERE id = '$id'";
    
    if (mysqli_query($connect, $qUpdate)) {
        echo "
        <script>
        alert('Data berhasil diupdate');
        window.location.href = '../../pages/contact/index.php';
        </script>
        ";
    } else {
        $error = mysqli_error($connect);
        echo "
        <script>
        alert('Data gagal diupdate: $error');
        window.location.href = '../../pages/contact/edit.php?id=$id';
        </script>
        ";
    }
}
?>