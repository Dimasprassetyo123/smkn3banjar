<?php
session_start();

$page = "sosialmedia";
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
$qSelect = "SELECT * FROM social_media WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$socmed = mysqli_fetch_object($result);

if (!$socmed) {
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
    <title>Form Edit Data Social Media</title>
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
            overflow: auto;
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

        .format-info {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }
        
        .icon-preview {
            font-size: 24px;
            margin-left: 10px;
            color: #6f42c1;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Main Content -->
            <section class="content p-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-8 mt-5 mx-auto">
                            <div class="card card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">Form Edit Data Social Media</h3>
                                </div>

                                <div class="card-body">
                                    <form action="../../action/socmed/update.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $socmed->id ?>">
                                        
                                        <div class="form-group">
                                            <label for="title">Judul Icon</label>
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Masukkan Nama Sosmed..." value="<?= htmlspecialchars($socmed->title) ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="icon" class="form-label">Icon</label>
                                            <div class="d-flex align-items-center">
                                                <input type="text" name="icon" id="icon" class="form-control" placeholder="Contoh: bi bi-instagram" value="<?= htmlspecialchars($socmed->icon) ?>" required>
                                                <span id="iconPreview" class="icon-preview"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="link_url">Link</label>
                                            <input type="text" name="link_url" class="form-control" id="link_url" placeholder="Masukkan Link URL..." value="<?= htmlspecialchars($socmed->link_url) ?>" required>
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
        ?>
    </div>

    <?php
    include '../../partials/script.php';
    ?>

    <!-- Script untuk preview icon -->
    <script>
        $(document).ready(function() {
            // Preview icon saat diketik
            $('#icon').on('input', function() {
                var iconClass = $(this).val();
                $('#iconPreview').attr('class', iconClass + ' icon-preview');
            });
            
            // Inisialisasi preview awal
            $('#iconPreview').attr('class', '<?= htmlspecialchars($socmed->icon) ?> icon-preview');
        });
    </script>
</body>
</html>