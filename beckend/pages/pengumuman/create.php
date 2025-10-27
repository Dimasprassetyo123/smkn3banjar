<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../user/login.php");
    exit();
}

$page = "pengumuman";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
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

    .format-info {
        font-size: 12px;
        color: #6c757d;
        margin-top: 5px;
    }
</style>

<div class="wrapper">
    <div class="content-wrapper">
        <!-- Main Content -->
        <section class="content p-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card card-purple">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Data Pengumuman</h3>
                            </div>

                            <div class="card-body">
                                <!-- PERBAIKAN: Action diarahkan ke folder pengumuman, bukan pencapaian -->
                                <form action="../../action/pengumuman/store.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <!-- Kolom Kiri -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Judul</label>
                                                <input type="text" name="title" class="form-control" id="title"
                                                    placeholder="Masukkan Judul Pengumuman..." required>
                                            </div>
                                        </div>

                                        <!-- Kolom Kanan -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image" class="form-label">Gambar Pengumuman</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="image" required>
                                                    <label class="custom-file-label" for="image">Pilih file</label>
                                                </div>
                                                <small class="format-info">Format yang didukung: JPG, JPEG, PNG, GIF, WEBP</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea name="description" id="description" class="form-control" rows="5"
                                            placeholder="Deskripsi lengkap tentang pengumuman..." required></textarea>
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
    include '../../partials/script.php';
    ?>
</div>