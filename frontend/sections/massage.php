<?php
include '../config/connection.php';

$qPesan = "SELECT * FROM contacts";
$result = mysqli_query($connect, $qPesan) or die(mysqli_error($connect));
$item = $result->fetch_object();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - SMK Negeri 3 Banjar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        #pesan {
            scroll-margin-top: 80px;
            background: linear-gradient(135deg, #e1e6ebff 0%, #e9ecef 100%);
            padding: 80px 0;
        }

        .contact-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            background: white;
        }

        .contact-header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            padding: 30px;
            color: white;
            text-align: center;
        }

        .contact-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .contact-subtitle {
            font-size: 1.2rem;
            margin-bottom: 0;
            opacity: 0.9;
            font-weight: 400;
        }

        .contact-body {
            padding: 40px;
        }

        .contact-info {
            padding: 30px;
            color: #0a3d62;
            border-right: 1px solid #e9ecef;
        }

        .contact-detail {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
            padding: 20px;
            background: rgba(74, 107, 136, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: #ffffff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .contact-icon i {
            font-size: 1.5rem;
            color: #2980b9;
        }

        .contact-text h6 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #0a3d62;
        }

        .contact-text span {
            font-size: 1rem;
            opacity: 0.9;
            color: #1e3799;
        }

        .form-container {
            padding: 30px;
        }

        .form-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #0a3d62;
            margin-bottom: 10px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-subtitle {
            color: #34495e;
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .form-floating {
            margin-bottom: 20px;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 20px;
            height: 60px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            border-color: #2980b9;
            box-shadow: 0 0 0 3px rgba(41, 128, 185, 0.15);
            background: white;
        }

        textarea.form-control {
            height: 120px;
            resize: none;
        }

        .form-label {
            color: #7f8c8d;
            font-weight: 500;
            padding: 0 0.5rem;
            background: #f8f9fa;
            transform: translate(0.5rem, -1.5rem);
        }

        .form-control:focus+.form-label,
        .form-control:not(:placeholder-shown)+.form-label {
            transform: translate(0.5rem, -2.8rem) scale(0.85);
            background: white;
            color: #2980b9;
            font-weight: 600;
        }

        .btn-submit {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border: none;
            border-radius: 50px;
            padding: 18px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(41, 128, 185, 0.4);
            background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);
        }

        .message-card .card-header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .message-item {
            border-left: 4px solid #4facfe;
            padding: 15px 20px;
            margin-bottom: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .message-name {
            font-weight: 700;
            color: #0a3d62;
            margin-bottom: 5px;
        }

        .message-email {
            font-size: 0.9rem;
            color: #2980b9;
            margin-bottom: 10px;
        }

        .message-text {
            color: #34495e;
            line-height: 1.5;
        }

        .message-date {
            font-size: 0.8rem;
            color: #7f8c8d;
            text-align: right;
        }

        @media (max-width: 992px) {
            .contact-info {
                border-right: none;
                border-bottom: 1px solid #e9ecef;
                padding: 20px;
            }

            .contact-title {
                font-size: 2rem;
            }

            .form-container {
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .contact-body {
                padding: 20px;
            }

            .contact-title {
                font-size: 1.8rem;
            }

            .form-title {
                font-size: 1.5rem;
            }

            .btn-submit {
                padding: 15px 30px;
                font-size: 1rem;
            }

            .contact-detail {
                flex-direction: column;
                text-align: center;
            }

            .contact-icon {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>
    <div id="pesan" class="contact-container">
        <div class="container">
            <!-- Card Utama -->
            <div class="contact-card">
                <!-- Header Card -->
                <div class="contact-header">
                    <h1 class="contact-title">Hubungi Kami</h1>
                    <p class="contact-subtitle">SMK Negeri 3 Banjar - Bersama Kita Bisa</p>
                </div>

                <!-- Body Card -->
                <div class="contact-body">
                    <div class="row">
                        <!-- Info Kontak -->
                        <div class="col-lg-5">
                            <div class="contact-info">
                                <div class="contact-detail">
                                    <div class="contact-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="contact-text">
                                        <h6>Alamat</h6>
                                        <span>Jl. Julaeni, RT/RW 5/2, Dsn. Langensari, Kel. Langensari, Kec. Langensari, Kota Banjar, Jawa Barat 46341</span>
                                    </div>
                                </div>

                                <div class="contact-detail">
                                    <div class="contact-icon">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <div class="contact-text">
                                        <h6>No Telepon</h6>
                                        <span><?= $item->phone ?></span>
                                    </div>
                                </div>

                                <div class="contact-detail">
                                    <div class="contact-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="contact-text">
                                        <h6>Email</h6>
                                        <span><?= $item->email ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Kontak -->
                        <div class="col-lg-7">
                            <div class="form-container">
                                <h3 class="form-title">SUARA ANDA, INSPIRASI KAMI</h3>
                                <p class="form-subtitle">JIKA ANDA MEMILIKI PERTANYAAN, SILAKAN HUBUNGI KAMI</p>

                                <form action="action/message/create_pesan.php" method="post">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name='name' id="name" placeholder="Nama" required>
                                                <label for="name">Nama</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" name='email' id="email" placeholder="Email" required>
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Tulis pesan Anda di sini" name='message' id="message" style="height: 130px" required></textarea>
                                                <label for="message">Pesan</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn-submit" type="submit" name="tombol">
                                                <i class="bi bi-send me-2"></i>KIRIM PESAN
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>