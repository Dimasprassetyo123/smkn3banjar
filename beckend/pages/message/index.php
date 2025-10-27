<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>
        alert('Anda belum login');
        window.location.href='../user/login.php';
    </script>";
    exit();
}

include '../../app.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

$qmessage = "SELECT * FROM messages ORDER BY id DESC";
$result = mysqli_query($connect, $qmessage) or die(mysqli_error($connect));

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
                            <h3 class="card-title">Pesan</h3>
                        </div>

                        <div class="card-body table-container">
                            <table id="contactsTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Pesan</th>
                                        <?php if ($_SESSION['role'] === 'admin'): ?>
                                            <th width="200">Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($item = $result->fetch_object()):
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $item->name ?></td>
                                            <td><?= $item->email ?></td>
                                            <td><?= $item->message ?></td>
                                            <?php if ($_SESSION['role'] === 'admin'): ?>
                                                <td>
                                                    <a href="../../action/message/destroy.php?id=<?= $item->id ?>" class="btn btn-danger"
                                                        oneclick="return confirm ('Apakah anda yakin?')">Hapus</a>
                                                </td>
                                            <?php endif; ?>
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