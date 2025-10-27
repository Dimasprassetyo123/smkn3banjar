<?php
include '../config/connection.php';

$qgaleri = "SELECT * FROM galleries LIMIT 4";
$result = mysqli_query($connect, $qgaleri) or die(mysqli_error($connect));

$qcount = "SELECT COUNT(*) as total FROM galleries";
$count_result = mysqli_query($connect, $qcount);
$total_galleries = $count_result->fetch_object()->total;
?>

<style>
    #galeri {
        scroll-margin-top: 90px;
        padding: 80px 0;
    }

    .galeri-container {
        padding: 60px 0;
    }

    .galeri-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #2c3e50;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 3rem;
        position: relative;
        padding-bottom: 15px;
    }

    .galeri-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #3498db, #2c3e50);
        border-radius: 2px;
    }

    .galeri-card {
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

    .galeri-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(9, 134, 218, 1);
        border-color: #3498db;
    }

    .galeri-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .galeri-card:hover .galeri-image {
        transform: scale(1.05);
    }

    .galeri-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .galeri-description {
        color: #34495e;
        line-height: 1.6;
        margin-bottom: 15px;
        flex-grow: 1;
        font-size: 14px;
        text-align: center;
    }

    .galeri-placeholder {
        color: #7f8c8d;
        font-style: italic;
        text-align: center;
        margin: 10px 0;
        font-size: 12px;
    }

    .btn-lihat-semuanya {
        background: linear-gradient(135deg, #3498db, #2980b9);
        border: none;
        border-radius: 50px;
        padding: 15px 35px;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        margin-top: 2rem;
    }

    .btn-lihat-semuanya:hover {
        background: linear-gradient(135deg, #2980b9, #3498db);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(52, 152, 219, 0.4);
        color: white;
    }

    .galeri-count {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        padding: 8px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 14px;
        margin-left: 15px;
        box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
    }

    @media (max-width: 768px) {
        .galeri-title {
            font-size: 2rem;
        }

        .galeri-card {
            margin-bottom: 25px;
        }

        .btn-lihat-semuanya {
            padding: 12px 25px;
            font-size: 14px;
        }
    }

    .image-container {
        position: relative;
        overflow: hidden;
        height: 220px;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(transparent 70%, rgba(52, 152, 219, 0.1));
        transition: all 0.3s ease;
    }

    .galeri-card:hover .image-overlay {
        background: linear-gradient(transparent 50%, rgba(52, 152, 219, 0.2));
    }
</style>

<div id="galeri" class="galeri-container">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="galeri-title">GALERI SMKN 3 BANJAR</h1>
        </div>

        <div class="row g-4">
            <?php while ($item = $result->fetch_object()): ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="galeri-card">
                        <div class="image-container">
                            <img class="galeri-image" src="../storages/gallerie/<?= $item->image ?>" alt="<?= htmlspecialchars($item->description) ?>">
                            <div class="image-overlay"></div>
                        </div>
                        <div class="galeri-content">
                            <p class="galeri-description"><?= nl2br(htmlspecialchars($item->description)) ?></p>
                            <div class="galeri-placeholder">SMKN 3 BANJAR</div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="text-center mt-5">
            <a href="sections/semuagaleri.php" class="btn-lihat-semuanya">
                <i class="fas fa-newspaper"></i> LIHAT SEMUA GALERI
                <span class="galeri-count"><?= $total_galleries ?>+</span>
            </a>
        </div>
    </div>
</div>