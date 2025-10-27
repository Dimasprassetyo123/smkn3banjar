<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>
        alert('Anda belum login');
        window.location.href='../user/login.php';
    </script>";
    exit();
}
if ($_SESSION['role'] !== 'staff') {
   
}

$page = "about";
include '../../app.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

$qAbouts = "SELECT * FROM abouts";
$result = mysqli_query($connect, $qAbouts) or die(mysqli_error($connect));

// Hitung jumlah data
$num_rows = mysqli_num_rows($result);
?>

<style>
    .card-purple .card-header {
        background: #cfc1e9ff;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 15px 20px;
    }

    /* CSS untuk menurunkan posisi tabel */
    .content-wrapper {
        padding-top: 40px;
        /* Tambahkan padding atas untuk menurunkan konten */
    }

    .card.mt-4 {
        margin-top: 30px !important;
        /* Jarak dari atas yang lebih besar */
    }

    .table-container {
        margin-top: 25px;
        /* Jarak tambahan untuk tabel */
    }

    /* Pastikan footer tetap di bawah */
    .content-wrapper {
        min-height: calc(100vh - 150px) !important;
        padding-bottom: 40px;
    }

    /* Perbaikan posisi tombol tambah data */
    .card-header-with-button {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
    }

    .d-flex .btn {
        flex: 1;
        /* semua tombol sama lebar */
        min-width: 80px;
        /* kasih batas minimum */
        padding: 8px 0;
        /* tinggi tombol lebih besar */
        font-size: 14px;
        /* teks lebih jelas */
    }

    .d-flex {
        gap: 8px;
        /* jarak antar tombol */
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card card-purple mt-5">
                        <!-- PERBAIKAN: Tombol dipindahkan ke dalam card-header -->
                        <div class="card-header card-header-with-button">
                            <h3 class="card-title">Daftar Sekolah</h3>
                                <a href="./create.php" class="btn btn-primary">Tambah Data</a>
                        </div>

                        <div class="card-body table-container">
                            <table id="schoolTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th>Logo Sekolah</th>
                                        <th>Nama Sekolah</th>
                                        <th>Alamat</th>
                                        <th width="200">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($item = $result->fetch_object()):

                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>

                                            <td>
                                                <img src="../../../storages/about/<?= $item->school_logo ?>"
                                                    alt="gambar" width="100" height="100">
                                            </td>
                                            <td class="text-uppercase"><?= $item->school_name ?></td>
                                            <td class="text-uppercase"><?= $item->alamat ?></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="./detaile.php?id=<?= $item->id ?>" class="btn btn-success">
                                                        <i class="bi bi-search"></i> Detail</a>
                                                    <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning btn-xs flex-fill">
                                                        <i class="bi bi-pen-fill"></i> Edit</a>
                                                    <?php if ($_SESSION['role'] === 'admin'): ?>
                                                    <a href="../../action/about/destroy.php?id=<?= $item->id ?>"
                                                        class="btn btn-danger btn-xs"
                                                        onclick="return confirm('Apakah Anda Yakin')">
                                                        <i class="bi bi-trash3-fill"></i> Hapus
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php
                                        $no++;
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>
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