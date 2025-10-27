<?php
include '../config/connection.php';

// Query untuk mengambil data kepala sekolah
$qkepala = "SELECT * FROM headmasters LIMIT 1";
$result = mysqli_query($connect, $qkepala) or die(mysqli_error($connect));
$item = $result->fetch_object();

// Potong teks untuk preview (sekitar 400 karakter)
$preview_text = strlen($item->headmasters_description) > 400
    ? substr($item->headmasters_description, 0, 400) . "..."
    : $item->headmasters_description;
?>

<div class="row g-5 align-items-start">
    <div id="kepala" class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <section id="kepala" class="sambutan">
            <div class="wrap-sambutan">
                <!-- Header Section -->
                <div class="header-main">
                    <h1>SAMBUTAN KEPALA SEKOLAH</h1>
                    <div class="header-divider"></div>
                </div>

                <div class="content-container">
                    <!-- Kiri: Sambutan Kepala Sekolah -->
                    <div class="kiri">
                        <div class="greeting-main">
                            <div class="greeting-icon"><i class="fa fa-tasks me-2"></i></div>
                            <p class="greeting-text">Assalamu'alaikum Wr. Wb.</p>
                        </div>

                        <div class="sambutan-content-main">
                            <div class="content-scroll">
                                <!-- Teks preview yang dipotong -->
                                <div id="preview-text"><?= $preview_text ?></div>

                                <!-- Teks lengkap yang awalnya tersembunyi -->
                                <div id="full-text" style="display: none;"><?= $item->headmasters_description ?></div>
                            </div>

                            <!-- Tombol Selengkapnya -->
                            <?php if (strlen($item->headmasters_description) > 400): ?>
                                <div class="read-more-container">
                                    <button id="read-more-btn" class="read-more-btn">
                                        Selengkapnya <i class="fa fa-chevron-down"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="closing-main">
                            <p class="closing-text">Wassalamu'alaikum Wr. Wb.</p>
                            <div class="closing-icon"><i class="fa fa-tasks me-2"></i></div>
                        </div>
                    </div>

                    <!-- Kanan: Foto Kepala Sekolah -->
                    <div class="kanan">
                        <div class="photo-container-main">
                            <div class="photo-simple-frame">
                                <img class="profile-photo-simple" src="../storages/kepalaSekolah/<?= $item->headmasters_photo ?>" alt="Kepala Sekolah">
                            </div>

                            <div class="info-container">
                                <div class="name-plate">
                                    <h3 class="name-title"><?= $item->headmasters_name ?></h3>
                                    <p class="position-text">Kepala Sekolah SMKN 3 Banjar</p>
                                </div>

                                <div class="signature-section">
                                    <div class="signature-line"></div>
                                    <p class="signature-label">Kepala Sekolah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<style>
    /* Reset dan base styling */
    html,
    body {
        overflow-x: hidden;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    #kepala {
        scroll-margin-top: 120px;
       
    }

    /* Main container - Diperpanjang dan lebih sederhana */
    .wrap-sambutan {
        width: 100%;
        max-width: 1800px;
        margin: 0 auto;
        padding: 40px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 1);
        border: 1px solid #e9ecef;
    }

    /* Header utama */
    .header-main {
        text-align: center;
        margin-bottom: 50px;
        padding-bottom: 20px;
        border-bottom: 3px solid #2c3e50;
    }

    .header-main h1 {
        font-size: 32px;
        font-weight: 800;
        color: #2c3e50;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 0;
        padding: 0;
    }

    .header-divider {
        width: 120px;
        height: 4px;
        background: #3498db;
        margin: 15px auto 0;
        border-radius: 2px;
    }

    /* Container untuk konten utama */
    .content-container {
        display: flex;
        gap: 50px;
        align-items: stretch;
        min-height: 500px;
    }

    /* Kolom kiri - Sambutan */
    .kiri {
        flex: 0 0 65%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Greeting section */
    .greeting-main {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
        padding: 20px;
        background: #e8f4fc;
        border-radius: 8px;
        border-left: 4px solid #3498db;
    }

    .greeting-icon {
        width: 40px;
        height: 40px;
        background: #3498db;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 18px;
    }

    .greeting-text {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
    }

    /* Konten sambutan utama */
    .sambutan-content-main {
        flex: 1;
        background: #f8f9fa;
        border-radius: 8px;
        padding: 30px;
        margin: 20px 0;
        border: 1px solid #e9ecef;
        overflow-y: auto;
        max-height: 350px;
        position: relative;
    }

    .content-scroll {
        font-size: 16px;
        line-height: 1.8;
        color: #34495e;
        text-align: justify;
    }

    /* Container untuk tombol selengkapnya */
    .read-more-container {
        text-align: center;
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #e9ecef;
    }

    /* Tombol selengkapnya */
    .read-more-btn {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .read-more-btn:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Closing section */
    .closing-main {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
        padding: 20px;
        background: #e8f4fc;
        border-radius: 8px;
        border-right: 4px solid #3498db;
    }

    .closing-text {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
    }

    .closing-icon {
        width: 40px;
        height: 40px;
        background: #3498db;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 18px;
    }

    /* Kolom kanan - Foto */
    .kanan {
        flex: 0 0 35%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .photo-container-main {
        text-align: center;
    }

    .photo-simple-frame {
        margin-bottom: 30px;
    }

    .profile-photo-simple {
        width: 280px;
        height: 350px;
        object-fit: cover;
        border-radius: 8px;
    }

    .info-container {
        width: 80%;
        background: #f8f9fa;
        padding: 25px;
        border-radius: 8px;
        border: 1px solid #e9ecef;
    }

    .name-plate {
        margin-bottom: 20px;
    }

    .name-title {
        font-size: 22px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0 0 8px 0;
        text-align: center;
    }

    .position-text {
        font-size: 16px;
        color: #6c757d;
        margin: 0;
        text-align: center;
        font-weight: 500;
    }

    .signature-section {
        text-align: center;
        padding-top: 20px;
        border-top: 2px solid #dee2e6;
    }

    .signature-line {
        width: 150px;
        height: 2px;
        background: #6c757d;
        margin: 0 auto 10px;
    }

    .signature-label {
        font-size: 14px;
        color: #6c757d;
        font-style: italic;
        margin: 0;
    }

    /* Responsive design */
    @media (max-width: 1200px) {
        .content-container {
            gap: 40px;
        }

        .profile-photo-simple {
            width: 250px;
            height: 320px;
        }
    }

    @media (max-width: 992px) {
        .wrap-sambutan {
            padding: 30px;
        }

        .content-container {
            flex-direction: column;
            gap: 40px;
        }

        .kiri,
        .kanan {
            flex: 0 0 100%;
        }

        .profile-photo-simple {
            width: 280px;
            height: 350px;
        }

        .sambutan-content-main {
            max-height: none;
        }
    }

    @media (max-width: 576px) {
        .wrap-sambutan {
            padding: 20px;
            margin: 20px;
        }

        .header-main h1 {
            font-size: 24px;
        }

        .greeting-main,
        .closing-main {
            padding: 15px;
        }

        .sambutan-content-main {
            padding: 20px;
        }

        .profile-photo-simple {
            width: 220px;
            height: 280px;
        }

        .info-container {
            padding: 20px;
        }

        .name-title {
            font-size: 20px;
        }

        .read-more-btn {
            padding: 8px 16px;
            font-size: 13px;
        }
    }

    /* Scrollbar styling untuk konten */
    .sambutan-content-main::-webkit-scrollbar {
        width: 6px;
    }

    .sambutan-content-main::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }

    .sambutan-content-main::-webkit-scrollbar-thumb {
        background: #3498db;
        border-radius: 3px;
    }

    .sambutan-content-main::-webkit-scrollbar-thumb:hover {
        background: #2980b9;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreBtn = document.getElementById('read-more-btn');
        const previewText = document.getElementById('preview-text');
        const fullText = document.getElementById('full-text');
        const sambutanContent = document.querySelector('.sambutan-content-main');

        if (readMoreBtn) {
            readMoreBtn.addEventListener('click', function() {
                if (previewText.style.display === 'none') {
                    // Kembali ke tampilan preview
                    previewText.style.display = 'block';
                    fullText.style.display = 'none';
                    readMoreBtn.innerHTML = 'Selengkapnya <i class="fa fa-chevron-down"></i>';
                    sambutanContent.style.maxHeight = '350px';
                } else {
                    // Tampilkan teks lengkap
                    previewText.style.display = 'none';
                    fullText.style.display = 'block';
                    readMoreBtn.innerHTML = 'Lebih Sedikit <i class="fa fa-chevron-up"></i>';
                    sambutanContent.style.maxHeight = 'none';
                }
            });
        }
    });
</script>