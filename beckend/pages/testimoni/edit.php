<?php
session_start();

$page = "testimoni";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
include '../../app.php';

// Validasi parameter ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak valid');
        window.location.href='./index.php';
    </script>
    ";
    exit;
}

$id = escapeString($_GET['id']);
$qSelect = "SELECT * FROM testimonials WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$testimoni = mysqli_fetch_object($result);

if (!$testimoni) {
    echo "
    <script>
        alert('Data tidak ditemukan');
        window.location.href='./index.php';
    </script>
    ";
    exit;
}
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
</style>

<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Testimoni</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Data Testimoni</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
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
                            <h3 class="card-title">Form Edit Data Testimoni</h3>
                        </div>

                        <div class="card-body">
                            <form action="../../action/testimoni/update.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $testimoni->id ?>">
                                <input type="hidden" name="current_image" value="<?= $testimoni->image ?>">

                                <div class="row">
                                    <!-- Kolom Kiri -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                value="<?= htmlspecialchars($testimoni->name) ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" name="status" class="form-control" id="status"
                                                value="<?= htmlspecialchars($testimoni->status) ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="massage">Pesan</label>
                                    <textarea name="massage" class="form-control" id="massage" rows="5" required><?= htmlspecialchars($testimoni->massage) ?></textarea>
                                </div>

                                <!-- Tambahan Rating -->
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <select name="rating" id="rating" class="form-control" required>
                                        <option value="1" <?= ($testimoni->rating == 1 ? 'selected' : '') ?>>⭐ 1</option>
                                        <option value="2" <?= ($testimoni->rating == 2 ? 'selected' : '') ?>>⭐ 2</option>
                                        <option value="3" <?= ($testimoni->rating == 3 ? 'selected' : '') ?>>⭐ 3</option>
                                        <option value="4" <?= ($testimoni->rating == 4 ? 'selected' : '') ?>>⭐ 4</option>
                                        <option value="5" <?= ($testimoni->rating == 5 ? 'selected' : '') ?>>⭐ 5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="image">Gambar Baru (Optional)</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                                </div>

                                <div class="form-group">
                                    <label>Gambar Saat Ini</label>
                                    <div>
                                        <img src="../../../storages/testimoni/<?= $testimoni->image ?>"
                                            alt="Gambar Testimoni" width="150" class="img-thumbnail">
                                    </div>
                                </div>

                                <div class="btn-action">
                                    <button type="submit" class="btn btn-info" name="tombol">
                                        <i class="fas fa-save"></i> Update
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