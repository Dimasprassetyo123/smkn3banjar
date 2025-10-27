<?php
$page = "about";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
include '../../action/about/show.php'; // ambil data $school dari DB
?>

<style>
    .school-card {
        border: 2px solid #e0d4f6;
        border-radius: 12px;
        background: #fff;
        padding: 1.5rem;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        margin-top: 2rem;
    }

    .school-header {
        background: #d7c3f1;
        padding: 0.8rem 1.2rem;
        border-radius: 8px 8px 0 0;
        font-weight: 600;
        color: #4b2c80;
    }

    .school-body {
        padding: 2rem;
    }

    /* Logo */
    .school-logo img {
        max-width: 180px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        display: block;
    }

    .school-item {
        margin-bottom: 1.2rem;
    }

    /* Banner */
    .school-banner-wrapper {
        margin-top: 2rem;
        text-align: center;
    }

    .school-banner {
        max-width: 400px;
        /* atur ukuran banner */
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }


    /* Label & Value */
    .school-label {
        font-weight: 600;
        color: #444;
        display: block;
        margin-bottom: 0.3rem;
    }

    .school-value {
        font-size: 1rem;
        padding: 0.7rem 1rem;
        background: #f9f9fb;
        border-radius: 8px;
        border: 1px solid #e2e2e8;
        color: #333;
    }

    /* Tombol */
    .school-actions {
        margin-top: 2rem;
        text-align: right;
    }

    .school-actions .btn {
        padding: 0.6rem 1.4rem;
        border-radius: 6px;
        font-weight: 500;
    }

    .btn-edit {
        background: #0097a7;
        color: #fff;
        border: none;
    }

    .btn-edit:hover {
        background: #007c8a;
    }

    .btn-back {
        background: #6c757d;
        color: #fff;
        border: none;
        margin-left: 0.5rem;
    }

    .btn-back:hover {
        background: #5a6268;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .school-body .d-flex {
            flex-direction: column;
            align-items: center;
        }

        .school-logo,
        .school-info {
            max-width: 100%;
            text-align: center;
        }

        .school-logo {
            margin-bottom: 1.5rem;
        }
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h4 class="fw-bold" style="color:#4b2c80;">Detail Informasi Sekolah</h4>
        </div>
    </section>

    <section class="content">
        <div class="col p-5">
            <div class="container-fluid">
                <div class="school-card">
                    <div class="school-header">
                        Profil Sekolah
                    </div>
                    <div class="school-body">

                        <div class="school-body d-flex align-items-start gap-4">
                            <!-- Kolom Logo -->
                            <div class="school-logo">
                                <?php if (!empty($school->school_logo) && file_exists("../../../storages/about/" . $school->school_logo)): ?>
                                    <img src="../../../storages/about/<?= htmlspecialchars($school->school_logo) ?>" alt="Logo Sekolah">
                                <?php else: ?>
                                    <img src="../../../storages/default-logo.png" alt="Default Logo">
                                <?php endif; ?>
                            </div>

                            <!-- Kolom Informasi -->
                            <div class="school-info flex-grow-1">
                                <div class="school-item">
                                    <span class="school-label">Nama Sekolah</span>
                                    <div class="school-value"><?= htmlspecialchars($school->school_name) ?></div>
                                </div>

                                <div class="school-item">
                                    <span class="school-label">Tagline</span>
                                    <div class="school-value"><?= htmlspecialchars($school->school_tagline) ?></div>
                                </div>

                                <div class="school-item">
                                    <span class="school-label">Tahun Berdiri</span>
                                    <div class="school-value"><?= htmlspecialchars($school->since) ?></div>
                                </div>

                                <div class="school-item">
                                    <span class="school-label">Alamat</span>
                                    <div class="school-value"><?= htmlspecialchars($school->alamat) ?></div>
                                </div>

                                <div class="school-item">
                                    <span class="school-label">Deskripsi Sekolah</span>
                                    <div class="school-value"><?= nl2br(htmlspecialchars($school->school_description)) ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Banner di bawah form -->
                        <div class="school-banner-wrapper">
                            <?php if (!empty($school->school_banner) && file_exists("../../../storages/about/" . $school->school_banner)): ?>
                                <img src="../../../storages/about/<?= htmlspecialchars($school->school_banner) ?>"
                                    alt="Banner Sekolah"
                                    class="school-banner">
                            <?php endif; ?>
                        </div>

                        <!-- Tombol -->
                        <div class="school-actions">
                            <a href="edit.php?id=<?= $school->id ?>" class="btn btn-edit">Edit Data</a>
                            <a href="index.php" class="btn btn-back">Kembali ke Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>