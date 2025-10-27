<?php
include '../config/connection.php';

// Query untuk mengambil data guru (hanya 4 yang pertama)
$qguru = "SELECT * FROM teachers LIMIT 4";
$result = mysqli_query($connect, $qguru) or die(mysqli_error($connect));

// Query untuk menghitung total guru
$qcount = "SELECT COUNT(*) as total FROM teachers";
$count_result = mysqli_query($connect, $qcount);
$total_teachers = $count_result->fetch_object()->total;
?>


<div id="guru" class="container-fluid team pt-6 pb-6">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 text-uppercase mb-5">GURU SMKN 3 BANJAR</h1>
        </div>

        <!-- Card Guru -->
        <div class="row g-4">
            <?php while ($item = $result->fetch_object()): ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item h-100 d-flex flex-column">
                        <!-- Foto -->
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100"
                                src="../storages/guru/<?= $item->teachers_photo ?>"
                                alt="<?= $item->teachers_name ?>"
                                style="height: 300px; object-fit: cover;">
                        </div>

                        <!-- Isi -->
                        <div class="text-center p-4 flex-grow-1 d-flex flex-column justify-content-center">
                            <h5 class="mb-2"><?= $item->teachers_name ?></h5>
                            <span class="d-block"><?= $item->teachers_major ?></span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Tombol Lihat Semua -->
         <div class="text-center mt-5">
            <a href="sections/semuaguru.php" class="btn-lihat-semuanya">
                <i class="fas fa-newspaper"></i> LIHAT SEMUA GURU
                <span class="guru-count"><?= $total_teachers ?>+</span>
            </a>
        </div>
    </div>
</div>

<style>
    #guru {
        scroll-margin-top: 90px;
        background: linear-gradient(135deg, #e1e6ebff 0%, #e9ecef 100%);
    /* atau sesuai tema */
    }

    .guru-count {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        padding: 6px 14px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 13px;
        margin-left: 10px;
        box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
    }

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
        box-shadow: 0 15px 35px rgba(9, 134, 218, 1);
        border-color: #3498db;
    }

    .team-item img {
        height: 300px;
        object-fit: cover;
        width: 100%;
    }

    /* Tombol "Lihat Semua Guru" */
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
</style>