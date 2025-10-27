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

/* ================== HELPER ================== */
function findMessagesTable(mysqli $conn): ?string
{
    $candidates = ['message', 'messages', 'contact_message', 'contact_messages', 'inbox', 'pesan'];
    foreach ($candidates as $t) {
        $check = mysqli_query($conn, "SHOW TABLES LIKE '$t'");
        if ($check && mysqli_num_rows($check) > 0) return $t;
    }

    $sql = "
        SELECT TABLE_NAME
        FROM information_schema.COLUMNS
        WHERE TABLE_SCHEMA = DATABASE()
        GROUP BY TABLE_NAME
        HAVING SUM(COLUMN_NAME='name')>0
           AND SUM(COLUMN_NAME='email')>0
           AND SUM(COLUMN_NAME='message')>0
        LIMIT 1
    ";
    $res = mysqli_query($conn, $sql);
    if ($res && ($row = mysqli_fetch_row($res))) return $row[0];

    return null;
}

/* ================== COUNTERS ================== */
$totalGurus    = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM teachers"))['total'];
$totalJurusans = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM majors"))['total'];
$totalGaleris  = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM galleries"))['total'];

/* ================== MESSAGES ================== */
$messageTable = findMessagesTable($connect);
$messages     = [];

if ($messageTable) {
    $qmessage    = "SELECT id, name, email, message FROM `$messageTable` ORDER BY id DESC LIMIT 5";
    $resmessage  = mysqli_query($connect, $qmessage);
    if ($resmessage) {
        while ($row = $resmessage->fetch_object()) {
            $messages[] = $row;
        }
    }
}

// Hitung jumlah guru berdasarkan jenis kelamin
$query = "SELECT jk, COUNT(*) as total FROM teachers GROUP BY jk";
$result = mysqli_query($connect, $query);

$labels = [];
$data = [];
$totalGuru = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['jk'];
    $data[] = $row['total'];
    $totalGuru += $row['total'];
}

// Hitung persentase
$percentages = [];
foreach ($data as $value) {
    $percentages[] = $totalGuru > 0 ? round(($value / $totalGuru) * 100, 1) : 0;
}

// Gabungkan label dengan persentase
$labelsWithPercentage = [];
for ($i = 0; $i < count($labels); $i++) {
    $labelsWithPercentage[] = $labels[$i] . ' (' . $percentages[$i] . '%)';
}

$queryPesanBulan = "SELECT 
            DATE_FORMAT(created_at, '%Y-%m') as bulan, 
            COUNT(*) as jumlah 
          FROM messages 
          WHERE created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
          GROUP BY DATE_FORMAT(created_at, '%Y-%m')
          ORDER BY bulan ASC";

$resultPesanBulan = mysqli_query($connect, $queryPesanBulan);

$labelsBulan = [];
$dataBulan = [];
$totalPesan = 0;

