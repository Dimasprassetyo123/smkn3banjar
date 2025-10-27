<?php
session_start();
include '../../app.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = escapeString($_POST['email']);
    $password = escapeString($_POST['password']);

    $qLogin = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connect, $qLogin) or die(mysqli_error($connect));

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['admin_logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // catat login
        $ip     = $_SERVER['REMOTE_ADDR'];
        $agent  = $_SERVER['HTTP_USER_AGENT'];
        $username = $user['email'];

        $qLog = "INSERT INTO user_sessions (user_id, username, ip_address, user_agent, login_at) 
                 VALUES ('{$user['id']}', '$username', '$ip', '$agent', NOW())";
        mysqli_query($connect, $qLog);

        // simpan id session ke PHP session
        $_SESSION['session_id'] = mysqli_insert_id($connect);

        header('Location:../../pages/dashboard/index.php');
        exit();
    } else {
        echo "<script>
                alert('Email atau Password Salah!');
                window.location.href='../../pages/user/login.php';
            </script>";
    }
}
