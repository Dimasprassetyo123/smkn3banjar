<?php
include '../../config/connection.php';

// Handle pencarian
$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($connect, $_GET['keyword']) : "";

// Modifikasi query berdasarkan keyword pencarian
if (!empty($keyword)) {
    $qguru = "SELECT * FROM teachers 
              WHERE teachers_name LIKE '%$keyword%' 
              OR teachers_major LIKE '%$keyword%' 
              ORDER BY teachers_name";
} else {
    $qguru = "SELECT * FROM teachers ORDER BY teachers_name";
}

$result = mysqli_query($connect, $qguru) or die(mysqli_error($connect));
$total_guru = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Guru - SMKN 3 Banjar</title>
    <!-- Favicon -->
    <link href="../template/template_user/img/logo,SMK.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            background: linear-gradient(135deg, #074dffff 0%, #1498fdff 100%);
            padding: 3rem 0;
            margin-bottom: 2rem;
        }

        .teacher-card {
            transition: transform 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            height: 100%;
        }

        .teacher-card:hover {
            transform: translateY(-5px);
        }

        .teacher-img {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }


        .search-container {
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        .result-count {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #dee2e6;
        }

        .search-form {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            padding: 0 20px;
            min-height: 38px;
        }
                /* ==== Footer ==== */
        .footer {
            background: #e3f2fd; /* biru muda */
            color: #0d47a1; /* biru tua */
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

        @media (max-width: 768px) {
            .search-form {
                flex-direction: column;
            }

            .search-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <!-- Header -->
    <div class="header">
        <div class="container d-flex align-items-center justify-content-between">

            <!-- Judul di tengah -->
            <h1 class="display-5 fw-bold text-white m-0 flex-grow-1 text-center">
                <i class="fas fa-chalkboard-teacher me-2"></i>SEMUA GURU SMKN 3 BANJAR
            </h1>

            <!-- Spacer kosong biar tombol & judul tetap center -->
            <div style="width:120px;"></div>
        </div>

        <!-- Breadcrumb -->
        <div class="container mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a href="../index.php#home" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="../index.php#guru" class="text-white text-decoration-none">Guru</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        Semua Guru
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mb-5">
        <!-- Search Box dengan Form -->
        <div class="search-container">
            <form method="GET" action="" class="search-form">
                <div class="input-group shadow-sm flex-grow-1">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" name="keyword" class="form-control border-start-0"
                        placeholder="Cari nama guru atau mata pelajaran..."
                        value="<?= htmlspecialchars($keyword) ?>">
                </div>
                <button type="submit" class="btn btn-primary search-btn d-flex align-items-center justify-content-center">
                    <i class="fas fa-search me-2"></i>
                    <span>Cari</span>
                </button>
                <?php if (!empty($keyword)): ?>
                    <a href="?" class="btn btn-outline-secondary search-btn d-flex align-items-center justify-content-center">
                        <i class="fas fa-times me-2"></i>
                        <span>Reset</span>
                    </a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Result Count -->
        <div class="result-count">
            <?php if (!empty($keyword)): ?>
                Menampilkan <span class="fw-bold"><?= $total_guru ?></span> guru untuk pencarian:
                "<span class="fst-italic"><?= htmlspecialchars($keyword) ?></span>"
            <?php else: ?>
                Menampilkan <span class="fw-bold"><?= $total_guru ?></span> guru
            <?php endif; ?>
        </div>

        <!-- List Guru -->
        <div class="row g-4">
            <?php if ($total_guru > 0): ?>
                <?php while ($item = $result->fetch_object()): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="teacher-card card">
                            <div class="position-relative overflow-hidden">
                                <img class="teacher-img" src="../../storages/guru/<?= $item->teachers_photo ?>"
                                    alt="<?= $item->teachers_name ?>">
                                <div class="team-social">
                                    <p class="btn btn-square text-dark m-0 p-2 d-flex align-items-center justify-content-center">
                                        <?= $item->teachers_name ?>
                                    </p>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $item->teachers_name ?></h5>
                                <p class="card-text text-muted"><?= $item->teachers_major ?></p>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-search"></i>
                        <h4 class="mt-3">Guru tidak ditemukan</h4>
                        <p>Tidak ada guru yang sesuai dengan pencarian "<span class="fst-italic"><?= htmlspecialchars($keyword) ?></span>"</p>
                        <a href="?" class="btn btn-primary mt-3">
                            <i class="fas fa-arrow-left me-2"></i>Tampilkan Semua Guru
                        </a>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>