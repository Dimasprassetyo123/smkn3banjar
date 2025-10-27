<?php
session_start();

$page = "visimisi";
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
$qSelect = "SELECT * FROM visi_misions WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$visimisi = mysqli_fetch_object($result);

if (!$visimisi) {
    echo "
    <script>
        alert('Data tidak ditemukan');
        window.location.href='./index.php';
    </script>
    ";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Visi Misi</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .content-wrapper {
            flex: 1;
            padding: 20px;
        }
        
        .footer-wrapper {
            margin-top: auto;
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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper -->
        <div class="content-wrapper p-5">
            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="card card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">Form Edit Data Visi Misi</h3>
                                </div>

                                <div class="card-body">
                                    <form action="../../action/visimisi/update.php?id=<?= $visimisi->id ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $visimisi->id ?>">

                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category">Kategori</label>
                                                    <select name="category" class="form-control" id="category" required>
                                                        <option value="visi" <?= $visimisi->category == 'visi' ? 'selected' : '' ?>>Visi</option>
                                                        <option value="misi" <?= $visimisi->category == 'misi' ? 'selected' : '' ?>>Misi</option>
                                                        <option value="tujuan" <?= $visimisi->category == 'tujuan' ? 'selected' : '' ?>>Tujuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="text">Teks</label>
                                            <textarea name="text" class="form-control" id="text"
                                                placeholder="Masukkan Teks ..." rows="5" required><?= htmlspecialchars($visimisi->text) ?></textarea>
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
        
        <!-- Footer Wrapper -->
        <div class="footer-wrapper">
            <?php
            include '../../partials/footer.php';
            include '../../partials/script.php';
            ?>
        </div>
    </div>
</body>
</html>