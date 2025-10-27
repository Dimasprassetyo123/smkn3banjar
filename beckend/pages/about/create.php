<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../user/login.php");
    exit();
}

$page = "about";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

?>

<style>
    .content-wrapper {
        padding: 20px;
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
    
    .custom-file-label::after {
        content: "Pilih File";
    }
</style>

<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Sekolah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Data Sekolah</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card card-purple">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Data Sekolah</h3>
                        </div>

                        <div class="card-body">
                            <form action="../../action/about/store.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Kolom Kiri -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="school_name">Nama Sekolah</label>
                                            <input type="text" name="school_name" class="form-control" id="school_name"
                                                placeholder="Masukkan Nama Sekolah..." required>
                                        </div>

                                        <div class="form-group">
                                            <label for="school_tagline">Tagline Sekolah</label>
                                            <input type="text" name="school_tagline" id="school_tagline" class="form-control"
                                                placeholder="Masukkan Tagline Sekolah..." required>
                                        </div>

                                        <div class="form-group">
                                            <label for="since">Tahun Berdiri</label>
                                            <input type="date" name="since" id="since" class="form-control" required>
                                        </div>
                                    </div>

                                    <!-- Kolom Kanan -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="school_logo" class="form-label">Logo Sekolah</label>
                                            <div class="custom-file">
                                                <input type="file" name="school_logo" class="custom-file-input" id="school_logo" required>
                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="school_banner" class="form-label">Label Sekolah</label>
                                            <div class="custom-file">
                                                <input type="file" name="school_banner" class="custom-file-input" id="school_banner" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="3"
                                        placeholder="Masukkan Alamat Lengkap..." required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="school_description">Deskripsi Sekolah</label>
                                    <textarea name="school_description" id="school_description" class="form-control" rows="5"
                                        placeholder="Deskripsi lengkap tentang sekolah..." required></textarea>
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

<!-- Script untuk custom file input -->
<script>
    $(document).ready(function() {
        // Custom file input
        bsCustomFileInput.init();

        // Datepicker configuration
        $('#since').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            endDate: new Date()
        });
    });
</script>