<?php
// Mulai session di awal
session_start();

$page = "visimisi";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Visi Misi</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .content-wrapper {
            flex: 1;
            padding: 20px;
            padding-top: 80px;
        }
        
        .footer-wrapper {
            margin-top: auto;
        }

        .card-purple {
            border: 1px solid #6f42c1;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        
        .card-purple .card-header {
            background: #cfc1e9ff;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 15px 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
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
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            font-weight: 600;
            color: white;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper -->
        <div class="content-wrapper ">

            <!-- Main Content -->
            <section class="content p-5">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <div class="card card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah Data Visi Misi</h3>
                                </div>

                                <div class="card-body">
                                    <form action="../../action/visimisi/store.php" method="POST">
                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category">Kategori</label>
                                                    <select name="category" class="form-control" id="category" required>
                                                        <option value="">Pilih Kategori</option>
                                                        <option value="visi">Visi</option>
                                                        <option value="misi">Misi</option>
                                                        <option value="tujuan">Tujuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="text">Teks</label>
                                            <textarea name="text" class="form-control" id="text"
                                                placeholder="Masukkan Teks ..." rows="5" required></textarea>
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
        
        <!-- Footer Wrapper -->
        <div class="footer-wrapper">
            <?php
            include '../../partials/footer.php';
            include '../../partials/script.php';
            ?>
        </div>
    </div>
</body>
</html>