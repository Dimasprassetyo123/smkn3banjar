<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../user/login.php");
    exit();
}

$page = "sosialmedia";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Sosmed</title>
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
            overflow: auto;
        }
        .card-purple {
            border: 1px solid #6f42c1;
            border-radius: 10px;
        }

        .card-purple .card-header {
            background: #cfc1e9ff;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 15px 20px;
        }

        .form-group {
            margin-bottom: 20px; /* JARAK ANTAR FORM GROUP */
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .btn-action {
            margin-top: 30px; /* DITAMBAHKAN JARAK LEBIH BESAR */
            padding: 0;
            border-top: none;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-info {
            background: #17a2b8;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 600;
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 600;
        }

        .format-info {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }

        /* TAMBAHAN UNTUK JARAK YANG LEBIH BAIK */
        .from-grup {
            margin-bottom: 20px; /* JARAK UNTUK DIV from-grup */
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Main Content -->
            <section class="content p-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-8 mt-5 mx-auto ">
                            <div class="card card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah Data Sosmed</h3>
                                </div>

                                <div class="card-body">
                                    <!-- PERBAIKAN: Action diarahkan ke folder pencapaian -->
                                    <form action="../../action/socmed/store.php" method="POST">
                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-md-12"> <!-- DIUBAH MENJADI 12 UNTUK FULL WIDTH -->
                                                <div class="form-group">
                                                    <label for="title">Judul Icon</label>
                                                    <input type="text" name="title" class="form-control" id="title"
                                                        placeholder="Masukkan Nama Sosmed..." required>
                                                </div>
                                                
                                                <div class="form-group"> <!-- DIUBAH DARI from-grup KE form-group -->
                                                    <label for="icon" class="form-label">Icon</label>
                                                    <input type="text" name="icon" id="icon" class="form-control"
                                                        placeholder="Contoh: bi bi-instagram" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="link_url">Link</label>
                                                    <input type="text" name="link_url" class="form-control" id="link_url"
                                                        placeholder="Masukkan Link URL..." required>
                                                </div>

                                                <div class="btn-action">
                                                    <button type="submit" class="btn btn-info" name="tombol">
                                                        <i class="fas fa-save"></i> Simpan
                                                    </button>
                                                    <a href="./index.php" class="btn btn-secondary">
                                                        <i class="fas fa-arrow-left"></i> Kembali
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php
        include '../../partials/footer.php';
        ?>
    </div>

    <?php
    include '../../partials/script.php';
    ?>
</body>
</html>