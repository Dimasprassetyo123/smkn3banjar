<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $id = escapeString($_POST['id']);
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $password = escapeString($_POST['password']);
    $role = escapeString($_POST['role']); // ambil role

    // Update data
    $qUpdate = "UPDATE users SET 
                name = '$name', 
                email = '$email', 
                password = '$password',
                role = '$role'
                WHERE id = '$id'";

    if (mysqli_query($connect, $qUpdate)) {
        echo "
        <script>
            alert('Data berhasil diupdate');
            window.location.href='../../pages/user2/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diupdate: " . mysqli_error($connect) . "');
            window.location.href='../../pages/user2/edit.php?id=$id';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Akses tidak valid');
        window.location.href='../../pages/user2/index.php';
    </script>
    ";
}
?>
