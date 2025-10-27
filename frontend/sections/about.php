<?php
include '../config/connection.php';

$qAbouts = "SELECT * FROM abouts";
$result = mysqli_query($connect, $qAbouts) or die(mysqli_error($connect));
$item = $result->fetch_object();
?>
<style>
    #about {
        scroll-margin-top: 150px;
    }

    h1 {
        text-align: center;
        margin-bottom: 50px;
        /* Diperkecil dari 150px */
    }

    .btn-visimisi {
        background: linear-gradient(45deg, #0d6efd, #0021b3ff);
        border: none;
        border-radius: 5px;
        padding: 12px 25px;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-visimisi:hover {
        background: linear-gradient(45deg, #007ab3ff, #005494ff);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(1, 16, 33, 0.3);
        color: white;
        text-decoration: none;
    }
</style>

<div id="about" class="container-fluid pt-6 pb-6">
    <div class="container">
        <h1>TENTANG SEKOLAH</h1>
        <div class="row g-5 align-items-start">
            <div class="col-lg-6 " data-wow-delay="0.1s">
                <div style="margin-top: -15px; margin-left: -10px;">
                    <img class="img-fluid" src="../storages/about/<?= $item->school_logo ?>" style="max-width: 85%;" alt="Image">
                </div>
            </div>
            <div class="col-lg-6" data-wow-delay="0.5s">
                <h1 class="display-6 mb-4 " style="color: #000000 !important;"><?= $item->school_name ?></h1>
                <p class="mb-4"><?= $item->school_description ?></p>
                <div class="row g-5 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <a href="#visimisi" class="btn-visimisi">Visi & Misi</a>
                        </div>
                    </div>
                </div>
                <p><b> Tahun Berdiri : </b><?= date("d-m-Y", strtotime($item->since)) ?></p>
                <p><b> Alamat : </b><?= $item->alamat ?></p>

                <div class="border border-5 p-4 text-center mt-4" style="border-color:#0d6efd !important;">
                    <h4 class="lh-base text-uppercase mb-0"><?= $item->school_tagline ?></h4>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    #about {
        scroll-margin-top: 70px;
    }

    .icon-blue {
        color: #0d6efd !important;
    }

    .pt-6 {
        padding-top: 5rem !important;
    }

    .pb-6 {
        padding-bottom: 5rem !important;
    }

    .align-items-start {
        align-items: flex-start !important;
    }



    @media (max-width: 991px) {
        .about-img {
            text-align: center;
            margin-left: 0 !important;
            margin-top: 0 !important;
        }

        .about-img img {
            max-width: 70% !important;
            margin-bottom: 20px;
        }


        h1 {
            margin-bottom: 30px;
            color: #000000;
        }

        .btn-visimisi {
            padding: 10px 20px;
            font-size: 14px;
        }
    }

    @media (max-width: 576px) {
        .btn-visimisi {
            padding: 8px 16px;
            font-size: 12px;
        }
    }
</style>