<?php
include '../../config/connection.php';

$qblog = "SELECT * FROM blogs";
$result = mysqli_query($connect, $qblog) or die(mysqli_error($connect));
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Blog - SMKN 3 Banjar</title>
    <link href="../template/template_user/img/logo,SMK.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ==== Layout agar footer selalu di bawah ==== */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        main {
            flex: 1;
        }

        /* ==== Header ==== */
        .header {
            background: linear-gradient(135deg, #0741ff 0%, #14affd 100%);
            padding: 3rem 0 2rem 0;
            margin-bottom: 2rem;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            position: relative;
        }

        .header-title {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* ==== Breadcrumb ==== */
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

        /* ==== Card Blog ==== */
        .blog-card {
            transition: transform 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            height: 100%;
            background: white;
        }

        .blog-card:hover {
            transform: translateY(-5px);
        }

        .blog-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            background: linear-gradient(180deg, #14affd 0%, #6f42c1 100%);
            color: #fff;
            padding: 20px;
            min-height: 180px;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #00e1ff;
        }

        .card-text {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.85);
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* ==== Footer ==== */
        .footer {
            background: #e3f2fd;
            /* biru muda */
            color: #0d47a1;
            /* biru tua */
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

        /* ==== Responsive ==== */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .back-btn {
                margin-bottom: 15px;
                margin-right: 0;
            }

            .header-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .header-title {
                font-size: 1.5rem;
            }

            .back-btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }

            .header-content {
                gap: 10px;
            }

            .breadcrumb {
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header text-white position-relative">
        <div class="container">
            <div class="header-content">
                <h1 class="header-title">
                    <i class="fas fa-blog"></i> SEMUA BLOG SMKN 3 BANJAR
                </h1>
            </div>

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index2.php#home">Home</a></li>
                    <li class="breadcrumb-item"><a href="../index2.php#blog">Berita</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Semua Berita</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Konten Utama -->
    <main class="container mb-5">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="row g-4">
                <?php while ($item = $result->fetch_object()): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="blog-card">
                            <img class="blog-img" src="../../storages/blog/<?= $item->image ?>" alt="<?= $item->title ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item->title ?></h5>
                                <p class="card-text"><?= nl2br($item->content) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="fas fa-image display-1 text-warning mb-3"></i>
                <h3 class="text-muted">Data Blog tidak tersedia</h3>
                <p class="text-muted">Silahkan hubungi administrator</p>
            </div>
        <?php endif; ?>
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