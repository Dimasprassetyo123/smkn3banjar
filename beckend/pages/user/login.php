<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - SMK Negeri 3 Banjar</title>
    <link rel="shortcut icon" type="image/png" href="../../template-admin/src/assets/images/logos/logo,SMK.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #17a2b8, #0d6efd);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            margin: 0;
        }

        .login-container {
            max-width: 450px; /* Diperlebar dari 400px */
            width: 100%;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            background: white;
        }

        .card-body {
            padding: 2rem;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 1rem; /* Diperkecil dari 1.5rem */
        }

        .logo {
            max-width: 80px; /* Diperkecil dari 120px */
            height: auto;
            margin-bottom: 10px; /* Diperkecil dari 15px */
        }

        .school-name {
            color: #0d6efd;
            font-weight: 600;
            font-size: 16px; /* Diperkecil dari 18px */
            margin-bottom: 3px; /* Diperkecil dari 5px */
        }

        .school-location {
            color: #6c757d;
            font-size: 12px; /* Diperkecil dari 14px */
            margin-bottom: 15px; /* Diperkecil dari 20px */
        }

        .form-group {
            margin-bottom: 1rem; /* Diperkecil dari 1.2rem */
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.4rem; /* Diperkecil dari 0.5rem */
            display: block;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px; /* Padding disesuaikan */
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-control:focus {
            outline: none;
            border-color: #0d6efd;
            box-shadow: 0 0 0 2px rgba(13, 110, 253, 0.2);
        }

        .btn-login {
            width: 100%;
            background: #0d6efd;
            color: white;
            border: none;
            padding: 10px; /* Diperkecil dari 12px */
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            margin-top: 8px; /* Diperkecil dari 10px */
            font-size: 14px;
        }

        .btn-login:hover {
            background: #0b5ed7;
        }

        .register-link {
            text-align: center;
            margin-top: 1.2rem; /* Diperkecil dari 1.5rem */
            color: #6c757d;
            font-size: 13px; /* Diperkecil dari 14px */
        }

        .register-link a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="card">
            <div class="card-body">
                <!-- Logo SMK -->
                <div class="logo-container">
                    <img src="../../template-admin/src/assets/images/logos/logo,SMK.png"
                        alt="SMK Negeri 3 Banjar"
                        class="logo"
                        onerror="this.style.display='none';">

                    <div class="school-name">SMK NEGERI 3 BANJAR</div>
                </div>


                <!-- Form Login -->
                <form action="../../action/auth/login.php" method="POST">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="dimas@gmail.com" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukkan password" required>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
        // Cek jika gambar gagal load, tampilkan text logo
        document.addEventListener('DOMContentLoaded', function() {
            const logoImg = document.querySelector('.logo');
            const logoText = document.getElementById('logo-text');

            // Jika gambar tidak ada setelah 1 detik, tampilkan text
            setTimeout(function() {
                if (logoImg && logoImg.naturalHeight === 0) {
                    logoText.style.display = 'block';
                }
            }, 1000);
        });
    </script>
</body>

</html>