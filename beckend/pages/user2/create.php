<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>
        alert('Anda belum login');
        window.location.href='../user/login.php';
    </script>";
    exit();
}
$page = "user";
include '../../app.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<style>
    .card-purple {
        border-top: 4px solid #6f42c1;
    }

    .card-purple .card-header {
        background: #cfc1e9ff;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 15px 20px;
    }

    .content-wrapper {
        padding-top: 40px;
        min-height: calc(100vh - 150px);
        /* Memastikan konten memenuhi tinggi viewport */
        position: relative;
    }

    .btn-custom {
        min-width: 120px;
    }

    /* Styling untuk footer */
    .main-footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #f4f6f9;
        padding: 10px 0;
        border-top: 1px solid #dee2e6;
    }

    /* Container untuk konten utama */
    .content-container {
        min-height: calc(100vh - 200px);
        /* Menyesuaikan tinggi dengan footer */
        padding-bottom: 60px;
        /* Ruang untuk footer */
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid content-container">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card card-purple mt-5">
                        <div class="card-header">
                            <h3 class="card-title">Tambah User Baru</h3>
                        </div>

                        <div class="card-body">
                            <form action="../../action/user2/store.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama User</label>
                                            <input type="text" class="form-control" id="name" name="name" required
                                                placeholder="Masukkan nama user">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required
                                                placeholder="Masukkan email user">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required
                                                placeholder="Masukkan password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="confirm_password">Konfirmasi Password</label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required
                                                placeholder="Konfirmasi password">
                                        </div>
                                    </div>
                                    <!-- Tambahan Role -->
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="form-control" id="role" name="role" required>
                                                    <option value="">-- Pilih Role --</option>
                                                    <option value="staff">Staff</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="d-flex gap-2 justify-content-end">
                                            <a href="./index.php" class="btn btn-secondary btn-custom">
                                                <i class="bi bi-arrow-left"></i> Kembali
                                            </a>
                                            <button type="submit" class="btn btn-primary btn-custom" name="tombol">
                                                <i class="bi bi-save"></i> Simpan
                                            </button>
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

<script>
    // Validasi konfirmasi password
    document.querySelector('form').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;

        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Password dan Konfirmasi Password tidak sama!');
        }
    });
</script>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>