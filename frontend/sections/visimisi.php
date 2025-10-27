<?php
include '../config/connection.php';

// Ambil data visi & misi
$qvisimisi = "SELECT * FROM visi_misions";
$resultVisiMisi = mysqli_query($connect, $qvisimisi) or die(mysqli_error($connect));

// Ambil data pengumuman terbaru
$qpengumuman = "SELECT * FROM announcements ORDER BY id DESC";
$resultPengumuman = mysqli_query($connect, $qpengumuman) or die(mysqli_error($connect));
?>

<div id="visimisi" class="container-fluid mt-10 mb-10 wow fadeIn" data-wow-delay="0.1s">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-5">
                <h1 class="display-5 text-dark text-uppercase mb-4">Visi & Misi</h1>
                <p class="text-dark mb-0">Visi dan Misi SMK Negeri 3 Banjar</p>
            </div>
        </div>
        <div class="row justify-content-center g-4">

            <!-- Card pengumuman -->
            <div class="col-xl-5 col-lg-5 col-md-5 wow fadeIn" data-wow-delay="0.3s">
                <div class="card h-100 border-5 border-primary shadow">
                    <div class="card-header bg-primary text-dark text-center py-4">
                        <h3 class="text-uppercase mb-0"><i class="fa fa-bullseye me-2"></i>Pengumuman</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="announcements-container">
                            <?php while ($pengumuman = $resultPengumuman->fetch_object()): ?>
                                <div class="announcement-card mb-4 p-3 border rounded shadow-sm">
                                    <div class="d-flex flex-row align-items-start gap-3">
                                        <?php if (!empty($pengumuman->announcements_image)): ?>
                                            <div class="announcement-image flex-shrink-0">
                                                <img src="../storages/pengumuman/<?= $pengumuman->announcements_image ?>"
                                                    alt="Gambar Pengumuman"
                                                    class="img-fluid rounded"
                                                    style="width:120px; height:120px; object-fit:cover;">
                                            </div>
                                        <?php endif; ?>

                                        <div class="announcement-content flex-grow-1">
                                            <h5 class="announcement-title mb-2 text-primary">
                                                <i class="fa fa-chevron-right me-2"></i><?= $pengumuman->announcements_title ?>
                                            </h5>
                                            <p class="announcement-text mb-0"><?= $pengumuman->announcements_description ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Misi Visi-->
            <div class="col-xl-5 col-lg-5 col-md-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="card h-100 border-3 border-primary shadow-lg rounded-3">
                    <?php while ($item = $resultVisiMisi->fetch_object()): ?>
                        <div class="card-header bg-primary text-dark text-center py-3">
                            <h3 class="text-uppercase mb-0">
                                <i class="fa fa-lightbulb me-2"></i> <?= $item->category ?>
                            </h3>
                        </div>
                        <div class="card-body p-4">
                            <?php if (strtolower($item->category) == 'visi'): ?>
                                <p class="mb-0 text-center" style="font-size: 20px;"><?= nl2br($item->text) ?></p>
                            <?php elseif (strtolower($item->category) == 'misi'): ?>
                                <ul class="ps-0 mb-0 mx-4">
                                    <?php foreach (explode("\n", $item->text) as $point): ?>
                                        <?php if (trim($point) != ''): ?>
                                            <li class="mb-2 d-flex align-items-start" style="list-style: none; font-size: 18px;">
                                                
                                                <span><?= htmlspecialchars($point) ?></span>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    #visimisi {
        scroll-margin-top: 150px;
         background: linear-gradient(135deg, #e1e6ebff 0%, #e9ecef 100%);
        padding: 80px 0;
        padding: 60px 0;
    }

    .feature {
        background-size: cover;
        padding: 5rem 0;
    }

    .mt-10 {
        margin-top: 6rem !important;
    }

    .mb-10 {
        margin-bottom: 6rem !important;
    }

    .card {
        border-radius: 5px;
        transition: all 0.3s ease;
        min-height: 700px;
        /* Set minimum height for both cards */
    }

    .card-header {
        border-radius: 0 !important;
        border-bottom: 3px solid #0088ffff !important;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .list-unstyled li {
        text-align: left;
        padding: 8px 0;
        font-size: 1.05rem;
    }

    .border-primary {
        border-color: #078fffff !important;
    }

    .bg-primary {
        background-color: #07c9ffff !important;
    }

    .text-primary {
        color: #ffc107 !important;
    }

    .shadow {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .display-5 {
        color: white;
        font-weight: 700;
    }

    /* Styling untuk card pengumuman */
    .announcements-container {
        max-height: 580px;
        overflow-y: auto;
        padding-right: 10px;
    }

    .announcement-card {
        background-color: #d9dde1ff;
        border: 1px solid #e9ecef !important;
        transition: all 0.3s ease;
    }

    .announcement-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 1) !important;
        background-color: #d9dde1ff;
    }

    .announcement-title {
        font-weight: 600;
        color: #2c3e50 !important;
    }

    .announcement-text {
        color: #34495e;
        line-height: 1.6;
    }

    /* Scrollbar styling untuk container pengumuman */
    .announcements-container::-webkit-scrollbar {
        width: 6px;
    }

    .announcements-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }

    .announcements-container::-webkit-scrollbar-thumb {
        background: #3498db;
        border-radius: 3px;
    }

    .announcements-container::-webkit-scrollbar-thumb:hover {
        background: #2980b9;
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .col-xl-5 {
            flex: 0 0 45%;
            max-width: 45%;
        }
    }

    @media (max-width: 992px) {

        .col-xl-5,
        .col-lg-5,
        .col-md-5 {
            flex: 0 0 80%;
            max-width: 80%;
            margin-bottom: 2rem;
        }

        .display-5 {
            font-size: 2.5rem;
        }

        .card {
            min-height: 350px;
        }

        .announcement-card {
            flex-direction: column !important;
        }

        .announcement-image {
            align-self: center;
            margin-bottom: 15px;
        }
    }

    @media (max-width: 768px) {

        .col-xl-5,
        .col-lg-5,
        .col-md-5 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .card-body {
            padding: 2rem !important;
        }

        .display-5 {
            font-size: 2.2rem;
        }

        .mt-10 {
            margin-top: 4rem !important;
        }

        .mb-10 {
            margin-bottom: 4rem !important;
        }

        .card {
            min-height: 300px;
        }

        .announcement-image img {
            width: 100px !important;
            height: 100px !important;
        }
    }
</style>