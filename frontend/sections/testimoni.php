<?php
include '../config/connection.php';

$qtestimoni = "SELECT * FROM testimonials";
$result = mysqli_query($connect, $qtestimoni) or die(mysqli_error($connect));

$testimonials = [];
while ($item = mysqli_fetch_object($result)) {
    $testimonials[] = $item;
}

if (count($testimonials) === 0) {
    $testimonials = [
        (object)[
            'name' => 'AGUS',
            'status' => 'Pelajar SMKN 3 BANJAR',
            'massage' => 'Bersekolah di SMKN 3 Banjar adalah pengalaman yang sangat berharga. Guru-guru yang kompeten dan fasilitas yang lengkap membantu saya mengembangkan keterampilan praktis yang slap untuk dunia kerja.',
            'image' => 'default.jpg'
        ]
    ];
}
?>
<div id="testimoni" class="container-fluid pt-6 pb-6">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 text-uppercase mb-5">Testimoni</h1>
        </div>
        <div class="testimonial-marquee">
            <div class="testimonial-marquee-inner">
                <?php foreach ($testimonials as $item): ?>
                    <div class="testimonial-item">
                        <div class="testimonial-img-container">
                            <img class="testimonial-img-small" src="../storages/testimoni/<?= $item->image ?>" alt="<?= $item->name ?>">
                        </div>
                        <div class="mb-2">
                            <?php for ($i = 0; $i < $item->rating; $i++): ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                        </div>

                        <h5 class="text-uppercase"><?= $item->name ?></h5>
                        <span><?= $item->status ?></span>
                        <p class="fs-6">"<?= $item->massage ?>"</p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<style>
    #testimoni {
        scroll-margin-top: 90px;

    }

    .testimonial-marquee {
        overflow: hidden;
        width: 100%;
        position: relative;
    }

    .testimonial-marquee-inner {
        display: flex;
        gap: 30px;
        animation: scroll-left 30s linear infinite;
    }

    .testimonial-marquee-inner .testimonial-item {
        flex: 0 0 300px;
        background: #f8f9fa;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        text-align: center;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .testimonial-img-container {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }

    .testimonial-img-small {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @keyframes scroll-left {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }

        /* scroll setengah karena duplikasi */
    }

    .fas.fa-star {
        color: #0d6efd !important;
        margin: 2px;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const marqueeInner = document.querySelector('.testimonial-marquee-inner');
        const items = Array.from(marqueeInner.children);

        // duplikat semua item agar animasi seamless
        items.forEach(item => {
            const clone = item.cloneNode(true);
            marqueeInner.appendChild(clone);
        });
    });
</script>