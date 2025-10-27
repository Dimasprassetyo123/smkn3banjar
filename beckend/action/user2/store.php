<?php
include '../../app.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $password = escapeString($_POST['password']);
    $role = escapeString($_POST['role']); // ambil role

    // 🔍 Cek apakah email sudah ada
    $checkEmail = "SELECT id FROM users WHERE email = '$email' LIMIT 1";
    $resultCheck = mysqli_query($connect, $checkEmail);

    if (mysqli_num_rows($resultCheck) > 0) {
        // 🚫 Email sudah terdaftar
        echo "<script>
                alert('Email sudah terdaftar, silakan gunakan email lain!');
                window.location.href='../../pages/user2/create.php';
              </script>";
        exit();
    }

    // ✅ Jika email belum ada, baru insert
    $query = "INSERT INTO users (name, email, role, password) 
              VALUES ('$name', '$email', '$role', '$password')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>
                alert('User berhasil ditambahkan!');
                window.location.href='../../pages/user2/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan user!');
                window.location.href='../../pages/user2/create.php';
              </script>";
    }
}
?>
