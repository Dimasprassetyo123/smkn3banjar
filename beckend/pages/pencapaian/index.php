<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>
        alert('Anda belum login');
        window.location.href='../user/login.php';
    </script>";
    exit();
}

$page = "pencapaian";
include '../../app.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($connect, $_GET['keyword']) : "";

// Modifikasi query untuk menambahkan pencarian
if (!empty($keyword)) {
    $qAchievements = "SELECT * FROM achievements WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%'";
} else {
    $qAchievements = "SELECT * FROM achievements ORDER BY id DESC";
}

$result = mysqli_query($connect, $qAchievements) or die(mysqli_error($connect));
$num_rows = mysqli_num_rows($result);
?>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

<style>
    .card-purple .card-header {
        background: #cfc1e9ff;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 15px 20px;
    }
    .content-wrapper {
        padding-top: 40px;
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

    .search-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .search-box {
        width: 60%;
        position: relative;
    }
    .search-box input {
        width: 100%;
        padding: 12px 50px 12px 20px;
        border: none;
        border-radius: 30px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        font-size: 16px;
    }
    .search-button {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #6c757d;
        cursor: pointer;
    }
    .search-title {
        text-align: center;
        color: black;
        margin-bottom: 15px;
        font-weight: bold;
        font-size: 18px;
    }
    @media (max-width: 768px) {
        .card-header-with-button { flex-direction: column; align-items: flex-start; }
        .search-box { width: 90%; }
        .table-responsive { overflow-x: auto; }
        .d-flex { flex-direction: column; gap: 5px; }
        .d-flex .btn { width: 100%; }
        img { max-width: 80px; height: auto; }
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card card-purple mt-5">
                        <div class="card-header card-header-with-button">
                            <h3 class="card-title">Prestasi Siswa</h3>
                            <a href="./create.php" class="btn btn-primary">Tambah Data</a>
                        </div>

                        <div class="card-body table-container">

                            <table id="pencapaianTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th width="250">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($num_rows > 0): ?>
                                        <?php $no = 1; while ($item = $result->fetch_object()): ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><img src="../../../storages/pencapaian/<?= $item->image ?>" alt="gambar" width="100" height="100" style="object-fit: cover;"></td>
                                                <td class="text-uppercase"><?= $item->title ?></td>
                                                <td class="text-uppercase"><?= substr($item->description, 0, 100) . (strlen($item->description) > 100 ? '...' : '') ?></td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="./detaile.php?id=<?= $item->id ?>" class="btn btn-success btn-xs"><i class="bi bi-eye-fill"></i> Detail</a>
                                                        <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning btn-xs"><i class="bi bi-pen-fill"></i> Edit</a>
                                                        <?php if ($_SESSION['role'] === 'admin'): ?>
                                                            <a href="../../action/pencapaian/destroy.php?id=<?= $item->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin?')"><i class="bi bi-trash3-fill"></i> Hapus</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $no++; endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                <i class="bi bi-search display-4 text-muted d-block mb-2"></i>
                                                <h5 class="text-muted">Data tidak ditemukan</h5>
                                                <p class="text-muted">Tidak ada pencapaian yang sesuai dengan pencarian "<?= htmlspecialchars($keyword) ?>"</p>
                                                <a href="./index.php" class="btn btn-primary btn-sm">Tampilkan Semua Pencapaian</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
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

<script>
$(document).ready(function() {
    $('#pencapaianTable').DataTable({
        responsive: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', text: '<i class="bi bi-clipboard"></i> Salin' },
            { extend: 'csv', text: '<i class="bi bi-filetype-csv"></i> CSV' },
            { extend: 'excel', text: '<i class="bi bi-file-earmark-excel"></i> Excel' },
            { extend: 'pdf', text: '<i class="bi bi-file-earmark-pdf"></i> PDF' },
            { extend: 'print', text: '<i class="bi bi-printer"></i> Cetak' },
            { extend: 'colvis', text: '<i class="bi bi-eye"></i> Kolom' }
        ],
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: { first: "Pertama", last: "Terakhir", next: "›", previous: "‹" }
        }
    });
});
</script>
