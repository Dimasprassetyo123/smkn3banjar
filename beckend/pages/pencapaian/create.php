<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../user/login.php");
    exit();
}

$page = "pencapaian";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pencapaian</title>
    <style>
        /* SOLUSI FOOTER TETAP DI BAWAH - PASTI BERHASIL */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
        }
        
        /* Wrapper utama untuk konten */
        .main-content-wrapper {
            flex: 1 0 auto;
            width: 100%;
            padding-bottom: 60px; /* Ruang untuk footer */
        }
        
        .content-wrapper {
            padding: 20px;
            padding-top: 80px;
            min-height: calc(100vh - 160px); /* Sesuaikan dengan tinggi footer */
        }

        .card-purple {
            border: 1px solid #6f42c1;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card-purple .card-header {
            background: #cfc1e9;
            color: #333;
            border-radius: 10px 10px 0 0;
            padding: 15px 20px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }

        .btn-action {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-info {
            background: #17a2b8;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            font-weight: 600;
            color: white;
            transition: background 0.3s;
        }

        .btn-info:hover {
            background: #138496;
            color: white;
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            font-weight: 600;
            color: white;
            transition: background 0.3s;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
            color: white;
        }
        
        /* FOOTER FIX - PASTIKAN DI BAWAH */
        .footer-container {
            flex-shrink: 0;
            width: 100%;
            position: relative;
            margin-top: auto; /* Pastikan footer selalu di bawah */
        }
        
        /* Tambahan untuk form inputs */
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .form-control:focus {
            border-color: #6f42c1;
            box-shadow: 0 0 0 0.2rem rgba(111, 66, 193, 0.25);
        }

        /* Pastikan row mengambil tinggi penuh */
        .min-height-row {
            min-height: 60vh;
            display: flex;
            align-items: center;
        }
        
        /* Pastikan footer tetap di bawah bahkan dengan konten sedikit */
        .main-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            padding: 15px;
            text-align: center;
            width: 100%;
            position: relative;
            bottom: 0;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="main-content-wrapper">
            <div class="content-wrapper">
                <!-- Main Content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row min-height-row">
                            <div class="col-12 col-md-10 col-lg-8 mx-auto">
                                <div class="card card-purple">
                                    <div class="card-header">
                                        <h3 class="card-title">Form Tambah Data Prestasi</h3>
                                    </div>

                                    <div class="card-body">
                                        <form action="../../action/pencapaian/store.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <!-- Kolom Kiri -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title">Penghargaan</label>
                                                        <input type="text" name="title" class="form-control" id="title"
                                                            placeholder="Masukkan Nama Penghargaan..." required>
                                                    </div>
                                                </div>

                                                <!-- Kolom Kanan -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image" class="form-label">Gambar Pencapaian</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image" class="form-control" id="image" required>
                                                        </div>
                                                        <small class="text-muted">Format: JPG, PNG, GIF, WEBP (Maks. 2MB)</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Deskripsi</label>
                                                <textarea name="description" id="description" class="form-control" rows="5"
                                                    placeholder="Deskripsi lengkap tentang pencapaian..." required></textarea>
                                            </div>

                                            <div class="btn-action">
                                                <button type="submit" class="btn btn-info" name="tombol">
                                                    <i class="fas fa-save"></i> Simpan
                                                </button>
                                                <a href="./index.php" class="btn btn-secondary">
                                                    <i class="fas fa-arrow-left"></i> Kembali
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="footer-container">
            <footer class="main-footer">
                <?php include '../../partials/footer.php'; ?>
            </footer>
        </div>
    </div>

    <?php include '../../partials/script.php'; ?>
</body>
</html>