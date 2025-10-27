<?php
include '../../config/connection.php';

$qgaleri = "SELECT * FROM galleries";
$result = mysqli_query($connect, $qgaleri) or die(mysqli_error($connect));
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Galeri - SMKN 3 Banjar</title>
    <link href="../template/template_user/img/logo,SMK.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* === Layout supaya footer sticky === */
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

        /* === Header === */
        .header {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            padding: 3rem 0;
            margin-bottom: 2rem;
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* === Gallery Card === */
        .gallery-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(13, 110, 253, 1);
            height: 100%;
            margin-bottom: 25px;
            border: none;
            background: linear-gradient(to bottom, #ffffff, #f8f9fa);
            position: relative;
        }

        .gallery-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 12px 25px rgba(13, 110, 253, 0.25);
        }

        .gallery-img {
            height: 250px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover .gallery-img {
            transform: scale(1.05);
        }

        .card-body {
            padding: 1.5rem;
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
            border-top: 1px solid rgba(13, 110, 253, 0.1);
        }

        .card-title {
            color: #0d6efd;
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 0.75rem;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 0.5rem;
            display: inline-block;
        }

        .card-text {
            color: #495057;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* === Breadcrumb === */
        .breadcrumb {
            justify-content: center;
            background: transparent;
            margin-top: 15px;
            margin-bottom: 0;
        }

        .breadcrumb a {
            color: #fff;
            font-weight: 500;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
            color: #e3f2fd;
        }

        .breadcrumb-item.active {
            color: #bbdefb;
            font-weight: bold;
        }

        /* Efek hover halus */
        .gallery-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent, rgba(13, 110, 253, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
            pointer-events: none;
        }

        .gallery-card:hover::before {
            opacity: 1;
        }

        /* Animasi muncul */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .gallery-card {
            animation: fadeIn 0.6s ease forwards;
        }

        .col-lg-3, .col-md-4, .col-sm-6 {
            animation-duration: 0.6s;
            animation-fill-mode: both;
        }

        .col-lg-3:nth-child(1) { animation-delay: 0.1s; }
        .col-lg-3:nth-child(2) { animation-delay: 0.2s; }
        .col-lg-3:nth-child(3) { animation-delay: 0.3s; }
        .col-lg-3:nth-child(4) { animation-delay: 0.4s; }

        /* === Footer === */
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
    <div class="header">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="display-5 fw-bold text-white m-0 flex-grow-1 text-center">
                <i class="fas fa-chalkboard-teacher me-2"></i>SEMUA GURU SMKN 3 BANJAR
            </h1>
            <div style="width:120px;"></div>
        </div>

        <!-- Breadcrumb -->
        <div class="container mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="../index.php#home" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="../index.php#galeri" class="text-white">Galeri</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Semua Galeri</li>
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
                                <img class="gallery-img" src="../../storages/gallerie/<?= $item->image ?>" alt="Galeri SMKN 3 Banjar">
                                <div class="card-body">
                                    <h5 class="card-title">Galeri SMKN 3 Banjar</h5>
                                    <p class="card-text"><?= $item->description ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-image display-1 text-warning mb-3"></i>
                    <h3 class="text-muted">Data galeri tidak tersedia</h3>
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