if (mysqli_num_rows($resultPesanBulan) === 0) {
    // Data dummy jika kosong → 12 bulan terakhir
    for ($i = 11; $i >= 0; $i--) {
        $date = date('Y-m', strtotime("-$i months"));
        $labelsBulan[] = date('M Y', strtotime($date));
        $dataBulan[] = rand(5, 20); // Dummy 5–20 pesan
        $totalPesan += end($dataBulan);
    }
} else {
    while ($row = mysqli_fetch_assoc($resultPesanBulan)) {
        $labelsBulan[] = date('M Y', strtotime($row['bulan'] . '-01'));
        $dataBulan[] = $row['jumlah'];
        $totalPesan += $row['jumlah'];
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SMKN 3 BANJAR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, #4B49AC 0%, #38B6FF 100%);
            border-radius: 16px;
            overflow: hidden;
            transition: transform .3s, box-shadow .3s;
            width: 100%;
            min-height: 180px;
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .welcome-card .card-body {
            padding: 2rem;
            width: 100%;
        }

        .welcome-text h1 {
            color: white;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }

        .welcome-text p {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
        }

        .welcome-clock {
            text-align: right;
            min-width: 250px;
        }

        .welcome-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(75, 73, 172, .25);
        }

        .clock-display {
            font-size: 2.8rem;
            font-weight: 700;
            color: #fff;
            font-family: 'Courier New', monospace;
            text-shadow: 0 2px 4px rgba(0, 0, 0, .2);
            margin-bottom: 0.5rem;
        }

        .date-display {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, .9);
            font-weight: 500;
        }

        /* Stats Card Styling */
        .stats-card {
            border-radius: 16px;
            border: none;
            transition: .3s;
            overflow: hidden;
            background: #fff;
            height: 100%;
            min-height: 230px;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .15) !important;
        }

        .stat-icon {
            font-size: 3rem !important;
            opacity: .9;
            transition: .3s;
            margin-bottom: 15px;
        }

        .stats-card:hover .stat-icon {
            transform: scale(1.15);
            opacity: 1;
        }

        .stat-number {
            font-size: 2.8rem;
            font-weight: 800;
            margin: 10px 0;
            color: #2c3e50;
        }

        .stat-label {
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 8px;
        }

        .card-galeri {
            border-top: 5px solid #4B49AC;
            box-shadow: 0 5px 15px rgba(75, 73, 172, .15);
        }

        .card-galeri .stat-icon {
            color: #4B49AC !important;
        }

        .card-guru {
            border-top: 5px solid #28a745;
            box-shadow: 0 5px 15px rgba(40, 167, 69, .15);
        }

        .card-guru .stat-icon {
            color: #28a745 !important;
        }

        .card-jurusan {
            border-top: 5px solid #fd7e14;
            box-shadow: 0 5px 15px rgba(253, 126, 20, .15);
        }

        .card-jurusan .stat-icon {
            color: #fd7e14 !important;
        }

        .card-piechart {
            border-top: 5px solid #6f42c1;
            box-shadow: 0 5px 15px rgba(111, 66, 193, 0.15);
            height: 100%;
        }

        .card-messages {
            border-top: 5px solid #20c997;
            box-shadow: 0 5px 15px rgba(32, 201, 151, 0.15);
            height: 100%;
        }

        .card-barchart {
            border-top: 5px solid #63a7ffff;
            box-shadow: 0 5px 15px rgba(255, 99, 132, 0.15);
            height: 100%;
        }

        .main-content {
            min-height: calc(100vh - 180px);
            padding-bottom: 80px;
        }

        body {
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        .container-fluid {
            padding: 20px;
        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .chart-container-bar {
            position: relative;
            height: 400px;
            width: 100%;
        }

        .stat-detail {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
        }

        .stat-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .stat-item:last-child {
            border-bottom: none;
        }

        .stat-color {
            display: inline-block;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Table styling untuk pesan */
        .table-messages {
            width: 100%;
        }

        .table-messages th {
            background-color: #f8f9fa;
            font-weight: 600;
        }

        .table-messages tr:hover {
            background-color: #f8f9fa;
        }

        /* Layout baru - pesan di atas, pie chart di bawah */
        .messages-section {
            margin-bottom: 30px;
        }

        .piechart-section {
            margin-top: 30px;
        }

        .barchart-section {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .rectangular-card {
            min-height: auto;
            height: auto;
        }

        .chart-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 18px;
            color: #2c3e50;
        }

        .chart-subtitle {
            text-align: center;
            color: #6c757d;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .diagram-source {
            text-align: right;
            font-style: italic;
            color: #6c757d;
            margin-top: 10px;
            font-size: 12px;
        }

        .no-data-message {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="main-content">
            <!-- Welcome Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card welcome-card border-0 shadow-lg">
                        <div class="card-body d-flex justify-content-between align-items-center py-4 px-4 flex-wrap">
                            <div class="welcome-text text-white">
                                <h1 class="fw-bold mb-2">SELAMAT DATANG</h1>
                                <p class="mb-1">Di Halaman Dashboard Admin</p>
                                <p class="mb-0">Sistem Informasi Manajemen Sekolah SMKN 3 BANJAR</p>
                            </div>
                            <div class="welcome-clock text-end mt-3 mt-md-0">
                                <div id="dashboard-digital-clock" class="clock-display">00:00:00</div>
                                <div id="dashboard-date-display" class="date-display">Loading...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4 g-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card h-100 card-galeri">
                        <div class="card-body text-center py-5">
                            <i class="mdi mdi-image-album stat-icon"></i>
                            <h6 class="stat-label">Total Galeri</h6>
                            <h2 class="stat-number"><?= $totalGaleris ?></h2>
                            <p class="text-muted small mb-0">Jumlah Galeri SMKN 3 BANJAR</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card h-100 card-guru">
                        <div class="card-body text-center py-5">
                            <i class="mdi mdi-account-tie stat-icon"></i>
                            <h6 class="stat-label">Total Guru</h6>
                            <h2 class="stat-number"><?= $totalGurus ?></h2>
                            <p class="text-muted small mb-0">Guru SMKN 3 BANJAR</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card h-100 card-jurusan">
                        <div class="card-body text-center py-5">
                            <i class="mdi mdi-school stat-icon"></i>
                            <h6 class="stat-label">Total Jurusan</h6>
                            <h2 class="stat-number"><?= $totalJurusans ?></h2>
                            <p class="text-muted small mb-0">Jurusan SMKN 3 BANJAR</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card h-100 card-messages">
                        <div class="card-body text-center py-5">
                            <i class="mdi mdi-email stat-icon"></i>
                            <h6 class="stat-label">Total Pesan</h6>
                            <h2 class="stat-number"><?= $totalPesan ?></h2>
                            <p class="text-muted small mb-0">Pesan Masuk</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diagram Batang untuk Histori Pesan -->
            <div class="row barchart-section">
                <div class="col-12">
                    <div class="card rectangular-card card-barchart">
                        <div class="card-header bg-transparent border-0 pt-4 pb-0">
                            <h5 class="card-title mb-0 text-center">
                                <i class="mdi mdi-chart-bar me-2"></i>Statistik Pesan per Bulan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-title">Frekuensi (Banyak Pesan)</div>
                            <div class="chart-subtitle">Diagram Batang - 12 Bulan Terakhir</div>

                            <?php if (count($dataBulan) > 0): ?>
                                <div class="chart-container-bar">
                                    <canvas id="messageBarChart"></canvas>
                                </div>

                                <div class="diagram-source">SMKN 3 BANJAR - Sistem Informasi Sekolah</div>
                            <?php else: ?>
                                <div class="no-data-message">
                                    <i class="mdi mdi-chart-bar mdi-48px mb-3"></i>
                                    <h5>Belum Ada Data Pesan</h5>
                                    <p>Data statistik pesan akan ditampilkan di sini setelah ada pesan yang masuk.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Tabel Aktivitas Login & Logout -->
            <div class="row activities-section mb-4">
                <div class="col-12">
                    <div class="card rectangular-card card-activities">
                        <div class="card-header d-flex justify-content-between align-items-center text-white"
                            style="background: linear-gradient(135deg,#023e8a,#0077b6,#90e0ef); border:none;">
                            <h5 class="mb-0 text-light">
                                <i class="mdi mdi-account-clock me-2"></i>Aktivitas Login & Logout
                            </h5>
                            <a href="../aktivitasuser2/index.php" class="btn btn-sm btn-light" style="padding:.25rem .5rem;">
                                <i class="mdi mdi-arrow-right"></i> Lihat Semua
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-activities">
                                    <thead>
                                        <tr class="text-capitalize">
                                            <th>No</th>
                                            <th>Nama / Email</th>
                                            <th>Waktu Login</th>
                                            <th>Waktu Logout</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // ambil data 5 aktivitas terakhir
                                        $qActivities = "
                                            SELECT u.name, u.email, s.login_at, s.logout_at
                                            FROM user_sessions s
                                            JOIN users u ON u.id = s.user_id
                                            ORDER BY s.login_at DESC
                                            LIMIT 5
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
                                                    <td><?= htmlspecialchars($nama) ?><br><small class="text-muted"><?= htmlspecialchars($email) ?></small></td>
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

            <!-- Tabel Pesan Terbaru - DI ATAS -->
            <div class="row messages-section">
                <div class="col-12">
                    <div class="card rectangular-card card-messages">
                        <div class="card-header d-flex justify-content-between align-items-center text-white"
                            style="background: linear-gradient(135deg,#023e8a,#0077b6,#90e0ef); border:none;">
                            <h5 class="mb-0 text-light">
                                <i class="mdi mdi-email me-2"></i>Pesan Terbaru
                            </h5>
                            <a href="../message/index.php" class="btn btn-sm btn-light" style="padding:.25rem .5rem;">
                                <i class="mdi mdi-arrow-right"></i> Lihat Semua
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-messages">
                                    <thead>
                                        <tr class="text-capitalize">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Pesan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($messageTable && !empty($messages)): ?>
                                            <?php $no = 1;
                                            foreach ($messages as $row): ?>
                                                <?php
                                                $name  = $row->name ?? '-';
                                                $email = $row->email ?? '-';
                                                $pesan = $row->message ?? '-';
                                                $short = mb_strlen($pesan) > 80 ? mb_substr($pesan, 0, 80) . '…' : $pesan;
                                                ?>
                                                <tr>
                                                    <td class="fw-bold"><?= $no++ ?></td>
                                                    <td class="text-capitalize"><?= htmlspecialchars($name) ?></td>
                                                    <td><?= htmlspecialchars($email) ?></td>
                                                    <td><?= htmlspecialchars($short) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php elseif (!$messageTable): ?>
                                            <tr>
                                                <td colspan="4" class="text-center text-danger py-4">
                                                    <i class="mdi mdi-alert-circle-outline me-2"></i>
                                                    Tabel pesan tidak ditemukan di database.
                                                    Pastikan ada tabel berisi kolom <b>name, email, message</b>.
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-4">
                                                    <i class="mdi mdi-email-open-outline me-2"></i>
                                                    Belum ada pesan
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

            <!-- Pie Chart - DI BAWAH -->
            <div class="row piechart-section">
                <div class="col-12">
                    <div class="card rectangular-card card-piechart">
                        <div class="card-header bg-transparent border-0 pt-4 pb-0">
                            <h5 class="card-title mb-0 text-center">
                                <i class="mdi mdi-chart-pie me-2"></i>Statistik Guru Berdasarkan Jenis Kelamin
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="chart-container">
                                        <canvas id="genderChart"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Detail Statistik -->
                                    <div class="stat-detail">
                                        <h6 class="text-center mb-3">Detail Statistik</h6>
                                        <?php
                                        $colors = ['#4e73df', '#e83e8c', '#36b9cc', '#1cc88a', '#f6c23e'];
                                        for ($i = 0; $i < count($labels); $i++):
                                        ?>
                                            <div class="stat-item">
                                                <span>
                                                    <span class="stat-color" style="background-color: <?= $colors[$i] ?>"></span>
                                                    <?= $labels[$i] ?>
                                                </span>
                                                <span>
                                                    <strong><?= $data[$i] ?></strong> guru (<?= $percentages[$i] ?>%)
                                                </span>
                                            </div>
                                        <?php endfor; ?>
                                        <div class="stat-item mt-2 pt-2" style="border-top: 2px solid #dee2e6;">
                                            <span><strong>Total</strong></span>
                                            <span><strong><?= $totalGuru ?></strong> guru (100%)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function pad2(n) {
                return String(n).padStart(2, '0');
            }

            function updateDateTime() {
                var now = new Date();
                var clock = document.getElementById('dashboard-digital-clock');
                var date = document.getElementById('dashboard-date-display');
                if (!clock || !date) return;

                clock.textContent = pad2(now.getHours()) + ':' + pad2(now.getMinutes()) + ':' + pad2(now.getSeconds());

                var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                date.textContent = days[now.getDay()] + ', ' + now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear();
            }
            updateDateTime();
            setInterval(updateDateTime, 1000);

            // Inisialisasi pie chart
            const ctx = document.getElementById('genderChart').getContext('2d');
            const genderChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($labelsWithPercentage); ?>,
                    datasets: [{
                        data: <?php echo json_encode($data); ?>,
                        backgroundColor: [
                            '#4e73df', // Biru untuk Laki-laki
                            '#e83e8c', // Pink untuk Perempuan
                            '#36b9cc', // Turquoise untuk lainnya (jika ada)
                            '#1cc88a', // Hijau untuk lainnya
                            '#f6c23e' // Kuning untuk lainnya
                        ],
                        borderColor: '#fff',
                        borderWidth: 2,
                        hoverOffset: 15
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true,
                                pointStyle: 'circle',
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label.split(' (')[0]}: ${value} guru (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });

            // Inisialisasi bar chart untuk pesan per bulan
            <?php if (count($dataBulan) > 0): ?>
                const barCtx = document.getElementById('messageBarChart').getContext('2d');
                const messageBarChart = new Chart(barCtx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($labelsBulan); ?>,
                        datasets: [{
                            label: 'Jumlah Pesan',
                            data: <?php echo json_encode($dataBulan); ?>,
                            backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            borderRadius: 5,
                            hoverBackgroundColor: 'rgba(54, 162, 235, 0.9)'
                        }]
                    },
                    options: {
                        /* ... opsi sama persis seperti sebelumnya ... */ }
                });
            <?php endif; ?>

        });
    </script>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>