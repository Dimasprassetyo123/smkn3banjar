<?php
session_start();

$page = "about";
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Sekolah</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card card-purple">
                        <div class="card-body">
                            <?php
                            include '../../action/about/show.php';
                            ?>
                            <form action="../../action/about/update.php?id=<?= $school->id ?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="school_name">Nama Sekolah</label>
                                            <input type="text" name="school_name" class="form-control" id="school_name"
                                                value="<?= $school->school_name ?>" required>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="school_tagline">Tagline Sekolah</label>
                                            <input type="text" name="school_tagline" class="form-control" id="school_tagline"
                                                value="<?= $school->school_tagline ?>" required>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="since">Tahun Berdiri</label>
                                            <input type="date" name="since" class="form-control" id="since"
                                                value="<?= $school->since ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="from-group mb-3">
                                            <img src="../../../storages/about/<?= $school->school_logo ?>" alt="Gambar" width="100px" height="100" class="mb-3">
                                            <input type="file" name="school_logo" class="form-control" id="school_logoInput">
                                        </div>

                                        <div class="form-group">
                                            <img src="../../../storages/about/<?= $school->school_banner ?>" alt="Gambar" width="100px" height="100" class="mb-3">
                                            <input type="file" name="school_banner" class="form-control" id="school_bannerInput">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat" rows="3" required><?= $school->alamat ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="school_description">Deskripsi Sekolah</label>
                                    <textarea name="school_description" class="form-control" id="school_description" rows="5" required><?= $school->school_description ?></textarea>
                                </div>

                                <div class="d-flex gap-3 mt-4">
                                    <button type="submit" class="btn btn-success" name="tombol">
                                        <i class="fas fa-save"></i> Simpan Perubahan
                                    </button>
                                    <a href="index.php" class="btn btn-primary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include '../../partials/footer.php';
    include '../../partials/script.php';
    ?>