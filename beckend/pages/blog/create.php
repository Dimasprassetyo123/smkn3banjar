<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../user/login.php");
    exit();
}

$page = "blog";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Blog</title>
    <style>
        /* RESET TOTAL - FOOTER PASTI DI BAWAH */
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
        }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
        }
        
        /* CONTENT AREA - HARUS MENGISI SEMUA RUANG */
        .content-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            width: 100%;
            min-height: calc(100vh - 200px); /* PASTIKAN MINIMAL TINGGI VIEWPORT */
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            padding: 20px;
            padding-top: 100px;
            width: 100%;
        }

        /* FORM STYLING (TIDAK DIUBAH WARNA) */
        .card-purple {
            border: 1px solid #6f42c1;
            border-radius: 10px;
            margin-bottom: 30px;
            width: 100%;
        }

        .card-purple .card-header {
            background: #cfc1e9ff;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 15px 20px;
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            width: 100%;
        }

        .btn-action {
            margin-top: 20px;
            padding: 0;
            border-top: none;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            width: 100%;
        }

        .btn-info {
            background: #17a2b8;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 600;
            color: white;
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 600;
            color: white;
        }
        
        /* FOOTER - PASTI DI BAWAH */
        .footer-container {
            width: 100%;
            margin-top: auto;
            flex-shrink: 0;
        }
        
        /* PASTIKAN CONTENT CUKUP TINGGI */
        .form-container {
            min-height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        /* PASTIKAN ROW MENGISI TINGGI */
        .full-height-row {
            min-height: 60vh;
            display: flex;
            align-items: center;
        }
        
        /* FORM CONTROL */
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="content-area">
        <div class="main-content">
            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row full-height-row">
                        <div class="col-12">
                            <div class="card card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah Data Blog</h3>
                                </div>

                                <div class="card-body">
                                    <form action="../../action/blog/store.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">Judul</label>
                                                    <input type="text" name="title" class="form-control" id="title"
                                                        placeholder="Masukkan Judul..." required>
                                                </div>
                                            </div>

                                            <!-- Kolom Kanan -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image" class="form-label">Gambar</label>
                                                    <input type="file" name="image" class="form-control" id="image" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="content">Kontent</label>
                                            <textarea name="content" id="content" class="form-control" rows="5"
                                                placeholder="Isi Kontent..." required></textarea>
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

    <!-- Footer Section - PASTI DI BAWAH -->
    <div class="footer-container">
        <?php
        include '../../partials/footer.php';
        include '../../partials/script.php';
        ?>
    </div>
</body>
</html>