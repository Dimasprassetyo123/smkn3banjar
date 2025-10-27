<?php
include '../config/connection.php';

$qblog = "SELECT * FROM blogs LIMIT 4";
$result = mysqli_query($connect, $qblog) or die(mysqli_error($connect));

$qcount = "SELECT COUNT(*) as total FROM blogs";
$count_result = mysqli_query($connect, $qcount);
$total_blog = $count_result->fetch_object()->total;
?>

<style>
    #blog {
        scroll-margin-top: 90px;
        background: linear-gradient(135deg, #e1e6ebff 0%, #e9ecef 100%);
    }

    .blog-container {
        padding: 60px 0;
        background: #ffffff;
    }

    .blog-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #2c3e50;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 3rem;
        position: relative;
        padding-bottom: 15px;
        text-align: center;
    }

    .blog-title::after {
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

    /* --- CARD --- */
    .blog-card {
        background: #ffffff;
        border-radius: 18px;
        overflow: hidden;
        transition: all 0.35s ease;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        border: none;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .blog-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
    }

    .image-container {
        position: relative;
        overflow: hidden;
        height: 220px;
        border-bottom: 4px solid #3498db;
    }

    .blog-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
        filter: brightness(0.95);
    }

    .blog-card:hover .blog-image {
        transform: scale(1.1);
        filter: brightness(1);
    }

    .blog-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        text-align: center;
        background: linear-gradient(180deg, #e6f3ff 0%, #cde9ff 100%);
    }

    .blog-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #0077cc;
        margin-bottom: 12px;
        text-shadow: 0px 1px 2px rgba(255, 255, 255, 0.7);
        transition: color 0.3s ease;
    }

    .blog-description {
        color: #004c80;
        line-height: 1.6;
        margin-bottom: 18px;
        flex-grow: 1;
        font-size: 15px;
        text-align: center;
    }

    .blog-placeholder {
        color: #0077cc;
        font-weight: 600;
        text-align: center;
        margin: 10px 0;
        font-size: 14px;
        padding: 6px 10px;
        background: rgba(0, 119, 204, 0.1);
        border-radius: 8px;
        display: inline-block;
    }

    /* Tombol lihat semua */
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
        display: inline-block;
        text-decoration: none;
    }

    .btn-lihat-semuanya:hover {
        background: linear-gradient(135deg, #2980b9, #3498db);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(52, 152, 219, 0.4);
        color: white;
        text-decoration: none;
    }

    .blog-count {
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
        .blog-title {
            font-size: 2rem;
        }

        .blog-card {
            margin-bottom: 25px;
        }

        .btn-lihat-semuanya {
            padding: 12px 25px;
            font-size: 14px;
        }

        .image-container {
            height: 200px;
        }
    }

    .row.g-4 {
        margin: 0 -15px;
    }

    .row.g-4>[class*='col-'] {
        padding: 15px;
    }
</style>

<div id="blog" class="blog-container">
    <div class="container">
        <div class="text-center">
            <h1 class="blog-title">Berita SMKN 3 BANJAR</h1>
        </div>

        <div class="row g-4">
            <?php while ($item = $result->fetch_object()): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="blog-card">
                        <div class="image-container">
                            <img class="blog-image" src="../storages/blog/<?= $item->image ?>" alt="<?= htmlspecialchars($item->title) ?>">
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-card-title"><?= htmlspecialchars($item->title) ?></h3>
                            <p class="blog-description">
                                <?= nl2br(htmlspecialchars(mb_substr($item->content, 0, 100) . (mb_strlen($item->content) > 100 ? '...' : ''))) ?>
                            </p>
                            <div class="blog-placeholder">
                                <i class="fas fa-school"></i> SMKN 3 BANJAR
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="text-center mt-5">
            <a href="sections/semuablog.php" class="btn-lihat-semuanya">
                <i class="fas fa-newspaper"></i> LIHAT SEMUA BLOG
                <span class="blog-count"><?= $total_blog ?>+</span>
            </a>
        </div>
    </div>
</div>

<!-- Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
