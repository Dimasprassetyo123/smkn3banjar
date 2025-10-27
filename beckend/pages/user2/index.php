<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../user/login.php");
    exit();
}

$page = "user";
include '../../app.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// Query untuk mengambil data user
$users = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($connect, $users) or die(mysqli_error($connect));

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

    /* Additional styling for user table */
    .table th {
        background-color: #6f42c1;
        color: white;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(111, 66, 193, 0.1);
    }

    .badge-status {
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-active {
        background-color: #28a745;
        color: white;
    }

    .badge-inactive {
        background-color: #dc3545;
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
                            <h3 class="card-title">Manajemen User</h3>
                            <a href="./create.php" class="btn btn-info btn-sm">
                                <i class="bi bi-plus-circle-fill"></i> Tambah User
                            </a>
                        </div>

                        <div class="card-body table-container">
                            <!-- Table Controls -->
                            <table id="usersTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Password</th>
                                        <th width="200">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($user = $result->fetch_object()):
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td class="text-capitalize"><?= $user->name ?></td>
                                            <td><?= $user->email ?></td>
                                            <td><?= $user->role ?></td>
                                            <td>
                                                <span class="badge badge-primary text-dark"><?= $user->password ?></span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="./edit.php?id=<?= $user->id ?>" class="btn btn-warning btn-xs flex-fill">
                                                        <i class="bi bi-pen-fill"></i> Edit
                                                    </a>
                                                    <a href="../../action/user2/destroy.php?id=<?= $user->id ?>"
                                                        class="btn btn-danger btn-xs"
                                                        onclick="return confirm('Apakah Anda Yakin ingin menghapus user ini?')">
                                                        <i class="bi bi-trash3-fill"></i> Hapus
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>

                            <!-- Table Footer -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="dataTables_paginate float-right">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"><a href="#" class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#" class="page-link">1</a></li>
                                            <li class="paginate_button page-item"><a href="#" class="page-link">2</a></li>
                                            <li class="paginate_button page-item next"><a href="#" class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    // Select All checkbox functionality
    document.getElementById('selectAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.user-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>