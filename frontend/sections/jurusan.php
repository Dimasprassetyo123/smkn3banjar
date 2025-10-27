<?php
include '../config/connection.php';

$qJurusan = "SELECT * FROM majors";
$result = mysqli_query($connect, $qJurusan) or die(mysqli_error($connect));

$qcount = "SELECT COUNT(*) as total FROM majors";
$count_result = mysqli_query($connect, $qcount);
$total_majors = $count_result->fetch_object()->total;
?>
<div id="jurusan" class="container-fluid mt-6 wow fadeIn" data-wow-delay="0.1s">
  <div class="container pb-5">
    <div class="col p-5">
      <div class="text-center mx-auto mb-5" style="max-width: 700px;">
        <h1 class="display-6 mb-4" style="color: #000;">JURUSAN SMKN 3 BANJAR</h1>
        <p class="mb-0 text-dark">Berbagai jurusan unggulan yang tersedia di SMKN 3 Banjar</p>
      </div>

      <!-- Wrapper animasi -->
      <div class="slider-wrapper">
        <div class="slider-track">
          <?php while ($item = $result->fetch_object()): ?>
            <div class="jurusan-card">
              <img src="../storages/jurusan/<?= $item->majors_image ?>"
                alt="<?= $item->majors_name ?>">
              <h6><?= $item->majors_name ?></h6>
            </div>
          <?php endwhile; ?>

          <!-- duplikasi biar animasi looping mulus -->
          <?php
          mysqli_data_seek($result, 0);
          while ($item = $result->fetch_object()): ?>
            <div class="jurusan-card">
              <img src="../storages/jurusan/<?= $item->majors_image ?>"
                alt="<?= $item->majors_name ?>">
              <h6><?= $item->majors_name ?></h6>
            </div>
          <?php endwhile; ?>
        </div>
      </div>

      <div class="text-center mt-4 p-5">
        <div class="text-center mt-5">
          <a href="sections/semuaJurusan.php" class="btn-lihat-semuanya">
            <i class="fas fa-newspaper"></i> LIHAT SEMUA JURUSAN
            <span class="jurusan-count"><?= $total_majors ?>+</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  #jurusan {
    margin-top: 0 !important;
    padding-top: 0 !important;
    scroll-margin-top: 90px;
  }


  /* Area slider */
  .slider-wrapper {
    overflow: hidden;
    position: relative;
    width: 100%;
  }

  .jurusan-count {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
    padding: 8px 20px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 14px;
    margin-left: 15px;
    box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
  }

  .slider-track {
    display: flex;
    gap: 25px;
    animation: scroll-left 40s linear infinite;
    width: max-content;
  }

  .jurusan-card {
    background: white;
    border-radius: 18px;
    text-align: center;
    padding: 28px;
    min-width: 300px;
    /* lebih besar */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    transition: transform 0.3s ease;
  }

  .jurusan-card:hover {
    transform: translateY(-8px) scale(1.07);
  }

  .jurusan-card img {
    width: 150px;
    /* gambar lebih besar */
    height: 150px;
    object-fit: contain;
    /* biar gambar tidak kepotong */
    border-radius: 14px;
    margin-bottom: 15px;
  }

  .jurusan-card h6 {
    font-size: 17px;
    /* teks lebih besar */
    font-weight: bold;
    text-transform: uppercase;
    color: #0d6efd;
    margin: 0;
  }


  /* animasi jalan */
  @keyframes scroll-left {
    0% {
      transform: translateX(0);
    }

    100% {
      transform: translateX(-50%);
    }
  }

  /* Tombol lebih cantik */
  .btn-primary {
    background: linear-gradient(45deg, #0d6efd, #3b82f6);
    border: none;
    font-weight: 600;
    transition: transform 0.2s ease, box-shadow 0.3s ease;
  }

  .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(13, 110, 253, 0.4);
  }
</style>