<?php
include '../../config/connection.php';

$qprestasi = "SELECT * FROM achievements";
$result = mysqli_query($connect, $qprestasi) or die(mysqli_error($connect));
$total_jurusan = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Prestasi - SMKN 3 Banjar</title>
    <link href="../template/template_user/img/logo,SMK.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Layout dasar supaya footer sticky */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        body {
            background-color: #f8f9fa;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            padding: 3rem 0;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-weight: 700;
            text-transform: uppercase;
        }

        /* Kartu prestasi */
        .gallery-card {
            transition: transform 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.15);
            height: 100%;
            margin-bottom: 20px;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 123, 255, 0.25);
        }

        .gallery-img {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }

        .card-title {
            font-weight: 600;
            color: #0d6efd;
        }

        .card-text {
            color: #555;
            font-size: 14px;
        }

        /* Footer */
        .footer {
            background: #e3f2fd;
            color: #0d47a1;
            padding: 40px 20px;
            text-align: center;
            margin-top: auto;
        }

        .footer h3 {
            margin-bottom: 15px;
            font-size: 20px;
            color: #0d47a1;
        }

        .footer p {
            margin: 5px 0;
            font-size: 14px;
            color: #1565c0;
        }

        .footer a {
            color: #1565c0;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }

        .footer a:hover {
            color: #0d47a1;
            text-decoration: underline;
        }

        .footer-bottom {
            margin-top: 20px;
            font-size: 13px;
            color: #0d47a1;
            border-top: 1px solid #bbdefb;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header text-white">
        <div class="container d-flex flex-column align-items-center">
            <div class="d-flex justify-content-between align-items-center w-100 mb-3">
                <h1 class="display-6 mb-0 flex-grow-1 text-center">
                    <i class="fas fa-trophy me-2"></i>SEMUA PRESTASI SMKN 3 BANJAR
                </h1>
                <div style="width:120px;"></div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="../index.php#home" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="../index.php#prestasi" class="text-white text-decoration-none">Prestasi</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        Semua Prestasi
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Konten utama -->
    <main>
        <div class="container mb-5">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <div class="row g-4">
                    <?php while ($item = $result->fetch_object()): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="gallery-card card">
                                <img class="gallery-img" src="../../storages/pencapaian/<?= $item->image ?>" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $item->title ?></h5>
                                    <p class="card-text"><?= $item->description ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-image display-1 text-warning mb-3"></i>
                    <h3 class="text-muted">Data prestasi tidak tersedia</h3>
                    <p class="text-muted">Silahkan hubungi administrator</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <h3>SMKN 3 BANJAR</h3>
        <p>Jl. Pendidikan No. 45, Banjar</p>
        <p>Email: info@smkn3banjar.sch.id | Telp: (0265) 123456</p>
        <div class="footer-bottom">
            &copy; 2025 SMKN 3 Banjar. Semua Hak Dilindungi.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
