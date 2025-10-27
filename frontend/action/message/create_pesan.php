<?php
include '../../../config/connection.php';
include '../../../config/escapeString.php';

if(isset($_POST['tombol'])){
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $message = escapeString($_POST['message']);

        $qInsert = "INSERT INTO messages(name, email, message) 
        VALUES('$name', '$email', '$message')";

        // mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
       if (mysqli_query($connect, $qInsert)) {
        echo "
        <script>
            alert('Pesan Telah Dikirim');
            window.location.href = '../../index.php#pesan';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal kirim : " . mysqli_error($connect) . "');
             window.location.href = '../../index.php#pesan';
        </script>
        ";
    }}

?>