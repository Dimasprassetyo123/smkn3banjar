<?php
session_start();

$page = "blog";
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
$qSelect = "SELECT * FROM blogs WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$blog = mysqli_fetch_object($result);

if (!$blog) {
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
    
    .current-image {
        max-width: 120px;
        max-height: 120px;
        padding: 3px;
        object-fit: cover;
        margin-right: 15px;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Data Blog</a></li>
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
                            <h3 class="card-title">Form Edit Data Blog</h3>
                        </div>

                        <div class="card-body">
                            <form action="../../action/blog/update.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $blog->id ?>">
                                <input type="hidden" name="current_image" value="<?= $blog->image ?>">
                                
                                <div class="row">
                                    <div class="form-group">
                                        <label>Gambar Saat Ini</label>
                                        <div class="image-container">
                                            <img src="../../../storages/blog/<?= $blog->image ?>"
                                                alt="Gambar saat ini" class="current-image">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image">
                                        </div>
                                    </div>    

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Judul</label>
                                            <input type="text" name="title" class="form-control" id="title"
                                                placeholder="Masukkan Nama Penghargaan..." 
                                                value="<?= htmlspecialchars($blog->title) ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="content">Kontent</label>
                                    <textarea name="content" id="content" class="form-control" rows="5"
                                        placeholder="Kontent..." required><?= htmlspecialchars($blog->content) ?></textarea>
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