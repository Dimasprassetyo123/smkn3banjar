<?php
session_start();
include '../../app.php';

if (isset($_SESSION['session_id'])) {
    $sessionId = $_SESSION['session_id'];
    $qLogout = "UPDATE user_sessions SET logout_at = NOW() WHERE id = '$sessionId'";
    mysqli_query($connect, $qLogout);
}

// hapus session PHP
session_unset();
session_destroy();

echo "<script>
        alert('Anda telah keluar!');
        window.location.href='../../pages/user/login.php';
    </script>";
