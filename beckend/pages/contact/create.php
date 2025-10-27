<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../user/login.php");
    exit();
}

$page = "kontak";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<style>
    /* Layout wrapper full tinggi */
    .wrapper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .content-wrapper {
        flex: 1;
        display: flex;
        justify-content: center; /* posisi horizontal tengah */
        align-items: center;     /* posisi vertikal tengah */
        padding: 20px;
    }

    /* Footer sticky di bawah */
    footer {
        margin-top: auto;
    }

    .card-purple {
        border: 1px solid #6f42c1;
        border-radius: 10px;
        width: 100%;
        margin: 0 auto;
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
        margin-top: 30px;
        padding: 15px 0;
        border-top: 1px solid #eee;
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
</style>

<div class="wrapper">
    <div class="content-wrapper">
        <!-- Main Content -->
        <section class="content w-100">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- Responsif -->
                    <div class="col-12 col-lg-10 col-xl-8">
                        <div class="card card-purple">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Data Kontak</h3>
                            </div>
                            <div class="card-body">
                                <form action="../../action/contact/store.php" method="POST">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Masukkan Email..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">No Telepon</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            placeholder="Masukkan No Telepon..." required>
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
