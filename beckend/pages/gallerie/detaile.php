<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>
        alert('Anda belum login');
        window.location.href='../user/login.php';
    </script>";
    exit();
}

$page = "galeri";
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
$qSelect = "SELECT * FROM galleries WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$gallerie = mysqli_fetch_object($result);

if (!$gallerie) {
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
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .card-purple .card-header {
        background: #cfc1e9ff;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 15px 20px;
    }

    .detail-container {
        padding: 20px;
    }

    .detail-row {
        display: flex;
        margin-bottom: 20px;
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
    }

    .detail-label {
        width: 200px;
        font-weight: 600;
        color: #6c757d;
    }

    .detail-value {
        flex: 1;
        color: #343a40;
    }

    .detail-image {
        max-width: 100%;
        max-height: 400px;
        border-radius: 8px;
        border: 3px solid #f8f9fa;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        object-fit: contain;
    }

    .detail-description {
        line-height: 1.6;
        text-align: justify;
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        border-left: 4px solid #6f42c1;
    }

    .btn-action {
        margin-top: 30px;
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
        color: white;
        text-decoration: none;
        display: inline-block;
    }

    .btn-secondary {
        background: #6c757d;
        border: none;
        padding: 8px 20px;
        border-radius: 6px;
        font-weight: 600;
        color: white;
        text-decoration: none;
        display: inline-block;
    }

    @media (max-width: 768px) {
        .detail-row {
            flex-direction: column;
        }
        
        .detail-label {
            width: 100%;
            margin-bottom: 5px;
        }
        
        .detail-image {
            max-width: 100%;
            max-height: 300px;
        }
        
        .btn-action {
            flex-direction: column;
        }
        
        .btn-action a {
            width: 100%;
            margin-bottom: 10px;
            text-align: center;
        }
    }
</style>

<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Galeri</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Data Galeri</a></li>
                        <li class="breadcrumb-item active">Detail Data</li>
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
                            <h3 class="card-title">Detail Informasi Galeri</h3>
                        </div>

                        <div class="card-body detail-container">
                            <div class="detail-row">
                                <div class="detail-label">Gambar</div>
                                <div class="detail-value">
                                    <img src="../../../storages/gallerie/<?= $gallerie->image ?>" 
                                         alt="Gambar Galeri" 
                                         class="detail-image"
                                         onerror="this.src='https://via.placeholder.com/600x400?text=Gambar+Tidak+Tersedia'">
                                </div>
                            </div>

                            <div class="detail-row">
                                <div class="detail-label">Deskripsi</div>
                                <div class="detail-value detail-description">
                                    <?= nl2br($gallerie->description) ?>
                                </div>
                            </div>

                            <div class="btn-action">
                                <a href="./edit.php?id=<?= $gallerie->id ?>" class="btn btn-info">
                                    <i class="fas fa-edit"></i> Edit Data
                                </a>
                                <a href="./index.php" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                                </a>
                            </div>
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