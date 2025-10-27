<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>
        alert('Anda belum login');
        window.location.href='../user/login.php';
    </script>";
    exit();
}
$page = "sosialmedia";
include '../../app.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

$qsocmed = "SELECT * FROM social_media";
$result = mysqli_query($connect, $qsocmed) or die(mysqli_error($connect));
?>

<style>
    .card-purple .card-header {
        background: #cfc1e9ff;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 15px 20px;
    }

    .content-wrapper {
        padding-top: 40px;
    }

    .card.mt-4 {
        margin-top: 30px !important;
    }

    .table-container {
        margin-top: 25px;
    }

    .content-wrapper {
        min-height: calc(100vh - 150px) !important;
        padding-bottom: 40px;
    }

    .card-header-with-button {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
    }

    .d-flex .btn {
        flex: 1;
        min-width: 80px;
        padding: 8px 0;
        font-size: 14px;
    }

    .d-flex {
        gap: 8px;
    }

    /* STYLE UNTUK ICON */
    .social-icon {
        font-size: 24px;
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        border-radius: 50%;
        background: #6f42c1;
        color: white;
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card card-purple mt-5">
                        <div class="card-header card-header-with-button">
                            <h3 class="card-title">Sosmed Sekolah</h3>

                            <a href="./create.php" class="btn btn-primary">Tambah Data</a>

                        </div>

                        <div class="card-body table-container">
                            <table id="socmedTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th>Ikon</th>
                                        <th>Nama</th>
                                        <th>Link</th>
                                        <th width="150">Aksi</th>
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
                                                <!-- TAMPILKAN ICON, BUKAN TEKS -->
                                                <i class="<?= htmlspecialchars($item->icon) ?>" style="font-size:2rem"></i>
                                            </td>
                                            <td><?= htmlspecialchars($item->title) ?></td>
                                            <td>
                                                <a href="<?= htmlspecialchars($item->link_url) ?>" target="_blank"
                                                    class="text-truncate d-inline-block" style="max-width: 200px;">
                                                    <?= htmlspecialchars($item->link_url) ?>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning btn-xs flex-fill">
                                                        <i class="bi bi-pen-fill"></i> Edit
                                                    </a>

                                                    <?php if ($_SESSION['role'] === 'admin'): ?>
                                                        <a href="../../action/socmed/destroy.php?id=<?= $item->id ?>"
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