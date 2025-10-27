<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../user/login.php");
    exit();
}

$page = "galeri";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Galleri</title>
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
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .btn-action {
            margin-top: 20px;
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
        
        /* Styling untuk input file */
        .custom-file-input {
            opacity: 0;
            position: absolute;
            z-index: -1;
        }
        
        .custom-file-label {
            display: inline-block;
            padding: 8px 12px;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .custom-file-label::after {
            content: "Pilih File";
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
                        <div class="col-12 mt-5">
                            <div class="card card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah Data Galleri</h3>
                                </div>

                                <div class="card-body">
                                    <form action="../../action/gallerie/store.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image" class="form-label">Gambar</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="image" required>
                                                        <label class="custom-file-label" for="image">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <textarea name="description" id="description" class="form-control" rows="5"
                                                placeholder="Isi Deskripsi..." required></textarea>
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

        <?php
        include '../../partials/footer.php';
        ?>
    </div>

    <?php
    include '../../partials/script.php';
    ?>
    
    <script>
        // Script untuk menampilkan nama file yang dipilih
        document.getElementById('image').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>
</body>
</html>