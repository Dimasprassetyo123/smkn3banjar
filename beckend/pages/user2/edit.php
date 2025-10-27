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

// Ambil ID dari URL
if (!isset($_GET['id'])) {
    echo "<script>
        alert('User tidak ditemukan');
        window.location.href='index.php';
    </script>";
    exit();
}

$id = intval($_GET['id']);
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) == 0) {
    echo "<script>
        alert('User tidak ditemukan');
        window.location.href='index.php';
    </script>";
    exit();
}

$user = mysqli_fetch_object($result);
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
        min-height: calc(100vh - 150px);
        padding-top: 40px;
        position: relative;
    }

    .content-container {
        min-height: calc(100vh - 250px);
        padding-bottom: 80px;
    }

    .main-footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #f4f6f9;
        padding: 10px 0;
        border-top: 1px solid #dee2e6;
    }
</style>

<div class="content-wrapper">
    <section class="content p-5">
        <div class="container-fluid content-container">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-5">
                    <div class="card card-purple">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <div class="card-body">
                            <form action="../../action/user2/update.php" method="POST">
                                <input type="hidden" name="id" value="<?= $user->id ?>">

                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?= htmlspecialchars($user->name) ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?= htmlspecialchars($user->email) ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password"
                                        value="<?= htmlspecialchars($user->password) ?>" required>
                                    <small class="text-muted">Jika tidak ingin mengganti, biarkan apa adanya.</small>
                                </div>
                                
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="admin" <?= $user->role === 'admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="staff" <?= $user->role === 'staff' ? 'selected' : '' ?>>Staff</option>
                                </select>

                                <div class="d-flex justify-content-between mt-4">
                                    <a href="./index.php" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" name="tombol" class="btn btn-success">Update</button>
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