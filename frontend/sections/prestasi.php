<?php
include '../config/connection.php';

// Query untuk mengambil data prestasi (hanya 4 yang pertama)
$qprestasi = "SELECT * FROM achievements LIMIT 4";
$result = mysqli_query($connect, $qprestasi) or die(mysqli_error($connect));

// Query untuk menghitung total prestasi
$qcount = "SELECT COUNT(*) as total FROM achievements";
$count_result = mysqli_query($connect, $qcount);
$total_achievements = $count_result->fetch_object()->total;
?>

<div id="prestasi" class="container-fluid team pt-6 pb-6">
    <div class="container">
        <div class="text-center mx-auto" style="max-width: 600px;">
            <h1 class="display-6 text-uppercase mb-5">PRESTASI SMKN 3 BANJAR</h1>
        </div>

        <div class="row g-4 justify-content-center">
            <?php while ($item = $result->fetch_object()): ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="team-item h-100 d-flex flex-column">
                        <div class="position-relative overflow-hidden flex-grow-1">
                            <img class="img-fluid w-100"
                                src="../storages/pencapaian/<?= $item->image ?>"
                                alt="<?= $item->title ?>"
                                style="height: 250px; object-fit: cover;">
                            <div class="achievement-overlay">
                                <div class="achievement-badge">
                                    <i class="fa fa-trophy"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-center p-3 d-flex flex-column" style="min-height: 180px;">
                            <h5 class="mb-2 achievement-title"><?= $item->title ?></h5>
                            <p class="achievement-desc mb-0 flex-grow-1">
                                <?= $item->description ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Tombol Lihat Semua Prestasi -->
        <div class="text-center mt-5">
            <a href="sections/semuaprestasi.php" class="btn-lihat-semuanya">
                <i class="fas fa-newspaper"></i> LIHAT SEMUA PRESTASI
                <span class="prestasi-count"><?= $total_achievements ?>+</span>
            </a>
        </div>
    </div>
</div>

<style>
/* === SECTION PRESTASI === */
#prestasi {
    margin: 0 !important;
    padding: 0 !important;
    scroll-margin-top: 90px;
    
}

/* Container utama prestasi */
#prestasi .container {
    padding: 60px 15px 40px 15px; /* atas | kanan | bawah | kiri */
    margin: 0 auto;
}

/* Judul */
#prestasi .display-6 {
    font-size: 2.2rem;
    font-weight: 700;
    text-transform: uppercase;
    color: #2c3e50;
}

/* === CARD PRESTASI === */
.team-item {
    background: #ffffff;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid #e9ecef;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.team-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(9, 134, 218, 0.4);
    border-color: #3498db;
}

/* Gambar card */
.team-item img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

/* Overlay & badge */
.achievement-overlay {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 2;
}

.achievement-badge {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #ffc107, #ff9800);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 18px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

/* Judul card */
.achievement-title {
    color: #2c3e50;
    font-weight: 700;
    font-size: 18px;
    min-height: 54px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Deskripsi card */
.achievement-desc {
    color: #6c757d;
    line-height: 1.6;
    font-size: 14px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* === TOMBOL LIHAT SEMUA === */
.btn-lihat-semuanya {
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: #fff;
    font-weight: 600;
    padding: 12px 28px;
    border-radius: 30px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
    border: none;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-lihat-semuanya:hover {
    background: linear-gradient(135deg, #2980b9, #3498db);
    color: #fff;
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
}

/* Counter total prestasi */
.prestasi-count {
    background: linear-gradient(135deg, #db3439ff, #b92929ff);
    color: white;
    padding: 8px 20px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 14px;
    margin-left: 15px;
    box-shadow: 0 3px 10px rgba(52, 152, 219, 0.3);
}

/* === RESPONSIVE === */
@media (max-width: 1200px) {
    .col-xl-3 {
        flex: 0 0 25%;
        max-width: 25%;
    }
    .achievement-title {
        font-size: 16px;
        min-height: 48px;
    }
    .achievement-desc {
        font-size: 13px;
    }
}

@media (max-width: 992px) {
    .col-lg-3 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    .team-item {
        margin-bottom: 30px;
    }
}

@media (max-width: 768px) {
    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    #prestasi .display-6 {
        font-size: 2rem;
    }
    .team-item img {
        height: 200px;
    }
}

@media (max-width: 576px) {
    .col-sm-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    .team-item {
        max-width: 320px;
        margin: 0 auto 30px;
    }
    .btn-lihat-semuanya {
        padding: 10px 20px;
        font-size: 14px;
    }
    .prestasi-count {
        padding: 6px 15px;
        font-size: 12px;
        margin-left: 10px;
    }
}

</style>