<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>
        alert('Anda belum login');
        window.location.href='../user/login.php';
    </script>";
    exit();
}
$page = "guru";
include '../../app.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// Query Guru
$teachers = "SELECT * FROM teachers ORDER BY id DESC";
$result = mysqli_query($connect, $teachers) or die(mysqli_error($connect));
$num_rows = mysqli_num_rows($result);
?>

<style>
    .card-purple .card-header {
        background: #cfc1e9ff;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 15px 20px;
    }
    .content-wrapper {
        padding-top: 20px;
        min-height: calc(100vh - 150px) !important;
        padding-bottom: 40px;
    }
    .card-header-with-button {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
    }
    .d-flex {
        gap: 8px;
    }
    .d-flex .btn {
        flex: 1;
        min-width: 80px;
        padding: 6px 10px;
        font-size: 13px;
    }
    .table thead th {
        background: #cfc1e9ff;
        color: white;
        vertical-align: middle;
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-5">
                    <div class="card card-purple mt-4">
                        <!-- Header -->
                        <div class="card-header card-header-with-button">
                            <h3 class="card-title">Guru</h3>
                            <a href="./create.php" class="btn btn-primary">Tambah Data</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="teachersTable" class="table table-bordered table-striped table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th width="120">Gambar</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Mapel</th>
                                            <th width="200">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($num_rows > 0): ?>
                                            <?php $no = 1; while ($item = $result->fetch_object()): ?>
                                                <tr>
                                                    <td class="align-middle"><?= $no ?></td>
                                                    <td class="align-middle">
                                                        <img src="../../../storages/guru/<?= $item->teachers_photo ?>"
                                                             alt="gambar" width="100" height="100"
                                                             style="object-fit: cover; border-radius: 5px;">
                                                    </td>
                                                    <td class="text-uppercase align-middle"><?= $item->teachers_name ?></td>
                                                    <td class="align-middle"><?= $item->jk ?></td>
                                                    <td class="text-uppercase align-middle"><?= $item->teachers_major ?></td>
                                                    <td class="align-middle">
                                                        <div class="d-flex">
                                                            <a href="./detaile.php?id=<?= $item->id ?>" class="btn btn-success btn-xs">
                                                                <i class="bi bi-search"></i> Detail
                                                            </a>
                                                            <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning btn-xs flex-fill">
                                                                <i class="bi bi-pen-fill"></i> Edit
                                                            </a>
                                                            <?php if ($_SESSION['role'] === 'superadmin'): ?>
                                                                <a href="../../action/guru/destroy.php?id=<?= $item->id ?>"
                                                                   class="btn btn-danger btn-xs flex-fill"
                                                                   onclick="return confirm('Apakah Anda Yakin')">
                                                                    <i class="bi bi-trash3-fill"></i> Hapus
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $no++; endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center py-4">
                                                    <i class="bi bi-search display-4 text-muted d-block mb-2"></i>
                                                    <h5 class="text-muted">Data tidak ditemukan</h5>
                                                    <a href="./index.php" class="btn btn-primary btn-sm">
                                                        Tampilkan Semua Guru
                                                    </a>
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
        </div>
    </section>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>

<!-- Inisialisasi DataTables -->
<script>
$(document).ready(function() {
    $('#teachersTable').DataTable({
        responsive: true,
        pageLength: 5, // tampilkan 5 data per halaman
        lengthMenu: [5, 10, 25, 50],
        dom: '<"d-flex justify-content-between align-items-center mb-3"Bf>rt<"d-flex justify-content-between align-items-center mt-3"lip>',
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
            paginate: { 
                first: "Pertama", 
                last: "Terakhir", 
                next: "›", 
                previous: "‹" 
            }
        }
    });
});
</script>

