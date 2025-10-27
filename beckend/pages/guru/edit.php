<?php
session_start();

$page = "guru";
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
$qSelect = "SELECT * FROM teachers WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$guru = mysqli_fetch_object($result);

if (!$guru) {
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
    <title>Edit Data Guru</title>
    <style>
        /* RESET TOTAL DAN FIX FOOTER */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
        }

        /* CONTENT AREA - HARUS MENGISI SEMUA RUANG */
        .main-wrapper {
            flex: 1 0 auto;
            display: flex;
            flex-direction: column;
            width: 100%;
            min-height: calc(100vh - 150px);
            /* PASTIKAN MINIMAL TINGGI */
        }

        /* MAIN CONTENT */
        .content-container {
            flex: 1;
            padding: 30px;
            padding-top: 100px;
            width: 100%;
        }

        /* FORM STYLING */
        .card-purple {
            border: 1px solid #6f42c1;
            border-radius: 10px;
            margin-bottom: 40px;
            width: 100%;
        }

        .card-purple .card-header {
            background: #cfc1e9ff;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 20px;
            font-size: 1.2rem;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            width: 100%;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
            width: 100%;
            font-size: 1rem;
        }

        .btn-action {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            width: 100%;
        }

        .btn-info {
            background: #17a2b8;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: 600;
            color: white;
            font-size: 1rem;
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: 600;
            color: white;
            font-size: 1rem;
        }

        /* FOOTER - PASTI DI PALING BAWAH */
        .footer-wrapper {
            width: 100%;
            flex-shrink: 0;
            margin-top: auto !important;
        }

        /* PASTIKAN CONTENT CUKUP TINGGI */
        .form-row {
            min-height: 400px;
            display: flex;
            align-items: center;
        }

        /* FORM CONTROL */
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ced4da;
            border-radius: 6px;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #6f42c1;
            box-shadow: 0 0 0 0.3rem rgba(111, 66, 193, 0.25);
        }

        /* CURRENT IMAGE STYLING */
        .current-image {
            max-width: 150px;
            max-height: 150px;
            border: 3px solid #dee2e6;
            border-radius: 8px;
            padding: 5px;
            object-fit: cover;
            margin-top: 10px;
        }

        /* Styling untuk radio buttons */
        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .radio-option input[type="radio"] {
            margin: 0;
            width: 18px;
            height: 18px;
        }

        .radio-option label {
            margin: 0;
            font-weight: normal;
        }

        /* CONTENT HEADER STYLING */
        .content-header {
            margin-bottom: 30px;
        }

        .content-header h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .breadcrumb {
            background: none;
            margin-bottom: 0;
        }

        /* CUSTOM FILE INPUT */
        .custom-file {
            position: relative;
            display: block;
            width: 100%;
        }

        .custom-file-input {
            position: relative;
            z-index: 2;
            width: 100%;
            height: calc(2.25rem + 4px);
            margin: 0;
            opacity: 0;
        }

        .custom-file-label {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            height: calc(2.25rem + 4px);
            padding: 0.5rem 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 2px solid #ced4da;
            border-radius: 6px;
        }

        .custom-file-label::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 3;
            display: block;
            height: calc(2.25rem + 2px);
            padding: 0.5rem 1rem;
            line-height: 1.5;
            color: #495057;
            content: "Browse";
            background-color: #e9ecef;
            border-left: 2px solid #ced4da;
            border-radius: 0 5px 5px 0;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="content-container">
            <!-- Content Header -->

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row form-row">
                        <div class="col-12">
                            <div class="card card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">Form Edit Data Guru</h3>
                                </div>

                                <div class="card-body">
                                    <form action="../../action/guru/update.php?id=<?= $guru->id ?>" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $guru->id ?>">
                                        <input type="hidden" name="current_image" value="<?= $guru->teachers_photo ?>">

                                        <div class="row">
                                            <!-- Kolom Kiri -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="teachers_name">Nama Guru</label>
                                                    <input type="text" name="teachers_name" class="form-control" id="teachers_name"
                                                        placeholder="Masukkan Nama Guru..."
                                                        value="<?= htmlspecialchars($guru->teachers_name) ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="jk">Jenis Kelamin</label>
                                                    <div class="radio-group">
                                                        <div class="radio-option">
                                                            <input type="radio" id="jk_laki" name="jk" value="Laki-laki"
                                                                <?= ($guru->jk == 'Laki-laki') ? 'checked' : '' ?> required>
                                                            <label for="jk_laki">Laki-laki</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" id="jk_perempuan" name="jk" value="Perempuan"
                                                                <?= ($guru->jk == 'Perempuan') ? 'checked' : '' ?>>
                                                            <label for="jk_perempuan">Perempuan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Kolom Kanan -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="teachers_major">Mata Pelajaran</label>
                                                    <input type="text" name="teachers_major" class="form-control" id="teachers_major"
                                                        placeholder="Masukkan Mata Pelajaran..."
                                                        value="<?= htmlspecialchars($guru->teachers_major) ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gambar Saat Ini</label>
                                                    <div class="image-container">
                                                        <img src="../../../storages/guru/<?= $guru->teachers_photo ?>"
                                                            alt="Gambar saat ini" class="current-image">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="teachers_photo">Gambar Baru (Opsional)</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="teachers_photo" class="custom-file-input" id="teachers_photo">
                                                        <label class="custom-file-label" for="teachers_photo">Pilih file baru...</label>
                                                    </div>
                                                    <small style="color: #6c757d; font-size: 12px; margin-top: 5px; display: block;">
                                                        Biarkan kosong jika tidak ingin mengubah gambar
                                                    </small>
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
    </div>

    <!-- Footer Section - PASTI DI PALING BAWAH -->
    <div class="footer-wrapper">
        <?php
        include '../../partials/footer.php';
        include '../../partials/script.php';
        ?>
    </div>

    <script>
        // Script untuk menampilkan nama file yang dipilih
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = document.getElementById("teachers_photo").files[0]?.name || "Pilih file baru...";
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>
</body>

</html>