<?php
session_start();

$page = "kontak";
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
$qSelect = "SELECT * FROM contacts WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$contact = mysqli_fetch_object($result);

if (!$contact) {
    echo "
    <script>
        alert('Data tidak ditemukan');
        window.location.href='./index.php';
    </script>
    ";
    exit;
}

// Tutup tag PHP untuk melanjutkan HTML
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kontak</title>
    <style>
        html, body {
            height: 100%;
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
        
        .img {
            max-width: 120px;
            max-height: 120px;
            padding: 3px;
            object-fit: cover;
            margin-right: 15px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar dan Sidebar sudah di-include di atas -->
        
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Main Content -->
            <section class="content p-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="card card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">Form Edit Data Kontak</h3>
                                </div>

                                <div class="card-body">
                                    <form action="../../action/contact/update.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $contact->id ?>">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        placeholder="Masukkan Email..." 
                                                        value="<?= $contact->email ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">No Telepon</label>
                                                    <input type="text" name="phone" class="form-control" id="phone"
                                                        placeholder="Masukkan No Telepon..." 
                                                        value="<?= $contact->phone ?>" required>
                                                </div>
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
        ?>
    </div>

    <?php
    include '../../partials/script.php';
    ?>
</body>
</html>