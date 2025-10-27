<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../user/login.php");
    exit();
}

$page = "guru";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<style>
    /* FIX UNTUK FOOTER TETAP DI BAWAH */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .content-wrapper {
        flex: 1;
        padding: 20px;
        padding-top: 80px;
        display: flex;
        flex-direction: column;
    }

    /* Konten utama akan mengisi sisa ruang */
    .content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .container-fluid {
        flex: 1;
        display: flex;
        flex-direction: column;
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

    .btn-info:hover {
        background: #138496;
    }

    .btn-secondary {
        background: #6c757d;
        border: none;
        padding: 10px 25px;
        border-radius: 6px;
        font-weight: 600;
        color: white;
    }

    .btn-secondary:hover {
        background: #5a6268;
    }

    /* MEMASTIKAN FOOTER TETAP DI BAWAH */
    .main-footer {
        margin-top: auto;
        flex-shrink: 0;
    }

    /* Tambahan fix */
    .content-wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
        min-height: calc(100vh - 60px);
        /* 60px kira2 tinggi footer, bisa disesuaikan */
    }


    .format-info {
        font-size: 12px;
        color: #6c757d;
        margin-top: 5px;
    }

    /* Perbaikan untuk form inputs */
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

    /* Styling untuk radio buttons */
    .radio-group {
        display: flex;
        gap: 20px;
        margin-top: 5px;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .radio-option input[type="radio"] {
        margin: 0;
    }
</style>

<div class="content-wrapper">
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center p-5">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card card-purple">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Data Guru</h3>
                        </div>

                        <div class="card-body">
                            <form action="../../action/guru/store.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Kolom Kiri -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="teachers_name">Nama</label>
                                            <input type="text" name="teachers_name" class="form-control" id="teachers_name"
                                                placeholder="Masukkan Nama ..." required>
                                        </div>

                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <div class="radio-group">
                                                <div class="radio-option">
                                                    <input type="radio" id="jk_laki" name="jk" value="Laki-laki" required>
                                                    <label for="jk_laki">Laki-laki</label>
                                                </div>
                                                <div class="radio-option">
                                                    <input type="radio" id="jk_perempuan" name="jk" value="Perempuan">
                                                    <label for="jk_perempuan">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Kolom Kanan -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="teachers_major">Mapel</label>
                                            <input type="text" name="teachers_major" class="form-control" id="teachers_major"
                                                placeholder="Masukkan Mapel ..." required>
                                        </div>

                                        <div class="form-group">
                                            <label for="teachers_photo" class="form-label">Foto</label>
                                            <div class="custom-file">
                                                <input type="file" name="teachers_photo" class="form-control" id="teachers_photo" required>
                                                <div class="format-info">Format: JPG, PNG, JPEG | Maks: 2MB</div>
                                            </div>
                                        </div>
                                    </div>
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