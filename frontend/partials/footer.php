<?php
include __DIR__ . '/../../config/connection.php';

// Query gallery
$qgaleri = "SELECT * FROM galleries";
$resultGaleri = mysqli_query($connect, $qgaleri) or die(mysqli_error($connect));

// Query contact
$qkontak = "SELECT * FROM contacts";
$resultKontak = mysqli_query($connect, $qkontak) or die(mysqli_error($connect));
$item = $resultKontak->fetch_object();
?>
<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">

            <!-- Office Info -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-white mb-4">Sekolah kami</h5>
                <p class="mb-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</p>
                <p class="mb-3 text-light"><i class="fa fa-phone-alt me-2"></i><?= $item->phone ?></p>
                <p class="mb-3 text-light"><i class="fa fa-envelope me-2"></i><?= $item->email ?></p>

                <!-- Social Icons -->
                <div class="d-flex flex-wrap pt-2 gap-2">
                    <a class="btn btn-light text-danger" href="https://www.instagram.com/smkn3banjar/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-light text-danger" href="https://youtu.be/FW1Ywl82DyM?si=Hm3ka55ocPRr8ETJ" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-white mb-4">Tautan Cepat</h5>
                <div class="d-flex flex-column gap-2">
                    <a class="btn btn-link text-light p-0 mb-2 text-start" href="#kepala">Sambutan</a>
                    <a class="btn btn-link text-light p-0 mb-2 text-start" href="#about">Tentang Sekolah</a>
                    <a class="btn btn-link text-light p-0 mb-2 text-start" href="#guru">Guru</a>
                    <a class="btn btn-link text-light p-0 mb-2 text-start" href="#prestasi">Prestasi</a>
                    <a class="btn btn-link text-light p-0 mb-2 text-start" href="#testimoni">Testimoni</a>
                </div>
            </div>

            <!-- Maps -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-white mb-4 text-center">Lokasi Kami</h5>
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.2306123445173!2d108.63262127476128!3d-7.351571692657252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f7d197699ecd7%3A0x420255777005d790!2sSMK%20Negeri%203%20Banjar!5e1!3m2!1sid!2sid!4v1757298561817!5m2!1sid!2sid"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Gallery -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-white mb-4 text-center">Gallery</h5>
                <div class="row g-2">
                    <?php $counter = 0; ?>
                    <?php while ($galeri = $resultGaleri->fetch_object()): ?>
                        <?php if ($counter < 4): ?>
                            <div class="col-6 mb-2">
                                <img class="img-fluid rounded" src="../storages/gallerie/<?= $galeri->image ?>" alt="Gallery Image">
                            </div>
                            <?php $counter++; ?>
                        <?php else: ?>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php if ($counter == 0): ?>
                        <div class="col-12">
                            <p class="text-light text-center">No gallery images</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
<style>
    .footer {
        background: linear-gradient(135deg,
                rgba(13, 110, 253, 0.95) 0%,
                rgba(0, 123, 255, 0.95) 50%,
                rgba(41, 128, 185, 0.9) 100%);
        color: white;
    }

    .footer .row {
        align-items: flex-start;
    }

    .footer h5 {
        margin-bottom: 20px;
        font-weight: bold;
        padding-bottom: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .footer p,
    .footer a {
        font-size: 14px;
        line-height: 1.6;
    }

    .footer .map-container {
        width: 100%;
        height: 200px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 0 auto; /* Memusatkan container peta */
    }

    .footer .map-container iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }

    .footer .gallery-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .footer .gallery-grid img {
        width: 100%;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .footer .gallery-grid img:hover {
        transform: scale(1.05);
    }

    .btn-link.text-light:hover {
        color: #fff !important;
        text-decoration: underline;
    }
</style>