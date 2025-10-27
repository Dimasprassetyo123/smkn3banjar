<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    echo "<script>
        alert('Anda belum login');
        window.location.href='../user/login.php';
    </script>";
    exit();
}

require '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<style>
    /* Mengatur layout utama */
    .wrapper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    
    .content-wrapper {
        flex: 1;
        padding: 30px;
        padding-bottom: 80px;
    }
    
    /* Section Aktivitas Login & Logout */
    .activities-section {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .card-activities {
        transition: 0.3s;
        border-radius: 8px;
        overflow: hidden;
        margin-top: 30px;
    }

    .card-activities:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, .15) !important;
    }

    /* Header card dengan gradient ungu */
    .card-header-purple {
        background: #cfc1e9ff;
        border: none;
        padding: 15px 20px;
    }

    .table-activities th {
        background: #cfc1e9ff;
        color: white;
        font-weight: 600;
        text-align: center;
        padding: 12px 10px;
    }

    .table-activities td {
        vertical-align: middle;
        padding: 12px 10px;
        text-align: center;
    }

    .table-activities tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table-activities tr:hover {
        background-color: #e9ecef;
    }

    .table-activities .badge {
        font-size: 0.85rem;
        padding: 0.4em 0.6em;
    }
    
    /* Footer styling */
    .main-footer {
        background-color: #f8f9fa;
        padding: 15px;
        border-top: 1px solid #dee2e6;
        margin-top: auto;
    }
    
    /* DataTables customization - Search box di kanan */
    .dataTables_wrapper {
        margin-top: 20px;
    }
    
    .dataTables_filter {
        float: right !important;
        text-align: right !important;
    }
    
    .dataTables_filter input {
        border-radius: 4px;
        border: 1px solid #ced4da;
        padding: 5px 10px;
        margin-left: 5px;
        display: inline-block;
        width: auto;
    }
    
    .dataTables_length {
        float: left;
    }
    
    /* Spacing tambahan untuk card body */
    .card-body {
        padding: 25px;
    }
    
    /* Responsivitas untuk mobile */
    @media (max-width: 768px) {
        .table-activities {
            font-size: 14px;
        }
        
        .table-activities th, 
        .table-activities td {
            padding: 8px 5px;
        }
        
        .content-wrapper {
            padding: 20px;
            padding-bottom: 70px;
        }
        
        .activities-section {
            margin-top: 30px;
        }
        
        .dataTables_filter {
            float: none !important;
            text-align: left !important;
            margin-top: 10px;
        }
        
        .dataTables_length {
            float: none;
            margin-bottom: 10px;
        }
    }
</style>

<div class="wrapper">
    <div class="content-wrapper">
        <!-- Tambahkan div kosong untuk spacing atas -->
        <div style="height: 20px;"></div>
        
        <div class="row activities-section">
            <div class="col-12 p-5">
                <div class="card card-activities">
                    <div class="card-header card-header-purple d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-dark">
                            <i class="mdi mdi-account-clock me-2"></i>Aktivitas Login & Logout
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="activityTable" class="table table-bordered table-activities">
                                <thead>
                                    <tr>
                                        <th width="60">No</th>
                                        <th>Nama / Email</th>
                                        <th>Waktu Login</th>
                                        <th>Waktu Logout</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qActivities = "
                                        SELECT u.name, u.email, s.login_at, s.logout_at
                                        FROM user_sessions s
                                        JOIN users u ON u.id = s.user_id
                                        ORDER BY s.login_at DESC
                                        LIMIT 20
                                    ";

                                    $resAct = mysqli_query($connect, $qActivities);

                                    if ($resAct && mysqli_num_rows($resAct) > 0):
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($resAct)):
                                            $nama   = $row['name'] ?? '-';
                                            $email  = $row['email'] ?? '-';

                                            $login  = $row['login_at'] ? date("d M Y H:i", strtotime($row['login_at'])) : '-';
                                            $logout = $row['logout_at'] ? date("d M Y H:i", strtotime($row['logout_at'])) : '<span class="badge bg-warning text-dark">Belum Logout</span>';
                                    ?>
                                            <tr>
                                                <td class="fw-bold"><?= $no++ ?></td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-semibold"><?= htmlspecialchars($nama) ?></span>
                                                        <small class="text-muted"><?= htmlspecialchars($email) ?></small>
                                                    </div>
                                                </td>
                                                <td><?= $login ?></td>
                                                <td><?= $logout ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-4">
                                                <i class="mdi mdi-account-clock-outline me-2"></i>
                                                Belum ada aktivitas login / logout
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
        
        <!-- Tambahkan div kosong untuk spacing bawah -->
        <div style="height: 30px;"></div>
    </div>

    <?php
    include '../../partials/footer.php';
    include '../../partials/script.php';
    ?>
</div>

<!-- DataTables Init dengan Search di Kanan -->
<script>
    $(document).ready(function() {
        $('#activityTable').DataTable({
            responsive: true,
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50],
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "›",
                    previous: "‹"
                },
                emptyTable: "Tidak ada data yang tersedia",
                zeroRecords: "Tidak ditemukan data yang sesuai"
            },
            order: [[0, 'asc']],
            columnDefs: [
                { orderable: false, targets: [1, 2, 3] }
            ],
            initComplete: function() {
                // Memastikan search box berada di kanan
                $('.dataTables_filter').css('float', 'right');
                $('.dataTables_filter').css('text-align', 'right');
            }
        });
    });
</script>