<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../user/login.php");
    exit();
}

$page = "jurusan";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jurusan</title>
    <style>
        /* RESET TOTAL DAN FIX FOOTER */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
        }
        
        /* CONTENT AREA - HARUS MENGISI SEMUA RUANG */
        .main-wrapper {
            flex: 1 0 auto;
            display: flex;
            flex-direction: column;
            width: 100%;
            min-height: calc(100vh - 150px); /* PASTIKAN MINIMAL TINGGI */
        }

        /* MAIN CONTENT */
        .content-container {
            flex: 1;
            padding: 30px;
            padding-top: 100px;
            width: 100%;
        }

        /* FORM STYLING (TIDAK DIUBAH WARNA) */
        .card-purple {
            border: 1px solid #6f42c1;
            border-radius: 10px;
            margin-bottom: 40px;
            width: 100%;
        }

        .card-purple .card-header {
            background: #cfc1e9ff;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 20px;
            font-size: 1.2rem;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            width: 100%;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
            width: 100%;
            font-size: 1rem;
        }

        .btn-action {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            width: 100%;
        }

        .btn-info {
            background: #17a2b8;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: 600;
            color: white;
            font-size: 1rem;
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: 600;
            color: white;
            font-size: 1rem;
        }

        .format-info {
            font-size: 12px;
            color: #6c757d;
            margin-top: 8px;
        }
        
        /* FOOTER - PASTI DI PALING BAWAH */
        .footer-wrapper {
            width: 100%;
            flex-shrink: 0;
            margin-top: auto !important;
        }
        
        /* PASTIKAN CONTENT CUKUP TINGGI */
        .form-row {
            min-height: 400px;
            display: flex;
            align-items: center;
        }
        
        /* FORM CONTROL */
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ced4da;
            border-radius: 6px;
            font-size: 1rem;
        }
        
        .form-control:focus {
            border-color: #6f42c1;
            box-shadow: 0 0 0 0.3rem rgba(111, 66, 193, 0.25);
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        /* CONTENT HEADER STYLING */
        .content-header {
            margin-bottom: 30px;
        }
        
        .content-header h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #2c3e50;
        }
        
        .breadcrumb {
            background: none;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="content-container">

            <!-- Main Content -->
            <section class="content p-5">
                <div class="container-fluid">
                    <div class="row form-row">
                        <div class="col-12">
                            <div class="card card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah Data Jurusan</h3>
                                </div>

                                <div class="card-body">
                                    <form action="../../action/major/store.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="majors_name">Nama Jurusan</label>
                                                    <input type="text" name="majors_name" class="form-control" id="majors_name"
                                                        placeholder="Masukkan Nama Jurusan..." required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="head">Ketua Jurusan</label>
                                                    <input type="text" name="head" class="form-control" id="head"
                                                        placeholder="Masukkan Nama Ketua Jurusan..." required>
                                                </div>
                                            </div>

                                            <!-- Kolom Kanan -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="majors_image" class="form-label">Logo Jurusan</label>
                                                    <input type="file" name="majors_image" class="form-control" id="majors_image" required>
                                                    <small class="format-info">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="majors_description">Deskripsi Jurusan</label>
                                            <textarea name="majors_description" id="majors_description" class="form-control" rows="6"
                                                placeholder="Deskripsi lengkap tentang jurusan..." required></textarea>
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

    <!-- Footer Section - PASTI DI PALING BAWAH -->
    <div class="footer-wrapper">
        <?php
        include '../../partials/footer.php';
        include '../../partials/script.php';
        ?>
    </div>
</body>
</html>