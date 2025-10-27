<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>
        alert('Anda belum login');
        window.location.href='../user/login.php';
    </script>";
    exit();
}

$page = "blog";
include '../../app.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

$blog = "SELECT * FROM blogs ORDER BY id DESC";
$result = mysqli_query($connect, $blog) or die(mysqli_error($connect));

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
    }

    .card.mt-4 {
        margin-top: 30px !important; /* Jarak dari atas yang lebih besar */
    }

    .table-container {
        margin-top: 25px;/* Jarak tambahan untuk tabel */
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
        flex: 1; /* semua tombol sama lebar */
        min-width: 80px; /* kasih batas minimum */
        padding: 8px 0; /* tinggi tombol lebih besar */
        font-size: 14px; /* teks lebih jelas */
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
                            <h3 class="card-title">Blog</h3>

                            <a href="./create.php" class="btn btn-primary">Tambah Data</a>

                        </div>

                        <div class="card-body table-container">
                            <table id="blogsTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Konten</th>
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
                                                <img src="../../../storages/blog/<?= $item->image ?>"
                                                    alt="gambar" width="100" height="100">
                                            </td>
                                            <td class="text-uppercase"><?= $item->title ?></td>
                                            <td class="text-uppercase"><?= $item->content ?></td>
                                            <td>

                                                <div class="d-flex gap-2">
                                                    <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning btn-xs flex-fill">
                                                        <i class="bi bi-pen-fill"></i> Edit</a>
                                                        
                                                    <?php if ($_SESSION['role'] === 'admin'): ?>
                                                        <a href="../../action/blog/destroy.php?id=<?= $item->id ?>"
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