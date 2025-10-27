<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../user/login.php");
    exit();
}

$page = "testimoni";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<style>
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

    /* === Fix footer tetap di bawah === */
    html,
    body {
        height: 100%;
    }

    .content-wrapper {
        min-height: calc(100vh - 100px);
        /* 100px kira-kira tinggi header+footer */
    }

    .main-footer {
        position: relative;
        bottom: 0;
        width: 100%;
    }
</style>


<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Testimoni</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Data Testimoni</a></li>
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
                            <h3 class="card-title">Form Tambah Data Testimoni</h3>
                        </div>

                        <div class="card-body">
                            <form action="../../action/testimoni/store.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Kolom Kiri -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" name="status" class="form-control" id="status" placeholder="Masukkan Status" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="massage">Pesan</label>
                                    <textarea name="massage" class="form-control" id="massage" placeholder="Masukkan Pesan Testimoni" maxlength="255" rows="5" required></textarea>
                                </div>

                                <!-- Tambahan Rating -->
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <select name="rating" id="rating" class="form-control" required>
                                        <option value="1">⭐ 1</option>
                                        <option value="2">⭐ 2</option>
                                        <option value="3">⭐ 3</option>
                                        <option value="4">⭐ 4</option>
                                        <option value="5" selected>⭐ 5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <input type="file" name="image" class="form-control" id="image" required>
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

<?php include '../../partials/footer.php'; ?>
<?php include '../../partials/script.php'; ?>