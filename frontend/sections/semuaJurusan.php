<?php
include '../../config/connection.php';

// Handle pencarian
$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($connect, $_GET['keyword']) : "";

// Modifikasi query berdasarkan keyword pencarian
if (!empty($keyword)) {
    $qJurusan = "SELECT * FROM majors 
                 WHERE majors_name LIKE '%$keyword%' 
                 OR head LIKE '%$keyword%' 
                 OR majors_description LIKE '%$keyword%' 
                 ORDER BY majors_name";
} else {
    $qJurusan = "SELECT * FROM majors ORDER BY majors_name";
}

$result = mysqli_query($connect, $qJurusan) or die(mysqli_error($connect));
$total_jurusan = mysqli_num_rows($result);
?>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Jurusan SMKN 3 Banjar</title>
    <link href="../template/template_user/img/logo,SMK.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header-section {
            background: linear-gradient(135deg, #4B49AC 0%, #38B6FF 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .jurusan-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: none;

            display: flex;
            align-items: flex-start;
            gap: 20px;

            min-height: 250px; /* 🔹 tinggi konsisten */
            height: 100%;
        }

        .jurusan-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .jurusan-img {
            width: 120px;
            height: 120px;
            object-fit: contain;
            border-radius: 12px;
            background: #fff;
            padding: 5px;
            flex-shrink: 0;
        }

        .jurusan-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .jurusan-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .jurusan-head {
            font-size: 1rem;
            color: #0d6efd;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .jurusan-desc {
            font-size: 0.95rem;
            color: #6c757d;
            line-height: 1.5;
            max-height: 70px;
            overflow: hidden;
        }

        .btn-detail {
            margin-top: 10px;
            font-size: 0.9rem;
            border-radius: 8px;
        }

        .search-container {
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        .result-count {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 1rem;
            text-align: center;
        }

        /* ==== Footer ==== */
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
    <!-- Header Section -->
    <div class="header-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center flex-grow-1">
                    <h1 class="fw-bold mb-2">SEMUA JURUSAN SMKN 3 BANJAR</h1>
                    <p class="lead mb-0">Daftar lengkap jurusan yang tersedia di SMKN 3 Banjar</p>
                </div>
                <div style="width:90px"></div> <!-- spacer -->
            </div>

            <!-- Breadcrumb -->
            <div class="mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="../index.php#home" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="../index.php#jurusan" class="text-white text-decoration-none">Jurusan</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            Semua Jurusan
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Search Box -->
        <div class="search-container">
            <form method="GET" action="" class="d-flex gap-2">
                <div class="input-group shadow-sm">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" name="keyword"
                        class="form-control border-start-0"
                        placeholder="Cari jurusan, kepala jurusan, atau deskripsi..."
                        value="<?= $keyword ?>">
                </div>

                <!-- Tombol Cari bulat (pil) -->
                <button type="submit" class="btn btn-primary rounded-pill px-4 d-flex align-items-center">
                    <i class="fas fa-search me-2"></i>
                    <span>Cari</span>
                </button>

                <?php if (!empty($keyword)): ?>
                    <a href="?" class="btn btn-outline-secondary rounded-pill px-4 d-flex align-items-center">
                        <i class="fas fa-times me-2"></i>
                        <span>Reset</span>
                    </a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Result Count -->
        <div class="result-count">
            <?php if (!empty($keyword)): ?>
                Menampilkan <span class="fw-bold"><?= $total_jurusan ?></span> jurusan untuk pencarian: "<span class="fst-italic"><?= $keyword ?></span>"
            <?php else: ?>
                Menampilkan <span class="fw-bold"><?= $total_jurusan ?></span> jurusan
            <?php endif; ?>
        </div>

        <!-- List Jurusan -->
        <div id="jurusan" class="row g-4">
            <?php if ($total_jurusan > 0): ?>
                <?php while ($item = mysqli_fetch_object($result)): ?>
                    <div class="col-md-4">
                        <div class="jurusan-card">
                            <img src="../../storages/jurusan/<?= $item->majors_image ?>"
                                alt="<?= $item->majors_name ?>"
                                class="jurusan-img">
                            <div class="jurusan-content">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <div class="jurusan-name"><?= $item->majors_name ?></div>
                                        <div class="jurusan-head"><?= $item->head ?></div>
                                    </div>
                                    <span class="badge bg-primary">JURUSAN</span>
                                </div>
                                <p class="jurusan-desc"><?= $item->majors_description ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="text-center text-muted p-5">
                    <i class="fas fa-search fa-3x mb-3"></i>
                    <h4>Jurusan tidak ditemukan</h4>
                    <p>Tidak ada jurusan yang sesuai dengan pencarian "<span class="fst-italic"><?= $keyword ?></span>"</p>
                    <a href="?" class="btn btn-primary mt-3"><i class="fas fa-arrow-left me-2"></i>Tampilkan Semua</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <h3>SMKN 3 BANJAR</h3>
        <p>Jl. Pendidikan No. 45, Banjar</p>
        <p>Email: info@smkn3banjar.sch.id | Telp: (0265) 123456</p>
        <div class="footer-bottom">
            &copy; 2025 SMKN 3 Banjar. Semua Hak Dilindungi.
        </div>
    </footer>
</body>
</html>
